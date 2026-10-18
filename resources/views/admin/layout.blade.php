<!DOCTYPE html>
<html lang="id" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Dashboard') – TechCare Panel</title>
  <meta name="theme-color" content="#0B132B">

  <link rel="icon" type="image/png" href="{{ asset('images/techcare-logo.png') }}">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0B132B] text-slate-100 antialiased min-h-screen flex font-sans selection:bg-[#0D9BE4] selection:text-white" x-data="{ sidebarOpen: false, searchOpen: false }">

  <!-- Mobile Sidebar Backdrop -->
  <div x-show="sidebarOpen" 
       x-transition:enter="transition-opacity ease-linear duration-200"
       x-transition:enter-start="opacity-0"
       x-transition:enter-end="opacity-100"
       x-transition:leave="transition-opacity ease-linear duration-200"
       x-transition:leave-start="opacity-100"
       x-transition:leave-end="opacity-0"
       @click="sidebarOpen = false" 
       class="fixed inset-0 z-40 bg-black/70 backdrop-blur-xs md:hidden" 
       style="display: none;"></div>

  <!-- Left Sidebar (Inspired by Dark Modern Technical Dashboard) -->
  <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'"
         class="fixed inset-y-0 left-0 z-50 w-64 bg-[#0E1738] border-r border-[#1E2D5A] flex flex-col transition-transform duration-300 ease-in-out md:static md:translate-x-0 shrink-0">
    
    <!-- Sidebar Header / Logo -->
    <div class="h-16 px-5 border-b border-[#1E2D5A] flex items-center justify-between">
      <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
        <x-logo size="32" class="brightness-125" />
        <div>
          <span class="font-heading font-extrabold text-sm tracking-wide text-white block leading-none">TECHCARE</span>
          <span class="text-[9px] font-mono text-[#0D9BE4] tracking-widest uppercase">Admin Operations</span>
        </div>
      </a>
      <button @click="sidebarOpen = false" class="md:hidden text-slate-400 hover:text-white">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
      </button>
    </div>

    <!-- Navigation Menu Items -->
    <div class="flex-1 overflow-y-auto py-4 px-3 space-y-6 custom-scrollbar text-xs">
      
      <!-- Section: Ringkasan Utama -->
      <div>
        <span class="px-3 text-[10px] font-mono font-semibold tracking-wider text-slate-400 uppercase">Dashboard & Data</span>
        <div class="mt-2 space-y-1">
          <a href="{{ route('admin.dashboard') }}" 
             class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[#0D9BE4]/15 text-[#0D9BE4] border-l-2 border-[#0D9BE4] font-semibold' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            <span>Overview</span>
          </a>

          <a href="{{ route('admin.monitoring') }}" 
             class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium transition-all {{ request()->routeIs('admin.monitoring') ? 'bg-[#0D9BE4]/15 text-[#0D9BE4] border-l-2 border-[#0D9BE4] font-semibold' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
            <span>Monitoring & Trafik</span>
          </a>

          <a href="{{ route('admin.keuangan') }}" 
             class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium transition-all {{ request()->routeIs('admin.keuangan') ? 'bg-[#0D9BE4]/15 text-[#0D9BE4] border-l-2 border-[#0D9BE4] font-semibold' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>Keuangan (Bab VIII)</span>
          </a>
        </div>
      </div>

      <!-- Section: Operasional Servis -->
      <div>
        <span class="px-3 text-[10px] font-mono font-semibold tracking-wider text-slate-400 uppercase">Operasional Servis</span>
        <div class="mt-2 space-y-1">
          @php
            $newOrdersCount = \App\Models\Consultation::where('status', 'baru')->count();
          @endphp
          <a href="{{ route('admin.orders') }}" 
             class="flex items-center justify-between px-3 py-2.5 rounded-lg font-medium transition-all {{ request()->routeIs('admin.orders*') ? 'bg-[#0D9BE4]/15 text-[#0D9BE4] border-l-2 border-[#0D9BE4] font-semibold' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
            <div class="flex items-center gap-3">
              <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
              <span>Pesanan Masuk</span>
            </div>
            @if ($newOrdersCount > 0)
              <span class="px-1.5 py-0.5 rounded-full text-[10px] font-bold bg-amber-500 text-slate-950">{{ $newOrdersCount }}</span>
            @endif
          </a>

          <a href="{{ route('admin.services') }}" 
             class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium transition-all {{ request()->routeIs('admin.services*') ? 'bg-[#0D9BE4]/15 text-[#0D9BE4] border-l-2 border-[#0D9BE4] font-semibold' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            <span>Katalog 24 Layanan</span>
          </a>

          <a href="{{ route('admin.visit_fees') }}" 
             class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium transition-all {{ request()->routeIs('admin.visit_fees*') ? 'bg-[#0D9BE4]/15 text-[#0D9BE4] border-l-2 border-[#0D9BE4] font-semibold' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            <span>Ongkos Kunjungan</span>
          </a>
        </div>
      </div>

      <!-- Section: Konten & Audit -->
      <div>
        <span class="px-3 text-[10px] font-mono font-semibold tracking-wider text-slate-400 uppercase">Konten & Audit</span>
        <div class="mt-2 space-y-1">
          <a href="{{ route('admin.testimonials') }}" 
             class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium transition-all {{ request()->routeIs('admin.testimonials*') ? 'bg-[#0D9BE4]/15 text-[#0D9BE4] border-l-2 border-[#0D9BE4] font-semibold' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
            <span>Testimoni Klien</span>
          </a>

          <a href="{{ route('admin.activity_logs') }}" 
             class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium transition-all {{ request()->routeIs('admin.activity_logs*') ? 'bg-[#0D9BE4]/15 text-[#0D9BE4] border-l-2 border-[#0D9BE4] font-semibold' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>Log Aktivitas (Audit)</span>
          </a>

          <a href="{{ route('admin.settings') }}" 
             class="flex items-center gap-3 px-3 py-2.5 rounded-lg font-medium transition-all {{ request()->routeIs('admin.settings*') ? 'bg-[#0D9BE4]/15 text-[#0D9BE4] border-l-2 border-[#0D9BE4] font-semibold' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            <span>Pengaturan & Rekening</span>
          </a>
        </div>
      </div>

    </div>

    <!-- Sidebar Bottom: Status & External link -->
    <div class="p-3 border-t border-[#1E2D5A] bg-[#0A1128] space-y-2 text-xs">
      <a href="{{ route('home') }}" target="_blank" 
         class="flex items-center justify-between px-3 py-2 rounded-lg bg-white/5 hover:bg-white/10 text-slate-300 hover:text-white transition-colors border border-white/10">
        <span class="flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
          <span>Buka Website Publik</span>
        </span>
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
      </a>

      <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" 
                class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-rose-400 hover:text-rose-300 hover:bg-rose-500/10 transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
          <span>Keluar Sesi</span>
        </button>
      </form>
    </div>

  </aside>

  <!-- Main Content Wrapper -->
  <div class="flex-1 flex flex-col min-w-0 min-h-screen">

    <!-- Top Admin Header Bar -->
    <header class="h-16 bg-[#0E1738] border-b border-[#1E2D5A] px-4 sm:px-6 flex items-center justify-between sticky top-0 z-30">
      
      <!-- Left: Mobile Toggle & Page Title -->
      <div class="flex items-center gap-3">
        <button @click="sidebarOpen = true" class="md:hidden text-slate-300 hover:text-white p-1 rounded-md">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <div>
          <h2 class="text-sm font-semibold text-white">@yield('title', 'Admin Panel')</h2>
          <span class="text-[11px] font-mono text-slate-400 hidden sm:inline">TechCare Sleman / Yogyakarta</span>
        </div>
      </div>

      <!-- Right: Search & Profile Info -->
      <div class="flex items-center gap-4">
        
        <!-- Live WhatsApp Indicator Pill -->
        @php
          $wa = \App\Models\Setting::get('whatsapp_number', '6285641487430');
        @endphp
        <div class="hidden sm:flex items-center gap-2 px-2.5 py-1 rounded-full bg-[#131F3F] border border-[#1E2D5A] text-xs">
          <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
          <span class="text-slate-400 text-[11px]">WA Aktif:</span>
          <span class="font-mono text-[11px] text-white font-semibold">+{{ $wa }}</span>
        </div>

        <!-- Admin Profile Pill -->
        <div class="flex items-center gap-2.5 pl-3 border-l border-[#1E2D5A]">
          <div class="w-8 h-8 rounded-full bg-[#0D9BE4] text-white font-bold text-xs flex items-center justify-center shadow-xs">
            NM
          </div>
          <div class="hidden md:block text-left text-xs">
            <span class="text-slate-200 font-semibold block leading-tight">{{ auth()->user()->name }}</span>
            <span class="text-[10px] text-slate-400 block font-mono">Teknisi / SMKN 3</span>
          </div>
        </div>

      </div>
    </header>

    <!-- Notification Toasts -->
    @if (session('success'))
      <div class="bg-emerald-950/70 border-b border-emerald-500/50 px-6 py-3 text-emerald-200 text-xs flex items-center justify-between backdrop-blur-xs">
        <div class="flex items-center gap-2 font-medium">
          <span class="text-emerald-400 font-bold">✓</span>
          <span>{{ session('success') }}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-white">✕</button>
      </div>
    @endif

    @if (session('info'))
      <div class="bg-sky-950/70 border-b border-[#0D9BE4]/50 px-6 py-3 text-sky-200 text-xs flex items-center justify-between backdrop-blur-xs">
        <div class="flex items-center gap-2 font-medium">
          <span class="text-[#0D9BE4] font-bold">ℹ</span>
          <span>{{ session('info') }}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-[#0D9BE4] hover:text-white">✕</button>
      </div>
    @endif

    @if ($errors->any())
      <div class="bg-rose-950/70 border-b border-rose-500/50 px-6 py-3 text-rose-200 text-xs flex items-center justify-between backdrop-blur-xs">
        <div class="font-medium">
          <span class="text-rose-400 font-bold mr-1">⚠️ Terjadi Kesalahan:</span>
          <ul class="inline-block list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li class="inline mr-2">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        <button onclick="this.parentElement.remove()" class="text-rose-400 hover:text-white">✕</button>
      </div>
    @endif

    <!-- Main Content Body -->
    <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
      @yield('content')
    </main>

    <!-- Footer -->
    <footer class="h-12 border-t border-[#1E2D5A] bg-[#0E1738] px-6 flex items-center justify-between text-[11px] text-slate-400 font-mono">
      <span>TechCare IT Support Panel • Minggir, Sleman</span>
      <span>Laravel 12 • SQLite Active</span>
    </footer>

  </div>

  @stack('scripts')
</body>
</html>
