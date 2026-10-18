<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\Setting;
use Database\Seeders\TechCareSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceSeederTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TechCareSeeder::class);
    }

    public function test_seeder_produces_exact_24_services_from_bab_iv(): void
    {
        $this->assertEquals(24, Service::count());
    }

    public function test_services_have_exact_codes_a1_through_d3(): void
    {
        $expectedCodes = [
            'A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9',
            'B1', 'B2', 'B3', 'B4', 'B5', 'B6', 'B7',
            'C1', 'C2', 'C3', 'C4', 'C5',
            'D1', 'D2', 'D3'
        ];

        $actualCodes = Service::orderBy('sort_order')->pluck('code')->toArray();
        $this->assertEquals($expectedCodes, $actualCodes);
    }

    public function test_exact_prices_match_proposal_bab_iv(): void
    {
        $expectedPrices = [
            'A1' => 25000,
            'A2' => 50000,
            'A3' => 80000,
            'A4' => 40000,
            'A5' => 30000,
            'A6' => 100000,
            'A7' => 25000,
            'A8' => 75000,
            'A9' => 100000,
            'B1' => 50000,
            'B2' => 60000,
            'B3' => 30000,
            'B4' => 150000,
            'B5' => 60000,
            'B6' => 10000,
            'B7' => 60000,
            'C1' => 100000,
            'C2' => 150000,
            'C3' => 50000,
            'C4' => 75000,
            'C5' => 40000,
            'D1' => 65000,
            'D2' => 30000,
            'D3' => 40000,
        ];

        foreach ($expectedPrices as $code => $price) {
            $service = Service::where('code', $code)->first();
            $this->assertNotNull($service, "Service {$code} harus ada di database.");
            $this->assertEquals($price, $service->price, "Harga {$code} ({$service->name}) harus {$price}, ditemukan {$service->price}.");
        }
    }

    public function test_exactly_nine_services_are_flagged_is_utama(): void
    {
        $utamaServices = Service::where('is_utama', true)->pluck('code')->sort()->values()->toArray();
        $expectedUtama = ['A1', 'A2', 'A3', 'A6', 'B1', 'B2', 'B5', 'C1', 'D1'];
        sort($expectedUtama);

        $this->assertEquals(9, count($utamaServices));
        $this->assertEquals($expectedUtama, $utamaServices);
    }

    public function test_home_service_tiers_match_bab_4_5(): void
    {
        $this->assertEquals('10000', Setting::get('home_service_tier_1'));
        $this->assertEquals('20000', Setting::get('home_service_tier_2'));
        $this->assertEquals('35000', Setting::get('home_service_tier_3'));
        $this->assertEquals('6285641487430', Setting::get('whatsapp_number'));
        $this->assertEquals('Ibinyo19@gmail.com', Setting::get('email'));
    }
}
