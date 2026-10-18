<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Testimonials table (is_published default false, never dummy-seeded)
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_role')->nullable(); // e.g. "Mahasiswa", "UMKM Minggir"
            $table->string('device_type')->nullable(); // e.g. "Laptop Asus VivoBook"
            $table->string('service_name')->nullable(); // e.g. "Instalasi Ulang Windows"
            $table->text('feedback');
            $table->unsignedTinyInteger('rating')->default(5);
            $table->boolean('consent_to_publish')->default(false);
            $table->boolean('is_published')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Visit Fees table (from Proposal Bab IV 4.5)
        Schema::create('visit_fees', function (Blueprint $table) {
            $table->id();
            $table->string('tier_name'); // tier_1, tier_2, tier_3
            $table->string('distance_label'); // "Sampai 3 km", "3 - 7 km", "Lebih dari 7 km"
            $table->unsignedInteger('fee'); // 10000, 20000, 35000
            $table->string('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // First-party privacy-friendly Page Views (NO raw IP stored!)
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->string('path', 255);
            $table->string('referrer_host', 255)->nullable();
            $table->string('utm_source', 100)->nullable();
            $table->string('utm_medium', 100)->nullable();
            $table->string('utm_campaign', 100)->nullable();
            $table->string('device_class', 20)->default('desktop'); // desktop, mobile, tablet
            $table->string('visitor_hash', 64); // daily sha256 hash (IP + Salt + Date)
            $table->timestamp('created_at')->useCurrent();
        });

        // First-party privacy-friendly Analytics Events
        Schema::create('analytic_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name', 50); // wa_click, booking_submit, kalkulator_dipakai, layanan_dilihat
            $table->json('metadata')->nullable();
            $table->string('visitor_hash', 64);
            $table->timestamp('created_at')->useCurrent();
        });

        // Activity Logs (Audit trail for who changed what, price changes, etc.)
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('user_name')->nullable();
            $table->string('action', 100); // e.g. "update_price", "update_order_status"
            $table->string('subject_type', 100)->nullable(); // e.g. "Service", "Consultation"
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->text('description');
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('analytic_events');
        Schema::dropIfExists('page_views');
        Schema::dropIfExists('visit_fees');
        Schema::dropIfExists('testimonials');
    }
};
