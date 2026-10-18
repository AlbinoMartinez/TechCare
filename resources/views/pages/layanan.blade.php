@extends('layouts.public')

@section('title', 'Daftar Layanan & Tarif Jasa Lengkap – TechCare Minggir Sleman')
@section('meta_description', 'Katalog 24 layanan IT support TechCare lengkap dengan tarif transparan, estimasi durasi pengerjaan, dan catatan teknis. Komputer, jaringan Wi-Fi, Linux, dan keamanan.')

@section('content')

@php
  $waNumber = $settings['whatsapp_number'] ?? '6285641487430';
  $waClean = preg_replace('/[^0-9]/', '', $waNumber);
@endphp

<!-- Header Halaman -->
<section class="bg-white border-b border-slate-200 py-10 sm:py-12">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <span class="text-xs font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Tarif Resmi & Transparan</span>
    <h1 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-[#063970] mt-1">
      Daftar Layanan dan Tarif Jasa
    </h1>
    <p class="text-xs sm:text-sm text-slate-600 mt-2 max-w-2xl leading-relaxed">
      Daftar 24 layanan IT support resmi TechCare. Tarif di bawah adalah biaya jasa murni untuk satu perangkat dalam kondisi normal, belum termasuk komponen baru (bila ada) dan ongkos kunjungan home service.
    </p>

    <!-- Info Banner Penting -->
    <div class="mt-5 p-4 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-700 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 shadow-2xs">
      <div class="flex items-center gap-2">
        <span class="font-bold text-[#063970] font-heading">Konsultasi Awal:</span>
        <span>Lewat WhatsApp 100% gratis. Diagnosis fisik di lokasi Rp25.000 (langsung dipotong jika lanjut servis).</span>
      </div>
      <a href="{{ route('kalkulator') }}" class="font-bold text-[#0D9BE4] hover:text-[#063970] flex items-center gap-1 shrink-0 font-mono">
        <span>Buka Kalkulator Estimasi</span> &rarr;
      </a>
    </div>
  </div>
</section>

<!-- Content Section dengan Kategori & Tabel Responsif -->
<section class="py-10 bg-[#FAF9F6]" x-data="{ activeCategory: 'all' }">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    
    <!-- Filter Kategori (Clean Tabs, Target Sentuh 44px) -->
    <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-6 border-b border-slate-200 no-scrollbar">
      <button type="button" 
              @click="activeCategory = 'all'" 
              :class="activeCategory === 'all' ? 'bg-[#063970] text-white font-bold' : 'bg-white text-slate-700 border border-slate-200 hover:border-[#063970]'"
              class="px-4 py-2.5 rounded-lg text-xs transition-colors shrink-0 min-h-[44px]">
        Semua Layanan (24)
      </button>

      <button type="button" 
              @click="activeCategory = 'komputer'" 
              :class="activeCategory === 'komputer' ? 'bg-[#063970] text-white font-bold' : 'bg-white text-slate-700 border border-slate-200 hover:border-[#063970]'"
              class="px-4 py-2.5 rounded-lg text-xs transition-colors shrink-0 min-h-[44px]">
        Komputer & Laptop (A1–A9)
      </button>

      <button type="button" 
              @click="activeCategory = 'jaringan'" 
              :class="activeCategory === 'jaringan' ? 'bg-[#063970] text-white font-bold' : 'bg-white text-slate-700 border border-slate-200 hover:border-[#063970]'"
              class="px-4 py-2.5 rounded-lg text-xs transition-colors shrink-0 min-h-[44px]">
        Jaringan & Wi-Fi (B1–B7)
      </button>

      <button type="button" 
              @click="activeCategory = 'linux'" 
              :class="activeCategory === 'linux' ? 'bg-[#063970] text-white font-bold' : 'bg-white text-slate-700 border border-slate-200 hover:border-[#063970]'"
              class="px-4 py-2.5 rounded-lg text-xs transition-colors shrink-0 min-h-[44px]">
        Sistem Operasi & Linux (C1–C5)
      </button>

      <button type="button" 
              @click="activeCategory = 'keamanan'" 
              :class="activeCategory === 'keamanan' ? 'bg-[#063970] text-white font-bold' : 'bg-white text-slate-700 border border-slate-200 hover:border-[#063970]'"
              class="px-4 py-2.5 rounded-lg text-xs transition-colors shrink-0 min-h-[44px]">
        Keamanan Dasar (D1–D3)
      </button>
    </div>

    <!-- Tampilan Desktop: Tabel Struktural Rapi -->
    <div class="hidden md:block bg-white border border-slate-200 rounded-xl overflow-hidden shadow-xs mb-8">
      <table class="w-full text-left border-collapse text-xs">
        <thead>
          <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 font-heading font-bold text-[11px] uppercase tracking-wider">
            <th class="py-3.5 px-4 w-16">Kode</th>
            <th class="py-3.5 px-4 w-1/4">Layanan</th>
            <th class="py-3.5 px-4">Deskripsi & Catatan</th>
            <th class="py-3.5 px-4 w-28">Durasi</th>
            <th class="py-3.5 px-4 w-32 text-right">Tarif Jasa</th>
            <th class="py-3.5 px-4 w-28 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
          @foreach ($services as $s)
            <tr x-show="activeCategory === 'all' || activeCategory === '{{ $s->category }}'" class="hover:bg-slate-50/80 transition-colors">
              <td class="py-3.5 px-4 align-top">
                <span class="font-mono font-bold text-[#063970] bg-slate-100 px-2 py-0.5 rounded border border-slate-200">
                  {{ $s->code }}
                </span>
                @if($s->is_utama)
                  <span class="block text-[10px] text-[#0D9BE4] font-bold mt-1 uppercase font-mono">Utama</span>
                @endif
              </td>
              <td class="py-3.5 px-4 align-top">
                <strong class="font-heading text-sm text-[#063970] block leading-snug">{{ $s->name }}</strong>
                <span class="text-[11px] text-slate-500 capitalize">{{ $s->category }}</span>
              </td>
              <td class="py-3.5 px-4 align-top text-slate-700 leading-relaxed">
                <p>{{ $s->description }}</p>
                @if($s->notes)
                  <p class="text-[11px] text-slate-500 mt-1 italic">
                    Catatan: {{ $s->notes }}
                  </p>
                @endif
              </td>
              <td class="py-3.5 px-4 align-top text-slate-800 whitespace-nowrap font-mono text-[11px]">
                {{ $s->duration }}
              </td>
              <td class="py-3.5 px-4 align-top text-right whitespace-nowrap">
                <x-price :amount="$s->price" :note="$s->price_note" class="text-sm text-[#063970]" />
              </td>
              <td class="py-3.5 px-4 align-top text-center whitespace-nowrap">
                <a href="https://wa.me/{{ $waClean }}?text={{ rawurlencode('Halo Mas Nur (TechCare), saya ingin tanya/pesan layanan ' . $s->code . ' (' . $s->name . ' - ' . $s->formatted_price . ').') }}" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   class="inline-flex items-center px-3 py-1.5 rounded-lg bg-[#063970] hover:bg-[#0D9BE4] text-white text-[11px] font-bold transition-colors">
                  Pesan via WA
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Tampilan Mobile (Viewport 375px+): Kartu Data Terstruktur yang Mudah Dipindai -->
    <div class="md:hidden space-y-3 mb-8">
      @foreach ($services as $s)
        <div x-show="activeCategory === 'all' || activeCategory === '{{ $s->category }}'" 
             class="bg-white border border-slate-200 rounded-xl p-4 space-y-2.5 shadow-2xs">
          
          <div class="flex items-start justify-between gap-2">
            <div class="flex items-center gap-2">
              <span class="font-mono font-bold text-xs text-[#063970] bg-slate-100 px-2 py-0.5 rounded border border-slate-200">
                {{ $s->code }}
              </span>
              @if($s->is_utama)
                <span class="text-[10px] bg-sky-50 text-[#0D9BE4] font-bold px-1.5 py-0.5 rounded border border-sky-200 uppercase font-mono">
                  Utama
                </span>
              @endif
            </div>
            <x-price :amount="$s->price" :note="$s->price_note" class="text-base text-[#063970]" />
          </div>

          <div>
            <h3 class="font-heading font-bold text-sm text-[#063970] leading-snug">{{ $s->name }}</h3>
            <p class="text-xs text-slate-600 mt-1 leading-relaxed">{{ $s->description }}</p>
          </div>

          <div class="flex items-center justify-between text-xs text-slate-500 pt-2 border-t border-slate-100">
            <span>Durasi: <strong class="text-slate-700 font-mono">{{ $s->duration }}</strong></span>
            <span class="capitalize text-[11px]">{{ $s->category }}</span>
          </div>

          @if($s->notes)
            <div class="text-[11px] text-slate-600 bg-slate-50 p-2 rounded-lg border border-slate-200">
              <strong>Catatan:</strong> {{ $s->notes }}
            </div>
          @endif

          <div class="pt-1">
            <a href="https://wa.me/{{ $waClean }}?text={{ rawurlencode('Halo Mas Nur (TechCare), saya ingin pesan layanan ' . $s->code . ' (' . $s->name . ').') }}" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-3 rounded-xl bg-[#063970] hover:bg-[#0D9BE4] text-white text-xs font-bold transition-colors min-h-[44px]">
              <span>Pesan via WhatsApp</span>
              <span aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </div>
      @endforeach
    </div>

    <!-- ==========================================
         LAYANAN YANG JUJUR DITOLAK
         Ditampilkan terbuka & transparan
    ========================================== -->
    <div class="bg-white border-2 border-slate-200 rounded-2xl p-6 sm:p-7 shadow-xs">
      <div class="flex items-start gap-3">
        <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 font-mono font-bold flex items-center justify-center shrink-0 text-sm border border-amber-200">
          !
        </div>
        <div class="space-y-2">
          <span class="text-xs font-mono font-bold uppercase tracking-wider text-slate-500">Kejujuran & Tanggung Jawab Teknis</span>
          <h2 class="font-heading font-extrabold text-lg text-slate-900">
            Layanan yang Tidak Diterima TechCare (Jujur Kami Tolak)
          </h2>
          <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
            Agar mutu pengerjaan tetap aman dan sesuai keahlian teknisi mandiri, TechCare secara terbuka <strong>menolak</strong> pekerjaan berikut:
          </p>

          <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-700 pt-2">
            <li class="flex items-start gap-2">
              <span class="text-rose-500 font-bold">✕</span>
              <span>Perbaikan tingkat mikrosolder chip motherboard / reballing chipset.</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-rose-500 font-bold">✕</span>
              <span>Pemulihan data dari piringan harddisk yang rusak fisik parah / tergores.</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-rose-500 font-bold">✕</span>
              <span>Penggantian layar laptop yang berisiko tinggi tanpa ketersediaan suku cadang asli.</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-rose-500 font-bold">✕</span>
              <span>Pembobolan password akun milik orang lain atau aktivitas hacking ilegal.</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-rose-500 font-bold">✕</span>
              <span>Instalasi software bajakan berbahaya, aktivator crack, atau trojan.</span>
            </li>
            <li class="flex items-start gap-2">
              <span class="text-rose-500 font-bold">✕</span>
              <span>Konfigurasi jaringan berskala enterprise / gedung bertingkat besar.</span>
            </li>
          </ul>

          <p class="text-xs text-slate-500 pt-2">
            Bila kendala perangkat Anda masuk ke dalam kategori di atas, kami akan merekomendasikan tempat servis spesialis yang berkompeten daripada coba-coba yang merugikan Anda.
          </p>
        </div>
      </div>
    </div>

  </div>
</section>

@endsection
