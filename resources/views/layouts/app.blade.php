<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>@yield('title', 'TechCare – Jasa IT Support, Maintenance Komputer, dan Jaringan')</title>
  <meta name="description" content="@yield('meta_description', 'Jasa IT support profesional, terjangkau, dan transparan di Yogyakarta oleh Nur Muhibbin (TKJ SMKN 3 Yogyakarta). Servis komputer, laptop, Wi-Fi, dan jaringan.')">
  <meta name="keywords" content="IT Support Yogyakarta, Servis Komputer Sleman, Servis Laptop Jogja, Setting Router Wi-Fi, Dual Boot Linux, Teknisi Komputer Panggilan">
  <meta name="author" content="Nur Muhibbin - TechCare">
  <meta name="theme-color" content="#1F3A5F">

  <!-- Open Graph -->
  <meta property="og:title" content="TechCare – IT Support yang Jelas, Aman, dan Terjangkau">
  <meta property="og:description" content="Bantu atasi masalah komputer, laptop, Wi-Fi, dan jaringan tanpa proses yang ribet. Garansi jasa 7 hari.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">

  <!-- Favicon SVG -->
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'><path d='M32 4 L56 14 L56 34 C56 47 44 56 32 60 C20 56 8 47 8 34 L8 14 Z' fill='%231F3A5F'/><rect x='18' y='21' width='28' height='18' rx='2' fill='%232A9D8F'/><circle cx='42' cy='38' r='7' fill='%23F4A261'/></svg>">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col selection:bg-[#2A9D8F] selection:text-white">

  <!-- Top Announcement Bar -->
  <div class="bg-[#142640] text-white/90 text-xs py-2 px-4 border-b border-white/10">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
      <div class="flex items-center gap-3">
        <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-[#2A9D8F]/20 text-[#3AB5A5] font-semibold text-[11px]">
          <span class="w-1.5 h-1.5 rounded-full bg-[#2A9D8F] animate-pulse"></span>
          Home Service Aktif
        </span>
        <span class="text-slate-300">Wilayah Layanan: <strong class="text-white">{{ $settings['service_area'] ?? 'Yogyakarta & Sekitarnya' }}</strong></span>
      </div>
      <div class="flex items-center gap-4 text-slate-300">
        <span class="hidden md:inline">🕒 {{ $settings['operational_hours'] ?? 'Senin – Sabtu, 08.00 – 20.00 WIB' }}</span>
        @auth
          <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-1 text-[#F4A261] hover:underline font-semibold">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Panel Admin
          </a>
        @else
          <a href="{{ route('admin.login') }}" class="text-slate-400 hover:text-white flex items-center gap-1 text-[11px]" title="Login Admin Teknisi">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            Admin
          </a>
        @endauth
      </div>
    </div>
  </div>

  <!-- Main Navigation Header -->
  <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs transition-all" id="mainHeader">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-20">
        
        <!-- Logo & Brand -->
        <a href="{{ route('home') }}" class="flex items-center gap-3 group focus:outline-hidden">
          <x-logo size="44" class="group-hover:scale-105 transition-transform" />
          <div>
            <div class="font-heading font-extrabold text-2xl text-[#1F3A5F] tracking-tight flex items-center gap-1.5">
              TECHCARE
              <span class="text-xs px-2 py-0.5 rounded-sm bg-[#2A9D8F]/10 text-[#2A9D8F] font-bold tracking-normal uppercase hidden sm:inline-block">IT Support</span>
            </div>
            <p class="text-[11px] text-slate-500 font-medium hidden sm:block leading-tight">Jasa IT Support, Maintenance & Jaringan</p>
          </div>
        </a>

        <!-- Desktop Navigation Links -->
        <nav class="hidden lg:flex items-center gap-7 text-sm font-medium text-slate-700">
          <a href="#layanan" class="hover:text-[#2A9D8F] transition-colors py-1">Layanan</a>
          <a href="#harga" class="hover:text-[#2A9D8F] transition-colors py-1">Harga & Tarif</a>
          <a href="#cara-kerja" class="hover:text-[#2A9D8F] transition-colors py-1">Cara Kerja</a>
          <a href="#mengapa" class="hover:text-[#2A9D8F] transition-colors py-1">Mengapa Kami</a>
          <a href="#keamanan" class="hover:text-[#2A9D8F] transition-colors py-1">Keamanan Data</a>
          <a href="#garansi" class="hover:text-[#2A9D8F] transition-colors py-1">Garansi</a>
          <a href="#tentang" class="hover:text-[#2A9D8F] transition-colors py-1">Tentang</a>
          <a href="#faq" class="hover:text-[#2A9D8F] transition-colors py-1">FAQ</a>
        </nav>

        <!-- CTA Action Buttons -->
        <div class="hidden sm:flex items-center gap-3">
          @php
            $cleanWa = preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6281234567890');
          @endphp
          <a href="#booking" class="px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:text-[#1F3A5F] hover:border-[#1F3A5F] text-sm font-semibold transition-all shadow-xs">
            Form Booking
          </a>
          <a href="https://wa.me/{{ $cleanWa }}?text={{ rawurlencode('Halo TechCare, saya ingin konsultasi mengenai kendala komputer/jaringan.') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#F4A261] hover:bg-[#e78e47] text-white text-sm font-semibold shadow-sm hover:shadow-md transition-all transform hover:-translate-y-0.5">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
            <span>Konsultasi WA</span>
          </a>
        </div>

        <!-- Mobile Menu Hamburger Button -->
        <button type="button" id="mobileMenuBtn" class="lg:hidden p-2.5 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors" aria-label="Toggle Mobile Menu">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
        </button>
      </div>

      <!-- Mobile Dropdown Navigation -->
      <div id="mobileMenu" class="hidden lg:hidden border-t border-slate-200 py-4 px-2 space-y-2 bg-white">
        <a href="#layanan" class="mobile-link block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50 font-medium">Layanan</a>
        <a href="#harga" class="mobile-link block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50 font-medium">Harga & Tarif</a>
        <a href="#cara-kerja" class="mobile-link block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50 font-medium">Cara Kerja</a>
        <a href="#mengapa" class="mobile-link block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50 font-medium">Mengapa Kami</a>
        <a href="#keamanan" class="mobile-link block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50 font-medium">Keamanan Data</a>
        <a href="#garansi" class="mobile-link block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50 font-medium">Garansi</a>
        <a href="#tentang" class="mobile-link block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50 font-medium">Tentang Nur Muhibbin</a>
        <a href="#faq" class="mobile-link block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50 font-medium">FAQ</a>
        <a href="#booking" class="mobile-link block px-3 py-2 rounded-lg bg-[#2A9D8F]/10 text-[#2A9D8F] font-semibold">Formulir Booking</a>
        
        <div class="pt-3 border-t border-slate-100 flex flex-col gap-2">
          <a href="https://wa.me/{{ $cleanWa }}?text={{ rawurlencode('Halo TechCare, saya ingin konsultasi mengenai kendala komputer/jaringan.') }}" target="_blank" rel="noopener noreferrer" class="w-full text-center py-3 rounded-xl bg-[#F4A261] text-white font-semibold text-sm shadow-xs flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
            Konsultasi WhatsApp Sekarang
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- Flash Messages -->
  @if (session('success'))
    <div class="bg-emerald-50 border-b border-emerald-200 px-4 py-3 text-emerald-800 text-sm">
      <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center gap-2">
          <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          <span>{{ session('success') }}</span>
        </div>
        <button onclick="this.parentElement.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">✕</button>
      </div>
    </div>
  @endif

  <!-- Content Slot -->
  <main class="flex-grow">
    @yield('content')
  </main>

  <!-- Floating WhatsApp CTA Button -->
  <div class="fixed bottom-6 right-6 z-50">
    <a href="https://wa.me/{{ $cleanWa }}?text={{ rawurlencode('Halo TechCare, saya ingin konsultasi mengenai kendala komputer/jaringan.') }}" target="_blank" rel="noopener noreferrer" class="group relative flex items-center gap-3 bg-[#25D366] hover:bg-[#20ba59] text-white px-4 py-3 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:scale-105" title="Hubungi TechCare via WhatsApp">
      <span class="absolute -top-1 -right-1 flex h-3.5 w-3.5">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-emerald-500"></span>
      </span>
      <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
      <span class="font-semibold text-sm pr-1 hidden sm:inline">Tanya Teknisi</span>
    </a>
  </div>

  <!-- Professional Footer -->
  <footer class="bg-[#1F3A5F] text-white pt-16 pb-12 border-t border-slate-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-white/10">
        
        <!-- Col 1: Brand & Positioning -->
        <div class="space-y-4">
          <div class="flex items-center gap-3">
            <x-logo size="40" />
            <div>
              <span class="font-heading font-extrabold text-xl text-white tracking-tight">TECHCARE</span>
              <p class="text-xs text-[#2A9D8F] font-semibold">{{ $settings['tagline'] ?? 'Jasa IT Support, Maintenance Komputer, dan Jaringan' }}</p>
            </div>
          </div>
          <p class="text-slate-300 text-sm leading-relaxed">
            Jasa IT support yang terjangkau, transparan, dan mudah dijangkau oleh pelajar, UMKM, dan masyarakat sekitar di Yogyakarta.
          </p>
          <div class="pt-2">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/10 text-xs text-slate-300">
              <svg class="w-3.5 h-3.5 text-[#2A9D8F]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
              Garansi Jasa 7 Hari
            </span>
          </div>
        </div>

        <!-- Col 2: Navigasi Cepat -->
        <div>
          <h3 class="font-heading font-semibold text-white text-sm uppercase tracking-wider mb-4">Navigasi Layanan</h3>
          <ul class="space-y-2 text-sm text-slate-300">
            <li><a href="#layanan" class="hover:text-[#2A9D8F] transition-colors">Servis Komputer & Laptop</a></li>
            <li><a href="#layanan" class="hover:text-[#2A9D8F] transition-colors">Setting Router & Troubleshooting Wi-Fi</a></li>
            <li><a href="#layanan" class="hover:text-[#2A9D8F] transition-colors">Instalasi Linux & Dual Boot</a></li>
            <li><a href="#layanan" class="hover:text-[#2A9D8F] transition-colors">Paket Keamanan & Edukasi Password</a></li>
            <li><a href="#harga" class="hover:text-[#2A9D8F] transition-colors">Kalkulator Biaya & Home Service</a></li>
            <li><a href="#cara-kerja" class="hover:text-[#2A9D8F] transition-colors">Alur 9 Langkah Pengerjaan</a></li>
          </ul>
        </div>

        <!-- Col 3: Komitmen & Privasi -->
        <div>
          <h3 class="font-heading font-semibold text-white text-sm uppercase tracking-wider mb-4">Integritas & Keamanan</h3>
          <ul class="space-y-2.5 text-sm text-slate-300">
            <li class="flex items-start gap-2">
              <span class="text-[#2A9D8F] mt-0.5">✓</span>
              <span>Estimasi biaya selalu di awal sebelum pengerjaan.</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-[#2A9D8F] mt-0.5">✓</span>
              <span>Data pribadi tidak dibuka/disalin tanpa izin.</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-[#2A9D8F] mt-0.5">✓</span>
              <span>Software legal, gratis & open source diutamakan.</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-[#2A9D8F] mt-0.5">✓</span>
              <span>Pekerjaan hanya dimulai setelah disetujui pelanggan.</span>
            </li>
          </ul>
        </div>

        <!-- Col 4: Kontak & Operasional -->
        <div>
          <h3 class="font-heading font-semibold text-white text-sm uppercase tracking-wider mb-4">Kontak & Lokasi</h3>
          <div class="space-y-3 text-sm text-slate-300">
            <p class="flex items-start gap-2">
              <svg class="w-4 h-4 text-[#2A9D8F] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
              <span>{{ $settings['service_area'] ?? 'Yogyakarta & Sekitarnya' }}</span>
            </p>
            <p class="flex items-start gap-2">
              <svg class="w-4 h-4 text-[#2A9D8F] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              <span>{{ $settings['operational_hours'] ?? 'Senin – Sabtu: 08.00 – 20.00 WIB' }}</span>
            </p>
            <p class="flex items-start gap-2">
              <svg class="w-4 h-4 text-[#F4A261] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
              <span>WA: <strong class="text-white">{{ $settings['whatsapp_display'] ?? '0812-3456-7890' }}</strong></span>
            </p>
            <div class="pt-2">
              <a href="{{ route('admin.login') }}" class="inline-flex items-center gap-1.5 text-xs text-slate-400 hover:text-white transition-colors bg-white/5 hover:bg-white/10 px-3 py-1.5 rounded-lg border border-white/10">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                Portal Admin & Pengaturan
              </a>
            </div>
          </div>
        </div>

      </div>

      <!-- Bottom Bar -->
      <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400">
        <p>&copy; {{ date('Y') }} <strong>TechCare</strong> by <strong>{{ $settings['founder_name'] ?? 'Nur Muhibbin' }}</strong> ({{ $settings['founder_background'] ?? 'Teknik Komputer dan Jaringan SMKN 3 Yogyakarta' }}). Hak cipta dilindungi.</p>
        <p class="text-slate-400">Website Bisnis IT Support Profesional • Ditenagai Laravel</p>
      </div>
    </div>
  </footer>

  <script>
    // Mobile Menu Toggle
    const mobileBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    if (mobileBtn && mobileMenu) {
      mobileBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
      });
      document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', () => {
          mobileMenu.classList.add('hidden');
        });
      });
    }
  </script>

  @stack('scripts')
</body>
</html>
