<!DOCTYPE html>
<html lang="id" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin – TechCare Panel</title>
  <meta name="theme-color" content="#0B132B">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#0B132B] text-slate-100 min-h-screen flex items-center justify-center p-4 selection:bg-[#0D9BE4] selection:text-white font-sans">

  <div class="max-w-md w-full">
    <!-- Brand Header -->
    <div class="text-center mb-6">
      <a href="{{ route('home') }}" class="inline-flex items-center gap-3 justify-center mb-3">
        <x-logo size="48" class="brightness-125" />
        <span class="font-heading font-extrabold text-2xl text-white tracking-tight">TECHCARE</span>
      </a>
      <h1 class="font-heading font-bold text-lg text-white">Panel Administrasi & Operasional</h1>
      <p class="text-xs text-slate-400 mt-1">Nur Muhibbin • IT Support Minggir, Sleman</p>
    </div>

    <!-- Login Card -->
    <div class="bg-[#131F3F] rounded-2xl p-6 sm:p-8 border border-[#1E2D5A] shadow-xl">
      @if (isset($errors) && $errors->any())
        <div class="mb-5 p-3.5 rounded-lg bg-rose-950/60 border border-rose-500/40 text-rose-200 text-xs">
          {{ $errors->first() }}
        </div>
      @endif

      @if (session('info'))
        <div class="mb-5 p-3.5 rounded-lg bg-sky-950/60 border border-[#0D9BE4]/40 text-sky-200 text-xs">
          {{ session('info') }}
        </div>
      @endif

      <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
        @csrf

        <div>
          <label for="email" class="block text-xs font-mono font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Email Administrator</label>
          <input type="email" id="email" name="email" value="{{ old('email', 'admin@techcare.id') }}" required autofocus 
                 class="w-full text-xs rounded-lg bg-[#0E1738] border border-[#1E2D5A] text-white px-3.5 py-2.5 font-mono focus:outline-hidden focus:border-[#0D9BE4]">
        </div>

        <div>
          <label for="password" class="block text-xs font-mono font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Password</label>
          <input type="password" id="password" name="password" required value="techcare123" 
                 class="w-full text-xs rounded-lg bg-[#0E1738] border border-[#1E2D5A] text-white px-3.5 py-2.5 font-mono focus:outline-hidden focus:border-[#0D9BE4]">
        </div>

        <div class="flex items-center justify-between text-xs text-slate-400 pt-1">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" class="rounded bg-[#0E1738] border-[#1E2D5A] text-[#0D9BE4]">
            <span>Ingat saya di perangkat ini</span>
          </label>
        </div>

        <div class="pt-2">
          <button type="submit" class="w-full py-3 rounded-lg bg-[#0D9BE4] hover:bg-[#0c8ad0] text-white font-semibold text-xs shadow-md transition-colors">
            Masuk ke Panel Kendali
          </button>
        </div>

        <div class="pt-4 border-t border-[#1E2D5A] text-center">
          <p class="text-[11px] text-slate-400 font-mono">
            Kredensial Awal: <code class="bg-[#0E1738] px-1.5 py-0.5 rounded text-[#0D9BE4]">admin@techcare.id</code> / <code class="bg-[#0E1738] px-1.5 py-0.5 rounded text-[#0D9BE4]">techcare123</code>
          </p>
        </div>
      </form>
    </div>

    <!-- Back to public link -->
    <div class="text-center mt-6">
      <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-white transition-colors">
        &larr; Kembali ke Website Publik TechCare
      </a>
    </div>
  </div>

</body>
</html>
