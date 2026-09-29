@extends('layouts.public')

@section('title', 'TechCare – Jasa IT Support, Maintenance Komputer & Jaringan di Sleman')
@section('meta_description', 'Layanan IT support perorangan oleh Nur Muhibbin di Minggir, Sleman. Servis laptop lemot, Wi-Fi, setting router, printer jaringan, Linux & OS. Estimasi biaya jelas di awal, garansi 7 hari.')

@section('content')

<!-- ==========================================
     HERO SECTION
     Spesifik, lugas, tanpa gradien klise atau blob neon
========================================== -->
<section class="bg-white border-b border-[#E2DFD7] py-12 md:py-16">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
      
      <!-- Left: Core Message & Value -->
      <div class="lg:col-span-7 space-y-6">
        
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-sm bg-[#F0F7FD] border border-[#1E9BE8]/30 text-[#0B3A75] text-xs font-bold tracking-wide">
          <span>Minggir, Sleman, Yogyakarta</span>
          <span class="text-slate-400">•</span>
          <span class="font-normal text-slate-700">Bisa datang ke lokasi atau antar perangkat</span>
        </div>

        <h1 class="font-heading font-extrabold text-3xl sm:text-4xl md:text-5xl text-[#0B3A75] tracking-tight leading-tight">
          Bantuan teknis komputer, laptop, dan jaringan dengan tarif yang jelas sejak awal.
        </h1>

        <p class="text-slate-700 text-base sm:text-lg leading-relaxed max-w-xl">
          Laptop lemot, Wi-Fi sering putus, printer tidak terbaca, atau butuh instalasi Linux? TechCare membantu pengecekan dan perbaikan tanpa biaya siluman. Estimasi disepakati sebelum pengerjaan dimulai.
        </p>

        <!-- CTA Buttons -->
        <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
          <a href="https://wa.me/6285641487430?text={{ rawurlencode('Halo TechCare, saya ingin konsultasi mengenai kendala perangkat saya.') }}" 
             target="_blank" 
             rel="noopener noreferrer" 
             class="inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-lg bg-[#0B3A75] hover:bg-[#07254C] text-white font-heading font-bold text-sm transition-colors shadow-xs min-h-[48px]">
            <svg class="w-5 h-5 fill-current text-[#1E9BE8]" viewBox="0 0 24 24" aria-hidden="true"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
            <span>Konsultasi Lewat WhatsApp</span>
          </a>

          <a href="{{ route('kalkulator') }}" 
             class="inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-lg border border-[#0B3A75] text-[#0B3A75] hover:bg-[#F0F7FD] font-heading font-semibold text-sm transition-colors min-h-[48px]">
            <span>Hitung Estimasi Biaya</span>
            <span aria-hidden="true">&rarr;</span>
          </a>
        </div>

        <!-- 3 Poin Kunci Layanan -->
        <div class="pt-4 border-t border-slate-200 grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs text-slate-700">
          <div class="flex items-center gap-2">
            <span class="w-4 h-4 rounded-full bg-[#1E9BE8]/20 text-[#0B3A75] flex items-center justify-center font-bold text-[10px]">✓</span>
            <span>Konsultasi awal chat gratis</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="w-4 h-4 rounded-full bg-[#1E9BE8]/20 text-[#0B3A75] flex items-center justify-center font-bold text-[10px]">✓</span>
            <span>Garansi pengerjaan 7 hari</span>
          </div>
          <div class="flex items-center gap-2">
            <span class="w-4 h-4 rounded-full bg-[#1E9BE8]/20 text-[#0B3A75] flex items-center justify-center font-bold text-[10px]">✓</span>
            <span>Data privasi tidak diintip</span>
          </div>
        </div>

      </div>

      <!-- Right: Ringkasan Cepat Pesan Layanan (Tanpa Form Rumit) -->
      <div class="lg:col-span-5">
        <div class="bg-[#FAF9F6] border-2 border-[#0B3A75] rounded-xl p-6 sm:p-7 shadow-xs">
          <div class="flex items-center justify-between pb-3 border-b border-[#E2DFD7]">
            <h2 class="font-heading font-bold text-base text-[#0B3A75]">Pesan Cepat via WhatsApp</h2>
            <span class="text-xs px-2 py-0.5 rounded-sm bg-emerald-100 text-emerald-800 font-semibold">&lt; 1 Menit</span>
          </div>

          <p class="text-xs text-slate-600 mt-3 leading-relaxed">
            Pilih kendala perangkat Anda untuk membuka chat WhatsApp dengan pesan yang sudah terisi otomatis:
          </p>

          <div class="mt-4 space-y-2">
            @php
              $quickIssues = [
                ['label' => 'Laptop / PC lambat (optimasi)', 'text' => 'Halo TechCare, saya ingin optimasi laptop/PC yang lambat. Mohon info estimasi jadwal.'],
                ['label' => 'Instalasi ulang Windows', 'text' => 'Halo TechCare, saya butuh jasa instal ulang Windows. Apakah bisa dijadwalkan?'],
                ['label' => 'Wi-Fi bermasalah / setting router', 'text' => 'Halo TechCare, saya mengalami kendala koneksi Wi-Fi / ingin setting router di rumah/toko.'],
                ['label' => 'Setting printer jaringan / LAN', 'text' => 'Halo TechCare, saya butuh bantuan setting printer jaringan / koneksi LAN.'],
                ['label' => 'Instalasi Linux / Dual Boot', 'text' => 'Halo TechCare, saya ingin konsultasi pemasangan distro Linux / dual boot Windows.'],
              ];
            @endphp

            @foreach ($quickIssues as $item)
              <a href="https://wa.me/6285641487430?text={{ rawurlencode($item['text']) }}" 
                 target="_blank" 
                 rel="noopener noreferrer" 
                 class="group flex items-center justify-between p-3 rounded-lg border border-[#E2DFD7] bg-white hover:border-[#1E9BE8] hover:bg-[#F0F7FD] transition-all min-h-[44px]">
                <span class="text-xs font-medium text-slate-800 group-hover:text-[#0B3A75]">{{ $item['label'] }}</span>
                <span class="text-xs font-bold text-[#1E9BE8] group-hover:translate-x-0.5 transition-transform" aria-hidden="true">&rarr;</span>
              </a>
            @endforeach
          </div>

          <div class="mt-5 pt-3 border-t border-[#E2DFD7] flex items-center justify-between text-xs text-slate-600">
            <span>Atau isi formulir detail:</span>
            <a href="{{ route('kontak') }}#form-pemesanan" class="font-bold text-[#0B3A75] hover:text-[#1E9BE8] underline">
              Buka Form Pemesanan
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ==========================================
     RINGKASAN ALUR LAYANAN (3 LANGKAH UTAMA)
========================================== -->
<section class="py-12 bg-[#FAF9F6] border-b border-[#E2DFD7]">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="max-w-2xl mb-8">
      <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8]">Alur Kerja Ringkas</span>
      <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-[#0B3A75] mt-1">
        3 Langkah Menuntaskan Masalah Teknis Anda
      </h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      
      <div class="bg-white p-6 rounded-lg border border-[#E2DFD7]">
        <div class="font-mono text-xl font-bold text-[#0B3A75] mb-2">01</div>
        <h3 class="font-heading font-bold text-base text-slate-900 mb-2">Jelaskan Kendala</h3>
        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
          Hubungi TechCare lewat WhatsApp atau form booking. Sampaikan gejala kendala, merek perangkat, dan lokasi Anda. Konsultasi awal lewat chat tidak dipungut biaya.
        </p>
      </div>

      <div class="bg-white p-6 rounded-lg border border-[#E2DFD7] border-t-4 border-t-[#1E9BE8]">
        <div class="font-mono text-xl font-bold text-[#1E9BE8] mb-2">02</div>
        <h3 class="font-heading font-bold text-base text-slate-900 mb-2">Terima Estimasi & Setujui</h3>
        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
          TechCare menyampaikan rincian estimasi biaya jasa dan perkiraan waktu sebelum kerja dimulai. <strong>Pekerjaan hanya dilakukan setelah Anda menyetujuinya.</strong>
        </p>
      </div>

      <div class="bg-white p-6 rounded-lg border border-[#E2DFD7]">
        <div class="font-mono text-xl font-bold text-[#0B3A75] mb-2">03</div>
        <h3 class="font-heading font-bold text-base text-slate-900 mb-2">Pengerjaan, Uji & Bayar</h3>
        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
          Perangkat diperbaiki sesuai checklist. Setelah diuji bersama dan berfungsi normal, pembayaran diselesaikan. Pengerjaan dilindungi garansi jasa 7 hari.
        </p>
      </div>

    </div>

    <div class="mt-6 text-right">
      <a href="{{ route('alur') }}" class="text-xs font-bold text-[#0B3A75] hover:text-[#1E9BE8] inline-flex items-center gap-1">
        <span>Pelajari seluruh 10 tahap pengerjaan sesuai SOP proposal</span>
        <span aria-hidden="true">&rarr;</span>
      </a>
    </div>
  </div>
</section>


<!-- ==========================================
     LAYANAN UTAMA (9 LAYANAN DARI PROPOSAL)
========================================== -->
<section class="py-14 bg-white border-b border-[#E2DFD7]">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
      <div>
        <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8]">Katalog Terpilih</span>
        <h2 class="font-heading font-extrabold text-2xl sm:text-3xl text-[#0B3A75] mt-1">
          Layanan Utama yang Paling Sering Dibutuhkan
        </h2>
        <p class="text-xs sm:text-sm text-slate-600 mt-1 max-w-xl">
          Berikut adalah layanan pokok berdasarkan Bab IV proposal. Tarif adalah biaya jasa murni untuk kondisi normal.
        </p>
      </div>
      <div>
        <a href="{{ route('layanan') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-[#FAF9F6] border border-[#E2DFD7] text-xs font-bold text-[#0B3A75] hover:border-[#0B3A75] transition-colors min-h-[44px]">
          <span>Lihat Semua 24 Layanan Lengkap</span>
          <span aria-hidden="true">&rarr;</span>
        </a>
      </div>
    </div>

    <!-- Grid Layanan Utama -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      @foreach ($utamaServices as $srv)
        <div class="bg-[#FAF9F6] border border-[#E2DFD7] rounded-lg p-5 flex flex-col justify-between hover:border-[#1E9BE8] transition-colors">
          <div>
            <!-- Header Kartu: Kode & Kategori -->
            <div class="flex items-center justify-between text-xs mb-2">
              <span class="font-mono font-bold text-[#0B3A75] bg-white px-2 py-0.5 rounded border border-[#E2DFD7]">
                {{ $srv->code }}
              </span>
              <span class="text-slate-500 uppercase tracking-wider text-[11px] font-semibold">
                {{ ucfirst($srv->category) }}
              </span>
            </div>

            <!-- Nama Layanan -->
            <h3 class="font-heading font-bold text-base text-[#0B3A75] mb-2 leading-snug">
              {{ $srv->name }}
            </h3>

            <!-- Deskripsi Proposal -->
            <p class="text-xs text-slate-700 leading-relaxed mb-4">
              {{ $srv->description }}
            </p>
          </div>

          <!-- Bottom: Durasi & Harga Monospace -->
          <div class="pt-3 border-t border-[#E2DFD7] space-y-2">
            <div class="flex items-center justify-between text-xs text-slate-600">
              <span>Estimasi pengerjaan:</span>
              <span class="font-medium text-slate-800">{{ $srv->duration }}</span>
            </div>

            <div class="flex items-baseline justify-between pt-1">
              <span class="text-xs text-slate-500">Biaya Jasa:</span>
              <x-price :amount="$srv->price" :note="$srv->price_note" class="text-lg text-[#0B3A75]" />
            </div>

            <div class="pt-2">
              <a href="https://wa.me/6285641487430?text={{ rawurlencode('Halo TechCare, saya ingin memesan layanan ' . $srv->code . ' (' . $srv->name . ' - ' . $srv->formatted_price . ').') }}" 
                 target="_blank" 
                 rel="noopener noreferrer" 
                 class="w-full inline-flex items-center justify-center gap-2 py-2 px-3 rounded bg-white hover:bg-[#0B3A75] text-[#0B3A75] hover:text-white border border-[#E2DFD7] hover:border-[#0B3A75] text-xs font-bold transition-colors min-h-[40px]">
                <span>Pesan Layanan Ini</span>
                <span aria-hidden="true">&rarr;</span>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>


