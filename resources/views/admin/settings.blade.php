@extends('admin.layout')

@section('title', 'Pengaturan Website & Bisnis')

@section('content')

@php
  $whatsappNumber = \App\Models\Setting::get('whatsapp_number', '6285641487430');
  $whatsappDisplay = \App\Models\Setting::get('whatsapp_display', '085641487430');
  $email = \App\Models\Setting::get('email', 'Ibinyo19@gmail.com');
  $instagram = \App\Models\Setting::get('instagram', 'https://instagram.com/mohiebenn?exln=MWI5cHNuMWZienI4Zw%3D%3D');
  $tiktok = \App\Models\Setting::get('tiktok', 'https://www.tiktok.com/@albinmnn_?_r=1&_t=ZS-9AYKxnaagVh');
  $mapsUrl = \App\Models\Setting::get('maps_url', 'https://maps.app.goo.gl/bLgzixN3HGV4mmVz9');
  $businessName = \App\Models\Setting::get('business_name', 'TechCare');
  $tagline = \App\Models\Setting::get('tagline', 'Jasa IT Support, Maintenance Komputer, dan Jaringan');
  $address = \App\Models\Setting::get('address', 'Minggir, Sleman, Yogyakarta');
  $serviceArea = \App\Models\Setting::get('service_area', 'Yogyakarta dan sekitarnya (Minggir, Sleman)');
  $operationalHours = \App\Models\Setting::get('operational_hours', 'Senin–Jumat: 16.00–20.00 WIB, Sabtu: 09.00–17.00 WIB, Minggu: dengan janji terlebih dahulu');
  $bankName = \App\Models\Setting::get('bank_name', 'Nur Muhibbin (Transfer Bank)');
  $bankAccount = \App\Models\Setting::get('bank_account', '');
  $ewalletInfo = \App\Models\Setting::get('ewallet_info', 'GoPay / DANA / ShopeePay / QRIS (a.n. Nur Muhibbin)');
  $tier1 = \App\Models\Setting::get('home_service_tier_1', '10000');
  $tier2 = \App\Models\Setting::get('home_service_tier_2', '20000');
  $tier3 = \App\Models\Setting::get('home_service_tier_3', '35000');
  $warrantyDays = \App\Models\Setting::get('warranty_days', '7');
@endphp

