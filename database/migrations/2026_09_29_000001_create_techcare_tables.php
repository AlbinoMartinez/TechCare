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
        // Settings table for dynamic configuration (no hardcoded WhatsApp or business details)
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->string('label')->nullable();
            $table->timestamps();
        });

        // Services table for 24 IT catalog items from Bab IV
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // A1-A9, B1-B7, C1-C5, D1-D3
            $table->string('name');
            $table->string('category'); // komputer, jaringan, linux, keamanan
            $table->text('description');
            $table->string('duration');
            $table->unsignedInteger('price');
            $table->string('price_note')->nullable(); // e.g. "/ kabel", "/ sesi individu"
            $table->text('notes')->nullable(); // catatan dari proposal
            $table->boolean('is_utama')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Consultations / Orders table
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->string('customer_name');
            $table->string('customer_phone')->nullable();
            $table->string('device');
            $table->text('problem');
            $table->string('service_name');
            $table->string('location');
            $table->string('home_service_tier')->nullable();
            $table->string('preferred_time');
            $table->string('status')->default('baru'); // baru, dikonfirmasi, dikerjakan, selesai, dibatalkan
            $table->text('technician_notes')->nullable();
            $table->unsignedInteger('estimated_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
        Schema::dropIfExists('services');
        Schema::dropIfExists('settings');
    }
};
