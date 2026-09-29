<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('info', 'Anda telah keluar dari panel admin.');
    }

    /**
     * Admin Dashboard Overview.
     */
    public function dashboard()
    {
        $stats = [
            'total' => Consultation::count(),
            'baru' => Consultation::where('status', 'baru')->count(),
            'dikonfirmasi' => Consultation::where('status', 'dikonfirmasi')->count(),
            'dikerjakan' => Consultation::where('status', 'dikerjakan')->count(),
            'selesai' => Consultation::where('status', 'selesai')->count(),
        ];

        $recentConsultations = Consultation::latest()->take(8)->get();
        $whatsappNumber = Setting::get('whatsapp_number', config('techcare.whatsapp_int', '6285641487430'));

        return view('admin.dashboard', compact('stats', 'recentConsultations', 'whatsappNumber'));
    }

    /**
     * Manage all bookings/orders.
     */
    public function orders(Request $request)
    {
        $status = $request->query('status');
        $query = Consultation::latest();

        if ($status && in_array($status, ['baru', 'dikonfirmasi', 'dikerjakan', 'selesai', 'dibatalkan'])) {
            $query->where('status', $status);
        }

        $consultations = $query->paginate(15);
        $currentStatus = $status ?? 'semua';

        return view('admin.orders', compact('consultations', 'currentStatus'));
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

        $consultation->update($validated);

        return back()->with('success', "Pesanan #{$consultation->order_code} berhasil diperbarui.");
    }

    /**
     * Delete a consultation order.
     */
    public function deleteOrder(Consultation $consultation)
    {
        $orderCode = $consultation->order_code;
        $consultation->delete();

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
     * Update service details.
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
        $service->update($validated);

        return back()->with('success', "Layanan '{$service->name}' (#{$service->code}) berhasil diperbarui.");
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
     * Update dynamic settings (WhatsApp, rates, info).
     */
    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'whatsapp_number' => 'required|string|max:20',
            'whatsapp_display' => 'required|string|max:30',
            'email' => 'nullable|email|max:100',
            'instagram' => 'nullable|string|max:50',
            'tiktok' => 'nullable|string|max:50',
            'business_name' => 'required|string|max:100',
            'tagline' => 'required|string|max:200',
            'address' => 'required|string|max:200',
            'service_area' => 'required|string|max:200',
            'operational_hours' => 'required|string|max:200',
            'home_service_tier_1' => 'required|integer|min:0',
            'home_service_tier_2' => 'required|integer|min:0',
            'home_service_tier_3' => 'required|integer|min:0',
        ]);

        foreach ($validated as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        return back()->with('success', 'Pengaturan website berhasil disimpan.');
    }

    /**
     * Internal Financial Data (Bab VIII Proposal).
     * Protected in admin panel only.
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

        return back()->with('success', 'Password admin berhasil diubah.');
    }
}
