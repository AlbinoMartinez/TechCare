@extends('layouts.public')

@section('title', '404 – Halaman Tidak Ditemukan | TechCare')
@section('meta_description', 'Halaman yang Anda cari tidak ditemukan di situs TechCare IT Support.')

@section('content')
<section class="py-20 md:py-28 bg-[#FAF9F6]">
  <div class="max-w-2xl mx-auto px-4 text-center">
    
    <!-- Technical Error Code Badge -->
    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-rose-50 border border-rose-200 text-rose-700 text-xs font-mono font-bold mb-6">
      <span class="w-2 h-2 rounded-full bg-rose-500 animate-ping"></span>
      <span>STATUS: 404_PAGE_NOT_FOUND</span>
    </div>

    <!-- Monospace Glitch Number -->
    <h1 class="text-7xl sm:text-8xl font-mono font-extrabold text-[#063970] tracking-tight mb-4">
      4<span class="text-[#0D9BE4]">0</span>4
    </h1>

    <h2 class="text-xl sm:text-2xl font-heading font-extrabold text-slate-900 mb-3">
      Jalur Halaman Tidak Ditemukan
    </h2>

    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed max-w-md mx-auto mb-8">
      Alamat URL yang Anda tuju mungkin salah ketik, sudah dipindahkan, atau tidak aktif. Jangan khawatir, sistem komputer kami tetap beroperasi normal!
    </p>

    <!-- Quick Navigation Links -->
    <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
      <a href="{{ route('home') }}" 
         class="w-full sm:w-auto px-6 py-3 rounded-xl bg-[#063970] hover:bg-[#04274d] text-white text-xs font-heading font-bold transition-all shadow-sm min-h-[44px] flex items-center justify-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
        <span>Kembali ke Beranda</span>
      </a>

      <a href="{{ route('layanan') }}" 
         class="w-full sm:w-auto px-6 py-3 rounded-xl bg-white hover:bg-slate-50 text-slate-800 border border-slate-300 text-xs font-heading font-bold transition-all shadow-2xs min-h-[44px] flex items-center justify-center gap-2">
        <span>Lihat Katalog Layanan</span>
        <span aria-hidden="true">&rarr;</span>
      </a>
    </div>

    <!-- WhatsApp Support Footnote -->
    <p class="text-[11px] text-slate-400 mt-10 font-mono">
      Butuh bantuan langsung? Hubungi WhatsApp kami di 
      <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\Setting::get('whatsapp_number', '6285641487430')) }}" target="_blank" rel="noopener noreferrer" class="text-[#0D9BE4] hover:underline font-bold">
        {{ \App\Models\Setting::get('whatsapp_display', '085641487430') }}
      </a>
    </p>

  </div>
</section>
@endsection
