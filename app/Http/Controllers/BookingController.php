<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingFormRequest;
use App\Models\ActivityLog;
use App\Models\AnalyticEvent;
use App\Models\Consultation;
use App\Models\Setting;

class BookingController extends Controller
{
    /**
     * Store a new booking consultation and redirect to WhatsApp.
     */
    public function store(BookingFormRequest $request)
    {
        $validated = $request->validated();

        // Generate unique order code
        $orderCode = 'TC-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

        $consultation = Consultation::create([
            'order_code' => $orderCode,
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'] ?? null,
            'device' => $validated['device'],
            'problem' => $validated['problem'],
            'service_name' => $validated['service_name'],
            'location' => $validated['location'],
            'home_service_tier' => $validated['home_service_tier'] ?? null,
            'preferred_time' => $validated['preferred_time'],
            'status' => 'baru',
        ]);

        // Record first-party analytics event (privacy-preserving)
        try {
            $userAgent = (string) $request->userAgent();
            $salt = config('app.key', 'techcare-salt');
            $date = now()->format('Y-m-d');
            $rawIp = $request->ip() ?? '127.0.0.1';
            $visitorHash = hash('sha256', "{$salt}|{$rawIp}|{$userAgent}|{$date}");

            AnalyticEvent::create([
                'event_name' => 'booking_submit',
                'metadata' => [
                    'order_code' => $orderCode,
                    'service_name' => $validated['service_name'],
                    'device' => $validated['device'],
                ],
                'visitor_hash' => $visitorHash,
                'created_at' => now(),
            ]);

            ActivityLog::create([
                'user_id' => null,
                'user_name' => 'Website Client (' . $validated['customer_name'] . ')',
                'action' => 'new_booking',
                'subject_type' => 'Consultation',
                'subject_id' => $consultation->id,
                'description' => "Booking baru #{$orderCode} diajukan untuk layanan {$validated['service_name']}.",
                'old_values' => null,
                'new_values' => ['status' => 'baru', 'device' => $validated['device']],
                'created_at' => now(),
            ]);
        } catch (\Throwable $e) {
            report($e);
        }

        // Get WhatsApp number from setting or fallback to proposal
        $whatsappNumber = Setting::get('whatsapp_number', config('techcare.whatsapp_int', '6285641487430'));
        $cleanWa = preg_replace('/[^0-9]/', '', $whatsappNumber);

        // Format message matching proposal Bab 6.3:
        $message = "Halo TechCare, saya {$validated['customer_name']}.\n\n"
            . "Saya ingin konsultasi / pesan layanan:\n"
            . "• Layanan: {$validated['service_name']}\n"
            . "• Perangkat: {$validated['device']}\n"
            . "• Masalah: {$validated['problem']}\n"
            . "• Lokasi: {$validated['location']}" . (!empty($validated['home_service_tier']) ? " ({$validated['home_service_tier']})" : "") . "\n"
            . "• Waktu diinginkan: {$validated['preferred_time']}\n"
            . "• Kode booking: #{$orderCode}\n\n"
            . "Mohon informasi estimasi biaya dan konfirmasi jadwalnya. Terima kasih.";

        $whatsappUrl = 'https://wa.me/' . $cleanWa . '?text=' . rawurlencode($message);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'order_code' => $orderCode,
                'whatsapp_url' => $whatsappUrl,
                'message' => 'Pesanan berhasil dicatat. Mengarahkan ke WhatsApp...',
            ]);
        }

        return redirect()->away($whatsappUrl);
    }
}
