<?php

namespace Tests\Feature;

use App\Models\AnalyticEvent;
use App\Models\PageView;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnalyticsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\TechCareSeeder::class);
    }

    public function test_page_view_is_recorded_without_storing_raw_ip(): void
    {
        $rawIp = '103.144.175.45';

        $response = $this->withServerVariables(['REMOTE_ADDR' => $rawIp])
            ->withHeaders(['User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120.0.0.0'])
            ->get('/');

        $response->assertStatus(200);

        // Assert record exists in page_views
        $this->assertDatabaseHas('page_views', [
            'path' => '/',
            'device_class' => 'desktop',
        ]);

        $pageView = PageView::first();
        $this->assertNotNull($pageView);

        // Verify raw IP is NOT stored anywhere
        $this->assertFalse(str_contains(json_encode($pageView->toArray()), $rawIp));
        $this->assertEquals(64, strlen($pageView->visitor_hash)); // sha256 hash length
    }

    public function test_bots_and_crawlers_are_ignored(): void
    {
        $botAgents = [
            'Googlebot/2.1 (+http://www.google.com/bot.html)',
            'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)',
            'SemrushBot/7~bl',
            'curl/7.68.0',
            'python-requests/2.28.1',
        ];

        foreach ($botAgents as $agent) {
            $this->withHeaders(['User-Agent' => $agent])->get('/');
        }

        // None should be recorded in page_views
        $this->assertEquals(0, PageView::count());
    }

    public function test_admin_routes_are_not_tracked(): void
    {
        $user = \App\Models\User::first();

        $this->actingAs($user)
            ->withHeaders(['User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120.0.0.0'])
            ->get('/admin/dashboard');

        $this->assertEquals(0, PageView::count());
    }

    public function test_client_side_events_are_recorded_properly(): void
    {
        $response = $this->postJson('/api/track-event', [
            'event_name' => 'wa_click',
            'metadata' => [
                'target' => 'Floating WA Button',
            ],
        ]);

        $response->assertStatus(200);
        $response->assertJson(['status' => 'recorded']);

        $this->assertDatabaseHas('analytic_events', [
            'event_name' => 'wa_click',
        ]);

        $event = AnalyticEvent::first();
        $this->assertEquals('Floating WA Button', $event->metadata['target']);
        $this->assertEquals(64, strlen($event->visitor_hash));
    }
}
