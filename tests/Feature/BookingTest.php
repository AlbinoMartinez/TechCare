<?php

namespace Tests\Feature;

use App\Models\Consultation;
use Database\Seeders\TechCareSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TechCareSeeder::class);
    }

    public function test_valid_booking_stores_consultation_and_redirects_to_whatsapp(): void
    {
        $payload = [
            'customer_name' => 'Budi Santoso',
            'customer_phone' => '081234567890',
            'device' => 'Laptop Asus A456U',
            'problem' => 'Windows lemot dan butuh instal ulang',
            'service_name' => 'Instalasi ulang Windows (A3)',
            'location' => 'Minggir, Sleman',
            'home_service_tier' => 'Home Service ≤ 3 km (Rp10.000)',
            'preferred_time' => 'Besok jam 16.30 WIB',
        ];

        $response = $this->post('/booking', $payload);

        $this->assertDatabaseHas('consultations', [
            'customer_name' => 'Budi Santoso',
            'device' => 'Laptop Asus A456U',
            'status' => 'baru',
        ]);

        $consultation = Consultation::where('customer_name', 'Budi Santoso')->first();
        $this->assertNotNull($consultation);
        $this->assertStringStartsWith('TC-', $consultation->order_code);

        // Verify redirect to WhatsApp with encoded message
        $response->assertStatus(302);
        $redirectUrl = $response->headers->get('Location');
        $this->assertStringContainsString('wa.me/6285641487430', $redirectUrl);
        $this->assertStringContainsString(rawurlencode('Budi Santoso'), $redirectUrl);
    }

    public function test_ajax_booking_returns_json_with_whatsapp_url(): void
    {
        $payload = [
            'customer_name' => 'Siti Rahma',
            'customer_phone' => '087712345678',
            'device' => 'PC Rakitan',
            'problem' => 'Wi-Fi sering putus saat zoom meeting',
            'service_name' => 'Troubleshooting Wi-Fi dan koneksi (B1)',
            'location' => 'Godean, Sleman',
            'home_service_tier' => 'Home Service > 3–7 km (Rp20.000)',
            'preferred_time' => 'Hari Sabtu jam 10.00 WIB',
        ];

        $response = $this->postJson('/booking', $payload);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'order_code',
            'whatsapp_url',
            'message',
        ]);
        $response->assertJson([
            'success' => true,
        ]);

        $this->assertDatabaseHas('consultations', [
            'customer_name' => 'Siti Rahma',
        ]);
    }

    public function test_honeypot_field_blocks_spam_submissions(): void
    {
        $payload = [
            'customer_name' => 'Bot Spammer',
            'customer_phone' => '089999999999',
            'device' => 'Spam Device',
            'problem' => 'Free Bitcoin promotion',
            'service_name' => 'Diagnosis dan troubleshooting (A1)',
            'location' => 'Unknown',
            'preferred_time' => 'Now',
            'website_hp' => 'http://spam-link-filled-by-bot.com', // Honeypot filled!
        ];

        $response = $this->post('/booking', $payload);

        $response->assertSessionHasErrors(['website_hp']);
        $this->assertDatabaseMissing('consultations', [
            'customer_name' => 'Bot Spammer',
        ]);
    }

    public function test_required_validation_rules(): void
    {
        $response = $this->post('/booking', []);

        $response->assertSessionHasErrors([
            'customer_name',
            'device',
            'problem',
            'service_name',
            'location',
            'preferred_time',
        ]);
    }
}
