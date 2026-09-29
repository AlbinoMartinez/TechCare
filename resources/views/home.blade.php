@extends('layouts.app')

@section('title', 'TechCare – Jasa IT Support, Maintenance Komputer, dan Jaringan')

@section('content')

@php
  $cleanWa = preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6281234567890');
  $defaultWaUrl = "https://wa.me/{$cleanWa}?text=" . rawurlencode("Halo TechCare, saya ingin konsultasi mengenai kendala komputer/jaringan.");
@endphp

<!-- ==========================================
     HERO SECTION
========================================== -->
<section class="relative bg-gradient-to-br from-[#1F3A5F] via-[#24456F] to-[#142640] text-white pt-14 pb-24 overflow-hidden">
  <!-- Subtle decorative grid & background glow -->
  <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#2A9D8F_1px,transparent_1px)] [background-size:24px_24px]"></div>
  <div class="absolute top-10 right-10 w-96 h-96 rounded-full bg-[#2A9D8F]/15 blur-3xl pointer-events-none"></div>
  <div class="absolute bottom-5 left-10 w-80 h-80 rounded-full bg-[#F4A261]/10 blur-3xl pointer-events-none"></div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      
      <!-- Left Content -->
      <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
        
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[#3AB5A5] text-xs font-semibold tracking-wide shadow-xs">
          <svg class="w-4 h-4 text-[#2A9D8F]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
          <span>IT Support Terpercaya Yogyakarta & Sekitarnya</span>
        </div>

        <!-- Headline -->
        <h1 class="font-heading font-extrabold text-3xl sm:text-5xl lg:text-[54px] tracking-tight text-white leading-tight">
          IT Support yang <span class="text-[#2A9D8F]">Jelas</span>, <span class="text-[#3AB5A5]">Aman</span>, dan <span class="text-[#F4A261]">Terjangkau</span>.
        </h1>

        <!-- Subheadline -->
        <p class="text-slate-200 text-base sm:text-lg lg:text-xl font-normal leading-relaxed max-w-2xl mx-auto lg:mx-0">
          Bantu atasi masalah komputer, laptop, Wi-Fi, dan jaringan tanpa proses yang ribet. Estimasi biaya transparan disampaikan sebelum pekerjaan dimulai.
        </p>

        <!-- CTA Action Buttons -->
        <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
          <a href="{{ $defaultWaUrl }}" target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 rounded-xl bg-[#F4A261] hover:bg-[#e78e47] text-white font-heading font-bold text-base shadow-lg shadow-[#F4A261]/25 hover:shadow-xl transition-all transform hover:-translate-y-0.5">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
            <span>Konsultasi via WhatsApp</span>
          </a>

          <a href="#layanan" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-4 rounded-xl bg-white/10 hover:bg-white/20 border border-white/25 text-white font-heading font-semibold text-base transition-all">
            <span>Lihat Katalog Layanan</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </a>
        </div>

        <!-- Trust Indicators Strip (NO FAKE REVIEWS) -->
        <div class="pt-6 border-t border-white/15">
          <p class="text-xs uppercase tracking-wider font-semibold text-slate-300 mb-3 text-center lg:text-left">Nilai Layanan Kami:</p>
          <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 text-xs text-slate-200">
            <div class="flex items-center gap-2">
              <span class="w-4 h-4 rounded-full bg-[#2A9D8F] flex items-center justify-center text-white text-[10px] font-bold">✓</span>
              <span>Harga Transparan</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="w-4 h-4 rounded-full bg-[#2A9D8F] flex items-center justify-center text-white text-[10px] font-bold">✓</span>
              <span>Konsultasi Awal Gratis</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="w-4 h-4 rounded-full bg-[#2A9D8F] flex items-center justify-center text-white text-[10px] font-bold">✓</span>
              <span>Home Service Tersedia</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="w-4 h-4 rounded-full bg-[#2A9D8F] flex items-center justify-center text-white text-[10px] font-bold">✓</span>
              <span>Data Pelanggan Dijaga</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="w-4 h-4 rounded-full bg-[#2A9D8F] flex items-center justify-center text-white text-[10px] font-bold">✓</span>
              <span>Garansi Jasa 7 Hari</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="w-4 h-4 rounded-full bg-[#2A9D8F] flex items-center justify-center text-white text-[10px] font-bold">✓</span>
              <span>Software Legal & Bersih</span>
            </div>
          </div>
        </div>

      </div>

      <!-- Right Visual Card (Interactive Quick Preview Card) -->
      <div class="lg:col-span-5">
        <div class="bg-white/95 text-slate-800 rounded-3xl p-6 sm:p-8 shadow-2xl border border-white/20 relative backdrop-blur-md">
          <div class="flex items-center justify-between pb-4 border-b border-slate-100">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-xl bg-[#1F3A5F] flex items-center justify-center text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
              </div>
              <div>
                <h3 class="font-heading font-bold text-base text-[#1F3A5F]">TechCare Quick Booking</h3>
                <p class="text-xs text-slate-500">Isi singkat, otomatis sambung ke WhatsApp</p>
              </div>
            </div>
            <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold">Online</span>
          </div>

          <!-- Quick Selector Mini-form -->
          <form action="#booking" method="GET" class="mt-5 space-y-4">
            <div>
              <label class="block text-xs font-semibold text-slate-600 mb-1">Perangkat Anda:</label>
              <select id="quickDevice" class="w-full text-sm rounded-xl border border-slate-200 px-3.5 py-2.5 bg-slate-50 focus:bg-white focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]">
                <option value="Laptop">Laptop (Windows / Linux)</option>
                <option value="PC Desktop">PC Desktop / Komputer Kantor</option>
                <option value="Router / Wi-Fi">Router Wi-Fi / Jaringan Internet</option>
                <option value="Printer Jaringan">Printer / Perangkat Kantor</option>
                <option value="Lainnya">Perangkat Lainnya</option>
              </select>
            </div>

            <div>
              <label class="block text-xs font-semibold text-slate-600 mb-1">Kendala Utama:</label>
              <input type="text" id="quickIssue" placeholder="Contoh: Laptop lambat, Wi-Fi sering putus..." class="w-full text-sm rounded-xl border border-slate-200 px-3.5 py-2.5 bg-slate-50 focus:bg-white focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]">
            </div>

            <div class="pt-2">
              <a href="#booking" onclick="prefillBookingFromHero()" class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-[#1F3A5F] hover:bg-[#142640] text-white text-sm font-semibold transition-colors shadow-xs">
                <span>Lanjut ke Formulir Booking</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
              </a>
            </div>

            <p class="text-[11px] text-slate-500 text-center">
              🔒 Privasi data aman. Tidak ada tindakan tanpa persetujuan biaya Anda.
            </p>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ==========================================
     LAYANAN & KATALOG HARGA (25 LAYANAN)
========================================== -->
<section id="layanan" class="py-20 bg-slate-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto mb-12">
      <span class="text-xs font-bold uppercase tracking-wider text-[#2A9D8F] bg-[#2A9D8F]/10 px-3 py-1 rounded-full">Katalog Resmi & Transparan</span>
      <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-[#1F3A5F] mt-3">Layanan IT Support TechCare</h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3">
        Daftar 25 layanan terstruktur lengkap dengan estimasi durasi pengerjaan dan harga resmi. Biaya transparan tanpa tambahan terselubung.
      </p>
    </div>

    <!-- Category Tabs Filter -->
    <div class="flex flex-wrap items-center justify-center gap-2 mb-10" id="serviceTabs">
      <button type="button" onclick="filterCategory('all')" data-cat="all" class="cat-btn px-5 py-2.5 rounded-full text-sm font-semibold transition-all bg-[#1F3A5F] text-white shadow-xs">
        Semua Layanan (25)
      </button>
      <button type="button" onclick="filterCategory('komputer')" data-cat="komputer" class="cat-btn px-5 py-2.5 rounded-full text-sm font-semibold transition-all bg-white border border-slate-200 text-slate-700 hover:border-[#2A9D8F] hover:text-[#2A9D8F]">
        💻 Komputer & Laptop (9)
      </button>
      <button type="button" onclick="filterCategory('jaringan')" data-cat="jaringan" class="cat-btn px-5 py-2.5 rounded-full text-sm font-semibold transition-all bg-white border border-slate-200 text-slate-700 hover:border-[#2A9D8F] hover:text-[#2A9D8F]">
        🌐 Jaringan & Wi-Fi (7)
      </button>
      <button type="button" onclick="filterCategory('linux')" data-cat="linux" class="cat-btn px-5 py-2.5 rounded-full text-sm font-semibold transition-all bg-white border border-slate-200 text-slate-700 hover:border-[#2A9D8F] hover:text-[#2A9D8F]">
        🐧 Linux & OS (5)
      </button>
      <button type="button" onclick="filterCategory('keamanan')" data-cat="keamanan" class="cat-btn px-5 py-2.5 rounded-full text-sm font-semibold transition-all bg-white border border-slate-200 text-slate-700 hover:border-[#2A9D8F] hover:text-[#2A9D8F]">
        🛡️ Keamanan Dasar (4)
      </button>
    </div>

    <!-- Services Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="servicesGrid">
      @foreach ($services as $srv)
        <div class="service-card group bg-white rounded-2xl p-6 border border-slate-200/80 shadow-xs hover:shadow-md hover:border-[#2A9D8F]/60 transition-all flex flex-col justify-between" data-category="{{ $srv->category }}">
          <div>
            <!-- Header Card (Category Badge & Badge Utama/Standar/Tambahan) -->
            <div class="flex items-center justify-between mb-3">
              <span class="text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-md 
                @if($srv->category == 'komputer') bg-blue-50 text-blue-700 
                @elseif($srv->category == 'jaringan') bg-teal-50 text-teal-700 
                @elseif($srv->category == 'linux') bg-amber-50 text-amber-800 
                @else bg-purple-50 text-purple-700 @endif">
                {{ ucfirst($srv->category) }}
              </span>

              @if($srv->badge === 'Utama')
                <span class="text-xs font-semibold px-2 py-0.5 rounded-full bg-[#F4A261]/15 text-[#e78e47] border border-[#F4A261]/30">
                  ★ Utama
                </span>
              @elseif($srv->badge === 'Tambahan')
                <span class="text-xs font-semibold px-2 py-0.5 rounded-full bg-slate-100 text-slate-600">
                  Tambahan
                </span>
              @else
                <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-slate-100 text-slate-600">
                  Standar
                </span>
              @endif
            </div>

            <!-- Service Title -->
            <h3 class="font-heading font-bold text-lg text-[#1F3A5F] group-hover:text-[#2A9D8F] transition-colors leading-snug">
              {{ $srv->name }}
            </h3>

            <!-- Description -->
            <p class="text-slate-600 text-xs sm:text-sm mt-2 leading-relaxed">
              {{ $srv->description }}
            </p>
          </div>

          <!-- Bottom: Price, Duration, and CTA -->
          <div class="pt-5 mt-4 border-t border-slate-100 space-y-3">
            <div class="flex items-center justify-between text-xs text-slate-500">
              <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#2A9D8F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Durasi: <strong>{{ $srv->duration }}</strong></span>
              </span>
              <span class="text-[11px] text-slate-400">Garansi 7 Hari</span>
            </div>

            <div class="flex items-baseline justify-between pt-1">
              <div>
                <span class="text-xs text-slate-500 block leading-none">Biaya Jasa:</span>
                <span class="font-heading font-extrabold text-xl text-[#1F3A5F]">
                  {{ $srv->formatted_price }}
                  @if($srv->price_note)
                    <span class="text-xs font-normal text-slate-500">{{ $srv->price_note }}</span>
                  @endif
                </span>
              </div>

              <!-- Button to auto select into booking form -->
              <button type="button" onclick="selectServiceToBooking('{{ addslashes($srv->name) }}', {{ $srv->price }})" class="px-4 py-2 rounded-xl bg-slate-100 hover:bg-[#2A9D8F] text-slate-700 hover:text-white text-xs font-bold transition-all shadow-2xs inline-flex items-center gap-1.5">
                <span>Pilih Layanan</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
              </button>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Notice Card -->
    <div class="mt-12 bg-white rounded-2xl p-6 border border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-xs">
      <div class="flex items-center gap-3.5 text-slate-700 text-sm">
        <div class="w-10 h-10 rounded-xl bg-amber-50 text-[#F4A261] flex items-center justify-center shrink-0">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
          <strong class="text-slate-900 block font-heading">Informasi Penting Terkait Harga:</strong>
          <span>Harga jasa belum termasuk komponen/perangkat pengganti baru dan ongkos home service (jika kunjungan).</span>
        </div>
      </div>
      <a href="#harga" class="text-xs font-bold text-[#2A9D8F] hover:underline shrink-0">
        Lihat Rincian Home Service &rarr;
      </a>
    </div>

  </div>
</section>


<!-- ==========================================
     HARGA & KALKULATOR ESTIMASI BIAYA
========================================== -->
<section id="harga" class="py-20 bg-white border-t border-b border-slate-200/80">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="text-center max-w-3xl mx-auto mb-14">
      <span class="text-xs font-bold uppercase tracking-wider text-[#F4A261] bg-[#F4A261]/10 px-3 py-1 rounded-full">Transparan & Terbuka</span>
      <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-[#1F3A5F] mt-3">Ketentuan Harga & Tarif Home Service</h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3">
        Estimasi biaya disampaikan secara terbuka <strong>sebelum</strong> pengerjaan. Tidak ada penagihan tak terduga tanpa persetujuan Anda.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
      
      <!-- Left: Home Service Tier Cards -->
      <div class="lg:col-span-5 space-y-5">
        <h3 class="font-heading font-bold text-xl text-[#1F3A5F]">Tarif Kunjungan (Home Service)</h3>
        <p class="text-slate-600 text-xs sm:text-sm">
          Untuk Anda yang tidak sempat mengantar unit ke tempat servis, teknisi TechCare siap datang langsung ke rumah, kantor, kost, atau sekolah.
        </p>

        <div class="space-y-3.5">
          @foreach ($homeServiceTiers as $idx => $tier)
            <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50/70 hover:bg-slate-50 transition-colors flex items-center justify-between">
              <div class="flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-[#2A9D8F]/10 text-[#2A9D8F] font-heading font-bold flex items-center justify-center shrink-0">
                  {{ $idx + 1 }}
                </div>
                <div>
                  <h4 class="font-heading font-bold text-sm text-[#1F3A5F]">{{ $tier['distance'] }}</h4>
                  <p class="text-xs text-slate-500">{{ $tier['desc'] }}</p>
                </div>
              </div>
              <div class="text-right">
                <span class="font-heading font-extrabold text-base text-[#2A9D8F]">Rp{{ number_format($tier['price'], 0, ',', '.') }}</span>
                <span class="block text-[10px] text-slate-400">per kunjungan</span>
              </div>
            </div>
          @endforeach
        </div>

        <div class="p-4 rounded-2xl bg-blue-50/60 border border-blue-100 text-blue-900 text-xs leading-relaxed space-y-1">
          <p class="font-bold flex items-center gap-1.5">
            <svg class="w-4 h-4 text-[#1F3A5F]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            Jaminan Transparansi Biaya
          </p>
          <p>
            Estimasi biaya selalu disampaikan sebelum pengerjaan. Pekerjaan <strong>hanya dilakukan setelah pelanggan menyetujuinya</strong>.
          </p>
        </div>
      </div>

      <!-- Right: Interactive Cost Calculator -->
      <div class="lg:col-span-7">
        <div class="bg-gradient-to-br from-slate-900 to-[#1F3A5F] text-white rounded-3xl p-6 sm:p-8 shadow-xl border border-slate-700">
          <div class="flex items-center justify-between pb-5 border-b border-white/10">
            <div>
              <span class="text-xs font-semibold text-[#F4A261] uppercase tracking-wider">Simulasi Biaya Transparan</span>
              <h3 class="font-heading font-bold text-xl sm:text-2xl text-white mt-0.5">Kalkulator Estimasi Biaya</h3>
            </div>
            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-[#2A9D8F]">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
            </div>
          </div>

          <div class="mt-6 space-y-5">
            <!-- Select Service -->
            <div>
              <label for="calcService" class="block text-xs font-semibold text-slate-300 mb-1.5">Pilih Layanan Utama:</label>
              <select id="calcService" onchange="calculateEstimate()" class="w-full text-sm rounded-xl bg-white/10 border border-white/20 text-white px-3.5 py-3 focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]">
                <option value="0" class="text-slate-900">-- Pilih Layanan untuk Cek Biaya --</option>
                @foreach ($services as $s)
                  <option value="{{ $s->price }}" data-name="{{ $s->name }}" class="text-slate-900">
                    {{ $s->name }} — {{ $s->formatted_price }} ({{ ucfirst($s->category) }})
                  </option>
                @endforeach
              </select>
            </div>

            <!-- Home Service Selection -->
            <div>
              <label class="block text-xs font-semibold text-slate-300 mb-1.5">Pilihan Lokasi Pengerjaan:</label>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                <label class="flex items-center gap-3 p-3 rounded-xl bg-white/5 border border-white/15 cursor-pointer hover:bg-white/10 transition-colors">
                  <input type="radio" name="calcTier" value="0" checked onchange="calculateEstimate()" class="text-[#2A9D8F] focus:ring-0">
                  <div class="text-xs">
                    <span class="font-semibold block text-white">Antar Langsung / Online</span>
                    <span class="text-slate-400">Tanpa biaya transport</span>
                  </div>
                </label>
                @foreach ($homeServiceTiers as $tier)
                  <label class="flex items-center gap-3 p-3 rounded-xl bg-white/5 border border-white/15 cursor-pointer hover:bg-white/10 transition-colors">
                    <input type="radio" name="calcTier" value="{{ $tier['price'] }}" onchange="calculateEstimate()" class="text-[#2A9D8F] focus:ring-0">
                    <div class="text-xs">
                      <span class="font-semibold block text-white">{{ $tier['distance'] }}</span>
                      <span class="text-[#F4A261] font-bold">+Rp{{ number_format($tier['price'], 0, ',', '.') }}</span>
                    </div>
                  </label>
                @endforeach
              </div>
            </div>

            <!-- Calculation Output Breakdown -->
            <div class="pt-5 border-t border-white/10 space-y-2 text-sm">
              <div class="flex justify-between text-slate-300 text-xs">
                <span>Subtotal Biaya Jasa:</span>
                <span id="calcSubtotalJasa" class="font-semibold text-white">Rp0</span>
              </div>
              <div class="flex justify-between text-slate-300 text-xs">
                <span>Ongkos Home Service:</span>
                <span id="calcSubtotalOngkir" class="font-semibold text-white">Rp0</span>
              </div>
              <div class="flex justify-between items-center pt-3 border-t border-white/10 text-base">
                <span class="font-heading font-bold text-white">Total Estimasi Awal:</span>
                <span id="calcGrandTotal" class="font-heading font-extrabold text-2xl text-[#F4A261]">Rp0</span>
              </div>
            </div>

            <!-- Direct Booking Trigger -->
            <div class="pt-3">
              <button type="button" onclick="transferCalcToBooking()" class="w-full py-3.5 rounded-xl bg-[#2A9D8F] hover:bg-[#23857a] text-white text-sm font-heading font-bold transition-all shadow-md flex items-center justify-center gap-2">
                <span>Gunakan Estimasi Ini di Form Booking</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
              </button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ==========================================
     CARA KERJA (ALUR 9 LANGKAH)
========================================== -->
<section id="cara-kerja" class="py-20 bg-slate-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="text-center max-w-3xl mx-auto mb-14">
      <span class="text-xs font-bold uppercase tracking-wider text-[#2A9D8F] bg-[#2A9D8F]/10 px-3 py-1 rounded-full">SOP & Transparansi</span>
      <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-[#1F3A5F] mt-3">Alur Pengerjaan TechCare</h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3">
        Setiap proses pengerjaan memiliki tahapan yang jelas. Anda memegang kendali penuh atas persetujuan biaya dan tindakan teknisi.
      </p>
    </div>

    <!-- Prominent Golden Rule Banner -->
    <div class="mb-12 max-w-3xl mx-auto p-4 sm:p-5 rounded-2xl bg-amber-50 border-2 border-amber-200/80 text-amber-900 flex items-start gap-4 shadow-xs">
      <div class="w-10 h-10 rounded-xl bg-[#F4A261] text-white flex items-center justify-center shrink-0 mt-0.5">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
      </div>
      <div>
        <h4 class="font-heading font-bold text-sm sm:text-base text-[#1F3A5F]">Prinsip Mutlak TechCare:</h4>
        <p class="text-xs sm:text-sm text-slate-700 mt-1 leading-relaxed">
          <strong>Tidak ada tindakan perbaikan ataupun penggantian apapun tanpa persetujuan eksplisit pelanggan.</strong> Estimasi biaya selalu disepakati di awal agar Anda merasa aman dan nyaman.
        </p>
      </div>
    </div>

    <!-- 9 Step Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      
      @php
        $steps = [
          ['no' => '01', 'title' => 'Hubungi TechCare', 'desc' => 'Kontak melalui formulir booking website atau langsung chat WhatsApp TechCare.', 'icon' => 'phone'],
          ['no' => '02', 'title' => 'Jelaskan Masalah', 'desc' => 'Sampaikan gejala kerusakan, jenis perangkat, atau kebutuhan konfigurasi jaringan Anda.', 'icon' => 'chat'],
          ['no' => '03', 'title' => 'Diagnosis Awal', 'desc' => 'Teknisi menganalisis potensi penyebab kendala secara cermat dan sistematis.', 'icon' => 'search'],
          ['no' => '04', 'title' => 'Dapatkan Estimasi Biaya', 'desc' => 'Kami sampaikan estimasi rincian biaya jasa serta perkiraan waktu pengerjaan.', 'icon' => 'calc'],
          ['no' => '05', 'title' => 'Pelanggan Menyetujui', 'desc' => 'Pengerjaan HANYA dimulai setelah Anda menyetujui rincian estimasi biaya tersebut.', 'icon' => 'check', 'highlight' => true],
          ['no' => '06', 'title' => 'Pengerjaan Teliti', 'desc' => 'Teknisi melakukan pengerjaan dengan rapi, menjaga kebersihan dan keamanan perangkat.', 'icon' => 'wrench'],
          ['no' => '07', 'title' => 'Pengujian Bersama', 'desc' => 'Hasil perbaikan atau setting jaringan diuji langsung di hadapan Anda untuk validasi.', 'icon' => 'test'],
          ['no' => '08', 'title' => 'Serah Terima & Bayar', 'desc' => 'Perangkat diserahterimakan, bukti pengerjaan diberikan, dan pembayaran sesuai estimasi awal.', 'icon' => 'handshake'],
          ['no' => '09', 'title' => 'Follow-up & Garansi', 'desc' => 'Dukungan purna-jual dan perlindungan Garansi Jasa 7 Hari terhitung sejak serah terima.', 'icon' => 'shield'],
        ];
      @endphp

      @foreach ($steps as $st)
        <div class="relative bg-white rounded-2xl p-6 border {{ isset($st['highlight']) ? 'border-[#F4A261] ring-2 ring-[#F4A261]/20 shadow-md' : 'border-slate-200/80 shadow-xs' }} flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-4">
              <span class="font-heading font-extrabold text-2xl {{ isset($st['highlight']) ? 'text-[#F4A261]' : 'text-slate-300' }}">{{ $st['no'] }}</span>
              @if(isset($st['highlight']))
                <span class="text-[11px] font-bold px-2 py-0.5 rounded-full bg-[#F4A261]/15 text-[#e78e47]">Kunci Utama</span>
              @endif
            </div>
            <h3 class="font-heading font-bold text-base text-[#1F3A5F] mb-2">{{ $st['title'] }}</h3>
            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">{{ $st['desc'] }}</p>
          </div>
        </div>
      @endforeach

    </div>

  </div>
</section>


<!-- ==========================================
     MENGAPA TECHCARE (6 VALUE PROPOSITIONS)
========================================== -->
<section id="mengapa" class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="text-center max-w-3xl mx-auto mb-14">
      <span class="text-xs font-bold uppercase tracking-wider text-[#2A9D8F] bg-[#2A9D8F]/10 px-3 py-1 rounded-full">Keunggulan & Karakter</span>
      <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-[#1F3A5F] mt-3">Mengapa Memilih TechCare?</h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3">
        Fokus kami adalah memberikan solusi teknologi yang masuk akal, terpercaya, dan bersahabat bagi kantong pelajar, masyarakat, dan pelaku UMKM.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      
      <!-- 1: Harga Transparan -->
      <div class="p-7 rounded-3xl bg-slate-50 border border-slate-200/80 space-y-3.5 hover:border-[#2A9D8F]/50 transition-colors">
        <div class="w-12 h-12 rounded-2xl bg-[#1F3A5F] text-[#F4A261] flex items-center justify-center font-bold text-xl shadow-xs">
          Rp
        </div>
        <h3 class="font-heading font-bold text-lg text-[#1F3A5F]">Harga Transparan</h3>
        <p class="text-slate-600 text-sm leading-relaxed">
          Estimasi biaya disampaikan secara gamblang sebelum pengerjaan. Tidak ada biaya siluman atau harga mendadak naik di akhir.
        </p>
      </div>

      <!-- 2: Data Pelanggan Dijaga -->
      <div class="p-7 rounded-3xl bg-slate-50 border border-slate-200/80 space-y-3.5 hover:border-[#2A9D8F]/50 transition-colors">
        <div class="w-12 h-12 rounded-2xl bg-[#2A9D8F] text-white flex items-center justify-center font-bold text-xl shadow-xs">
          🔒
        </div>
        <h3 class="font-heading font-bold text-lg text-[#1F3A5F]">Data Pelanggan Dijaga</h3>
        <p class="text-slate-600 text-sm leading-relaxed">
          Data pribadi Anda tidak akan dibuka, disalin, atau disebarkan tanpa izin. Integritas dan privasi data adalah prioritas tertinggi.
        </p>
      </div>

      <!-- 3: Home Service -->
      <div class="p-7 rounded-3xl bg-slate-50 border border-slate-200/80 space-y-3.5 hover:border-[#2A9D8F]/50 transition-colors">
        <div class="w-12 h-12 rounded-2xl bg-[#1F3A5F] text-[#3AB5A5] flex items-center justify-center font-bold text-xl shadow-xs">
          🛵
        </div>
        <h3 class="font-heading font-bold text-lg text-[#1F3A5F]">Layanan Home Service</h3>
        <p class="text-slate-600 text-sm leading-relaxed">
          Pelanggan tidak selalu harus repot membawa CPU berat atau laptop ke tempat servis. Teknisi kami siap datang ke tempat Anda.
        </p>
      </div>

      <!-- 4: Penjelasan Mudah Dipahami -->
      <div class="p-7 rounded-3xl bg-slate-50 border border-slate-200/80 space-y-3.5 hover:border-[#2A9D8F]/50 transition-colors">
        <div class="w-12 h-12 rounded-2xl bg-[#2A9D8F] text-white flex items-center justify-center font-bold text-xl shadow-xs">
          💬
        </div>
        <h3 class="font-heading font-bold text-lg text-[#1F3A5F]">Bahasa Mudah Dipahami</h3>
        <p class="text-slate-600 text-sm leading-relaxed">
          Masalah teknis dijelaskan dengan bahasa yang sederhana dan ramah, tanpa membombardir Anda dengan istilah teknis rumit.
        </p>
      </div>

      <!-- 5: Software Legal -->
      <div class="p-7 rounded-3xl bg-slate-50 border border-slate-200/80 space-y-3.5 hover:border-[#2A9D8F]/50 transition-colors">
        <div class="w-12 h-12 rounded-2xl bg-[#1F3A5F] text-[#F4A261] flex items-center justify-center font-bold text-xl shadow-xs">
          ⚖️
        </div>
        <h3 class="font-heading font-bold text-lg text-[#1F3A5F]">Software Legal & Open Source</h3>
        <p class="text-slate-600 text-sm leading-relaxed">
          Kami mengutamakan solusi perangkat lunak resmi, freeware aman, dan ekosistem open-source, bebas dari program bajakan berbahaya.
        </p>
      </div>

      <!-- 6: Sesuai Kemampuan -->
      <div class="p-7 rounded-3xl bg-slate-50 border border-slate-200/80 space-y-3.5 hover:border-[#2A9D8F]/50 transition-colors">
        <div class="w-12 h-12 rounded-2xl bg-[#2A9D8F] text-white flex items-center justify-center font-bold text-xl shadow-xs">
          🤝
        </div>
        <h3 class="font-heading font-bold text-lg text-[#1F3A5F]">Jujur Sesuai Kemampuan</h3>
        <p class="text-slate-600 text-sm leading-relaxed">
          Pekerjaan di luar kemampuan tidak dipaksakan demi keuntungan sepihak. Jika di luar scope, kami jujur dan dapat merujuk ke ahlinya.
        </p>
      </div>

    </div>
  </div>
</section>


<!-- ==========================================
     KEAMANAN & PRIVASI DATA
========================================== -->
<section id="keamanan" class="py-20 bg-slate-900 text-white relative overflow-hidden">
  <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#2A9D8F_1px,transparent_1px)] [background-size:20px_20px]"></div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      
      <div class="lg:col-span-5 space-y-6">
        <span class="text-xs font-bold uppercase tracking-wider text-[#3AB5A5] bg-[#3AB5A5]/10 px-3 py-1 rounded-full">Komitmen Keamanan</span>
        <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-white">Privasi Anda Adalah Tanggung Jawab Moral Kami</h2>
        <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
          Banyak orang khawatir foto, dokumen kerja, atau password dibuka saat laptop diservis. Di TechCare, kami menerapkan kode etik ketat untuk menjaga keamanan Anda.
        </p>
        <div class="p-4 rounded-2xl bg-white/5 border border-white/10 text-xs text-slate-300 space-y-2">
          <p class="font-semibold text-white">Prinsip Privasi TechCare:</p>
          <p>“Kepercayaan pelanggan dibangun dari kejujuran menjaga apa yang bukan hak kami.”</p>
        </div>
      </div>

      <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
        
        <div class="p-5 rounded-2xl bg-white/5 border border-white/10 space-y-2">
          <div class="text-[#2A9D8F] font-bold text-lg">🛡️ Data Rahasia</div>
          <h4 class="font-heading font-semibold text-sm text-white">Data Pelanggan Bersifat Rahasia</h4>
          <p class="text-slate-400 text-xs leading-relaxed">Seluruh file pelanggan diperlakukan dengan kerahasiaan penuh tanpa kompromi.</p>
        </div>

        <div class="p-5 rounded-2xl bg-white/5 border border-white/10 space-y-2">
          <div class="text-[#2A9D8F] font-bold text-lg">🚫 Tidak Buka File</div>
          <h4 class="font-heading font-semibold text-sm text-white">Tidak Membuka File Pribadi</h4>
          <p class="text-slate-400 text-xs leading-relaxed">Foto, video, riwayat chat, atau dokumen personal tidak akan dibuka tanpa izin langsung.</p>
        </div>

        <div class="p-5 rounded-2xl bg-white/5 border border-white/10 space-y-2">
          <div class="text-[#2A9D8F] font-bold text-lg">🗑️ Hapus Backup Sementara</div>
          <h4 class="font-heading font-semibold text-sm text-white">Backup Sementara Dihapus</h4>
          <p class="text-slate-400 text-xs leading-relaxed">File cadangan sementara saat servis akan dihapus tuntas setelah proses serah terima selesai.</p>
        </div>

        <div class="p-5 rounded-2xl bg-white/5 border border-white/10 space-y-2">
          <div class="text-[#2A9D8F] font-bold text-lg">🔑 Tanpa Simpan Password</div>
          <h4 class="font-heading font-semibold text-sm text-white">Tidak Menyimpan Password</h4>
          <p class="text-slate-400 text-xs leading-relaxed">Kami tidak mencatat atau menyimpan kredensial akun, PIN, maupun password pelanggan.</p>
        </div>

        <div class="p-5 rounded-2xl bg-white/5 border border-white/10 space-y-2">
          <div class="text-[#2A9D8F] font-bold text-lg">⚖️ Etika Akses</div>
          <h4 class="font-heading font-semibold text-sm text-white">Tidak Ada Pembobolan Akun</h4>
          <p class="text-slate-400 text-xs leading-relaxed">TechCare tidak melayani upaya cracking ilegal atau peretasan akun pihak lain.</p>
        </div>

        <div class="p-5 rounded-2xl bg-white/5 border border-white/10 space-y-2">
          <div class="text-[#2A9D8F] font-bold text-lg">✅ Bebas Malware & Crack</div>
          <h4 class="font-heading font-semibold text-sm text-white">Bebas Software Berbahaya</h4>
          <p class="text-slate-400 text-xs leading-relaxed">Menghindari aktivator bajakan atau crack yang berisiko menyuntikkan malware dan ransomware.</p>
        </div>

      </div>

    </div>
  </div>
</section>


<!-- ==========================================
     GARANSI JASA 7 HARI
========================================== -->
<section id="garansi" class="py-20 bg-slate-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="text-center max-w-3xl mx-auto mb-14">
      <span class="text-xs font-bold uppercase tracking-wider text-[#2A9D8F] bg-[#2A9D8F]/10 px-3 py-1 rounded-full">Perlindungan Konsumen</span>
      <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-[#1F3A5F] mt-3">Garansi Jasa 7 Hari</h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3">
        Kami memastikan hasil pengerjaan benar-benar berfungsi dengan baik. Garansi berlaku untuk masalah yang secara langsung terkait pengerjaan TechCare.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
      
      <!-- Cakupan Garansi -->
      <div class="bg-white rounded-3xl p-7 border-2 border-emerald-200/80 shadow-xs space-y-4">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">✓</div>
          <div>
            <h3 class="font-heading font-bold text-lg text-emerald-900">Garansi Berlaku Untuk:</h3>
            <p class="text-xs text-slate-500">Kendala akibat langsung pengerjaan teknisi</p>
          </div>
        </div>

        <ul class="space-y-3 text-sm text-slate-700 pt-2">
          <li class="flex items-start gap-2.5">
            <span class="text-emerald-600 font-bold">✔</span>
            <span>Driver belum terpasang dengan benar atau ada komponen yang belum terdeteksi.</span>
          </li>
          <li class="flex items-start gap-2.5">
            <span class="text-emerald-600 font-bold">✔</span>
            <span>Konfigurasi Wi-Fi atau setting router yang bermasalah setelah dilakukan setting.</span>
          </li>
          <li class="flex items-start gap-2.5">
            <span class="text-emerald-600 font-bold">✔</span>
            <span>Hasil instalasi sistem operasi (Windows/Linux) yang macet atau boot error.</span>
          </li>
          <li class="flex items-start gap-2.5">
            <span class="text-emerald-600 font-bold">✔</span>
            <span>Kabel LAN hasil crimping yang tidak konek saat serah terima.</span>
          </li>
        </ul>
      </div>

      <!-- Tidak Dicakup Garansi -->
      <div class="bg-white rounded-3xl p-7 border border-slate-200 shadow-xs space-y-4">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center font-bold">✕</div>
          <div>
            <h3 class="font-heading font-bold text-lg text-[#1F3A5F]">Garansi Tidak Berlaku Untuk:</h3>
            <p class="text-xs text-slate-500">Faktor eksternal di luar pengerjaan TechCare</p>
          </div>
        </div>

        <ul class="space-y-3 text-sm text-slate-600 pt-2">
          <li class="flex items-start gap-2.5">
            <span class="text-slate-400 font-bold">•</span>
            <span>Kerusakan hardware baru (misal jatuh, terkena tumpahan cairan, layar pecah).</span>
          </li>
          <li class="flex items-start gap-2.5">
            <span class="text-slate-400 font-bold">•</span>
            <span>Infeksi virus atau malware baru akibat mengunduh file sembarangan setelah serah terima.</span>
          </li>
          <li class="flex items-start gap-2.5">
            <span class="text-slate-400 font-bold">•</span>
            <span>Perubahan konfigurasi atau instalasi ulang yang dilakukan oleh pihak lain.</span>
          </li>
          <li class="flex items-start gap-2.5">
            <span class="text-slate-400 font-bold">•</span>
            <span>Gangguan koneksi dari pihak Internet Service Provider (ISP pusat).</span>
          </li>
        </ul>
      </div>

    </div>

    <p class="text-center text-xs text-slate-500 mt-8">
      * Cukup simpan nota/kode pemesanan Anda dan hubungi kami jika menemui kendala dalam masa garansi 7 hari.
    </p>

  </div>
</section>


<!-- ==========================================
     TENTANG TECHCARE & NUR MUHIBBIN
========================================== -->
<section id="tentang" class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      
      <!-- Profile Card -->
      <div class="lg:col-span-5">
        <div class="bg-gradient-to-br from-[#1F3A5F] to-[#142640] rounded-3xl p-8 text-white relative shadow-xl">
          <div class="w-20 h-20 rounded-2xl bg-[#2A9D8F] flex items-center justify-center text-3xl font-extrabold text-white mb-6 shadow-md">
            NM
          </div>

          <h3 class="font-heading font-extrabold text-2xl text-white">{{ $settings['founder_name'] ?? 'Nur Muhibbin' }}</h3>
          <p class="text-[#F4A261] font-semibold text-sm mt-0.5">{{ $settings['founder_role'] ?? 'Founder & IT Support Technician' }}</p>
          <p class="text-slate-300 text-xs mt-2">{{ $settings['founder_background'] ?? 'Teknik Komputer dan Jaringan (TKJ) — SMKN 3 Yogyakarta' }}</p>

          <div class="mt-6 pt-6 border-t border-white/10 space-y-3 text-xs text-slate-200">
            <div class="flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-[#2A9D8F]"></span>
              <span>Keahlian Perawatan & Troubleshooting PC/Laptop</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-[#2A9D8F]"></span>
              <span>Administrasi Jaringan LAN, Router & Wi-Fi</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-[#2A9D8F]"></span>
              <span>Sistem Operasi Windows, Distro Linux & Dual Boot</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-[#2A9D8F]"></span>
              <span>Prinsip Keamanan Siber Dasar & Backup Data</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Story & Positioning -->
      <div class="lg:col-span-7 space-y-6">
        <span class="text-xs font-bold uppercase tracking-wider text-[#2A9D8F] bg-[#2A9D8F]/10 px-3 py-1 rounded-full">Profil Usaha Mandiri</span>
        <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-[#1F3A5F]">Dedikasi IT Support Nyata untuk Warga Sekitar</h2>
        
        <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
          <strong>TechCare</strong> adalah usaha jasa IT support mandiri yang didirikan dan dijalankan langsung oleh <strong>Nur Muhibbin</strong>, dengan fondasi keilmuan Teknik Komputer dan Jaringan (TKJ) dari <strong>SMKN 3 Yogyakarta</strong>.
        </p>

        <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
          Latar belakang berdirinya TechCare berakar dari fakta bahwa banyak pelajar, mahasiswa yang sedang skripsi, guru, hingga pelaku UMKM sering kali bingung saat perangkat kerjanya bermasalah. Banyak tempat servis mematok harga tidak jelas atau bahkan membuat masalah terlihat jauh lebih parah dari aslinya.
        </p>

        <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200">
          <h4 class="font-heading font-bold text-sm text-[#1F3A5F] mb-1">Brand Positioning Kami:</h4>
          <p class="text-slate-700 text-sm italic">
            “Jasa IT support yang terjangkau, transparan, dan mudah dijangkau oleh pelajar, UMKM, dan masyarakat sekitar.”
          </p>
        </div>

        <p class="text-slate-600 text-xs sm:text-sm">
          Kami memegang teguh kejujuran teknis: jika masalah bisa diselesaikan dengan optimasi software gratis, kami tidak akan menyarankan ganti sparepart yang tidak perlu.
        </p>
      </div>

    </div>
  </div>
</section>


<!-- ==========================================
     FAQ (ACCORDION 10 PERTANYAAN)
========================================== -->
<section id="faq" class="py-20 bg-slate-50">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="text-center max-w-3xl mx-auto mb-14">
      <span class="text-xs font-bold uppercase tracking-wider text-[#2A9D8F] bg-[#2A9D8F]/10 px-3 py-1 rounded-full">Pertanyaan Populer</span>
      <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-[#1F3A5F] mt-3">Frequently Asked Questions</h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3">
        Jawaban ringkas dan jujur untuk hal-hal yang paling sering ditanyakan pelanggan.
      </p>
    </div>

    <div class="space-y-3.5" id="faqAccordion">
      @foreach ($faqs as $i => $faq)
        <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-2xs">
          <button type="button" onclick="toggleFaq({{ $i }})" class="w-full text-left px-6 py-4.5 flex items-center justify-between gap-4 font-heading font-bold text-sm sm:text-base text-[#1F3A5F] hover:text-[#2A9D8F] transition-colors">
            <span>{{ $faq['q'] }}</span>
            <span id="faqIcon-{{ $i }}" class="w-6 h-6 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center text-sm font-bold shrink-0 transition-transform">
              +
            </span>
          </button>
          <div id="faqContent-{{ $i }}" class="hidden px-6 pb-5 text-slate-600 text-xs sm:text-sm leading-relaxed border-t border-slate-100 pt-3">
            {{ $faq['a'] }}
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>


<!-- ==========================================
     FORMULIR BOOKING & WHATSAPP GENERATOR
========================================== -->
<section id="booking" class="py-20 bg-white border-t border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="text-center max-w-3xl mx-auto mb-14">
      <span class="text-xs font-bold uppercase tracking-wider text-[#F4A261] bg-[#F4A261]/10 px-3 py-1 rounded-full">Booking Langsung</span>
      <h2 class="font-heading font-extrabold text-3xl sm:text-4xl text-[#1F3A5F] mt-3">Konsultasi & Booking Jadwal Layanan</h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3">
        Isi form berikut. Begitu tombol ditekan, pesan terstruktur otomatis dirangkai dan langsung terbuka di WhatsApp TechCare serta tercatat di antrean sistem kami.
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      
      <!-- Left: Interactive Form -->
      <div class="lg:col-span-7 bg-slate-50 rounded-3xl p-6 sm:p-9 border border-slate-200 shadow-sm">
        <form id="bookingForm" action="{{ route('booking.store') }}" method="POST" onsubmit="handleBookingSubmit(event)">
          @csrf

          <div class="space-y-4">
            
            <!-- Nama & No WA Pelanggan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="bName" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nama Lengkap <span class="text-rose-500">*</span></label>
                <input type="text" id="bName" name="customer_name" required placeholder="Contoh: Rian Prasetyo" class="w-full text-sm rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]">
              </div>
              <div>
                <label for="bPhone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Nomor WhatsApp Anda</label>
                <input type="text" id="bPhone" name="customer_phone" placeholder="Contoh: 081234567890" class="w-full text-sm rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]">
              </div>
            </div>

            <!-- Jenis Perangkat & Layanan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="bDevice" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Jenis Perangkat <span class="text-rose-500">*</span></label>
                <input type="text" id="bDevice" name="device" required placeholder="Misal: Laptop Asus Vivobook, PC Rakitan" class="w-full text-sm rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]">
              </div>
              <div>
                <label for="bService" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Layanan yang Dibutuhkan <span class="text-rose-500">*</span></label>
                <select id="bService" name="service_name" required class="w-full text-sm rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]">
                  <option value="">-- Pilih Layanan IT --</option>
                  @foreach ($services as $srvItem)
                    <option value="{{ $srvItem->name }}">{{ $srvItem->name }} ({{ $srvItem->formatted_price }})</option>
                  @endforeach
                  <option value="Konsultasi Kerusakan Lainnya">Konsultasi Kerusakan Lainnya</option>
                </select>
              </div>
            </div>

            <!-- Masalah yang Dihadapi -->
            <div>
              <label for="bProblem" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Jelaskan Kendala / Masalah <span class="text-rose-500">*</span></label>
              <textarea id="bProblem" name="problem" rows="3" required placeholder="Contoh: Laptop sering tiba-tiba blue screen dan Wi-Fi kadang tidak bisa deteksi sinyal..." class="w-full text-sm rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]"></textarea>
            </div>

            <!-- Lokasi & Pilihan Home Service -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="bLocation" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Lokasi Anda (Kecamatan/Daerah) <span class="text-rose-500">*</span></label>
                <input type="text" id="bLocation" name="location" required placeholder="Misal: Pogung, Mlati, Sleman" class="w-full text-sm rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]">
              </div>
              <div>
                <label for="bTier" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Pilihan Layanan Lokasi</label>
                <select id="bTier" name="home_service_tier" class="w-full text-sm rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]">
                  <option value="Antar Sendiri">Saya Antar Langsung ke Tempat Teknisi</option>
                  <option value="Home Service <= 3 km">Home Service (Sampai 3 km - Rp10.000)</option>
                  <option value="Home Service 3-7 km">Home Service (> 3 – 7 km - Rp20.000)</option>
                  <option value="Home Service > 7 km">Home Service (> 7 km - Sesuai Kesepakatan)</option>
                </select>
              </div>
            </div>

            <!-- Waktu yang Diinginkan -->
            <div>
              <label for="bTime" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Waktu yang Diinginkan <span class="text-rose-500">*</span></label>
              <input type="text" id="bTime" name="preferred_time" required placeholder="Misal: Hari ini jam 15.00 WIB atau Besok pagi" class="w-full text-sm rounded-xl border border-slate-300 bg-white px-3.5 py-2.5 focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]">
            </div>

            <!-- Submit Button (Triggers WA & DB record) -->
            <div class="pt-3">
              <button type="submit" id="submitBtn" class="w-full py-4 rounded-xl bg-[#25D366] hover:bg-[#20ba59] text-white font-heading font-extrabold text-base shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-3">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
                <span>Konsultasi via WhatsApp</span>
              </button>
            </div>

            <p class="text-xs text-slate-500 text-center pt-1">
              Data Anda otomatis dicatat ke antrean pengerjaan teknisi TechCare.
            </p>

          </div>
        </form>
      </div>

      <!-- Right: Live WhatsApp Format Preview -->
      <div class="lg:col-span-5 space-y-6">
        <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200 shadow-xs">
          <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
            <div class="w-8 h-8 rounded-lg bg-[#25D366] text-white flex items-center justify-center font-bold">
              WA
            </div>
            <div>
              <h4 class="font-heading font-bold text-sm text-[#1F3A5F]">Format Pesan yang Dihasilkan:</h4>
              <p class="text-xs text-slate-400">Pesan otomatis terformat rapi untuk teknisi</p>
            </div>
          </div>

          <div class="mt-4 p-4 rounded-2xl bg-emerald-50/50 border border-emerald-100/70 font-mono text-xs text-slate-800 leading-relaxed whitespace-pre-wrap" id="waPreviewText">
Halo TechCare, saya [Nama].

Saya ingin konsultasi mengenai:
Perangkat: [Perangkat]
Masalah: [Masalah]
Layanan: [Layanan]
Lokasi: [Lokasi]
Waktu yang diinginkan: [Waktu]

Mohon informasi estimasi biaya dan jadwalnya.
          </div>

          <div class="mt-4 space-y-2 text-xs text-slate-500">
            <p>✓ Tidak perlu mengetik pesan manual dari nol.</p>
            <p>✓ Teknisi langsung memahami masalah Anda dalam hitungan detik.</p>
            <p>✓ Riwayat pesanan tersimpan di database TechCare.</p>
          </div>
        </div>

        <!-- Info Contact Card -->
        <div class="p-6 rounded-3xl bg-[#1F3A5F] text-white space-y-2">
          <h4 class="font-heading font-bold text-base text-white">Butuh Tanya Cepat?</h4>
          <p class="text-slate-300 text-xs">Anda juga bisa langsung chat kami tanpa mengisi form lengkap terlebih dahulu.</p>
          <div class="pt-2">
            <a href="https://wa.me/{{ $cleanWa }}?text={{ rawurlencode('Halo TechCare, saya ingin tanya-tanya dulu seputar IT support.') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 text-xs font-bold text-[#F4A261] hover:underline">
              <span>Chat WhatsApp Langsung ({{ $settings['whatsapp_display'] ?? '0812-3456-7890' }})</span>
              &rarr;
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
  // Filter Category in Layanan Section
  function filterCategory(category) {
    const buttons = document.querySelectorAll('.cat-btn');
    buttons.forEach(btn => {
      if (btn.dataset.cat === category) {
        btn.classList.add('bg-[#1F3A5F]', 'text-white', 'shadow-xs');
        btn.classList.remove('bg-white', 'border', 'border-slate-200', 'text-slate-700');
      } else {
        btn.classList.remove('bg-[#1F3A5F]', 'text-white', 'shadow-xs');
        btn.classList.add('bg-white', 'border', 'border-slate-200', 'text-slate-700');
      }
    });

    const cards = document.querySelectorAll('.service-card');
    cards.forEach(card => {
      if (category === 'all' || card.dataset.category === category) {
        card.style.display = 'flex';
      } else {
        card.style.display = 'none';
      }
    });
  }

  // Auto select service into booking form and smooth scroll
  function selectServiceToBooking(serviceName, price) {
    const select = document.getElementById('bService');
    if (select) {
      let matched = false;
      for (let i = 0; i < select.options.length; i++) {
        if (select.options[i].value === serviceName) {
          select.selectedIndex = i;
          matched = true;
          break;
        }
      }
      if (!matched) {
        select.value = serviceName;
      }
    }
    updateWaPreview();
    document.getElementById('booking').scrollIntoView({ behavior: 'smooth' });
  }

  // Pre-fill booking from Hero Quick Form
  function prefillBookingFromHero() {
    const device = document.getElementById('quickDevice').value;
    const issue = document.getElementById('quickIssue').value;

    if (device) document.getElementById('bDevice').value = device;
    if (issue) document.getElementById('bProblem').value = issue;
    updateWaPreview();
  }

  // Live WhatsApp preview update as user types in form
  function updateWaPreview() {
    const name = document.getElementById('bName').value || '[Nama]';
    const device = document.getElementById('bDevice').value || '[Perangkat]';
    const problem = document.getElementById('bProblem').value || '[Masalah]';
    const service = document.getElementById('bService').value || '[Layanan]';
    const location = document.getElementById('bLocation').value || '[Lokasi]';
    const time = document.getElementById('bTime').value || '[Waktu]';

    const text = `Halo TechCare, saya ${name}.\n\n`
      + `Saya ingin konsultasi mengenai:\n`
      + `Perangkat: ${device}\n`
      + `Masalah: ${problem}\n`
      + `Layanan: ${service}\n`
      + `Lokasi: ${location}\n`
      + `Waktu yang diinginkan: ${time}\n\n`
      + `Mohon informasi estimasi biaya dan jadwalnya.`;

    document.getElementById('waPreviewText').innerText = text;
  }

  ['bName', 'bDevice', 'bProblem', 'bService', 'bLocation', 'bTime'].forEach(id => {
    const el = document.getElementById(id);
    if (el) {
      el.addEventListener('input', updateWaPreview);
      el.addEventListener('change', updateWaPreview);
    }
  });

  // Handle Form Submission via AJAX to save in DB and open WhatsApp
  function handleBookingSubmit(e) {
    e.preventDefault();
    const form = document.getElementById('bookingForm');
    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.innerHTML;

    submitBtn.disabled = true;
    submitBtn.innerHTML = `<span>Menyimpan & Menghubungkan...</span>`;

    const formData = new FormData(form);

    fetch("{{ route('booking.store') }}", {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json'
      },
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success && data.whatsapp_url) {
        // Open WhatsApp in new tab
        window.open(data.whatsapp_url, '_blank');
        alert('Pesanan #' + data.order_code + ' berhasil dicatat di sistem! Membuka WhatsApp TechCare...');
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
      } else {
        form.submit();
      }
    })
    .catch(() => {
      // Fallback: direct submit
      form.submit();
    });
  }

  // Price Calculator Function
  function calculateEstimate() {
    const servicePrice = parseInt(document.getElementById('calcService').value) || 0;
    const tierRadios = document.getElementsByName('calcTier');
    let tierPrice = 0;
    for (let r of tierRadios) {
      if (r.checked) {
        tierPrice = parseInt(r.value) || 0;
        break;
      }
    }

    const total = servicePrice + tierPrice;

    document.getElementById('calcSubtotalJasa').innerText = 'Rp' + servicePrice.toLocaleString('id-ID');
    document.getElementById('calcSubtotalOngkir').innerText = 'Rp' + tierPrice.toLocaleString('id-ID');
    document.getElementById('calcGrandTotal').innerText = 'Rp' + total.toLocaleString('id-ID');
  }

  function transferCalcToBooking() {
    const select = document.getElementById('calcService');
    const selectedOption = select.options[select.selectedIndex];
    const sName = selectedOption.getAttribute('data-name');

    if (sName) {
      selectServiceToBooking(sName);
    } else {
      document.getElementById('booking').scrollIntoView({ behavior: 'smooth' });
    }
  }

  // FAQ Accordion Toggle
  function toggleFaq(index) {
    const content = document.getElementById(`faqContent-${index}`);
    const icon = document.getElementById(`faqIcon-${index}`);

    if (content.classList.contains('hidden')) {
      content.classList.remove('hidden');
      icon.innerText = '−';
      icon.classList.add('bg-[#2A9D8F]', 'text-white');
      icon.classList.remove('bg-slate-100', 'text-slate-500');
    } else {
      content.classList.add('hidden');
      icon.innerText = '+';
      icon.classList.remove('bg-[#2A9D8F]', 'text-white');
      icon.classList.add('bg-slate-100', 'text-slate-500');
    }
  }
</script>
@endpush
