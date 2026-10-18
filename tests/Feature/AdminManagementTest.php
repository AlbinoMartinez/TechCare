<?php

namespace Tests\Feature;

use App\Models\ActivityLog;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\TechCareSeeder::class);
    }

    public function test_updating_service_price_creates_audit_log_and_reflects_immediately(): void
    {
        $admin = User::first();
        $service = Service::where('code', 'A3')->first(); // Instalasi ulang Windows Rp80.000

        $this->assertEquals(80000, $service->price);

        // Update price to 95000 via admin
        $response = $this->actingAs($admin)->put(route('admin.services.update', $service), [
            'name' => $service->name,
            'category' => $service->category,
            'description' => $service->description,
            'duration' => $service->duration,
            'price' => 95000,
            'is_utama' => true,
            'is_active' => true,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Check service price in DB
        $service->refresh();
        $this->assertEquals(95000, $service->price);

        // Check ActivityLog recorded the price change
        $this->assertDatabaseHas('activity_logs', [
            'action' => 'update_price',
            'subject_id' => $service->id,
        ]);

        $log = ActivityLog::where('action', 'update_price')->first();
        $this->assertEquals(80000, $log->old_values['price']);
        $this->assertEquals(95000, $log->new_values['price']);

        // Check that public page /layanan immediately reflects the new price
        $publicResponse = $this->get('/layanan');
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('95.000');
    }

    public function test_testimonials_are_not_displayed_unless_published_and_consented(): void
    {
        // 1. Initially no testimonials exist
        $this->assertEquals(0, Testimonial::count());

        // 2. Create unpublished testimonial
        $draft = Testimonial::create([
            'customer_name' => 'Budi Santoso',
            'feedback' => 'Servis laptop sangat cepat dan jujur.',
            'rating' => 5,
            'consent_to_publish' => true,
            'is_published' => false,
        ]);

        // Public page should NOT show Budi's feedback
        $res = $this->get('/kontak');
        $res->assertDontSee('Budi Santoso');

        // 3. Admin toggles publication to true
        $admin = User::first();
        $this->actingAs($admin)->patch(route('admin.testimonials.toggle', $draft));

        $draft->refresh();
        $this->assertTrue($draft->is_published);

        // Check activity log
        $this->assertDatabaseHas('activity_logs', [
            'action' => 'toggle_testimonial',
            'subject_id' => $draft->id,
        ]);
    }

    public function test_interactive_create_admin_command(): void
    {
        $this->artisan('techcare:create-admin', [
            '--name' => 'Teknisi Baru',
            '--email' => 'teknisi@techcare.id',
        ])
        ->expectsQuestion('Password (minimal 8 karakter)', 'password123')
        ->expectsQuestion('Ulangi Password', 'password123')
        ->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'email' => 'teknisi@techcare.id',
            'name' => 'Teknisi Baru',
        ]);

        $user = User::where('email', 'teknisi@techcare.id')->first();
        $this->assertTrue(Hash::check('password123', $user->password));
    }
}
