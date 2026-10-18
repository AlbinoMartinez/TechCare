<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\AnalyticEvent;
use App\Models\Consultation;
use App\Models\PageView;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\VisitFee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show admin login form.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    /**
     * Authenticate admin.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            ActivityLog::log(
                action: 'admin_login',
                description: 'Admin ' . Auth::user()->name . ' berhasil masuk ke sistem.',
                subject: Auth::user()
            );

            return redirect()->intended(route('admin.dashboard'))->with('success', 'Selamat datang di Panel Admin TechCare.');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan tidak sesuai.',
        ])->onlyInput('email');
    }

    /**
     * Logout admin.
     */
    public function logout(Request $request)
    {
        if (Auth::check()) {
            ActivityLog::log(
                action: 'admin_logout',
                description: 'Admin ' . Auth::user()->name . ' keluar dari sesi.',
                subject: Auth::user()
            );
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('info', 'Anda telah keluar dari panel admin.');
    }

    /**
     * Admin Dashboard Overview inspired by dark technical dashboard theme.
     */
    public function dashboard()
    {
        // 1. Consultation Stats
        $stats = [
            'total' => Consultation::count(),
            'baru' => Consultation::where('status', 'baru')->count(),
            'dikonfirmasi' => Consultation::where('status', 'dikonfirmasi')->count(),
            'dikerjakan' => Consultation::where('status', 'dikerjakan')->count(),
            'selesai' => Consultation::where('status', 'selesai')->count(),
            'dibatalkan' => Consultation::where('status', 'dibatalkan')->count(),
        ];

        // 2. Revenue estimate from completed services
        $estimatedCompletedRevenue = Consultation::where('status', 'selesai')->sum('estimated_cost');
        if ($estimatedCompletedRevenue == 0) {
            // Calculate based on standard proposal average if empty
            $selesaiCount = $stats['selesai'];
            $estimatedCompletedRevenue = $selesaiCount * 77000;
        }

        // 3. Privacy-friendly visitor statistics
        $now = now();
        $sevenDaysAgo = $now->copy()->subDays(7);
        $thirtyDaysAgo = $now->copy()->subDays(30);

        $visitors7Days = PageView::where('created_at', '>=', $sevenDaysAgo)
            ->distinct('visitor_hash')
            ->count('visitor_hash');

        $visitors30Days = PageView::where('created_at', '>=', $thirtyDaysAgo)
            ->distinct('visitor_hash')
            ->count('visitor_hash');

        $totalPageViews = PageView::count();

        // 4. Analytics events stats
        $waClicks = AnalyticEvent::where('event_name', 'wa_click')->count();
        $calcUsed = AnalyticEvent::where('event_name', 'kalkulator_dipakai')->count();
        $serviceViews = AnalyticEvent::where('event_name', 'layanan_dilihat')->count();

        // Conversion rate: (total bookings / unique visitors (min 1)) * 100
        $conversionRate = $visitors30Days > 0 
            ? round(($stats['total'] / $visitors30Days) * 100, 1) 
            : ($stats['total'] > 0 ? 100 : 0);

        // 5. BEP Progress (Bab VIII: BEP Operasional = 2 transaksi, Target Pemilik = 9 transaksi)
        $monthlyTarget = 9;
        $bepBase = 2;
        $currentMonthOrders = Consultation::where('created_at', '>=', now()->startOfMonth())->count();
        $goalProgressPercent = min(100, round(($currentMonthOrders / $monthlyTarget) * 100));

        // 6. Recent activity feed
        $recentActivities = ActivityLog::latest('created_at')->take(6)->get();

        // 7. Recent orders
        $recentConsultations = Consultation::latest()->take(6)->get();

        // 8. Popular services (from proposal or DB)
        $popularServices = Service::active()->utama()->orderBy('sort_order')->take(5)->get();

        $whatsappNumber = Setting::get('whatsapp_number', config('techcare.whatsapp_int', '6285641487430'));

        return view('admin.dashboard', compact(
            'stats',
            'estimatedCompletedRevenue',
            'visitors7Days',
            'visitors30Days',
            'totalPageViews',
            'waClicks',
            'calcUsed',
            'serviceViews',
            'conversionRate',
            'goalProgressPercent',
            'currentMonthOrders',
            'bepBase',
            'monthlyTarget',
            'recentActivities',
            'recentConsultations',
            'popularServices',
            'whatsappNumber'
        ));
    }

    /**
     * Manage all bookings/orders.
     */
    public function orders(Request $request)
    {
        $status = $request->query('status');
        $search = $request->query('search');
        $query = Consultation::latest();

        if ($status && in_array($status, ['baru', 'dikonfirmasi', 'dikerjakan', 'selesai', 'dibatalkan'])) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('order_code', 'like', "%{$search}%")
                  ->orWhere('customer_name', 'like', "%{$search}%")
                  ->orWhere('customer_phone', 'like', "%{$search}%")
                  ->orWhere('device', 'like', "%{$search}%")
                  ->orWhere('problem', 'like', "%{$search}%");
            });
        }

        $consultations = $query->paginate(15)->withQueryString();
        $currentStatus = $status ?? 'semua';

        return view('admin.orders', compact('consultations', 'currentStatus', 'search'));
    }

    /**
     * Update consultation status and notes.
     */
    public function updateOrder(Request $request, Consultation $consultation)
    {
        $validated = $request->validate([
            'status' => 'required|in:baru,dikonfirmasi,dikerjakan,selesai,dibatalkan',
            'technician_notes' => 'nullable|string',
            'estimated_cost' => 'nullable|integer|min:0',
        ]);

        $oldStatus = $consultation->status;
        $consultation->update($validated);

        ActivityLog::log(
            action: 'update_order_status',
            description: "Status pesanan #{$consultation->order_code} ({$consultation->customer_name}) diubah dari '{$oldStatus}' menjadi '{$consultation->status}'.",
            subject: $consultation,
            oldValues: ['status' => $oldStatus],
            newValues: ['status' => $consultation->status, 'estimated_cost' => $consultation->estimated_cost]
        );

        return back()->with('success', "Pesanan #{$consultation->order_code} berhasil diperbarui.");
    }

    /**
     * Delete a consultation order.
     */
    public function deleteOrder(Consultation $consultation)
    {
        $orderCode = $consultation->order_code;
        $customerName = $consultation->customer_name;
        $consultation->delete();

        ActivityLog::log(
            action: 'delete_order',
            description: "Pesanan #{$orderCode} ({$customerName}) telah dihapus dari sistem."
        );

        return back()->with('success', "Pesanan #{$orderCode} berhasil dihapus.");
    }

    /**
     * Generate WhatsApp reply to client.
     */
    public function replyWhatsapp(Request $request, Consultation $consultation)
    {
        $customerPhone = $consultation->customer_phone;
        $phone = $customerPhone ? preg_replace('/[^0-9]/', '', $customerPhone) : '';

        if (str_starts_with($phone, '0')) {
            $phone = '62' . substr($phone, 1);
        }

        $statusText = match ($consultation->status) {
            'dikonfirmasi' => 'Jadwal telah kami konfirmasi',
            'dikerjakan' => 'Sedang dalam pengerjaan teknisi',
            'selesai' => 'Pengerjaan telah selesai dan siap diserahterimakan',
            'dibatalkan' => 'Pesanan dibatalkan',
            default => 'Pesanan Anda telah kami terima',
        };

        $replyMessage = "Halo Kak {$consultation->customer_name},\n\n"
            . "Terima kasih telah memesan jasa di TechCare.\n"
            . "Update status pesanan #{$consultation->order_code} ({$consultation->service_name} - {$consultation->device}):\n\n"
            . "Status: {$statusText}.\n"
            . ($consultation->estimated_cost ? "Estimasi Biaya: Rp" . number_format($consultation->estimated_cost, 0, ',', '.') . "\n" : "")
            . ($consultation->technician_notes ? "Catatan Teknisi: {$consultation->technician_notes}\n\n" : "\n")
            . "Jika ada hal yang ingin ditanyakan, silakan balas chat ini. Terima kasih.\n"
            . "- Nur Muhibbin (TechCare Minggir, Sleman)";

        $waUrl = $phone
            ? "https://wa.me/{$phone}?text=" . rawurlencode($replyMessage)
            : "https://wa.me/?text=" . rawurlencode($replyMessage);

        return redirect()->away($waUrl);
    }

    /**
     * Manage service catalog.
     */
    public function services()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('admin.services', compact('services'));
    }

    /**
     * Update service details with price change logging.
     */
    public function updateService(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'category' => 'required|in:komputer,jaringan,linux,keamanan',
            'price' => 'required|integer|min:0',
            'price_note' => 'nullable|string|max:50',
            'duration' => 'required|string|max:50',
            'notes' => 'nullable|string',
            'is_utama' => 'boolean',
            'is_active' => 'boolean',
            'description' => 'required|string',
        ]);

        $validated['is_utama'] = $request->boolean('is_utama');
        $validated['is_active'] = $request->boolean('is_active');

        $oldPrice = $service->price;
        $newPrice = (int) $validated['price'];

        $service->update($validated);

        if ($oldPrice !== $newPrice) {
            ActivityLog::log(
                action: 'update_price',
                description: "Harga layanan {$service->code} ({$service->name}) diubah dari Rp" . number_format($oldPrice, 0, ',', '.') . " menjadi Rp" . number_format($newPrice, 0, ',', '.') . ".",
                subject: $service,
                oldValues: ['price' => $oldPrice],
                newValues: ['price' => $newPrice]
            );
        } else {
            ActivityLog::log(
                action: 'update_service',
                description: "Data layanan {$service->code} ({$service->name}) diperbarui.",
                subject: $service
            );
        }

        return back()->with('success', "Layanan '{$service->name}' (#{$service->code}) berhasil diperbarui.");
    }

    /**
     * Manage Home Service Visit Fees (Bab IV 4.5).
     */
    public function visitFees()
    {
        $visitFees = VisitFee::orderBy('sort_order')->get();
        return view('admin.visit_fees', compact('visitFees'));
    }

    /**
     * Update Visit Fee.
     */
    public function updateVisitFee(Request $request, VisitFee $visitFee)
    {
        $validated = $request->validate([
            'distance_label' => 'required|string|max:100',
            'fee' => 'required|integer|min:0',
            'notes' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $oldFee = $visitFee->fee;
        $visitFee->update($validated);

        ActivityLog::log(
            action: 'update_visit_fee',
            description: "Tarif ongkos kunjungan {$visitFee->distance_label} diubah dari Rp" . number_format($oldFee, 0, ',', '.') . " ke Rp" . number_format($visitFee->fee, 0, ',', '.') . ".",
            subject: $visitFee,
            oldValues: ['fee' => $oldFee],
            newValues: ['fee' => $visitFee->fee]
        );

        return back()->with('success', "Tarif kunjungan {$visitFee->distance_label} berhasil disimpan.");
    }

    /**
     * Manage Testimonials (strictly real, unpublished default).
     */
    public function testimonials()
    {
        $testimonials = Testimonial::orderByDesc('created_at')->paginate(15);
        return view('admin.testimonials', compact('testimonials'));
    }

    /**
     * Store new authentic testimonial.
     */
    public function storeTestimonial(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'customer_role' => 'nullable|string|max:100',
            'device_type' => 'nullable|string|max:100',
            'service_name' => 'nullable|string|max:100',
            'feedback' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'consent_to_publish' => 'boolean',
            'is_published' => 'boolean',
        ]);

        $validated['consent_to_publish'] = $request->boolean('consent_to_publish');
        $validated['is_published'] = $request->boolean('is_published');

        $testimonial = Testimonial::create($validated);

        ActivityLog::log(
            action: 'create_testimonial',
            description: "Testimoni baru dari {$testimonial->customer_name} ditambahkan.",
            subject: $testimonial
        );

        return back()->with('success', 'Testimoni berhasil ditambahkan.');
    }

    /**
     * Toggle testimonial publish status.
     */
    public function toggleTestimonial(Testimonial $testimonial)
    {
        $newStatus = !$testimonial->is_published;
        $testimonial->update(['is_published' => $newStatus]);

        ActivityLog::log(
            action: 'toggle_testimonial',
            description: "Testimoni dari {$testimonial->customer_name} diubah menjadi " . ($newStatus ? 'TERBIT (Publik)' : 'DRAFT (Disembunyikan)') . ".",
            subject: $testimonial
        );

        return back()->with('success', 'Status publikasi testimoni berhasil diubah.');
    }

    /**
     * Delete Testimonial.
     */
    public function deleteTestimonial(Testimonial $testimonial)
    {
        $name = $testimonial->customer_name;
        $testimonial->delete();

        ActivityLog::log(
            action: 'delete_testimonial',
            description: "Testimoni dari {$name} telah dihapus."
        );

        return back()->with('success', 'Testimoni berhasil dihapus.');
    }

    /**
     * Show Activity Logs (Audit trail).
     */
    public function activityLogs()
    {
        $logs = ActivityLog::latest('created_at')->paginate(25);
        return view('admin.activity_logs', compact('logs'));
    }

    /**
     * Privacy-Friendly Analytics & Traffic Details.
     */
    public function monitoring()
    {
        $dailyVisitors = PageView::select(
            DB::raw("strftime('%Y-%m-%d', created_at) as date"),
            DB::raw('count(distinct visitor_hash) as unique_visitors'),
            DB::raw('count(*) as total_views')
        )
        ->where('created_at', '>=', now()->subDays(14))
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->get();

        $topPages = PageView::select('path', DB::raw('count(*) as views'))
            ->groupBy('path')
            ->orderByDesc('views')
            ->take(10)
            ->get();

        $deviceBreakdown = PageView::select('device_class', DB::raw('count(*) as count'))
            ->groupBy('device_class')
            ->get();

        $topReferrers = PageView::select('referrer_host', DB::raw('count(*) as count'))
            ->whereNotNull('referrer_host')
            ->groupBy('referrer_host')
            ->orderByDesc('count')
            ->take(10)
            ->get();

        $events = AnalyticEvent::select('event_name', DB::raw('count(*) as count'))
            ->groupBy('event_name')
            ->get();

        return view('admin.monitoring', compact(
            'dailyVisitors',
            'topPages',
            'deviceBreakdown',
            'topReferrers',
            'events'
        ));
    }

    /**
     * Show settings edit page.
     */
    public function settings()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings', compact('settings'));
    }

    /**
     * Update dynamic settings (WhatsApp, rates, info, bank, ewallet).
     */
    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'whatsapp_number' => 'required|string|max:20',
            'whatsapp_display' => 'required|string|max:30',
            'email' => 'nullable|email|max:100',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'maps_url' => 'nullable|string|max:255',
            'business_name' => 'required|string|max:100',
            'tagline' => 'required|string|max:200',
            'address' => 'required|string|max:200',
            'service_area' => 'required|string|max:200',
            'operational_hours' => 'required|string|max:200',
            'bank_name' => 'nullable|string|max:100',
            'bank_account' => 'nullable|string|max:100',
            'ewallet_info' => 'nullable|string|max:255',
            'home_service_tier_1' => 'required|integer|min:0',
            'home_service_tier_2' => 'required|integer|min:0',
            'home_service_tier_3' => 'required|integer|min:0',
            'warranty_days' => 'required|integer|min:1',
        ]);

        foreach ($validated as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value ?? '']);
        }

        ActivityLog::log(
            action: 'update_settings',
            description: 'Pengaturan umum website (kontak, jam operasional, rekening) telah diperbarui.'
        );

        return back()->with('success', 'Pengaturan website berhasil disimpan.');
    }

    /**
     * Internal Financial Data (Bab VIII Proposal).
     */
    public function keuangan()
    {
        $financialData = [
            'modal_awal' => [
                'peralatan' => 535000,
                'bahan_habis_pakai' => 255000,
                'promosi' => 115000,
                'dana_cadangan' => 95000,
                'total' => 1000000,
            ],
            'biaya_tetap' => [
                'paket_data' => 50000,
                'promosi_rutin' => 30000,
                'perawatan_alat' => 25000,
                'penyusutan' => 22000,
                'total_per_bulan' => 127000,
            ],
            'biaya_variabel' => [
                'transportasi' => 3000,
                'bahan_habis_pakai' => 4000,
                'total_per_transaksi' => 7000,
            ],
            'harga_rata_rata' => 77000,
            'margin_kontribusi' => 70000,
            'bep' => [
                'transaksi' => 2,
                'rupiah' => 154000,
                'dengan_upah_target_500rb' => 9,
            ],
            'skenario_6_bulan' => [
                'konservatif' => [
                    'transaksi' => [4, 5, 6, 7, 8, 8],
                    'total_transaksi' => 38,
                    'pendapatan' => 2926000,
                    'laba_kumulatif' => [153000, 376000, 669000, 1032000, 1465000, 1898000],
                    'balik_modal' => 'Bulan ke-4',
                ],
                'normal' => [
                    'transaksi' => [6, 9, 12, 14, 16, 16],
                    'total_transaksi' => 73,
                    'pendapatan' => 5621000,
                    'laba_kumulatif' => [293000, 796000, 1509000, 2362000, 3355000, 4348000],
                    'balik_modal' => 'Bulan ke-3',
                ],
                'optimistis' => [
                    'transaksi' => [8, 14, 20, 24, 28, 28],
                    'total_transaksi' => 122,
                    'pendapatan' => 9394000,
                    'laba_kumulatif' => [433000, 1286000, 2559000, 4112000, 5945000, 7778000],
                    'balik_modal' => 'Bulan ke-2',
                ],
            ],
            'umk_pembanding' => 2827593, // UMK Kota Yogyakarta 2026
        ];

        return view('admin.keuangan', compact('financialData'));
    }

    /**
     * Update admin password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        ActivityLog::log(
            action: 'change_password',
            description: "Password akun admin {$user->email} berhasil diperbarui.",
            subject: $user
        );

        return back()->with('success', 'Password admin berhasil diubah.');
    }
}
