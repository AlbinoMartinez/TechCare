@extends('admin.layout')

@section('title', 'Pengaturan Kontak & Website')

@section('content')

@php
  $whatsappNumber = \App\Models\Setting::get('whatsapp_number', '6285641487430');
  $whatsappDisplay = \App\Models\Setting::get('whatsapp_display', '085641487430');
  $email = \App\Models\Setting::get('email', 'Ibinyo19@gmail.com');
  $instagram = \App\Models\Setting::get('instagram', 'TechCare');
  $tiktok = \App\Models\Setting::get('tiktok', 'TechCaree');
  $businessName = \App\Models\Setting::get('business_name', 'TechCare');
  $tagline = \App\Models\Setting::get('tagline', 'Jasa IT Support, Maintenance Komputer, dan Jaringan');
  $address = \App\Models\Setting::get('address', 'Minggir, Sleman, Yogyakarta');
  $serviceArea = \App\Models\Setting::get('service_area', 'Yogyakarta dan sekitarnya');
  $operationalHours = \App\Models\Setting::get('operational_hours', 'Senin–Jumat: 16.00–20.00 WIB, Sabtu: 09.00–17.00 WIB, Minggu: dengan janji terlebih dahulu');
  $tier1 = \App\Models\Setting::get('home_service_tier_1', '10000');
  $tier2 = \App\Models\Setting::get('home_service_tier_2', '20000');
  $tier3 = \App\Models\Setting::get('home_service_tier_3', '35000');
@endphp

