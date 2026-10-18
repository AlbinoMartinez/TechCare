@extends('layouts.public')

@section('title', 'TechCare – Jasa IT Support, Servis Laptop & Jaringan Jujur di Sleman')
@section('meta_description', 'Layanan IT support jujur oleh Nur Muhibbin di Minggir, Sleman. Servis laptop lemot, pasang SSD, instal ulang bersih, setting Wi-Fi & router. Estimasi biaya di awal, garansi 7 hari, siap home service.')

@section('content')

@php
  $waNumber = $settings['whatsapp_number'] ?? '6285641487430';
  $waClean = preg_replace('/[^0-9]/', '', $waNumber);
  $waDisplay = $settings['whatsapp_display'] ?? '085641487430';
@endphp

<!-- ==========================================
     1. HERO SECTION (Split Layout + Genuine Hardware Visual)
========================================== -->
<section class="bg-gradient-to-b from-slate-50 to-white pt-10 pb-16 md:py-20 border-b border-slate-200">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
      
      <!-- Left (7 Cols): Headline, Human Sub-copy, CTAs & Quick Guarantees -->
      <div class="lg:col-span-7 space-y-6">
        
        <!-- Local Badge -->
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#063970]/10 border border-[#063970]/20 text-[#063970] text-xs font-semibold">
          <span class="w-2 h-2 rounded-full bg-[#0D9BE4] animate-pulse"></span>
          <span>Jasa IT Support Perorangan • Minggir, Sleman & Yogyakarta</span>
        </div>

        <!-- Human Headline -->
        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl lg:text-5xl text-[#063970] tracking-tight leading-tight">
          Laptop Lemot, Wi-Fi Error, atau Mau Pasang SSD? Servis Beres <span class="text-[#0D9BE4]">Tanpa Takut Diketok Harga</span>.
        </h1>

        <!-- Grounded Subtitle -->
        <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-xl">
          Solusi cepat untuk laptop kerja, komputer tugas kuliah, hingga jaringan internet rumah & kantor. Dikerjakan langsung oleh <strong>Nur Muhibbin</strong> (alumni TKJ SMKN 3 Yogyakarta). Biaya disepakati di depan sebelum dibongkar, file penting aman dibackup, dan bebas software crack berbahaya.
        </p>

        <!-- CTA Buttons -->
        <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
          <a href="https://wa.me/{{ $waClean }}?text={{ rawurlencode('Halo Mas Nur (TechCare), saya mau konsultasi mengenai kendala komputer/jaringan saya.') }}" 
             target="_blank" 
             rel="noopener noreferrer" 
             class="inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl bg-[#063970] hover:bg-[#04274d] text-white font-heading font-bold text-xs sm:text-sm transition-all shadow-md hover:shadow-lg min-h-[48px]">
            <svg class="w-4 h-4 fill-current text-emerald-400" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
            <span>Konsultasi Gratis via WhatsApp</span>
          </a>

          <a href="{{ route('layanan') }}" 
             class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-white hover:bg-slate-50 text-[#063970] border border-slate-300 font-heading font-bold text-xs sm:text-sm transition-all shadow-xs min-h-[48px]">
            <span>Lihat 24 Daftar Layanan & Biaya</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
          </a>
        </div>

        <!-- 3 Grounded Trust Badges -->
        <div class="pt-6 border-t border-slate-200 grid grid-cols-1 sm:grid-cols-3 gap-4">
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-[#063970]/10 text-[#063970] flex items-center justify-center shrink-0">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
              <strong class="text-xs font-bold text-slate-800 block">Biaya Jelas di Depan</strong>
              <span class="text-[11px] text-slate-500">Tanpa biaya siluman</span>
            </div>
          </div>

          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-[#0D9BE4]/10 text-[#0D9BE4] flex items-center justify-center shrink-0">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
              <strong class="text-xs font-bold text-slate-800 block">Garansi Jasa 7 Hari</strong>
              <span class="text-[11px] text-slate-500">Kambuh? Servis ulang gratis</span>
            </div>
          </div>

          <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-700 flex items-center justify-center shrink-0">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <div>
              <strong class="text-xs font-bold text-slate-800 block">Data Pribadi Dijaga</strong>
              <span class="text-[11px] text-slate-500">Backup dulu & anti crack</span>
            </div>
          </div>
        </div>

      </div>

      <!-- Right (5 Cols): Genuine Hardware Showcase with Technician Bio Card -->
      <div class="lg:col-span-5 relative">
        <div class="relative rounded-2xl overflow-hidden border border-slate-200 shadow-xl bg-white group">
          <img src="{{ asset('images/hero-tech.jpg') }}" 
               alt="Pemeriksaan dan perawatan hardware laptop oleh teknisi Nur Muhibbin di TechCare" 
               class="w-full h-80 sm:h-96 object-cover object-center group-hover:scale-105 transition-transform duration-500" 
               loading="eager" />

          <!-- Subtle bottom shadow gradient -->
          <div class="absolute inset-0 bg-gradient-to-t from-[#063970]/90 via-[#063970]/20 to-transparent"></div>

          <!-- Bottom Floating Badge on Photo -->
          <div class="absolute bottom-4 left-4 right-4 p-4 rounded-xl bg-white/95 backdrop-blur-xs border border-white/40 shadow-md">
            <div class="flex items-center justify-between">
              <div>
                <span class="text-[10px] font-mono font-bold uppercase text-[#0D9BE4] block">Teknisi Bertanggung Jawab</span>
                <strong class="text-xs text-slate-900 block font-heading">Nur Muhibbin</strong>
                <span class="text-[11px] text-slate-600 block">Alumni TKJ SMKN 3 Yogyakarta • Minggir, Sleman</span>
              </div>
              <span class="px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-800 font-mono text-[10px] font-bold border border-emerald-200 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                Siap Melayani
              </span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ==========================================
     2. INTERACTIVE PROBLEM DIAGNOSIS SELECTOR
     (Clean DriveNest bar adapted into real tech problem solver)
========================================== -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 -mt-8 relative z-30" 
     x-data="{
       activeProblem: 'lemot',
       serviceMode: 'antar',
       get visitCost() {
         if (this.serviceMode === 'antar') return 0;
         if (this.serviceMode === 'tier_1') return 10000;
         if (this.serviceMode === 'tier_2') return 20000;
         return 35000;
       },
       problems: {
         lemot: {
           title: 'Laptop / PC Lemot, Panas & Buka Aplikasi Berat',
           serviceCode: 'A2 & A9',
           serviceName: 'Optimasi Sistem & Pembersihan Fan Thermal Paste',
           basePrice: 50000,
           duration: '1–2 Jam',
           description: 'Cocok buat laptop yang buka Chrome muter-muter, kipas menderu keras, atau sering freeze pas ngetik tugas.',
           waMessage: 'Halo TechCare, laptop saya lemot dan cepat panas. Mau konsultasi estimasi optimasi dan bersihin thermal paste.'
         },
         ssd: {
           title: 'Mau Laptop Ngebut 10x Lipat Tanpa Beli Baru',
           serviceCode: 'A6',
           serviceName: 'Pemasangan SSD Baru & Kloning Data',
           basePrice: 100000,
           duration: '2–3 Jam',
           description: 'Ganti HDD lama ke SSD baru. Booting Windows jadi hitungan detik, aplikasi langsung terbuka, file lama tetap utuh.',
           waMessage: 'Halo TechCare, saya mau tanya upgrade pasang SSD untuk laptop saya biar lebih kencang.'
         },
         windows: {
           title: 'Windows Rusak, Bluescreen, atau Kena Virus',
           serviceCode: 'A3',
           serviceName: 'Instal Ulang Windows Bersih (Clean Install)',
           basePrice: 80000,
           duration: '2–4 Jam',
           description: 'Instalasi bersih bebas malware/trojan. Lengkap driver, software esensial kerja/kuliah, dan data partisi aman.',
           waMessage: 'Halo TechCare, Windows saya sering bluescreen / kena virus, butuh bantuan instal ulang bersih.'
         },
         wifi: {
           title: 'Wi-Fi Sering Putus, Tanda Seru, atau Setting Router',
           serviceCode: 'B1 & B2',
           serviceName: 'Troubleshooting Wi-Fi & Konfigurasi Router',
           basePrice: 60000,
           duration: '1–2 Jam',
           description: 'Atasi sinyal internet lemot, pasang router tambahan agar Wi-Fi tembus ke kamar, atau sharing printer kantor.',
           waMessage: 'Halo TechCare, Wi-Fi di rumah/kantor saya sering putus dan ada kendala jaringan.'
         }
       }
     }">
  
  <div class="bg-white rounded-2xl border border-slate-200 shadow-xl p-5 sm:p-7">
    
    <!-- Step Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-4 mb-5 border-b border-slate-100">
      <div>
        <span class="text-[11px] font-mono font-bold uppercase tracking-wider text-[#0D9BE4] block">Diagnosis Cepat Kendala Anda</span>
        <h2 class="text-lg sm:text-xl font-heading font-extrabold text-[#063970]">Laptop atau Jaringan Anda Sedang Bermasalah?</h2>
      </div>
      <span class="text-xs text-slate-500 font-mono">Pilih keluhan di bawah &darr;</span>
    </div>

    <!-- 4 Problem Tabs (DriveNest Pill Style) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-2.5 mb-6">
      
      <!-- Tab 1: Lemot -->
      <button type="button" 
              @click="activeProblem = 'lemot'" 
              :class="activeProblem === 'lemot' ? 'bg-[#063970] text-white border-[#063970] shadow-sm' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
              class="p-3 rounded-xl border text-left transition-all flex flex-col justify-between">
        <span class="text-base mb-1 block">⚡</span>
        <strong class="text-xs font-heading font-bold block leading-snug">Laptop Lemot / Panas</strong>
        <span class="text-[10px] opacity-80 mt-1 block font-mono">Mulai Rp50.000</span>
      </button>

      <!-- Tab 2: SSD Upgrade -->
      <button type="button" 
              @click="activeProblem = 'ssd'" 
              :class="activeProblem === 'ssd' ? 'bg-[#063970] text-white border-[#063970] shadow-sm' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
              class="p-3 rounded-xl border text-left transition-all flex flex-col justify-between">
        <span class="text-base mb-1 block">🚀</span>
        <strong class="text-xs font-heading font-bold block leading-snug">Mau Upgrade SSD</strong>
        <span class="text-[10px] opacity-80 mt-1 block font-mono">Jasa Rp100.000</span>
      </button>

      <!-- Tab 3: Windows Error -->
      <button type="button" 
              @click="activeProblem = 'windows'" 
              :class="activeProblem === 'windows' ? 'bg-[#063970] text-white border-[#063970] shadow-sm' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
              class="p-3 rounded-xl border text-left transition-all flex flex-col justify-between">
        <span class="text-base mb-1 block">💻</span>
        <strong class="text-xs font-heading font-bold block leading-snug">Windows Rusak / Virus</strong>
        <span class="text-[10px] opacity-80 mt-1 block font-mono">Jasa Rp80.000</span>
      </button>

      <!-- Tab 4: Wi-Fi Problem -->
      <button type="button" 
              @click="activeProblem = 'wifi'" 
              :class="activeProblem === 'wifi' ? 'bg-[#063970] text-white border-[#063970] shadow-sm' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
              class="p-3 rounded-xl border text-left transition-all flex flex-col justify-between">
        <span class="text-base mb-1 block">📶</span>
        <strong class="text-xs font-heading font-bold block leading-snug">Wi-Fi & Router Error</strong>
        <span class="text-[10px] opacity-80 mt-1 block font-mono">Mulai Rp60.000</span>
      </button>

    </div>

    <!-- Active Diagnosis Result Box (Spec-Sheet Card) -->
    <div class="bg-slate-50 rounded-xl p-4 sm:p-5 border border-slate-200">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
        
        <!-- Details (7 cols) -->
        <div class="lg:col-span-7 space-y-2.5">
          <div class="flex items-center gap-2">
            <span class="px-2 py-0.5 rounded bg-[#063970] text-white text-[11px] font-mono font-bold" x-text="'Kode ' + problems[activeProblem].serviceCode"></span>
            <span class="text-xs font-mono font-medium text-slate-500" x-text="'Estimasi Durasi: ' + problems[activeProblem].duration"></span>
          </div>

          <h3 class="text-base font-heading font-bold text-slate-900" x-text="problems[activeProblem].serviceName"></h3>
          
          <p class="text-xs text-slate-600 leading-relaxed" x-text="problems[activeProblem].description"></p>

          <!-- Mode Servis Selector -->
          <div class="pt-2 flex flex-col sm:flex-row sm:items-center gap-3">
            <span class="text-[11px] font-mono font-bold text-slate-500 uppercase">Pilihan Servis:</span>
            <div class="flex flex-wrap gap-2 text-xs">
              <label class="inline-flex items-center gap-1.5 cursor-pointer bg-white px-2.5 py-1.5 rounded-lg border border-slate-200 hover:border-[#0D9BE4]">
                <input type="radio" name="mode" value="antar" x-model="serviceMode" class="text-[#063970]">
                <span>Bawa ke Minggir (Rp0)</span>
              </label>
              <label class="inline-flex items-center gap-1.5 cursor-pointer bg-white px-2.5 py-1.5 rounded-lg border border-slate-200 hover:border-[#0D9BE4]">
                <input type="radio" name="mode" value="tier_1" x-model="serviceMode" class="text-[#063970]">
                <span>Home Service &le; 3 km (+Rp10rb)</span>
              </label>
              <label class="inline-flex items-center gap-1.5 cursor-pointer bg-white px-2.5 py-1.5 rounded-lg border border-slate-200 hover:border-[#0D9BE4]">
                <input type="radio" name="mode" value="tier_2" x-model="serviceMode" class="text-[#063970]">
                <span>Home Service 3–7 km (+Rp20rb)</span>
              </label>
            </div>
          </div>
        </div>

        <!-- Price & WhatsApp Action (5 cols) -->
        <div class="lg:col-span-5 bg-white p-4 rounded-xl border border-slate-200 flex flex-col justify-between space-y-4">
          <div class="flex items-center justify-between">
            <div>
              <span class="text-[10px] font-mono text-slate-400 uppercase block">Perkiraan Biaya Jasa</span>
              <div class="flex items-baseline gap-1">
                <span class="text-xs font-mono text-slate-500">Rp</span>
                <span class="text-2xl font-mono font-extrabold text-[#063970]" 
                      x-text="(problems[activeProblem].basePrice + visitCost).toLocaleString('id-ID')"></span>
              </div>
            </div>
            <div class="text-right">
              <span class="text-[10px] font-mono text-emerald-600 font-bold block bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">
                Garansi 7 Hari
              </span>
              <span class="text-[10px] text-slate-400 block mt-1">Disepakati sebelum kerja</span>
            </div>
          </div>

          <a :href="'https://wa.me/{{ $waClean }}?text=' + encodeURIComponent(problems[activeProblem].waMessage + ' (Perkiraan: ' + problems[activeProblem].serviceName + ', Mode: ' + (serviceMode === 'antar' ? 'Antar ke Minggir' : 'Panggil ke Lokasi') + ')')" 
             target="_blank" 
             rel="noopener noreferrer" 
             class="w-full py-2.5 px-4 rounded-xl bg-[#063970] hover:bg-[#0D9BE4] text-white font-heading font-bold text-xs flex items-center justify-center gap-2 shadow-xs transition-colors min-h-[42px]">
            <svg class="w-4 h-4 fill-current text-emerald-400" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
            <span>Konsultasikan Masalah Ini via WhatsApp</span>
          </a>
        </div>

      </div>
    </div>

  </div>
</div>

<!-- ==========================================
     3. 6 CORE FEATURED SERVICES (Real Spec Cards Grid with Genuine Photos)
========================================== -->
<section class="py-16 bg-[#FAF9F6]">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    
    <!-- Section Heading -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
      <div>
        <span class="text-xs font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Paling Sering Dikerjakan</span>
        <h2 class="text-2xl sm:text-3xl font-heading font-extrabold text-[#063970] mt-1">Layanan Utama Pilihan Pelanggan</h2>
        <p class="text-xs sm:text-sm text-slate-600 mt-1 max-w-xl">Pekerjaan teknis yang paling banyak dibutuhkan oleh mahasiswa, pelajar, guru, dan pelaku usaha lokal.</p>
      </div>

      <a href="{{ route('layanan') }}" class="text-xs font-bold text-[#063970] hover:text-[#0D9BE4] flex items-center gap-1 shrink-0 font-mono">
        <span>Lihat Semua 24 Layanan Lengkap</span>
        <span aria-hidden="true">&rarr;</span>
      </a>
    </div>

    <!-- Cards Grid (DriveNest Visual Workshop) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      
      @php
        $servicePhotos = [
          'A1' => 'hero-tech.jpg',
          'A2' => 'laptop-cleaning.jpg',
          'A3' => 'os-install.jpg',
          'A6' => 'ssd-upgrade.jpg',
          'B1' => 'wifi-router.jpg',
          'B2' => 'lan-networking.jpg',
        ];
      @endphp

      @foreach ($utamaServices->take(6) as $service)
        @php
          $photo = $servicePhotos[$service->code] ?? 'hero-tech.jpg';
        @endphp
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-md hover:border-[#0D9BE4]/60 transition-all flex flex-col justify-between group">
          
          <div>
            <!-- Card Image with Category Badge & Code -->
            <div class="relative h-48 overflow-hidden bg-slate-100">
              <img src="{{ asset('images/' . $photo) }}" 
                   alt="{{ $service->name }}" 
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                   loading="lazy" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/65 via-transparent to-transparent"></div>
              
              <!-- Code & Category Badge -->
              <div class="absolute top-3 left-3 flex items-center gap-1.5">
                <span class="px-2.5 py-1 rounded-md bg-[#063970] text-white text-[11px] font-mono font-bold shadow-xs">
                  #{{ $service->code }}
                </span>
                <span class="px-2 py-0.5 rounded-md bg-white/90 backdrop-blur-xs text-[#063970] text-[10px] font-mono uppercase font-bold">
                  {{ $service->category }}
                </span>
              </div>

              <!-- Duration Pill -->
              <div class="absolute bottom-3 left-3 flex items-center gap-1 text-white text-[11px] font-mono font-medium drop-shadow-xs">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>{{ $service->duration }}</span>
              </div>
            </div>

            <!-- Card Content -->
            <div class="p-5 space-y-2">
              <h3 class="font-heading font-bold text-base text-slate-900 group-hover:text-[#063970] transition-colors leading-snug">
                {{ $service->name }}
              </h3>
              
              <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                {{ $service->description }}
              </p>

              <!-- Technical Meta Attributes -->
              <div class="pt-2 flex flex-wrap gap-1.5 text-[10px] font-mono text-slate-600">
                <span class="bg-slate-50 px-2 py-0.5 rounded border border-slate-200">Garansi 7 Hari</span>
                <span class="bg-slate-50 px-2 py-0.5 rounded border border-slate-200">Bisa Home Service</span>
                <span class="bg-slate-50 px-2 py-0.5 rounded border border-slate-200">Backup Data Aman</span>
              </div>
            </div>
          </div>

          <!-- Card Footer (Price & Action) -->
          <div class="p-5 pt-0">
            <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
              <div>
                <span class="text-[10px] font-mono uppercase text-slate-400 block font-bold">Tarif Jasa</span>
                <span class="font-mono font-extrabold text-base text-[#063970]">
                  {{ $service->formatted_price }}
                </span>
                @if($service->price_note)
                  <span class="text-[10px] font-mono text-slate-500 block">{{ $service->price_note }}</span>
                @endif
              </div>

              <a href="https://wa.me/{{ $waClean }}?text={{ rawurlencode("Halo Mas Nur (TechCare), saya mau tanya atau booking servis [{$service->code}] {$service->name}.") }}" 
                 target="_blank" 
                 rel="noopener noreferrer" 
                 class="px-3.5 py-2 rounded-lg bg-[#063970] hover:bg-[#0D9BE4] text-white text-xs font-semibold transition-colors shadow-xs">
                Pesan via WA
              </a>
            </div>
          </div>

        </div>
      @endforeach

    </div>

  </div>
</section>

<!-- ==========================================
     3B. INTERACTIVE SPEED BENCHMARK SIMULATOR (HDD vs SSD)
========================================== -->
<section class="py-16 bg-white border-b border-slate-200" 
         x-data="{
           running: false,
           completed: false,
           testType: 'boot',
           tests: {
             boot: {
               name: 'Booting Windows 10/11',
               hddTime: 78.4,
               ssdTime: 8.8,
               hddLabel: 'Harddisk 5400 RPM (Piringan Tua)',
               ssdLabel: 'SSD SATA/NVMe (TechCare Layanan [A6])',
               icon: '💻'
             },
             apps: {
               name: 'Buka MS Word + Excel + Chrome 10 Tab',
               hddTime: 42.6,
               ssdTime: 3.2,
               hddLabel: 'HDD Tua (Disk 100% Not Responding)',
               ssdLabel: 'SSD Cepat (Responsif Seketika)',
               icon: '📂'
             },
             copy: {
               name: 'Transfer File Skripsi / Video 5 GB',
               hddTime: 65.0,
               ssdTime: 6.5,
               hddLabel: 'Kecepatan Read/Write 30 MB/s',
               ssdLabel: 'Kecepatan Read/Write 500+ MB/s',
               icon: '⚡'
             }
           },
           hddProgress: 0,
           ssdProgress: 0,
           hddTimer: 0,
           ssdTimer: 0,
           timerInterval: null,
           startBenchmark() {
             this.running = true;
             this.completed = false;
             this.hddProgress = 0;
             this.ssdProgress = 0;
             this.hddTimer = 0;
             this.ssdTimer = 0;
             clearInterval(this.timerInterval);

             const test = this.tests[this.testType];
             const startTimestamp = Date.now();
             const duration = 3500;

             this.timerInterval = setInterval(() => {
               const elapsed = Date.now() - startTimestamp;
               const ratio = Math.min(elapsed / duration, 1);

               if (ratio < 0.22) {
                 this.ssdProgress = Math.round((ratio / 0.22) * 100);
                 this.ssdTimer = ((ratio / 0.22) * test.ssdTime).toFixed(1);
               } else {
                 this.ssdProgress = 100;
                 this.ssdTimer = test.ssdTime.toFixed(1);
               }

               this.hddProgress = Math.round(ratio * 100);
               this.hddTimer = (ratio * test.hddTime).toFixed(1);

               if (ratio >= 1) {
                 clearInterval(this.timerInterval);
                 this.running = false;
                 this.completed = true;
               }
             }, 35);
           }
         }">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    
    <div class="text-center max-w-2xl mx-auto mb-8">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#0D9BE4]/10 text-[#063970] text-xs font-mono font-bold mb-2">
        <span>⚡ SIMULASI INTERAKTIF PERFORMA</span>
      </div>
      <h2 class="text-2xl sm:text-3xl font-heading font-extrabold text-[#063970]">
        Seberapa Kencang Laptop Lama Setelah Upgrade SSD?
      </h2>
      <p class="text-xs sm:text-sm text-slate-600 mt-2">
        Banyak yang mengira laptop lemot harus dibuang atau ganti baru. Coba simulasi perbandingan nyata berikut antara harddisk bawaan lama dengan SSD baru di TechCare:
      </p>
    </div>

    <!-- Simulator Control Box -->
    <div class="bg-slate-50 border border-slate-200 rounded-3xl p-5 sm:p-8 shadow-xs max-w-4xl mx-auto">
      
      <!-- Scenario Selector Tabs -->
      <div class="flex flex-wrap items-center justify-center gap-2 mb-6">
        <button type="button" 
                @click="testType = 'boot'; completed = false; hddProgress = 0; ssdProgress = 0; hddTimer = 0; ssdTimer = 0;" 
                :class="testType === 'boot' ? 'bg-[#063970] text-white shadow-xs' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-100'"
                class="px-4 py-2 rounded-xl text-xs font-heading font-bold transition-all">
          💻 1. Booting Windows
        </button>
        <button type="button" 
                @click="testType = 'apps'; completed = false; hddProgress = 0; ssdProgress = 0; hddTimer = 0; ssdTimer = 0;" 
                :class="testType === 'apps' ? 'bg-[#063970] text-white shadow-xs' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-100'"
                class="px-4 py-2 rounded-xl text-xs font-heading font-bold transition-all">
          📂 2. Buka Aplikasi Kerja
        </button>
        <button type="button" 
                @click="testType = 'copy'; completed = false; hddProgress = 0; ssdProgress = 0; hddTimer = 0; ssdTimer = 0;" 
                :class="testType === 'copy' ? 'bg-[#063970] text-white shadow-xs' : 'bg-white text-slate-700 border border-slate-200 hover:bg-slate-100'"
                class="px-4 py-2 rounded-xl text-xs font-heading font-bold transition-all">
          ⚡ 3. Copy File 5 GB
        </button>
      </div>

      <!-- Action Button -->
      <div class="text-center mb-8">
        <button type="button" 
                @click="startBenchmark()" 
                :disabled="running"
                class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-[#0D9BE4] hover:bg-[#0c8ad0] disabled:bg-slate-300 text-white font-heading font-bold text-xs sm:text-sm shadow-md transition-all transform active:scale-95 cursor-pointer">
          <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
          <span x-text="running ? 'Sedang Menjalankan Tes...' : '▶ Jalankan Tes Komparasi Sekarang'"></span>
        </button>
      </div>

      <!-- Dual Comparison Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        
        <!-- HDD Side -->
        <div class="p-5 rounded-2xl bg-white border border-rose-200 shadow-2xs space-y-3">
          <div class="flex items-center justify-between">
            <div>
              <span class="text-[10px] font-mono font-bold uppercase text-rose-600 block">Kondisi Sebelum</span>
              <strong class="text-xs font-heading font-bold text-slate-900 block" x-text="tests[testType].hddLabel"></strong>
            </div>
            <span class="text-xs font-mono font-bold text-rose-600 px-2 py-0.5 rounded bg-rose-50 border border-rose-200">
              Disk 100%
            </span>
          </div>

          <!-- Progress Bar -->
          <div class="space-y-1">
            <div class="h-3 w-full bg-slate-100 rounded-full overflow-hidden border border-slate-200">
              <div class="h-full bg-rose-500 rounded-full transition-all duration-75" :style="'width: ' + hddProgress + '%'"></div>
            </div>
            <div class="flex justify-between text-[11px] font-mono text-slate-500">
              <span x-text="running ? 'Piringan berputar lambat...' : (completed ? 'Selesai lambat' : 'Siap diuji')"></span>
              <span class="font-bold text-rose-600" x-text="hddTimer + ' detik'"></span>
            </div>
          </div>

          <p class="text-[11px] text-slate-500 leading-relaxed pt-1">
            ⚠️ Buka aplikasi menunggu lama, kursor loading berputar, laptop mudah panas dan rawan hang.
          </p>
        </div>

        <!-- SSD Side -->
        <div class="p-5 rounded-2xl bg-white border-2 border-emerald-400 shadow-sm space-y-3 relative overflow-hidden">
          <div class="absolute -top-6 -right-6 w-16 h-16 bg-emerald-500/10 rounded-full"></div>
          
          <div class="flex items-center justify-between relative z-10">
            <div>
              <span class="text-[10px] font-mono font-bold uppercase text-emerald-600 block">Setelah Upgrade TechCare</span>
              <strong class="text-xs font-heading font-bold text-slate-900 block" x-text="tests[testType].ssdLabel"></strong>
            </div>
            <span class="text-xs font-mono font-bold text-emerald-700 px-2 py-0.5 rounded bg-emerald-50 border border-emerald-200">
              Disk 3% Dingin
            </span>
          </div>

          <!-- Progress Bar -->
          <div class="space-y-1 relative z-10">
            <div class="h-3 w-full bg-slate-100 rounded-full overflow-hidden border border-slate-200">
              <div class="h-full bg-emerald-500 rounded-full transition-all duration-75" :style="'width: ' + ssdProgress + '%'"></div>
            </div>
            <div class="flex justify-between text-[11px] font-mono text-slate-500">
              <span x-text="running ? (ssdProgress === 100 ? 'Selesai instan!' : 'Membaca chip flash...') : (completed ? 'Selesai super cepat!' : 'Siap diuji')"></span>
              <span class="font-bold text-emerald-600 text-sm" x-text="ssdTimer + ' detik'"></span>
            </div>
          </div>

          <p class="text-[11px] text-slate-600 leading-relaxed pt-1 relative z-10">
            ✅ Respon instan tanpa loading berputar. Laptop langsung siap dipakai ngetik tugas atau kerjaan berat.
          </p>
        </div>

      </div>

      <!-- Result Conclusion Banner -->
      <div x-show="completed" x-transition class="mt-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-xs text-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="space-y-0.5">
          <strong class="text-emerald-900 font-heading text-sm block">Kesimpulan: Upgrade SSD Terbukti Hingga 9x Lebih Kencang!</strong>
          <p class="text-slate-600 text-[11px]">Laptop lama Anda sebenarnya tidak perlu diganti. Dengan jasa pasang & kloning data Rp100.000 di TechCare, performanya langsung terasa baru.</p>
        </div>
        <a href="https://wa.me/{{ $waClean }}?text={{ rawurlencode('Halo Mas Nur (TechCare), setelah coba simulasi benchmark di website, saya tertarik mau tanya upgrade SSD untuk laptop saya.') }}" 
           target="_blank" 
           rel="noopener noreferrer" 
           class="px-4 py-2.5 rounded-xl bg-[#063970] hover:bg-[#0D9BE4] text-white font-bold font-mono text-xs text-center shrink-0 transition-colors shadow-2xs">
          Tanya Pasang SSD via WA &rarr;
        </a>
      </div>

    </div>

  </div>
</section>

<!-- ==========================================
     4. KATEGORI & KEJUJURAN BATAS LAYANAN
     (Split Banner: What We Do vs What We Honestly Decline)
========================================== -->
<section class="py-14 bg-white border-y border-slate-200">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
      
      <!-- Left (7 Cols): 4 Core Service Categories -->
      <div class="lg:col-span-7 space-y-4">
        <div>
          <span class="text-xs font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Kategori Pekerjaan</span>
          <h2 class="text-2xl font-heading font-extrabold text-[#063970] mt-1">Bidang Keahlian TechCare</h2>
          <p class="text-xs text-slate-600 mt-1">Fokus pada pemeliharaan sistem, optimasi performa perangkat, dan jaringan internet lokal.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
          
          <!-- Cat 1 -->
          <a href="{{ route('layanan') }}#kategori-komputer" class="p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-[#0D9BE4] hover:shadow-sm transition-all flex items-start gap-3.5 group">
            <div class="w-10 h-10 rounded-lg bg-[#063970]/10 text-[#063970] group-hover:bg-[#063970] group-hover:text-white transition-colors flex items-center justify-center shrink-0">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <div>
              <h3 class="font-heading font-bold text-sm text-slate-900 group-hover:text-[#063970]">Komputer & Laptop</h3>
              <p class="text-xs text-slate-500 mt-0.5">9 Layanan: Instal ulang Windows bersih, ganti thermal paste, upgrade SSD, dan optimasi lemot.</p>
            </div>
          </a>

          <!-- Cat 2 -->
          <a href="{{ route('layanan') }}#kategori-jaringan" class="p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-[#0D9BE4] hover:shadow-sm transition-all flex items-start gap-3.5 group">
            <div class="w-10 h-10 rounded-lg bg-[#0D9BE4]/10 text-[#0D9BE4] group-hover:bg-[#0D9BE4] group-hover:text-white transition-colors flex items-center justify-center shrink-0">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"></path></svg>
            </div>
            <div>
              <h3 class="font-heading font-bold text-sm text-slate-900 group-hover:text-[#063970]">Jaringan Wi-Fi & LAN</h3>
              <p class="text-xs text-slate-500 mt-0.5">7 Layanan: Setting router baru, troubleshooting Wi-Fi putus, printer jaringan, crimping kabel.</p>
            </div>
          </a>

          <!-- Cat 3 -->
          <a href="{{ route('layanan') }}#kategori-linux" class="p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-[#0D9BE4] hover:shadow-sm transition-all flex items-start gap-3.5 group">
            <div class="w-10 h-10 rounded-lg bg-indigo-500/10 text-indigo-700 group-hover:bg-indigo-600 group-hover:text-white transition-colors flex items-center justify-center shrink-0">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
            </div>
            <div>
              <h3 class="font-heading font-bold text-sm text-slate-900 group-hover:text-[#063970]">Sistem Operasi & Linux</h3>
              <p class="text-xs text-slate-500 mt-0.5">5 Layanan: Instal Ubuntu/Linux Mint, dual boot aman untuk mahasiswa, setup web server lokal.</p>
            </div>
          </a>

          <!-- Cat 4 -->
          <a href="{{ route('layanan') }}#kategori-keamanan" class="p-4 rounded-xl border border-slate-200 bg-slate-50/50 hover:bg-white hover:border-[#0D9BE4] hover:shadow-sm transition-all flex items-start gap-3.5 group">
            <div class="w-10 h-10 rounded-lg bg-emerald-500/10 text-emerald-700 group-hover:bg-emerald-600 group-hover:text-white transition-colors flex items-center justify-center shrink-0">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <div>
              <h3 class="font-heading font-bold text-sm text-slate-900 group-hover:text-[#063970]">Keamanan Dasar & Backup</h3>
              <p class="text-xs text-slate-500 mt-0.5">3 Layanan: Pengamanan Windows Defender, jadwal backup file berkala, edukasi keamanan akun.</p>
            </div>
          </a>

        </div>
      </div>

      <!-- Right (5 Cols): Honesty Card "Batas Layanan yang Jujur Kami Tolak" -->
      <div class="lg:col-span-5 bg-[#063970] text-white rounded-2xl p-6 sm:p-7 flex flex-col justify-between shadow-lg relative overflow-hidden">
        <div class="relative z-10 space-y-3">
          <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded bg-[#0D9BE4]/20 border border-[#0D9BE4]/40 text-[#0D9BE4] text-[10px] font-mono font-bold uppercase">
            Kejujuran & Tanggung Jawab Teknis
          </div>
          
          <h3 class="text-xl font-heading font-extrabold text-white">Layanan yang Jujur Kami Tolak</h3>
          
          <p class="text-xs text-slate-300 leading-relaxed">
            TechCare mengutamakan integritas dan keselamatan perangkat Anda. Kami <strong>bukan tempat servis yang coba-coba</strong> membongkar kerusakan di luar batas aman. Kami menolak pekerjaan berikut:
          </p>

          <ul class="text-xs space-y-2 text-slate-200 font-medium">
            <li class="flex items-start gap-2">
              <span class="text-rose-400 font-bold">✕</span>
              <span>Perbaikan mikrosolder chip IC motherboard / reballing</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-rose-400 font-bold">✕</span>
              <span>Pemulihan data piringan harddisk yang rusak fisik parah / tergores</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-rose-400 font-bold">✕</span>
              <span>Penggantian layar LCD pecah berisiko tinggi tanpa part asli</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-rose-400 font-bold">✕</span>
              <span>Pemasangan software crack berbahaya atau pembobolan akun</span>
            </li>
          </ul>
        </div>

        <div class="pt-5 border-t border-white/15 relative z-10 flex items-center justify-between">
          <span class="text-[11px] text-slate-300 font-mono">Kejujuran ini menjaga laptop Anda tetap aman.</span>
          <a href="{{ route('kebijakan') }}" class="text-xs font-bold text-[#0D9BE4] hover:text-white flex items-center gap-1">
            <span>Pelajari Komitmen Kami</span> &rarr;
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ==========================================
     5. 5 PILAR KENAPA NYAMAN SERVIS DI TECHCARE
========================================== -->
<section class="py-16 bg-[#FAF9F6]">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    
    <div class="text-center max-w-2xl mx-auto mb-12">
      <span class="text-xs font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Jaminan Ketenangan Pelanggan</span>
      <h2 class="text-2xl sm:text-3xl font-heading font-extrabold text-[#063970] mt-1">Kenapa Banyak yang Nyaman Servis di Sini?</h2>
      <p class="text-xs sm:text-sm text-slate-600 mt-2">Bukan sekadar memperbaiki komputer, tapi memastikan Anda tidak merasa was-was saat menitipkan perangkat berharga Anda.</p>
    </div>

    <!-- 5 Horizontal Feature Cards (DriveNest Inspired) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
      
      <!-- 1 -->
      <div class="bg-white rounded-xl p-5 border border-slate-200 text-center flex flex-col items-center shadow-2xs hover:border-[#0D9BE4] transition-colors">
        <div class="w-12 h-12 rounded-full bg-[#063970]/10 text-[#063970] flex items-center justify-center mb-3">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <h3 class="font-heading font-bold text-xs text-slate-900 mb-1">Biaya Pasti di Muka</h3>
        <p class="text-[11px] text-slate-500 leading-relaxed">Rincian biaya disepakati sebelum baut laptop dibuka. Tidak ada tagihan siluman.</p>
      </div>

      <!-- 2 -->
      <div class="bg-white rounded-xl p-5 border border-slate-200 text-center flex flex-col items-center shadow-2xs hover:border-[#0D9BE4] transition-colors">
        <div class="w-12 h-12 rounded-full bg-[#0D9BE4]/10 text-[#0D9BE4] flex items-center justify-center mb-3">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <h3 class="font-heading font-bold text-xs text-slate-900 mb-1">Garansi Jasa 7 Hari</h3>
        <p class="text-[11px] text-slate-500 leading-relaxed">Bila kendala yang sama kambuh dalam 7 hari, kami tangani ulang tanpa ongkos jasa.</p>
      </div>

      <!-- 3 -->
      <div class="bg-white rounded-xl p-5 border border-slate-200 text-center flex flex-col items-center shadow-2xs hover:border-[#0D9BE4] transition-colors">
        <div class="w-12 h-12 rounded-full bg-emerald-500/10 text-emerald-700 flex items-center justify-center mb-3">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
        </div>
        <h3 class="font-heading font-bold text-xs text-slate-900 mb-1">Data Pribadi Dijaga</h3>
        <p class="text-[11px] text-slate-500 leading-relaxed">File penting dibackup sebelum tindakan. Kami tidak pernah membuka folder pribadi Anda.</p>
      </div>

      <!-- 4 -->
      <div class="bg-white rounded-xl p-5 border border-slate-200 text-center flex flex-col items-center shadow-2xs hover:border-[#0D9BE4] transition-colors">
        <div class="w-12 h-12 rounded-full bg-indigo-500/10 text-indigo-700 flex items-center justify-center mb-3">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
        </div>
        <h3 class="font-heading font-bold text-xs text-slate-900 mb-1">Bebas Crack Berbahaya</h3>
        <p class="text-[11px] text-slate-500 leading-relaxed">Menolak aktivator bajakan berbahaya yang rawan trojan peretas rekening atau email.</p>
      </div>

      <!-- 5 -->
      <div class="bg-white rounded-xl p-5 border border-slate-200 text-center flex flex-col items-center shadow-2xs hover:border-[#0D9BE4] transition-colors">
        <div class="w-12 h-12 rounded-full bg-amber-500/10 text-amber-700 flex items-center justify-center mb-3">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        </div>
        <h3 class="font-heading font-bold text-xs text-slate-900 mb-1">Siap Home Service</h3>
        <p class="text-[11px] text-slate-500 leading-relaxed">Bisa dikunjungi langsung ke rumah/kantor di Sleman & Jogja, atau antar ke Minggir.</p>
      </div>

    </div>

  </div>
</section>

<!-- ==========================================
     6. ALUR SERVIS SANTAI & TRANSPARAN
========================================== -->
<section class="py-16 bg-white border-b border-slate-200">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    
    <div class="text-center max-w-2xl mx-auto mb-12">
      <span class="text-xs font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Alur Pengerjaan Jelas</span>
      <h2 class="text-2xl sm:text-3xl font-heading font-extrabold text-[#063970] mt-1">Bagaimana Cara Servis di TechCare?</h2>
      <p class="text-xs sm:text-sm text-slate-600 mt-2">Tanpa prosedur rumit. Anda tahu persis apa yang sedang dikerjakan pada perangkat Anda di setiap tahap.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
      
      <!-- Step 1 -->
      <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
        <div>
          <span class="text-xs font-mono font-bold text-[#0D9BE4] block mb-2">01. KONSULTASI WA</span>
          <h3 class="font-heading font-bold text-sm text-slate-900 mb-1">Ceritakan Kendala</h3>
          <p class="text-[11px] text-slate-500 leading-relaxed">Kirim pesan WhatsApp atau foto gejala laptop. Konsultasi awal 100% gratis.</p>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
        <div>
          <span class="text-xs font-mono font-bold text-[#0D9BE4] block mb-2">02. ESTIMASI BIAYA</span>
          <h3 class="font-heading font-bold text-sm text-slate-900 mb-1">Disepakati di Awal</h3>
          <p class="text-[11px] text-slate-500 leading-relaxed">Kami berikan estimasi biaya dan durasi. Pengerjaan baru dimulai jika Anda setuju.</p>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
        <div>
          <span class="text-xs font-mono font-bold text-[#0D9BE4] block mb-2">03. PENGERJAAN</span>
          <h3 class="font-heading font-bold text-sm text-slate-900 mb-1">Backup & Eksekusi</h3>
          <p class="text-[11px] text-slate-500 leading-relaxed">Data diamankan lebih dulu. Dikerjakan teliti menggunakan software bersih tanpa crack.</p>
        </div>
      </div>

      <!-- Step 4 -->
      <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
        <div>
          <span class="text-xs font-mono font-bold text-[#0D9BE4] block mb-2">04. TES BERSAMA</span>
          <h3 class="font-heading font-bold text-sm text-slate-900 mb-1">Cek Fungsi Bareng</h3>
          <p class="text-[11px] text-slate-500 leading-relaxed">Perangkat diuji di depan Anda (booting, audio, Wi-Fi, aplikasi) sampai dipastikan normal.</p>
        </div>
      </div>

      <!-- Step 5 -->
      <div class="p-4 rounded-xl bg-emerald-50/50 border border-emerald-200 flex flex-col justify-between">
        <div>
          <span class="text-xs font-mono font-bold text-emerald-700 block mb-2">05. BAYAR & GARANSI</span>
          <h3 class="font-heading font-bold text-sm text-emerald-900 mb-1">Tenang Bergaransi</h3>
          <p class="text-[11px] text-slate-600 leading-relaxed">Bayar via tunai/QRIS/transfer setelah beres. Disertai nota dan garansi 7 hari penuh.</p>
        </div>
      </div>

    </div>

    <div class="text-center mt-6">
      <a href="{{ route('alur') }}" class="text-xs font-bold text-[#063970] hover:text-[#0D9BE4] inline-flex items-center gap-1 font-mono">
        <span>Pelajari SOP 10 Langkah Pelayanan Lengkap</span> &rarr;
      </a>
    </div>

  </div>
</section>

<!-- ==========================================
     7. JANGKAUAN WILAYAH & RADAR INTERAKTIF HOME SERVICE
========================================== -->
<section class="py-16 bg-[#FAF9F6] border-b border-slate-200" 
         x-data="{
           selectedArea: 'minggir',
           customKm: 1.5,
           areas: {
             minggir: { name: 'Minggir, Sleman (Dekat Workshop)', km: 1.5, tier: 1, fee: 10000, eta: '10–15 Menit', desc: 'Radius terdekat workshop TechCare. Teknisi cepat tiba di lokasi.' },
             moyudan: { name: 'Moyudan, Sleman', km: 4.8, tier: 2, fee: 20000, eta: '15–20 Menit', desc: 'Area Sleman barat bagian selatan. Akses jalan cepat dan lancar.' },
             godean: { name: 'Godean (Pasar Godean & Sekitar)', km: 5.5, tier: 2, fee: 20000, eta: '15–25 Menit', desc: 'Rute jalur utama Jalan Godean. Sangat sering kami layani.' },
             seyegan: { name: 'Seyegan, Sleman', km: 6.2, tier: 2, fee: 20000, eta: '15–25 Menit', desc: 'Sleman barat laut. Mudah dijangkau via jalan alternatif.' },
             mlati: { name: 'Mlati / Cebongan / Kampus UTY', km: 9.2, tier: 3, fee: 35000, eta: '25–35 Menit', desc: 'Area kampus UTY & jalan Magelang. Siap home service ke kos / rumah.' },
             jogja: { name: 'Kota Yogyakarta / Kampus UGM & UNY', km: 13.5, tier: 3, fee: 35000, eta: '30–45 Menit', desc: 'Area pusat kota & kampus Yogya. Jadwal disepakati terlebih dahulu.' }
           },
           get currentFee() {
             const km = this.areas[this.selectedArea]?.km || this.customKm;
             if (km <= 3) return 10000;
             if (km <= 7) return 20000;
             return 35000;
           },
           get currentTierLabel() {
             const km = this.areas[this.selectedArea]?.km || this.customKm;
             if (km <= 3) return 'Radius Dekat (≤ 3 km)';
             if (km <= 7) return 'Radius Sedang (3 s/d 7 km)';
             return 'Radius Luar (> 7 km)';
           }
         }">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    
    <div class="text-center max-w-2xl mx-auto mb-10">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#063970]/10 text-[#063970] text-xs font-mono font-bold mb-2">
        <span>📍 SIMULASI RADAR JARAK & ONGKOS</span>
      </div>
      <h2 class="text-2xl sm:text-3xl font-heading font-extrabold text-[#063970]">
        Wilayah Layanan & Estimasi Kunjungan Home Service
      </h2>
      <p class="text-xs sm:text-sm text-slate-600 mt-2">
        Pangkalan teknisi berada di <strong>Minggir, Sleman</strong>. Klik lokasi Anda di bawah untuk melihat estimasi ongkos bensin dan waktu kedatangan teknisi secara transparan:
      </p>
    </div>

    <!-- Interactive Radar Box -->
    <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
        
        <!-- Left: District Selector & Controls (7 Cols) -->
        <div class="lg:col-span-7 space-y-5">
          <div>
            <span class="text-xs font-mono font-bold uppercase tracking-wider text-slate-400 block mb-2">Pilih Kecamatan / Area Anda:</span>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5">
              <button type="button" 
                      @click="selectedArea = 'minggir'" 
                      :class="selectedArea === 'minggir' ? 'bg-[#063970] text-white border-[#063970] shadow-xs' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                      class="p-2.5 rounded-xl border text-left text-xs font-heading font-bold transition-all">
                <span class="block text-emerald-400 text-[10px] font-mono">1.5 KM</span>
                <span>Minggir (Workshop)</span>
              </button>

              <button type="button" 
                      @click="selectedArea = 'moyudan'" 
                      :class="selectedArea === 'moyudan' ? 'bg-[#063970] text-white border-[#063970] shadow-xs' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                      class="p-2.5 rounded-xl border text-left text-xs font-heading font-bold transition-all">
                <span class="block text-sky-400 text-[10px] font-mono">4.8 KM</span>
                <span>Moyudan</span>
              </button>

              <button type="button" 
                      @click="selectedArea = 'godean'" 
                      :class="selectedArea === 'godean' ? 'bg-[#063970] text-white border-[#063970] shadow-xs' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                      class="p-2.5 rounded-xl border text-left text-xs font-heading font-bold transition-all">
                <span class="block text-sky-400 text-[10px] font-mono">5.5 KM</span>
                <span>Godean</span>
              </button>

              <button type="button" 
                      @click="selectedArea = 'seyegan'" 
                      :class="selectedArea === 'seyegan' ? 'bg-[#063970] text-white border-[#063970] shadow-xs' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                      class="p-2.5 rounded-xl border text-left text-xs font-heading font-bold transition-all">
                <span class="block text-sky-400 text-[10px] font-mono">6.2 KM</span>
                <span>Seyegan</span>
              </button>

              <button type="button" 
                      @click="selectedArea = 'mlati'" 
                      :class="selectedArea === 'mlati' ? 'bg-[#063970] text-white border-[#063970] shadow-xs' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                      class="p-2.5 rounded-xl border text-left text-xs font-heading font-bold transition-all">
                <span class="block text-amber-400 text-[10px] font-mono">9.2 KM</span>
                <span>Mlati / UTY</span>
              </button>

              <button type="button" 
                      @click="selectedArea = 'jogja'" 
                      :class="selectedArea === 'jogja' ? 'bg-[#063970] text-white border-[#063970] shadow-xs' : 'bg-slate-50 text-slate-700 border-slate-200 hover:bg-slate-100'"
                      class="p-2.5 rounded-xl border text-left text-xs font-heading font-bold transition-all">
                <span class="block text-amber-400 text-[10px] font-mono">13.5 KM</span>
                <span>Kota Jogja / UGM</span>
              </button>
            </div>
          </div>

          <!-- Live Result Card for Selected Area -->
          <div class="p-4 sm:p-5 rounded-2xl bg-slate-50 border border-slate-200 space-y-3">
            <div class="flex items-center justify-between">
              <div>
                <span class="text-[10px] font-mono uppercase text-[#0D9BE4] font-bold block" x-text="currentTierLabel"></span>
                <strong class="text-sm sm:text-base font-heading font-bold text-slate-900" x-text="areas[selectedArea].name"></strong>
              </div>
              <div class="text-right">
                <span class="text-[10px] font-mono text-slate-400 uppercase block">Ongkos Kunjungan</span>
                <span class="text-xl font-mono font-extrabold text-[#063970]" x-text="'Rp' + currentFee.toLocaleString('id-ID')"></span>
              </div>
            </div>

            <div class="grid grid-cols-2 gap-3 pt-2 border-t border-slate-200 text-xs font-mono">
              <div>
                <span class="text-slate-400 block text-[10px]">Perkiraan Jarak:</span>
                <strong class="text-slate-700" x-text="'± ' + areas[selectedArea].km + ' km dari Minggir'"></strong>
              </div>
              <div>
                <span class="text-slate-400 block text-[10px]">Estimasi Perjalanan:</span>
                <strong class="text-emerald-700" x-text="areas[selectedArea].eta"></strong>
              </div>
            </div>

            <p class="text-[11px] text-slate-500 pt-1" x-text="areas[selectedArea].desc"></p>
          </div>

          <!-- Drop-off alternative callout -->
          <p class="text-xs text-slate-500">
            💡 <strong>Mau hemat ongkos?</strong> Anda juga bebas mengantar perangkat langsung ke workshop kami di Minggir, Sleman (Ongkos Kunjungan Rp0, cukup buat janji via WhatsApp).
          </p>
        </div>

        <!-- Right: Animated Visual Radar Map (5 Cols) -->
        <div class="lg:col-span-5 bg-gradient-to-br from-[#063970] to-[#0A2647] rounded-2xl p-6 text-white text-center relative overflow-hidden shadow-md">
          
          <!-- Concentric Radar Circles (SVG) -->
          <div class="relative w-48 h-48 mx-auto my-3 flex items-center justify-center">
            
            <!-- Outer Ring (15km) -->
            <div class="absolute inset-0 rounded-full border border-white/20 animate-pulse"></div>
            <!-- Middle Ring (7km) -->
            <div class="absolute inset-6 rounded-full border border-white/30"></div>
            <!-- Inner Ring (3km) -->
            <div class="absolute inset-12 rounded-full border border-[#0D9BE4]/60 bg-[#0D9BE4]/10"></div>
            
            <!-- Radar Scanning Line Effect -->
            <div class="absolute inset-0 rounded-full overflow-hidden">
              <div class="w-1/2 h-1/2 origin-bottom-right bg-gradient-to-br from-transparent to-[#0D9BE4]/20 animate-spin" style="animation-duration: 5s;"></div>
            </div>

            <!-- Center Pin: TechCare Workshop Minggir -->
            <div class="relative z-10 flex flex-col items-center">
              <div class="w-4 h-4 rounded-full bg-emerald-400 border-2 border-white shadow-lg animate-ping"></div>
              <span class="text-[9px] font-mono font-bold text-emerald-300 mt-1 uppercase tracking-wider">Minggir</span>
            </div>

            <!-- Distance Label Pills on Radar -->
            <span class="absolute top-1 text-[9px] font-mono text-slate-300">Zona 3 (>7km)</span>
            <span class="absolute top-7 text-[9px] font-mono text-sky-300">Zona 2 (3-7km)</span>
            <span class="absolute top-13 text-[9px] font-mono text-emerald-300">Zona 1 (≤3km)</span>
          </div>

          <div class="pt-2">
            <span class="text-xs text-slate-300 block font-heading" x-text="'Tujuan Terpilih: ' + areas[selectedArea].name"></span>
            <span class="text-sm font-mono font-bold text-[#0D9BE4] block mt-0.5" x-text="'Ongkos: Rp' + currentFee.toLocaleString('id-ID') + ' • ETA ' + areas[selectedArea].eta"></span>
          </div>

          <div class="pt-4">
            <a :href="'https://wa.me/{{ $waClean }}?text=' + encodeURIComponent('Halo Mas Nur (TechCare), saya mau panggil home service ke ' + areas[selectedArea].name + ' (perkiraan ' + areas[selectedArea].km + ' km). Apakah ada jadwal kosong?')" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-[#0D9BE4] hover:bg-[#0c8ad0] text-white text-xs font-heading font-bold transition-colors shadow-sm">
              <span>Panggil Teknisi ke Lokasi Ini</span> &rarr;
            </a>
          </div>

        </div>

      </div>
    </div>

  </div>
</section>

<!-- ==========================================
     8. TANYA JAWAB ORANG AWAM (Practical FAQ)
========================================== -->
<section class="py-16 bg-white border-b border-slate-200">
  <div class="max-w-4xl mx-auto px-4 sm:px-6">
    
    <div class="text-center mb-10">
      <span class="text-xs font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Gak Paham Istilah Teknis?</span>
      <h2 class="text-2xl sm:text-3xl font-heading font-extrabold text-[#063970] mt-1">Pertanyaan yang Sering Ditanyakan</h2>
    </div>

    <div class="space-y-4">
      
      <div class="p-5 rounded-xl bg-slate-50 border border-slate-200">
        <h3 class="font-heading font-bold text-sm text-slate-900 mb-1.5">Saya orang awam dan tidak paham spesifikasi laptop saya. Gimana cara pesannya?</h3>
        <p class="text-xs text-slate-600 leading-relaxed">
          Tidak perlu bingung! Cukup ceritakan saja apa yang Anda rasakan sehari-hari. Misalnya: <em>"Mas, laptop saya kalau dipakai buka file Word loading-nya lama banget dan kipasnya bunyi kencang"</em>. Nanti teknisi kami yang akan membantu menganalisis kendala dan memberikan opsi perbaikan terbaik.
        </p>
      </div>

      <div class="p-5 rounded-xl bg-slate-50 border border-slate-200">
        <h3 class="font-heading font-bold text-sm text-slate-900 mb-1.5">Apakah data foto, tugas kuliah, atau dokumen kerja saya aman?</h3>
        <p class="text-xs text-slate-600 leading-relaxed">
          Sangat aman. Untuk tindakan yang memiliki risiko (seperti instal ulang sistem atau kloning partisi), kami selalu melakukan backup file penting Anda terlebih dahulu ke penyimpanan aman. Kami memegang prinsip etika privasi: tidak pernah membuka folder pribadi pelanggan.
        </p>
      </div>

      <div class="p-5 rounded-xl bg-slate-50 border border-slate-200">
        <h3 class="font-heading font-bold text-sm text-slate-900 mb-1.5">Bisa dikerjakan langsung di rumah saya (home service)?</h3>
        <p class="text-xs text-slate-600 leading-relaxed">
          Bisa! Sebagian besar layanan seperti optimasi laptop lemot, instal ulang Windows, pemasangan SSD, pembersihan debu, dan setting Wi-Fi bisa dikerjakan langsung di rumah atau kantor Anda. Anda bisa melihat proses pengerjaannya secara langsung.
        </p>
      </div>

      <div class="p-5 rounded-xl bg-slate-50 border border-slate-200">
        <h3 class="font-heading font-bold text-sm text-slate-900 mb-1.5">Bagaimana jika setelah diservis, masalah yang sama muncul lagi?</h3>
        <p class="text-xs text-slate-600 leading-relaxed">
          Semua layanan perbaikan TechCare dilindungi <strong>Garansi Jasa 7 Hari Kalender</strong>. Jika kendala yang sama berulang dalam masa garansi, kami akan melakukan perbaikan ulang tanpa biaya jasa tambahan.
        </p>
      </div>

      <div class="p-5 rounded-xl bg-slate-50 border border-slate-200">
        <h3 class="font-heading font-bold text-sm text-slate-900 mb-1.5">Metode pembayaran apa saja yang diterima?</h3>
        <p class="text-xs text-slate-600 leading-relaxed">
          Pembayaran dilakukan setelah perangkat selesai diservis dan diuji bersama. Kami menerima pembayaran <strong>Tunai (Cash)</strong>, transfer bank, serta pembayaran non-tunai via <strong>QRIS, GoPay, DANA, dan ShopeePay</strong> a.n. Nur Muhibbin.
        </p>
      </div>

    </div>

  </div>
</section>

<!-- ==========================================
     9. TESTIMONIALS (Only Rendered If Genuine Data Exists)
========================================== -->
@if ($testimonials->isNotEmpty())
<section class="py-16 bg-slate-50 border-b border-slate-200">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="text-center max-w-xl mx-auto mb-10">
      <span class="text-xs font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Ulasan Nyata Pelanggan</span>
      <h2 class="text-2xl sm:text-3xl font-heading font-extrabold text-[#063970] mt-1">Pengalaman Bersama TechCare</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @foreach ($testimonials as $t)
        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-2xs flex flex-col justify-between">
          <div class="space-y-3">
            <div class="flex items-center text-amber-400 font-mono text-sm">
              {{ str_repeat('★', $t->rating) }}
            </div>
            <p class="text-xs text-slate-700 italic leading-relaxed">
              "{{ $t->feedback }}"
            </p>
          </div>

          <div class="pt-4 mt-4 border-t border-slate-100 flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-[#063970] text-white font-bold text-xs flex items-center justify-center">
              {{ strtoupper(substr($t->customer_name, 0, 1)) }}
            </div>
            <div>
              <strong class="text-xs text-slate-900 block font-heading">{{ $t->customer_name }}</strong>
              <span class="text-[10px] text-slate-500 font-mono">{{ $t->customer_role ?? $t->device_type }}</span>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- ==========================================
     10. LARGE BLUE CTA BANNER WITH REPAIR PHOTO (DriveNest Style)
========================================== -->
<section class="py-12 bg-white">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="rounded-3xl bg-[#063970] text-white overflow-hidden shadow-xl grid grid-cols-1 lg:grid-cols-12 items-center">
      
      <!-- Text & Action (7 cols) -->
      <div class="p-8 sm:p-12 lg:col-span-7 space-y-4">
        <span class="inline-block px-3 py-1 rounded-full bg-white/10 text-[#0D9BE4] text-xs font-mono font-semibold uppercase tracking-wider">
          Konsultasi Mudah & Cepat
        </span>
        
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-heading font-extrabold tracking-tight leading-snug">
          Perangkat Anda Bermasalah? Konsultasikan Sekarang
        </h2>
        
        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed max-w-lg">
          Kirimkan foto atau video kendala laptop, komputer, atau koneksi Wi-Fi Anda. Teknisi Nur Muhibbin akan menganalisis penyebab dan memberikan estimasi waktu serta tarif secara transparan sebelum pengerjaan.
        </p>

        <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
          <a href="https://wa.me/{{ $waClean }}?text={{ rawurlencode('Halo Mas Nur (TechCare), saya ingin konsultasi mengenai kendala komputer/jaringan saya.') }}" 
             target="_blank" 
             rel="noopener noreferrer" 
             class="px-6 py-3.5 rounded-xl bg-[#0D9BE4] hover:bg-[#0c8ad0] text-white font-heading font-bold text-xs sm:text-sm text-center transition-colors shadow-md min-h-[44px]">
            Chat WhatsApp ({{ $waDisplay }})
          </a>
          <a href="{{ route('kalkulator') }}" 
             class="px-5 py-3.5 rounded-xl bg-white/10 hover:bg-white/20 text-white font-heading font-semibold text-xs sm:text-sm text-center transition-colors border border-white/20 min-h-[44px]">
            Simulasi Biaya di Kalkulator
          </a>
        </div>
      </div>

      <!-- Image (5 cols) -->
      <div class="lg:col-span-5 h-64 lg:h-full relative min-h-[280px]">
        <img src="{{ asset('images/consultation.jpg') }}" 
             alt="Diskusi konsultasi teknis pelanggan TechCare" 
             class="w-full h-full object-cover object-center" 
             loading="lazy" />
        <div class="absolute inset-0 bg-gradient-to-r from-[#063970] via-transparent to-transparent lg:block hidden"></div>
      </div>

    </div>
  </div>
</section>

<!-- ==========================================
     11. READY TO GET STARTED? (Direct Contact Strip)
========================================== -->
<section class="py-10 bg-slate-50 border-t border-slate-200">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
      
      <div class="md:col-span-4">
        <h3 class="text-base font-heading font-extrabold text-[#063970]">Siap Memperbaiki Perangkat Anda?</h3>
        <p class="text-xs text-slate-500 mt-0.5">Hubungi kami melalui saluran resmi TechCare.</p>
      </div>

      <div class="md:col-span-8 grid grid-cols-1 sm:grid-cols-3 gap-4">
        
        <!-- Contact 1: WhatsApp -->
        <a href="https://wa.me/{{ $waClean }}" target="_blank" rel="noopener noreferrer" class="p-3.5 rounded-xl bg-white border border-slate-200 hover:border-[#0D9BE4] transition-colors flex items-center gap-3">
          <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
          </div>
          <div>
            <span class="text-[10px] font-mono uppercase text-slate-400 block font-bold">WhatsApp Langsung</span>
            <span class="text-xs font-mono font-bold text-slate-900">{{ $waDisplay }}</span>
          </div>
        </a>

        <!-- Contact 2: Email -->
        <a href="mailto:{{ $settings['email'] ?? 'Ibinyo19@gmail.com' }}" class="p-3.5 rounded-xl bg-white border border-slate-200 hover:border-[#0D9BE4] transition-colors flex items-center gap-3">
          <div class="w-10 h-10 rounded-lg bg-[#063970]/10 text-[#063970] flex items-center justify-center shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
          </div>
          <div class="min-w-0">
            <span class="text-[10px] font-mono uppercase text-slate-400 block font-bold">Email Bisnis</span>
            <span class="text-xs font-medium text-slate-900 truncate block">{{ $settings['email'] ?? 'Ibinyo19@gmail.com' }}</span>
          </div>
        </a>

        <!-- Contact 3: Lokasi Maps -->
        @php $maps = $settings['maps_url'] ?? 'https://maps.app.goo.gl/bLgzixN3HGV4mmVz9'; @endphp
        <a href="{{ $maps }}" target="_blank" rel="noopener noreferrer" class="p-3.5 rounded-xl bg-white border border-slate-200 hover:border-[#0D9BE4] transition-colors flex items-center gap-3">
          <div class="w-10 h-10 rounded-lg bg-[#0D9BE4]/10 text-[#0D9BE4] flex items-center justify-center shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
          </div>
          <div>
            <span class="text-[10px] font-mono uppercase text-slate-400 block font-bold">Workshop / Drop-Off</span>
            <span class="text-xs font-semibold text-slate-900 block">Minggir, Sleman (Maps)</span>
          </div>
        </a>

      </div>

    </div>
  </div>
</section>

@endsection