<!-- ==========================================
     TARIF KUNJUNGAN (HOME SERVICE) & NILAI PEMBEDA
========================================== -->
<section class="py-14 bg-[#FAF9F6] border-b border-[#E2DFD7]">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
      
      <!-- Kiri: Ongkos Kunjungan Bab 4.5 -->
      <div class="lg:col-span-6 bg-white p-6 rounded-lg border border-[#E2DFD7]">
        <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8]">Bab 4.5 Proposal</span>
        <h2 class="font-heading font-extrabold text-xl text-[#0B3A75] mt-1 mb-2">
          Ketentuan Ongkos Kunjungan (Home Service)
        </h2>
        <p class="text-xs text-slate-600 mb-4 leading-relaxed">
          Bila perangkat tidak dibawa ke tempat TechCare di Minggir, teknisi dapat datang ke lokasi Anda. Ongkos kunjungan mencakup bahan bakar, keausan kendaraan, dan waktu perjalanan:
        </p>

        <div class="divide-y divide-[#E2DFD7] border border-[#E2DFD7] rounded text-xs">
          @foreach ($homeServiceTiers as $tier)
            <div class="p-3 flex items-center justify-between">
              <div>
                <span class="font-bold text-slate-800 block">{{ $tier['distance'] }}</span>
                <span class="text-slate-500">{{ $tier['desc'] }}</span>
              </div>
              <x-price :amount="$tier['price']" class="text-sm text-[#0B3A75]" />
            </div>
          @endforeach
        </div>

        <p class="text-[11px] text-slate-500 mt-3">
          * Konsultasi awal lewat WhatsApp tetap gratis. Ongkos kunjungan hanya berlaku jika teknisi datang ke lokasi Anda.
        </p>
      </div>

      <!-- Kanan: Nilai Utama Usaha (Terjangkau, Transparan, Aman) -->
      <div class="lg:col-span-6 space-y-4">
        <div>
          <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8]">Bab 2.6 & Bab X</span>
          <h2 class="font-heading font-extrabold text-xl text-[#0B3A75] mt-1 mb-2">
            Tiga Nilai yang Menjadi Pegangan TechCare
          </h2>
          <p class="text-xs text-slate-600 leading-relaxed">
            TechCare dijalankan mandiri oleh lulusan TKJ SMKN 3 Yogyakarta dengan standar etika yang jelas:
          </p>
        </div>

        <div class="space-y-3 text-xs">
          <div class="bg-white p-4 rounded-lg border border-[#E2DFD7]">
            <h3 class="font-heading font-bold text-slate-900 text-sm mb-1 text-[#0B3A75]">1. Terjangkau</h3>
            <p class="text-slate-600 leading-relaxed">
              Tarif dihitung jujur berdasarkan waktu pengerjaan dan biaya nyata (Bab 8.4), bukan mark-up sembarangan. Cocok untuk kantong pelajar, mahasiswa, dan UMKM.
            </p>
          </div>

          <div class="bg-white p-4 rounded-lg border border-[#E2DFD7]">
            <h3 class="font-heading font-bold text-slate-900 text-sm mb-1 text-[#0B3A75]">2. Transparan</h3>
            <p class="text-slate-600 leading-relaxed">
              Estimasi biaya disampaikan sebelum pengerjaan. Tidak ada tindakan sepihak tanpa persetujuan Anda. Bila perangkat sebenarnya tidak perlu diservis, akan disampaikan apa adanya.
            </p>
          </div>

          <div class="bg-white p-4 rounded-lg border border-[#E2DFD7]">
            <h3 class="font-heading font-bold text-slate-900 text-sm mb-1 text-[#0B3A75]">3. Aman (Data & Software Legal)</h3>
            <p class="text-slate-600 leading-relaxed">
              File pribadi Anda dihormati dan tidak dibuka tanpa izin. TechCare menolak pemakaian software bajakan dan mengutamakan sistem legal, freeware, dan open source.
            </p>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<!-- ==========================================
     PROFIL SINGKAT TEKNISI (Bab II)
