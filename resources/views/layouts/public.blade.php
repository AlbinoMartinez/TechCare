<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title>@yield('title', 'TechCare – Jasa IT Support, Maintenance Komputer, dan Jaringan di Minggir, Sleman')</title>
  <meta name="description" content="@yield('meta_description', 'Jasa IT support perorangan di Minggir, Sleman, Yogyakarta oleh Nur Muhibbin. Servis komputer/laptop, troubleshooting Wi-Fi, setting router, Linux, dan keamanan dasar. Biaya transparan, garansi 7 hari.')">
  <meta name="keywords" content="IT Support Minggir Sleman, servis laptop Sleman, maintenance komputer Jogja, setting Wi-Fi router, teknisi TKJ Yogyakarta, instal ulang Windows Linux">
  <meta name="author" content="Nur Muhibbin - TechCare">
  <meta name="theme-color" content="#0B3A75">

  <!-- Open Graph / Meta Sosial -->
  <meta property="og:title" content="@yield('title', 'TechCare – Jasa IT Support, Maintenance Komputer, dan Jaringan')">
  <meta property="og:description" content="@yield('meta_description', 'Layanan IT support terjangkau, transparan, dan aman untuk pelajar, guru, mahasiswa, UMKM, dan warga Minggir, Sleman, Yogyakarta.')">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('images/techcare-logo.png') }}">
  <meta property="og:locale" content="id_ID">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('images/techcare-logo.png') }}">

  <!-- Preconnect & Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- JSON-LD LocalBusiness Structured Data -->
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@@type": "LocalBusiness",
    "name": "TechCare",
    "description": "Jasa IT Support, Maintenance Komputer, dan Jaringan perorangan oleh Nur Muhibbin",
    "founder": {
      "@@type": "Person",
      "name": "Nur Muhibbin",
      "alumniOf": "SMKN 3 Yogyakarta (Teknik Komputer dan Jaringan)"
    },
    "address": {
      "@@type": "PostalAddress",
      "addressLocality": "Minggir",
      "addressRegion": "Sleman, D.I. Yogyakarta",
      "addressCountry": "ID"
    },
    "areaServed": {
      "@@type": "AdministrativeArea",
      "name": "Yogyakarta dan sekitarnya"
    },
    "telephone": "+6285641487430",
    "email": "Ibinyo19@gmail.com",
    "priceRange": "Rp10.000 - Rp150.000",
    "openingHoursSpecification": [
      {
        "@@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
        "opens": "16:00",
        "closes": "20:00"
      },
      {
        "@@type": "OpeningHoursSpecification",
        "dayOfWeek": "Saturday",
        "opens": "09:00",
        "closes": "17:00"
      }
    ]
  }
  </script>

  @stack('styles')
