<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Multi-Page Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/kalkulator', [PageController::class, 'kalkulator'])->name('kalkulator');
Route::get('/alur-layanan', [PageController::class, 'alur'])->name('alur');
Route::get('/kebijakan', [PageController::class, 'kebijakan'])->name('kebijakan');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');

// Booking submission with rate limiting (10 requests per minute)
Route::post('/booking', [BookingController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('booking.store');

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

    // Services Catalog (24 services)
    Route::get('/services', [AdminController::class, 'services'])->name('services');
    Route::put('/services/{service}', [AdminController::class, 'updateService'])->name('services.update');

    // Internal Financial Plan & Projection (Bab VIII)
    Route::get('/keuangan', [AdminController::class, 'keuangan'])->name('keuangan');

    // Dynamic Site Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
    Route::post('/password', [AdminController::class, 'updatePassword'])->name('password.update');
});
