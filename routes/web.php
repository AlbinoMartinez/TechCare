<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticsEventController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Multi-Page Routes (TechCare IT Support)
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/kalkulator', [PageController::class, 'kalkulator'])->name('kalkulator');
Route::get('/alur-layanan', [PageController::class, 'alur'])->name('alur');
Route::get('/kebijakan', [PageController::class, 'kebijakan'])->name('kebijakan');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::get('/tentang', fn() => redirect()->route('home'))->name('tentang');
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');

// Booking submission with rate limiting (10 requests per minute)
Route::post('/booking', [BookingController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('booking.store');

// First-party client-side event tracking (wa_click, kalkulator_dipakai, layanan_dilihat)
Route::post('/api/track-event', [AnalyticsEventController::class, 'track'])
    ->middleware('throttle:60,1')
    ->name('api.track-event');

/*
|--------------------------------------------------------------------------
| Admin Authentication & Management Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // Consultations & Orders
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::put('/orders/{consultation}', [AdminController::class, 'updateOrder'])->name('orders.update');
    Route::delete('/orders/{consultation}', [AdminController::class, 'deleteOrder'])->name('orders.delete');
    Route::get('/orders/{consultation}/reply-wa', [AdminController::class, 'replyWhatsapp'])->name('orders.reply_wa');

    // Services Catalog (24 services from Bab IV)
    Route::get('/services', [AdminController::class, 'services'])->name('services');
    Route::put('/services/{service}', [AdminController::class, 'updateService'])->name('services.update');

    // Visit Fees (Bab IV 4.5)
    Route::get('/visit-fees', [AdminController::class, 'visitFees'])->name('visit_fees');
    Route::put('/visit-fees/{visitFee}', [AdminController::class, 'updateVisitFee'])->name('visit_fees.update');

    // Testimonials
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('testimonials');
    Route::post('/testimonials', [AdminController::class, 'storeTestimonial'])->name('testimonials.store');
    Route::patch('/testimonials/{testimonial}/toggle', [AdminController::class, 'toggleTestimonial'])->name('testimonials.toggle');
    Route::delete('/testimonials/{testimonial}', [AdminController::class, 'deleteTestimonial'])->name('testimonials.delete');

    // Privacy-Friendly Traffic & Monitoring
    Route::get('/monitoring', [AdminController::class, 'monitoring'])->name('monitoring');

    // Activity Log / Audit Trail (price changes, etc.)
    Route::get('/activity-logs', [AdminController::class, 'activityLogs'])->name('activity_logs');

    // Internal Financial Plan & Projection (Bab VIII)
    Route::get('/keuangan', [AdminController::class, 'keuangan'])->name('keuangan');

    // Dynamic Site Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
    Route::post('/password', [AdminController::class, 'updatePassword'])->name('password.update');
});
