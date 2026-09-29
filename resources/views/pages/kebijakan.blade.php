@extends('layouts.public')

@section('title', 'Kebijakan Data, Garansi & Etika Layanan – TechCare')
@section('meta_description', 'Komitmen privasi data pelanggan (Bab X), garansi jasa 7 hari (Bab 6.7), dan daftar pekerjaan yang tidak diterima (Bab 4.6) oleh TechCare IT Support.')

@section('content')

<!-- Header Halaman -->
<section class="bg-white border-b border-[#E2DFD7] py-10">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8]">Bab X & Bab 6.7 Proposal</span>
    <h1 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-[#0B3A75] mt-1">
      Kebijakan Data, Garansi Jasa & Batasan Layanan
    </h1>
    <p class="text-xs sm:text-sm text-slate-700 mt-2 max-w-2xl leading-relaxed">
      Karena bekerja langsung dengan perangkat dan data milik pelanggan, TechCare menetapkan aturan etika dan garansi kerja yang transparan. Seluruh ketentuan di bawah ini berlaku untuk setiap pekerjaan tanpa kecuali.
    </p>
  </div>
</section>

<section class="py-12 bg-[#FAF9F6]">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 space-y-10">
    
    <!-- ==========================================
         BAGIAN 1: KEBIJAKAN PRIVASI & DATA (Bab X)
    ========================================== -->
    <div class="bg-white border border-[#E2DFD7] rounded-lg p-6 sm:p-8 space-y-6 shadow-2xs">
      <div>
        <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8]">Bab 10.1 Proposal</span>
        <h2 class="font-heading font-extrabold text-xl text-[#0B3A75] mt-1">
          1. Kebijakan Privasi dan Perlindungan Data Pelanggan
        </h2>
        <p class="text-xs text-slate-600 mt-1">
          Data dan file pribadi Anda adalah rahasia mutlak yang dihormati penuh oleh teknisi:
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
        
        <div class="p-4 rounded-md border border-[#E2DFD7] bg-[#FAF9F6]">
          <h3 class="font-heading font-bold text-slate-900 mb-1 text-[#0B3A75]">Tidak Membuka File Pribadi</h3>
          <p class="text-slate-600 leading-relaxed">
            Teknisi tidak akan membuka folder atau file pribadi Anda (foto keluarga, dokumen rahasia, chat pesan, riwayat browser) tanpa izin langsung saat troubleshooting.
          </p>
        </div>

        <div class="p-4 rounded-md border border-[#E2DFD7] bg-[#FAF9F6]">
          <h3 class="font-heading font-bold text-slate-900 mb-1 text-[#0B3A75]">Tidak Menyalin Data Sembarangan</h3>
          <p class="text-slate-600 leading-relaxed">
            Penyalinan data hanya dilakukan apabila pelanggan secara spesifik meminta paket backup sebelum instal ulang atau partisi. Tidak ada file yang disalin untuk kepentingan lain.
          </p>
        </div>

        <div class="p-4 rounded-md border border-[#E2DFD7] bg-[#FAF9F6]">
          <h3 class="font-heading font-bold text-slate-900 mb-1 text-[#0B3A75]">Tidak Menyimpan Password</h3>
          <p class="text-slate-600 leading-relaxed">
            TechCare tidak meminta maupun mencatat password akun Google, Windows, email, atau Wi-Fi Anda. Bila password perlu dimasukkan saat pengujian, pelanggan mengetiknya sendiri.
          </p>
        </div>

        <div class="p-4 rounded-md border border-[#E2DFD7] bg-[#FAF9F6]">
          <h3 class="font-heading font-bold text-slate-900 mb-1 text-[#0B3A75]">Penghapusan Backup Sementara</h3>
          <p class="text-slate-600 leading-relaxed">
            Data cadangan sementara pada media perantara teknisi akan langsung dihapus bersih setelah serah terima tuntas dan pelanggan memastikan seluruh filenya sudah kembali lengkap.
          </p>
        </div>

      </div>

      <div class="p-3.5 bg-blue-50/60 border border-blue-200 rounded text-xs text-blue-900">
        <strong>Dokumentasi Kerja:</strong> Foto kondisi fisik unit yang diambil oleh teknisi semata-mata untuk mencatat kondisi awal (goresan/baut) dan tidak menampilkan isi layar atau data pribadi pelanggan.
      </div>
    </div>


    <!-- ==========================================
         BAGIAN 2: ETIKA SOFTWARE & LEGALITAS (Bab 10.2)
    ========================================== -->
    <div class="bg-white border border-[#E2DFD7] rounded-lg p-6 sm:p-8 space-y-4 shadow-2xs">
      <div>
        <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8]">Bab 10.2 Proposal</span>
        <h2 class="font-heading font-extrabold text-xl text-[#0B3A75] mt-1">
          2. Kebijakan Penggunaan Software Legal & Anti-Bajakan
        </h2>
        <p class="text-xs text-slate-600 mt-1">
          TechCare berkomitmen mengedukasi pelanggan dan menjauhkan perangkat dari bahaya program bajakan:
        </p>
      </div>

      <ul class="space-y-3 text-xs sm:text-sm text-slate-700">
        <li class="flex items-start gap-2.5">
          <span class="text-[#0B3A75] font-bold mt-0.5">•</span>
          <span><strong>Tanpa Aktivator Ilegal / Crack:</strong> TechCare tidak menggunakan KMSPico, activator crack, patch berbahaya, atau keygen bajakan yang rentan disusupi trojan/ransomware.</span>
        </li>
        <li class="flex items-start gap-2.5">
          <span class="text-[#0B3A75] font-bold mt-0.5">•</span>
          <span><strong>Alternatif Legal & Open Source:</strong> Kami mengutamakan software produktivitas gratis yang teruji aman (misalnya LibreOffice, 7-Zip, SumatraPDF, VLC, browser resmi).</span>
        </li>
        <li class="flex items-start gap-2.5">
          <span class="text-[#0B3A75] font-bold mt-0.5">•</span>
          <span><strong>Software Berbayar Resmi:</strong> Jika pelanggan membutuhkan sistem operasi atau aplikasi komersial berbayar, TechCare membantu pemasangan menggunakan lisensi resmi milik pelanggan sendiri atau instalasi tanpa aktivasi sesuai pilihan pelanggan.</span>
        </li>
      </ul>
    </div>


    <!-- ==========================================
         BAGIAN 3: GARANSI JASA 7 HARI (Bab 6.7)
    ========================================== -->
    <div class="bg-white border border-[#E2DFD7] rounded-lg p-6 sm:p-8 space-y-6 shadow-2xs">
      <div>
        <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8]">Bab 6.7 Proposal</span>
        <h2 class="font-heading font-extrabold text-xl text-[#0B3A75] mt-1">
          3. Ketentuan Garansi Jasa 7 Hari Kalender
        </h2>
        <p class="text-xs text-slate-600 mt-1">
          TechCare memberikan perlindungan purna-jual selama <strong>7 hari kalender</strong> terhitung sejak serah terima dilakukan:
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-xs">
        
        <!-- Yang Dicakup Garansi -->
        <div class="p-4 bg-emerald-50/50 border border-emerald-200 rounded-lg space-y-2">
          <h3 class="font-heading font-bold text-emerald-900 text-sm flex items-center gap-1.5">
            <span class="text-emerald-700">✓</span> Garansi Berlaku Untuk:
          </h3>
          <p class="text-slate-600 text-[11px]">Kendala yang disebabkan langsung oleh pengerjaan TechCare:</p>
          <ul class="space-y-1.5 text-slate-700 list-disc list-inside">
            <li>Driver yang belum terpasang sempurna atau komponen belum terdeteksi.</li>
            <li>Konfigurasi router / Wi-Fi yang tidak berfungsi setelah setting.</li>
            <li>Hasil instalasi sistem operasi yang mengalami boot error / macet.</li>
            <li>Kabel LAN hasil crimping yang tidak terhubung saat serah terima.</li>
          </ul>
          <p class="text-[11px] text-emerald-800 font-bold pt-1">
            Bentuk garansi: Perbaikan ulang tanpa biaya jasa tambahan.
          </p>
        </div>

        <!-- Yang Tidak Dicakup Garansi -->
        <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg space-y-2">
          <h3 class="font-heading font-bold text-slate-800 text-sm flex items-center gap-1.5">
            <span class="text-slate-500">✕</span> Garansi Tidak Berlaku Untuk:
          </h3>
          <p class="text-slate-600 text-[11px]">Faktor di luar lingkup pengerjaan teknisi:</p>
          <ul class="space-y-1.5 text-slate-600 list-disc list-inside">
            <li>Kerusakan hardware baru (perangkat jatuh, tersiram cairan, terbakar).</li>
            <li>Infeksi virus atau malware baru akibat unduhan sembarangan sesudah serah terima.</li>
            <li>Perubahan pengaturan atau instal ulang oleh pihak lain.</li>
            <li>Gangguan koneksi dari penyedia internet (ISP) atau kabel pusat.</li>
          </ul>
        </div>

      </div>

      <p class="text-xs text-slate-500">
        * TechCare tidak menjanjikan tingkat kecepatan atau usia pakai tertentu bagi perangkat keras lama pelanggan.
      </p>
    </div>


    <!-- ==========================================
         BAGIAN 4: PEKERJAAN YANG DITOLAK (Bab 4.6)
    ========================================== -->
    <div class="bg-white border-2 border-slate-300 rounded-lg p-6 sm:p-8 space-y-4">
      <div>
        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Bab 4.6 Proposal</span>
        <h2 class="font-heading font-extrabold text-xl text-slate-900 mt-1">
          4. Batasan Layanan (Pekerjaan yang Tidak Diterima)
        </h2>
        <p class="text-xs text-slate-600 mt-1">
          Agar terhindar dari risiko kerusakan lebih parah dan tetap bekerja sesuai batas kemampuan, TechCare secara tegas tidak menerima:
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs text-slate-700">
        <div class="flex items-start gap-2 p-2.5 rounded bg-slate-50 border border-slate-200">
          <span class="text-rose-600 font-bold">✕</span>
          <span>Perbaikan mikrosolder motherboard / reball chipset GPU/CPU.</span>
        </div>
        <div class="flex items-start gap-2 p-2.5 rounded bg-slate-50 border border-slate-200">
          <span class="text-rose-600 font-bold">✕</span>
          <span>Data recovery dari hard disk fisik yang rusak mekanik berat.</span>
        </div>
        <div class="flex items-start gap-2 p-2.5 rounded bg-slate-50 border border-slate-200">
          <span class="text-rose-600 font-bold">✕</span>
          <span>Penggantian layar laptop rentan patah atau modul bernilai mahal.</span>
        </div>
        <div class="flex items-start gap-2 p-2.5 rounded bg-slate-50 border border-slate-200">
          <span class="text-rose-600 font-bold">✕</span>
          <span>Pembobolan password akun / Wi-Fi orang lain atau aksi cracking.</span>
        </div>
        <div class="flex items-start gap-2 p-2.5 rounded bg-slate-50 border border-slate-200">
          <span class="text-rose-600 font-bold">✕</span>
          <span>Pemasangan software bajakan atau aktivator ilegal.</span>
        </div>
        <div class="flex items-start gap-2 p-2.5 rounded bg-slate-50 border border-slate-200">
          <span class="text-rose-600 font-bold">✕</span>
          <span>Pengaturan jaringan skala besar / enterprise gedung bertingkat.</span>
        </div>
      </div>
    </div>

  </div>
</section>

@endsection
