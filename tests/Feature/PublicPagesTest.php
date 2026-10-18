<?php

namespace Tests\Feature;

use Database\Seeders\TechCareSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TechCareSeeder::class);
    }

    public function test_home_page_returns_ok_and_contains_core_info(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('TechCare');
        $response->assertSee('Minggir, Sleman');
        $response->assertSee('085641487430');
        $response->assertSee('Diagnosis dan troubleshooting');
        $response->assertSee('hero-tech.jpg');
        $response->assertSee('consultation.jpg');
    }

    public function test_layanan_page_displays_all_24_services_and_exclusions(): void
    {
        $response = $this->get('/layanan');
        $response->assertStatus(200);
        $response->assertSee('Daftar Layanan dan Tarif Jasa');
        $response->assertSee('A1');
        $response->assertSee('D3');
        $response->assertSee('Rp80.000');
        $response->assertSee('Layanan yang Tidak Diterima TechCare');
    }

    public function test_kalkulator_page_loads_successfully(): void
    {
        $response = $this->get('/kalkulator');
        $response->assertStatus(200);
        $response->assertSee('Kalkulator Estimasi Biaya Layanan');
        $response->assertSee('Kirim Rincian ke WhatsApp');
    }

    public function test_alur_layanan_page_contains_all_10_stages(): void
    {
        $response = $this->get('/alur-layanan');
        $response->assertStatus(200);
        $response->assertSee('Alur Pelayanan 10 Tahap');
        $response->assertSee('Pelanggan Menghubungi TechCare');
        $response->assertSee('Pelanggan Menyetujui');
        $response->assertSee('Follow-up & Garansi Purna-Jual');
    }

    public function test_kebijakan_page_contains_data_privacy_and_warranty(): void
    {
        $response = $this->get('/kebijakan');
        $response->assertStatus(200);
        $response->assertSee('Kebijakan Privasi dan Perlindungan Data Pelanggan');
        $response->assertSee('Garansi Jasa 7 Hari Kalender');
        $response->assertSee('Tanpa Aktivator Ilegal');
    }

    public function test_kontak_page_contains_faq_and_booking_form(): void
    {
        $response = $this->get('/kontak');
        $response->assertStatus(200);
        $response->assertSee('Formulir Pemesanan Layanan');
        $response->assertSee('Pertanyaan yang Sering Diajukan (FAQ)');
        $response->assertSee('085641487430');
    }

    public function test_sitemap_xml_returns_valid_xml_with_all_pages(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $response->assertSee('<urlset', false);
        $response->assertSee('/layanan', false);
        $response->assertSee('/kalkulator', false);
    }
}
