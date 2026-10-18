<?php

namespace App\Http\Controllers;

use App\Models\AnalyticEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnalyticsEventController extends Controller
{
    /**
     * Track client-side interactions (wa_click, kalkulator_dipakai, layanan_dilihat)
     * completely privacy-friendly without IP storage.
     */
    public function track(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'event_name' => 'required|string|in:wa_click,booking_submit,kalkulator_dipakai,layanan_dilihat',
            'metadata' => 'nullable|array',
        ]);

        $userAgent = (string) $request->userAgent();
        $salt = config('app.key', 'techcare-salt');
        $date = now()->format('Y-m-d');
        $rawIp = $request->ip() ?? '127.0.0.1';
        $visitorHash = hash('sha256', "{$salt}|{$rawIp}|{$userAgent}|{$date}");

        AnalyticEvent::create([
            'event_name' => $validated['event_name'],
            'metadata' => $validated['metadata'] ?? [],
            'visitor_hash' => $visitorHash,
            'created_at' => now(),
        ]);

        return response()->json(['status' => 'recorded']);
    }
}
