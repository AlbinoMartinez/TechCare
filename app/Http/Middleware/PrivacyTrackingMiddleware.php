<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrivacyTrackingMiddleware
{
    /**
     * Handle an incoming request and track page views without storing raw IPs.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only track successful GET responses for HTML pages
        if ($request->method() !== 'GET' || $response->getStatusCode() >= 400) {
            return $response;
        }

        $this->recordPageView($request);

        return $response;
    }

    /**
     * Record privacy-preserving page view.
     */
    public function recordPageView(Request $request): void
    {
        // 1. Ignore prefetch requests
        if ($request->headers->get('Purpose') === 'prefetch' || $request->headers->get('Sec-Purpose') === 'prefetch') {
            return;
        }

        // 2. Ignore admin routes, assets, and internal routes
        $path = $request->path();
        if (
            str_starts_with($path, 'admin') ||
            str_starts_with($path, 'build') ||
            str_starts_with($path, 'images') ||
            str_starts_with($path, 'brand') ||
            $path === 'sitemap.xml' ||
            $path === 'robots.txt' ||
            $path === 'favicon.ico'
        ) {
            return;
        }

        // 3. Detect & ignore bots/crawlers
        $userAgent = (string) $request->userAgent();
        if ($this->isBot($userAgent)) {
            return;
        }

        // 4. Generate daily rotating visitor hash (NO RAW IP STORED)
        $salt = config('app.key', 'techcare-salt');
        $date = now()->format('Y-m-d');
        $rawIp = $request->ip() ?? '127.0.0.1';
        $visitorHash = hash('sha256', "{$salt}|{$rawIp}|{$userAgent}|{$date}");

        // 5. Device Class
        $deviceClass = 'desktop';
        if (preg_match('/(ipad|tablet)/i', $userAgent)) {
            $deviceClass = 'tablet';
        } elseif (preg_match('/(mobile|android|iphone|ipod)/i', $userAgent)) {
            $deviceClass = 'mobile';
        }

        // 6. Referrer Host
        $referer = $request->header('referer');
        $referrerHost = $referer ? parse_url($referer, PHP_URL_HOST) : null;
        if ($referrerHost && str_contains($referrerHost, $request->getHost())) {
            $referrerHost = null; // internal navigation
        }

        try {
            PageView::create([
                'path' => '/' . ltrim($path, '/'),
                'referrer_host' => $referrerHost ? substr($referrerHost, 0, 255) : null,
                'utm_source' => $request->query('utm_source') ? substr($request->query('utm_source'), 0, 100) : null,
                'utm_medium' => $request->query('utm_medium') ? substr($request->query('utm_medium'), 0, 100) : null,
                'utm_campaign' => $request->query('utm_campaign') ? substr($request->query('utm_campaign'), 0, 100) : null,
                'device_class' => $deviceClass,
                'visitor_hash' => $visitorHash,
                'created_at' => now(),
            ]);
        } catch (\Throwable $e) {
            // Never disrupt user request due to logging failure
            report($e);
        }
    }

    /**
     * Check if user agent is an automated bot or crawler.
     */
    public function isBot(string $userAgent): bool
    {
        if (empty($userAgent)) {
            return true;
        }

        $botPatterns = [
            'bot', 'crawl', 'spider', 'slurp', 'mediapartners', 'googlebot',
            'bingbot', 'yandex', 'duckduckbot', 'baiduspider', 'yahoo', 'facebookexternalhit',
            'whatsapp', 'twitterbot', 'semrush', 'ahrefs', 'mj12bot', 'curl', 'wget', 'python',
            'headless', 'lighthouse', 'postman'
        ];

        $pattern = '/' . implode('|', $botPatterns) . '/i';
        return (bool) preg_match($pattern, $userAgent);
    }
}
