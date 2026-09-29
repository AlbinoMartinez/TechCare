<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Dashboard') – TechCare</title>
  <meta name="theme-color" content="#0B3A75">

  <link rel="icon" type="image/png" href="{{ asset('images/techcare-logo.png') }}">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-screen flex flex-col font-sans">

  <!-- Top Admin Navbar -->
  <nav class="bg-[#0B3A75] text-white border-b border-slate-700 sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        
        <!-- Left: Logo & Admin Title -->
        <div class="flex items-center gap-3">
          <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
            <x-logo size="32" class="brightness-110" />
            <span class="font-heading font-extrabold text-base tracking-tight text-white">TECHCARE <span class="text-[10px] px-2 py-0.5 rounded-sm bg-[#1E9BE8] font-bold text-white uppercase ml-1">Admin</span></span>
          </a>
        </div>

        <!-- Center: Navigation Links -->
        <div class="hidden md:flex items-center gap-1 text-xs font-semibold">
          <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded-md transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 text-white font-bold' : 'text-slate-200 hover:text-white hover:bg-white/10' }}">
            Dashboard
          </a>
          <a href="{{ route('admin.orders') }}" class="px-3 py-2 rounded-md transition-colors {{ request()->routeIs('admin.orders*') ? 'bg-white/20 text-white font-bold' : 'text-slate-200 hover:text-white hover:bg-white/10' }}">
            Pesanan Masuk
          </a>
          <a href="{{ route('admin.services') }}" class="px-3 py-2 rounded-md transition-colors {{ request()->routeIs('admin.services*') ? 'bg-white/20 text-white font-bold' : 'text-slate-200 hover:text-white hover:bg-white/10' }}">
            Katalog Layanan
          </a>
          <a href="{{ route('admin.keuangan') }}" class="px-3 py-2 rounded-md transition-colors {{ request()->routeIs('admin.keuangan') ? 'bg-white/20 text-white font-bold' : 'text-slate-200 hover:text-white hover:bg-white/10' }}">
            Data Keuangan (Bab VIII)
          </a>
          <a href="{{ route('admin.settings') }}" class="px-3 py-2 rounded-md transition-colors {{ request()->routeIs('admin.settings') ? 'bg-white/20 text-white font-bold' : 'text-slate-200 hover:text-white hover:bg-white/10' }}">
            Pengaturan & WhatsApp
          </a>
        </div>

        <!-- Right: Actions & User -->
        <div class="flex items-center gap-3">
          <a href="{{ route('home') }}" target="_blank" class="text-xs font-semibold text-[#1E9BE8] hover:text-white flex items-center gap-1 px-3 py-1.5 rounded bg-white/5 hover:bg-white/10 border border-white/15 transition-colors">
            <span>Lihat Website</span>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
          </a>

          <form action="{{ route('admin.logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="text-xs font-semibold text-rose-300 hover:text-white px-3 py-1.5 rounded hover:bg-rose-500/20 transition-colors">
              Keluar
            </button>
          </form>
        </div>

      </div>

      <!-- Mobile Navigation sub-bar -->
      <div class="md:hidden flex items-center py-2 border-t border-white/10 text-xs overflow-x-auto gap-2">
        <a href="{{ route('admin.dashboard') }}" class="px-2.5 py-1 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 text-white font-bold' : 'text-slate-300' }}">Dashboard</a>
        <a href="{{ route('admin.orders') }}" class="px-2.5 py-1 rounded {{ request()->routeIs('admin.orders*') ? 'bg-white/20 text-white font-bold' : 'text-slate-300' }}">Pesanan</a>
        <a href="{{ route('admin.services') }}" class="px-2.5 py-1 rounded {{ request()->routeIs('admin.services*') ? 'bg-white/20 text-white font-bold' : 'text-slate-300' }}">Layanan</a>
        <a href="{{ route('admin.keuangan') }}" class="px-2.5 py-1 rounded {{ request()->routeIs('admin.keuangan') ? 'bg-white/20 text-white font-bold' : 'text-slate-300' }}">Keuangan</a>
        <a href="{{ route('admin.settings') }}" class="px-2.5 py-1 rounded {{ request()->routeIs('admin.settings') ? 'bg-white/20 text-white font-bold' : 'text-slate-300' }}">Pengaturan</a>
      </div>
    </div>
  </nav>

  <!-- Alerts -->
  @if (session('success'))
    <div class="bg-emerald-50 border-b border-emerald-200 px-4 py-3 text-emerald-800 text-xs font-semibold">
      <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center gap-2">
          <span>✓</span>
          <span>{{ session('success') }}</span>
        </div>
        <button onclick="this.parentElement.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700">✕</button>
      </div>
    </div>
  @endif

  @if (session('info'))
    <div class="bg-blue-50 border-b border-blue-200 px-4 py-3 text-blue-800 text-xs font-semibold">
      <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center gap-2">
          <span>ℹ</span>
          <span>{{ session('info') }}</span>
        </div>
        <button onclick="this.parentElement.parentElement.remove()" class="text-blue-500 hover:text-blue-700">✕</button>
      </div>
    </div>
  @endif

  <!-- Main Content -->
  <main class="flex-grow py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      @yield('content')
    </div>
  </main>

  <footer class="bg-white border-t border-slate-200 py-4 text-center text-xs text-slate-500">
    Panel Administrasi TechCare • Nur Muhibbin • Minggir, Sleman
  </footer>

  @stack('scripts')
</body>
</html>