<div class="space-y-6">
  
  <div>
    <h1 class="font-heading font-extrabold text-2xl text-[#0B3A75]">Pengaturan Website & Kontak</h1>
    <p class="text-xs text-slate-500 mt-1">Kelola data kontak WhatsApp, media sosial, jam operasional, dan tarif ongkos kunjungan.</p>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    
    <!-- Main Configuration Form -->
    <div class="lg:col-span-8 bg-white rounded-xl p-6 sm:p-7 border border-slate-200 shadow-xs space-y-6">
      <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6 text-xs">
        @csrf

        <!-- Section 1: WhatsApp & Kontak -->
        <div>
          <h2 class="font-heading font-bold text-sm text-[#0B3A75] pb-2 border-b border-slate-100">
            Kontak WhatsApp & Komunikasi
          </h2>
          <p class="text-slate-500 text-[11px] mt-1 mb-4">Nomor WhatsApp yang digunakan untuk tautan pemesanan dan tombol konsultasi di seluruh website.</p>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label for="waNumber" class="block font-bold text-slate-700 mb-1">
                Nomor WhatsApp Tujuan (Format 62) <span class="text-rose-500">*</span>
              </label>
              <input type="text" id="waNumber" name="whatsapp_number" value="{{ old('whatsapp_number', $whatsappNumber) }}" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 font-mono focus:border-[#0B3A75] focus:outline-hidden">
              <span class="text-[10px] text-slate-400 mt-1 block">Format: 628xxxxxxxxxx tanpa spasi atau tanda +.</span>
            </div>

            <div>
              <label for="waDisplay" class="block font-bold text-slate-700 mb-1">
                Display Nomor WhatsApp di Website <span class="text-rose-500">*</span>
              </label>
              <input type="text" id="waDisplay" name="whatsapp_display" value="{{ old('whatsapp_display', $whatsappDisplay) }}" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 focus:border-[#0B3A75] focus:outline-hidden">
            </div>

            <div>
              <label for="email" class="block font-bold text-slate-700 mb-1">Email Resmi</label>
              <input type="email" id="email" name="email" value="{{ old('email', $email) }}" class="w-full text-xs rounded border border-slate-300 px-3 py-2 focus:border-[#0B3A75] focus:outline-hidden">
            </div>

            <div>
              <label for="instagram" class="block font-bold text-slate-700 mb-1">Instagram</label>
              <input type="text" id="instagram" name="instagram" value="{{ old('instagram', $instagram) }}" class="w-full text-xs rounded border border-slate-300 px-3 py-2 focus:border-[#0B3A75] focus:outline-hidden">
            </div>

            <div>
              <label for="tiktok" class="block font-bold text-slate-700 mb-1">TikTok</label>
              <input type="text" id="tiktok" name="tiktok" value="{{ old('tiktok', $tiktok) }}" class="w-full text-xs rounded border border-slate-300 px-3 py-2 focus:border-[#0B3A75] focus:outline-hidden">
            </div>
          </div>
        </div>

        <!-- Section 2: Info Bisnis -->
        <div class="pt-4 border-t border-slate-100">
          <h2 class="font-heading font-bold text-sm text-[#0B3A75] pb-2 border-b border-slate-100">
            Identitas & Wilayah Operasional
          </h2>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <div>
              <label for="bName" class="block font-bold text-slate-700 mb-1">Nama Usaha</label>
              <input type="text" id="bName" name="business_name" value="{{ old('business_name', $businessName) }}" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 focus:border-[#0B3A75] focus:outline-hidden">
            </div>

            <div>
              <label for="address" class="block font-bold text-slate-700 mb-1">Alamat Usaha</label>
              <input type="text" id="address" name="address" value="{{ old('address', $address) }}" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 focus:border-[#0B3A75] focus:outline-hidden">
            </div>

            <div class="sm:col-span-2">
              <label for="tagline" class="block font-bold text-slate-700 mb-1">Tagline Usaha</label>
              <input type="text" id="tagline" name="tagline" value="{{ old('tagline', $tagline) }}" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 focus:border-[#0B3A75] focus:outline-hidden">
            </div>

            <div>
              <label for="sArea" class="block font-bold text-slate-700 mb-1">Wilayah Layanan</label>
              <input type="text" id="sArea" name="service_area" value="{{ old('service_area', $serviceArea) }}" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 focus:border-[#0B3A75] focus:outline-hidden">
            </div>

            <div>
              <label for="opHours" class="block font-bold text-slate-700 mb-1">Jam Operasional</label>
              <input type="text" id="opHours" name="operational_hours" value="{{ old('operational_hours', $operationalHours) }}" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 focus:border-[#0B3A75] focus:outline-hidden">
            </div>
          </div>
        </div>

        <!-- Section 3: Tarif Home Service -->
        <div class="pt-4 border-t border-slate-100">
          <h2 class="font-heading font-bold text-sm text-[#0B3A75] pb-2 border-b border-slate-100">
            Tarif Ongkos Kunjungan (Home Service)
          </h2>
          <p class="text-slate-500 text-[11px] mt-1 mb-4">Nilai ini digunakan oleh kalkulator estimasi di website.</p>

          <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
              <label for="t1" class="block font-bold text-slate-700 mb-1">Sampai 3 km (Rp)</label>
              <input type="number" id="t1" name="home_service_tier_1" value="{{ old('home_service_tier_1', $tier1) }}" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 font-mono font-bold focus:border-[#0B3A75] focus:outline-hidden">
            </div>

            <div>
              <label for="t2" class="block font-bold text-slate-700 mb-1">> 3 – 7 km (Rp)</label>
              <input type="number" id="t2" name="home_service_tier_2" value="{{ old('home_service_tier_2', $tier2) }}" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 font-mono font-bold focus:border-[#0B3A75] focus:outline-hidden">
            </div>

            <div>
              <label for="t3" class="block font-bold text-slate-700 mb-1">> 7 km (Rp)</label>
              <input type="number" id="t3" name="home_service_tier_3" value="{{ old('home_service_tier_3', $tier3) }}" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 font-mono font-bold focus:border-[#0B3A75] focus:outline-hidden">
            </div>
          </div>
        </div>

        <div class="pt-3">
          <button type="submit" class="px-5 py-2.5 rounded bg-[#0B3A75] hover:bg-[#07254C] text-white font-bold transition-colors">
            Simpan Pengaturan
          </button>
        </div>
      </form>
    </div>

    <!-- Password Change Form -->
    <div class="lg:col-span-4 bg-white rounded-xl p-6 border border-slate-200 shadow-xs space-y-4 text-xs">
      <h2 class="font-heading font-bold text-sm text-[#0B3A75] pb-2 border-b border-slate-100">
        Ubah Password Admin
      </h2>

      <form action="{{ route('admin.password.update') }}" method="POST" class="space-y-4">
        @csrf

        <div>
          <label for="currPass" class="block font-bold text-slate-700 mb-1">Password Saat Ini</label>
          <input type="password" id="currPass" name="current_password" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 focus:border-[#0B3A75] focus:outline-hidden">
        </div>

        <div>
          <label for="newPass" class="block font-bold text-slate-700 mb-1">Password Baru (min. 6 karakter)</label>
          <input type="password" id="newPass" name="new_password" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 focus:border-[#0B3A75] focus:outline-hidden">
        </div>

        <div>
          <label for="newPassConf" class="block font-bold text-slate-700 mb-1">Konfirmasi Password Baru</label>
          <input type="password" id="newPassConf" name="new_password_confirmation" required class="w-full text-xs rounded border border-slate-300 px-3 py-2 focus:border-[#0B3A75] focus:outline-hidden">
        </div>

        <button type="submit" class="w-full py-2.5 rounded bg-slate-800 hover:bg-slate-900 text-white font-bold transition-colors">
          Update Password
        </button>
      </form>
    </div>

  </div>

</div>

@endsection
