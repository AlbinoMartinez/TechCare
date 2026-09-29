<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin – TechCare</title>
  <meta name="theme-color" content="#1F3A5F">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">

  <div class="max-w-md w-full">
    <!-- Brand Header -->
    <div class="text-center mb-8">
      <a href="{{ route('home') }}" class="inline-flex items-center gap-3 justify-center mb-3">
        <x-logo size="48" />
        <span class="font-heading font-extrabold text-2xl text-[#1F3A5F] tracking-tight">TECHCARE</span>
      </a>
      <h1 class="font-heading font-bold text-xl text-slate-800">Panel Masuk Admin</h1>
      <p class="text-xs text-slate-500 mt-1">Kelola data pesanan, nomor WhatsApp, dan katalog layanan</p>
    </div>

    <!-- Login Card -->
    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xl">
      @if (isset($errors) && $errors->any())
        <div class="mb-5 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-xs">
          {{ $errors->first() }}
        </div>
      @endif

      @if (session('info'))
        <div class="mb-5 p-4 rounded-xl bg-blue-50 border border-blue-200 text-blue-700 text-xs">
          {{ session('info') }}
        </div>
      @endif

      <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
        @csrf

        <div>
          <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Email Admin</label>
          <input type="email" id="email" name="email" value="{{ old('email', 'admin@techcare.id') }}" required autofocus class="w-full text-sm rounded-xl border border-slate-300 px-3.5 py-3 focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]">
        </div>

        <div>
          <div class="flex items-center justify-between mb-1.5">
            <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Password</label>
          </div>
          <input type="password" id="password" name="password" required value="techcare123" class="w-full text-sm rounded-xl border border-slate-300 px-3.5 py-3 focus:outline-hidden focus:border-[#2A9D8F] focus:ring-1 focus:ring-[#2A9D8F]">
        </div>

        <div class="flex items-center justify-between text-xs text-slate-600 pt-1">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" class="rounded text-[#2A9D8F] focus:ring-0">
            <span>Ingat saya di perangkat ini</span>
          </label>
        </div>

        <div class="pt-2">
          <button type="submit" class="w-full py-3.5 rounded-xl bg-[#1F3A5F] hover:bg-[#142640] text-white font-heading font-bold text-sm shadow-md transition-colors">
            Masuk ke Panel Admin
          </button>
        </div>

        <div class="pt-3 border-t border-slate-100 text-center">
          <p class="text-[11px] text-slate-400">
            Kredensial Default: <code class="bg-slate-100 px-1.5 py-0.5 rounded text-slate-700 font-mono">admin@techcare.id</code> / <code class="bg-slate-100 px-1.5 py-0.5 rounded text-slate-700 font-mono">techcare123</code>
          </p>
        </div>
      </form>
    </div>

    <!-- Back to public link -->
    <div class="text-center mt-6">
      <a href="{{ route('home') }}" class="text-xs text-slate-500 hover:text-slate-800 transition-colors">
        &larr; Kembali ke Halaman Utama TechCare
      </a>
    </div>
  </div>

</body>
</html>