========================================== -->
<section class="py-12 bg-white border-b border-[#E2DFD7]">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="bg-[#FAF9F6] border border-[#E2DFD7] rounded-xl p-6 md:p-8">
      <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
        
        <div class="md:col-span-3 text-center md:text-left">
          <div class="inline-block p-4 rounded-lg bg-white border border-[#E2DFD7] mb-2">
            <span class="font-mono font-extrabold text-2xl text-[#0B3A75]">NM</span>
          </div>
          <h2 class="font-heading font-bold text-base text-[#0B3A75]">Nur Muhibbin</h2>
          <p class="text-xs text-slate-600">Pemilik & Teknisi TechCare</p>
        </div>

        <div class="md:col-span-9 space-y-2 text-xs sm:text-sm text-slate-700 leading-relaxed">
          <p>
            <strong>Latar Belakang:</strong> Siswa/Lulusan Jurusan Teknik Komputer dan Jaringan (TKJ), SMKN 3 Yogyakarta.
          </p>
          <p>
            TechCare dirintis sebagai usaha jasa IT support perorangan untuk menerapkan kompetensi kejuruan: perakitan dan perawatan komputer, sistem operasi Windows & Linux, konfigurasi jaringan, dan keamanan data dasar.
          </p>
          <p class="text-xs text-slate-500 pt-1">
            Alamat operasional: Minggir, Sleman, Yogyakarta • Kontak WhatsApp: 085641487430
          </p>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection
