<?php

namespace Tests\Feature;

use App\Models\Consultation;
use App\Models\Service;
use App\Models\User;
use Database\Seeders\TechCareSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TechCareSeeder::class);
    }

    public function test_guest_is_redirected_to_login_from_admin_pages(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
        $this->get('/admin/orders')->assertRedirect('/admin/login');
        $this->get('/admin/services')->assertRedirect('/admin/login');
        $this->get('/admin/settings')->assertRedirect('/admin/login');
        $this->get('/admin/keuangan')->assertRedirect('/admin/login');
    }

    public function test_admin_can_login_with_default_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@techcare.id',
            'password' => 'techcare123',
        ]);

        $response->assertRedirect('/admin');
        $this->assertAuthenticated();
    }

    public function test_authenticated_admin_can_view_keuangan_page_with_bab_viii_metrics(): void
    {
        $admin = User::where('email', 'admin@techcare.id')->first();

        $response = $this->actingAs($admin)->get('/admin/keuangan');

        $response->assertStatus(200);
        $response->assertSee('Proyeksi Keuangan TechCare');
        $response->assertSee('Rp1.000.000'); // Modal awal
        $response->assertSee('Rp127.000');   // Biaya tetap per bulan
        $response->assertSee('2 Transaksi'); // BEP Operasional
        $response->assertSee('Bulan ke-3');  // Balik modal skenario normal
    }

    public function test_admin_can_update_service_details(): void
    {
        $admin = User::where('email', 'admin@techcare.id')->first();
        $service = Service::where('code', 'A3')->first();

        $response = $this->actingAs($admin)->put("/admin/services/{$service->id}", [
            'name' => $service->name,
            'category' => $service->category,
            'description' => $service->description,
            'duration' => '2–3 jam',
            'price' => 85000, // Updated price
            'is_utama' => '1',
            'is_active' => '1',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('services', [
            'code' => 'A3',
            'price' => 85000,
        ]);
    }

    public function test_admin_can_update_consultation_status(): void
    {
        $admin = User::where('email', 'admin@techcare.id')->first();
        $consultation = Consultation::create([
            'order_code' => 'TC-TEST-001',
            'customer_name' => 'Pak Joko',
            'customer_phone' => '0812345678',
            'device' => 'PC Kantor',
            'problem' => 'Setting printer sharing',
            'service_name' => 'Setting printer jaringan (B5)',
            'location' => 'Minggir',
            'preferred_time' => 'Besok',
            'status' => 'baru',
        ]);

        $response = $this->actingAs($admin)->put("/admin/orders/{$consultation->id}", [
            'status' => 'dikonfirmasi',
            'technician_notes' => 'Siapkan kabel USB dan router printer.',
            'estimated_cost' => 60000,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('consultations', [
            'id' => $consultation->id,
            'status' => 'dikonfirmasi',
            'estimated_cost' => 60000,
            'technician_notes' => 'Siapkan kabel USB dan router printer.',
        ]);
    }
}