</head>
<body class="bg-[#FAF9F6] text-[#1A202C] antialiased min-h-screen flex flex-col font-sans selection:bg-[#1E9BE8] selection:text-white" x-data="{ mobileMenuOpen: false }">

  <!-- Top Announcement Bar (Kontak & Jam Operasional Nyata) -->
  <div class="bg-[#07254C] text-slate-200 text-xs py-2 px-4 border-b border-white/10">
    <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2 text-center sm:text-left">
      <div class="flex items-center gap-2 flex-wrap justify-center sm:justify-start">
        <span class="inline-block w-2 h-2 rounded-full bg-[#1E9BE8]"></span>
        <span>Minggir, Sleman, Yogyakarta</span>
        <span class="text-slate-400 hidden md:inline">•</span>
        <span class="hidden md:inline text-slate-300">Home service tersedia di Yogyakarta dan sekitarnya</span>
      </div>
      <div class="flex items-center gap-4 text-slate-300">
        <span class="text-[11px]">Senin–Jumat 16.00–20.00 WIB | Sabtu 09.00–17.00 WIB</span>
        @auth
          <a href="{{ route('admin.dashboard') }}" class="text-[#1E9BE8] hover:underline font-semibold text-xs ml-2">Panel Admin</a>
        @endauth
      </div>
    </div>
  </div>

  <!-- Main Navigation Header -->
  <header class="sticky top-0 z-40 bg-white border-b border-[#E2DFD7] shadow-xs">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
      <div class="flex items-center justify-between h-18">
        
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-3 focus:outline-hidden focus:ring-2 focus:ring-[#1E9BE8] rounded-md p-1" aria-label="Beranda TechCare">
          <x-logo size="42" class="shrink-0" />
        </a>

        <!-- Desktop Navigation (Multi-Page) -->
        <nav class="hidden md:flex items-center space-x-1" aria-label="Navigasi Utama">
          <x-nav-link route="home" label="Beranda" />
          <x-nav-link route="layanan" label="Layanan & Harga" />
          <x-nav-link route="kalkulator" label="Kalkulator Estimasi" />
          <x-nav-link route="alur" label="Alur Layanan" />
          <x-nav-link route="kebijakan" label="Data & Garansi" />
          <x-nav-link route="kontak" label="FAQ & Kontak" />
        </nav>

        <!-- CTA WhatsApp Button (Desktop) -->
        <div class="hidden md:flex items-center">
          <a href="https://wa.me/6285641487430?text={{ rawurlencode('Halo TechCare, saya ingin konsultasi mengenai kendala komputer/jaringan.') }}" 
             target="_blank" 
             rel="noopener noreferrer" 
             class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-[#0B3A75] hover:bg-[#07254C] text-white text-xs font-bold transition-colors focus:ring-2 focus:ring-[#1E9BE8] focus:outline-hidden min-h-[44px]">
            <svg class="w-4 h-4 fill-current text-[#1E9BE8]" viewBox="0 0 24 24" aria-hidden="true"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
            <span>Chat WhatsApp</span>
          </a>
        </div>

        <!-- Mobile Menu Toggle Button (Min 44x44px Touch Target) -->
        <button type="button" 
                @click="mobileMenuOpen = !mobileMenuOpen" 
                class="md:hidden inline-flex items-center justify-center p-2.5 rounded-lg text-slate-700 hover:text-[#0B3A75] hover:bg-slate-100 min-w-[44px] min-h-[44px] focus:outline-hidden focus:ring-2 focus:ring-[#1E9BE8]" 
                aria-label="Buka menu navigasi" 
                :aria-expanded="mobileMenuOpen.toString()">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileMenuOpen">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="mobileMenuOpen" x-cloak>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Mobile Navigation Drawer -->
      <nav class="md:hidden border-t border-[#E2DFD7] py-3 space-y-1" x-show="mobileMenuOpen" x-cloak>
        <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-md text-sm font-semibold {{ request()->routeIs('home') ? 'bg-[#F0F7FD] text-[#0B3A75] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">Beranda</a>
        <a href="{{ route('layanan') }}" class="block px-3 py-2.5 rounded-md text-sm font-semibold {{ request()->routeIs('layanan') ? 'bg-[#F0F7FD] text-[#0B3A75] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">Layanan & Harga</a>
        <a href="{{ route('kalkulator') }}" class="block px-3 py-2.5 rounded-md text-sm font-semibold {{ request()->routeIs('kalkulator') ? 'bg-[#F0F7FD] text-[#0B3A75] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">Kalkulator Estimasi</a>
        <a href="{{ route('alur') }}" class="block px-3 py-2.5 rounded-md text-sm font-semibold {{ request()->routeIs('alur') ? 'bg-[#F0F7FD] text-[#0B3A75] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">Alur Layanan</a>
        <a href="{{ route('kebijakan') }}" class="block px-3 py-2.5 rounded-md text-sm font-semibold {{ request()->routeIs('kebijakan') ? 'bg-[#F0F7FD] text-[#0B3A75] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">Data & Garansi</a>
        <a href="{{ route('kontak') }}" class="block px-3 py-2.5 rounded-md text-sm font-semibold {{ request()->routeIs('kontak') ? 'bg-[#F0F7FD] text-[#0B3A75] font-bold' : 'text-slate-700 hover:bg-slate-50' }}">FAQ & Kontak</a>
        
        <div class="pt-2">
          <a href="https://wa.me/6285641487430?text={{ rawurlencode('Halo TechCare, saya ingin konsultasi mengenai kendala komputer/jaringan.') }}" 
             target="_blank" 
             rel="noopener noreferrer" 
             class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 rounded-lg bg-[#0B3A75] text-white text-sm font-bold min-h-[44px]">
            <span>Hubungi via WhatsApp (085641487430)</span>
          </a>
        </div>
      </nav>
    </div>
  </header>

  <!-- Flash Messages -->
  @if (session('success'))
    <div class="bg-emerald-50 border-b border-emerald-200 text-emerald-900 text-sm py-3 px-4" role="alert">
      <div class="max-w-6xl mx-auto flex items-center justify-between">
        <div class="flex items-center gap-2">
          <svg class="w-5 h-5 text-emerald-700 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          <span>{{ session('success') }}</span>
        </div>
        <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-emerald-700 hover:text-emerald-900 font-bold p-1 min-h-[44px] min-w-[44px] flex items-center justify-center" aria-label="Tutup pesan">✕</button>
      </div>
    </div>
  @endif

  <!-- Main Content Area -->
  <main class="flex-grow">
    @yield('content')
  </main>

  <!-- Floating WhatsApp Quick Button (Accessible, Mobile-First) -->
  <div class="fixed bottom-5 right-5 z-40">
    <a href="https://wa.me/6285641487430?text={{ rawurlencode('Halo TechCare, saya ingin konsultasi mengenai kendala komputer/jaringan.') }}" 
       target="_blank" 
       rel="noopener noreferrer" 
       class="inline-flex items-center gap-2.5 px-4 py-3 rounded-full bg-[#0B3A75] hover:bg-[#07254C] text-white shadow-md border border-white/20 transition-transform hover:-translate-y-0.5 focus:ring-2 focus:ring-[#1E9BE8] focus:outline-hidden min-h-[48px]" 
       aria-label="Konsultasi langsung lewat WhatsApp ke 085641487430">
      <svg class="w-5 h-5 fill-current text-[#1E9BE8]" viewBox="0 0 24 24" aria-hidden="true"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
      <span class="text-xs font-bold font-heading">Konsultasi WA</span>
    </a>
  </div>

  <!-- Footer (Clean, Transparent, No False Claims) -->
  <footer class="bg-[#0B3A75] text-white pt-12 pb-10 border-t border-slate-700 mt-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-8 pb-8 border-b border-white/10 text-sm">
        
        <!-- Kolom 1: Profil Usaha -->
        <div class="md:col-span-4 space-y-3">
          <div class="flex items-center gap-3">
            <x-logo size="36" class="brightness-110" />
          </div>
          <p class="text-slate-300 text-xs leading-relaxed">
            Usaha jasa IT support, maintenance komputer, dan jaringan perorangan di Minggir, Sleman, Yogyakarta oleh Nur Muhibbin (TKJ SMKN 3 Yogyakarta).
          </p>
          <div class="text-xs text-slate-300 space-y-1 pt-1">
            <p><strong class="text-white">Alamat:</strong> Minggir, Sleman, Yogyakarta</p>
            <p><strong class="text-white">Area Layanan:</strong> Yogyakarta dan sekitarnya</p>
            <p><strong class="text-white">WhatsApp:</strong> <a href="https://wa.me/6285641487430" target="_blank" rel="noopener noreferrer" class="text-[#1E9BE8] hover:underline font-mono">085641487430</a></p>
            <p><strong class="text-white">Email:</strong> <a href="mailto:Ibinyo19@gmail.com" class="text-[#1E9BE8] hover:underline">Ibinyo19@gmail.com</a></p>
          </div>
        </div>

        <!-- Kolom 2: Halaman & Layanan -->
        <div class="md:col-span-3 space-y-2">
          <h3 class="font-heading font-bold text-white text-xs uppercase tracking-wider mb-2">Halaman Website</h3>
          <ul class="space-y-1.5 text-xs text-slate-300">
            <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a></li>
            <li><a href="{{ route('layanan') }}" class="hover:text-white transition-colors">Daftar Layanan & Harga (24 Jasa)</a></li>
            <li><a href="{{ route('kalkulator') }}" class="hover:text-white transition-colors">Kalkulator Estimasi Biaya</a></li>
            <li><a href="{{ route('alur') }}" class="hover:text-white transition-colors">Alur 10 Tahap Pengerjaan</a></li>
            <li><a href="{{ route('kebijakan') }}" class="hover:text-white transition-colors">Kebijakan Data, Garansi & Batasan</a></li>
            <li><a href="{{ route('kontak') }}" class="hover:text-white transition-colors">Form Pemesanan & Tanya Jawab</a></li>
          </ul>
        </div>

        <!-- Kolom 3: Prinsip & Garansi -->
        <div class="md:col-span-3 space-y-2">
          <h3 class="font-heading font-bold text-white text-xs uppercase tracking-wider mb-2">Komitmen Kerja</h3>
          <ul class="space-y-1.5 text-xs text-slate-300">
            <li class="flex items-start gap-1.5">
              <span class="text-[#1E9BE8] font-bold">✓</span>
              <span>Estimasi biaya disampaikan & disetujui di awal.</span>
            </li>
            <li class="flex items-start gap-1.5">
              <span class="text-[#1E9BE8] font-bold">✓</span>
              <span>Data pribadi tidak dibuka/disalin tanpa izin.</span>
            </li>
            <li class="flex items-start gap-1.5">
              <span class="text-[#1E9BE8] font-bold">✓</span>
              <span>Tanpa software bajakan atau crack ilegal.</span>
            </li>
            <li class="flex items-start gap-1.5">
              <span class="text-[#1E9BE8] font-bold">✓</span>
              <span>Garansi jasa 7 hari kalender.</span>
            </li>
          </ul>
        </div>

        <!-- Kolom 4: Jam Operasional & Admin -->
        <div class="md:col-span-2 space-y-2">
          <h3 class="font-heading font-bold text-white text-xs uppercase tracking-wider mb-2">Jam Buka</h3>
          <div class="text-xs text-slate-300 space-y-1">
            <p><span class="text-white block font-semibold">Senin – Jumat:</span> 16.00 – 20.00 WIB</p>
            <p><span class="text-white block font-semibold">Sabtu:</span> 09.00 – 17.00 WIB</p>
            <p><span class="text-white block font-semibold">Minggu:</span> Dengan janji</p>
          </div>
          <div class="pt-3">
            <a href="{{ route('admin.login') }}" class="inline-flex items-center gap-1.5 text-[11px] text-slate-300 hover:text-white bg-white/10 px-2.5 py-1.5 rounded-md hover:bg-white/20 transition-colors">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
              <span>Login Admin</span>
            </a>
          </div>
        </div>

      </div>

      <!-- Bottom Bar -->
      <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-400">
        <p>&copy; {{ date('Y') }} <strong>TechCare</strong> — Nur Muhibbin. Minggir, Sleman, Yogyakarta.</p>
        <p class="text-slate-400">Website resmi usaha jasa IT support perorangan.</p>
      </div>
    </div>
  </footer>

  @stack('scripts')
</body>
</html>