<div class="space-y-6">
  
  <div>
    <h1 class="text-xl sm:text-2xl font-heading font-extrabold text-white">Pengaturan Website & Bisnis</h1>
    <p class="text-xs text-slate-400 mt-1">Kelola data kontak WhatsApp, rekening pembayaran, tautan media sosial, alamat, dan jam operasional TechCare.</p>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
    
    <!-- Main Configuration Form -->
    <div class="lg:col-span-8 bg-[#131F3F] rounded-xl p-5 sm:p-7 border border-[#1E2D5A] shadow-xs space-y-6">
      <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6 text-xs">
        @csrf

        <!-- Section 1: WhatsApp & Kontak -->
        <div>
          <h2 class="font-heading font-bold text-sm text-white pb-2 border-b border-[#1E2D5A] flex items-center justify-between">
            <span>Kontak WhatsApp & Komunikasi</span>
            <span class="text-[10px] font-mono text-emerald-400">Live Config</span>
          </h2>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <div>
              <label class="block font-medium text-slate-300 mb-1">
                Nomor WhatsApp Tujuan (Format Internasional) <span class="text-rose-400">*</span>
              </label>
              <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $whatsappNumber) }}" required 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white font-mono focus:border-[#0D9BE4] focus:outline-hidden">
              <span class="text-[10px] text-slate-400 mt-1 block">Format: 628xxxxxxxxxx tanpa spasi atau +.</span>
            </div>

            <div>
              <label class="block font-medium text-slate-300 mb-1">
                Display Nomor WhatsApp di Website <span class="text-rose-400">*</span>
              </label>
              <input type="text" name="whatsapp_display" value="{{ old('whatsapp_display', $whatsappDisplay) }}" required 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
            </div>

            <div class="sm:col-span-2">
              <label class="block font-medium text-slate-300 mb-1">
                Email Publik Usaha
              </label>
              <input type="email" name="email" value="{{ old('email', $email) }}" 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
            </div>
          </div>
        </div>

        <!-- Section 2: Media Sosial & Maps -->
        <div>
          <h2 class="font-heading font-bold text-sm text-white pb-2 border-b border-[#1E2D5A]">
            Media Sosial & Lokasi Google Maps
          </h2>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <div>
              <label class="block font-medium text-slate-300 mb-1">Link Instagram Resmi</label>
              <input type="text" name="instagram" value="{{ old('instagram', $instagram) }}" 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
            </div>

            <div>
              <label class="block font-medium text-slate-300 mb-1">Link TikTok Resmi</label>
              <input type="text" name="tiktok" value="{{ old('tiktok', $tiktok) }}" 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
            </div>

            <div class="sm:col-span-2">
              <label class="block font-medium text-slate-300 mb-1">Link Google Maps Lokasi</label>
              <input type="text" name="maps_url" value="{{ old('maps_url', $mapsUrl) }}" 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
              <span class="text-[10px] text-slate-400 mt-1 block">Titik lokasi workshop / drop-off untuk pelanggan di Minggir, Sleman.</span>
            </div>
          </div>
        </div>

        <!-- Section 3: Pembayaran & Rekening (Sesuai Klarifikasi Pertanyaan) -->
        <div>
          <h2 class="font-heading font-bold text-sm text-white pb-2 border-b border-[#1E2D5A] flex items-center justify-between">
            <span>Rekening Bank & E-Wallet / QRIS</span>
            <span class="text-[10px] font-mono text-amber-400">Kosongkan jika ingin disembunyikan</span>
          </h2>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <div>
              <label class="block font-medium text-slate-300 mb-1">Nama Bank / Atas Nama</label>
              <input type="text" name="bank_name" value="{{ old('bank_name', $bankName) }}" 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
            </div>

            <div>
              <label class="block font-medium text-slate-300 mb-1">Nomor Rekening Bank</label>
              <input type="text" name="bank_account" value="{{ old('bank_account', $bankAccount) }}" placeholder="(Disembunyikan jika kosong)" 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white font-mono focus:border-[#0D9BE4] focus:outline-hidden">
            </div>

            <div class="sm:col-span-2">
              <label class="block font-medium text-slate-300 mb-1">Informasi E-Wallet / QRIS</label>
              <input type="text" name="ewallet_info" value="{{ old('ewallet_info', $ewalletInfo) }}" 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
              <span class="text-[10px] text-slate-400 mt-1 block">Contoh: GoPay / DANA / ShopeePay / QRIS atas nama Nur Muhibbin.</span>
            </div>
          </div>
        </div>

        <!-- Section 4: Info Profil & Operasional -->
        <div>
          <h2 class="font-heading font-bold text-sm text-white pb-2 border-b border-[#1E2D5A]">
            Profil Usaha & Jam Operasional
          </h2>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
            <div>
              <label class="block font-medium text-slate-300 mb-1">Nama Usaha <span class="text-rose-400">*</span></label>
              <input type="text" name="business_name" value="{{ old('business_name', $businessName) }}" required 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
            </div>

            <div>
              <label class="block font-medium text-slate-300 mb-1">Masa Garansi Jasa (Hari Kalender)</label>
              <input type="number" name="warranty_days" value="{{ old('warranty_days', $warrantyDays) }}" min="1" 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white font-mono focus:border-[#0D9BE4] focus:outline-hidden">
            </div>

            <div class="sm:col-span-2">
              <label class="block font-medium text-slate-300 mb-1">Tagline Bisnis <span class="text-rose-400">*</span></label>
              <input type="text" name="tagline" value="{{ old('tagline', $tagline) }}" required 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
            </div>

            <div class="sm:col-span-2">
              <label class="block font-medium text-slate-300 mb-1">Alamat Publik (Hanya Area Umum) <span class="text-rose-400">*</span></label>
              <input type="text" name="address" value="{{ old('address', $address) }}" required 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
            </div>

            <div class="sm:col-span-2">
              <label class="block font-medium text-slate-300 mb-1">Wilayah Layanan <span class="text-rose-400">*</span></label>
              <input type="text" name="service_area" value="{{ old('service_area', $serviceArea) }}" required 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
            </div>

            <div class="sm:col-span-2">
              <label class="block font-medium text-slate-300 mb-1">Jam Operasional Resmi <span class="text-rose-400">*</span></label>
              <input type="text" name="operational_hours" value="{{ old('operational_hours', $operationalHours) }}" required 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
            </div>
          </div>
        </div>

        <!-- Section 5: Tarif Home Service (Tiers) -->
        <div>
          <h2 class="font-heading font-bold text-sm text-white pb-2 border-b border-[#1E2D5A]">
            Tarif Ongkos Kunjungan Home Service (Rp)
          </h2>

          <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
            <div>
              <label class="block font-medium text-slate-300 mb-1">Radius Sampai 3 km</label>
              <input type="number" name="home_service_tier_1" value="{{ old('home_service_tier_1', $tier1) }}" required 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white font-mono focus:border-[#0D9BE4] focus:outline-hidden">
            </div>

            <div>
              <label class="block font-medium text-slate-300 mb-1">Radius 3 – 7 km</label>
              <input type="number" name="home_service_tier_2" value="{{ old('home_service_tier_2', $tier2) }}" required 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white font-mono focus:border-[#0D9BE4] focus:outline-hidden">
            </div>

            <div>
              <label class="block font-medium text-slate-300 mb-1">Lebih dari 7 km</label>
              <input type="number" name="home_service_tier_3" value="{{ old('home_service_tier_3', $tier3) }}" required 
                     class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white font-mono focus:border-[#0D9BE4] focus:outline-hidden">
            </div>
          </div>
        </div>

        <div class="pt-4 border-t border-[#1E2D5A]">
          <button type="submit" class="px-5 py-2.5 rounded-lg bg-[#0D9BE4] hover:bg-[#0c8ad0] text-white font-semibold text-xs shadow-xs transition-colors">
            Simpan Semua Pengaturan
          </button>
        </div>
      </form>
    </div>

    <!-- Right Side: Change Password Form -->
    <div class="lg:col-span-4 bg-[#131F3F] rounded-xl p-5 sm:p-6 border border-[#1E2D5A] shadow-xs space-y-4">
      <h3 class="font-heading font-bold text-sm text-white">Ganti Password Admin</h3>
      <p class="text-slate-400 text-[11px]">Pastikan password yang Anda gunakan kuat demi keamanan panel.</p>

      <form action="{{ route('admin.password.update') }}" method="POST" class="space-y-4 text-xs">
        @csrf

        <div>
          <label class="block font-medium text-slate-300 mb-1">Password Saat Ini</label>
          <input type="password" name="current_password" required 
                 class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
        </div>

        <div>
          <label class="block font-medium text-slate-300 mb-1">Password Baru (min. 6)</label>
          <input type="password" name="new_password" required 
                 class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
        </div>

        <div>
          <label class="block font-medium text-slate-300 mb-1">Ulangi Password Baru</label>
          <input type="password" name="new_password_confirmation" required 
                 class="w-full text-xs rounded bg-[#0E1738] border border-[#1E2D5A] px-3 py-2 text-white focus:border-[#0D9BE4] focus:outline-hidden">
        </div>

        <div class="pt-2">
          <button type="submit" class="w-full py-2.5 rounded-lg bg-[#18264E] hover:bg-[#1E3060] text-slate-200 border border-[#233566] font-semibold text-xs transition-colors">
            Perbarui Password
          </button>
        </div>
      </form>
    </div>

  </div>

</div>

@endsection
