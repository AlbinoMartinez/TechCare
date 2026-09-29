@extends('admin.layout')

@section('title', 'Perencanaan & Data Keuangan Internal (Bab VIII)')

@section('content')

<div class="space-y-8">
  
  <!-- Header -->
  <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-xs flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
    <div>
      <span class="text-[11px] font-bold uppercase tracking-wider text-[#1E9BE8] bg-[#F0F7FD] px-2.5 py-1 rounded">
        Internal Usaha (Bab VIII Proposal)
      </span>
      <h1 class="font-heading font-extrabold text-2xl text-[#0B3A75] mt-2">
        Data & Proyeksi Keuangan TechCare
      </h1>
      <p class="text-xs text-slate-500 mt-1">
        Ringkasan modal awal, biaya operasional tetap & variabel, titik impas (BEP), dan proyeksi 6 bulan pertama.
      </p>
    </div>

    <div class="text-xs text-slate-600 bg-amber-50 border border-amber-200 p-3 rounded-lg max-w-sm">
      <strong class="text-amber-900 block font-bold">🔒 Catatan Rahasia:</strong>
      Data pada halaman ini adalah analisis keuangan internal proposal dan tidak ditampilkan di website publik.
    </div>
  </div>

  <!-- KPI Kunci Keuangan (Bab 8.8 Ringkasan Keterkaitan Angka) -->
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
    
    <div class="bg-white rounded-lg p-5 border border-slate-200 shadow-2xs">
      <span class="text-xs text-slate-500 block">Modal Awal (Bab 8.1)</span>
      <span class="font-mono font-extrabold text-2xl text-[#0B3A75] mt-1 block">Rp1.000.000</span>
      <span class="text-[11px] text-slate-400 mt-1 block">Alat, bahan, promosi, cadangan</span>
    </div>

    <div class="bg-white rounded-lg p-5 border border-slate-200 shadow-2xs">
      <span class="text-xs text-slate-500 block">Biaya Tetap / Bulan (Bab 8.2)</span>
      <span class="font-mono font-extrabold text-2xl text-slate-800 mt-1 block">Rp127.000</span>
      <span class="text-[11px] text-slate-400 mt-1 block">Kuota, promosi, rawat, susut</span>
    </div>

    <div class="bg-white rounded-lg p-5 border border-slate-200 shadow-2xs">
      <span class="text-xs text-slate-500 block">BEP Operasional (Bab 8.8)</span>
      <span class="font-mono font-extrabold text-2xl text-emerald-700 mt-1 block">2 Transaksi</span>
      <span class="text-[11px] text-slate-400 mt-1 block">± Rp154.000 / bulan</span>
    </div>

    <div class="bg-white rounded-lg p-5 border border-slate-200 shadow-2xs">
      <span class="text-xs text-slate-500 block">Target Balik Modal (Skenario Normal)</span>
      <span class="font-mono font-extrabold text-2xl text-[#1E9BE8] mt-1 block">Bulan ke-3</span>
      <span class="text-[11px] text-slate-400 mt-1 block">Kumulatif laba: Rp1.509.000</span>
    </div>

  </div>

  <!-- Rincian Modal Awal & Biaya Operasional -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    
    <!-- Modal Awal (8.1) -->
    <div class="bg-white rounded-lg p-6 border border-slate-200 shadow-xs space-y-4">
      <h2 class="font-heading font-bold text-base text-[#0B3A75]">
        8.1 Rincian Modal Awal (Rp1.000.000)
      </h2>
      
      <table class="w-full text-xs text-left border-collapse">
        <tbody class="divide-y divide-slate-100">
          <tr class="py-2">
            <td class="py-2 text-slate-700">A. Peralatan Teknis (Obeng set, tester LAN, crimping, adaptor SATA, gelang statis, tas)</td>
            <td class="py-2 text-right font-mono font-bold text-slate-900">Rp535.000</td>
          </tr>
          <tr class="py-2">
            <td class="py-2 text-slate-700">B. Bahan Habis Pakai (RJ45 50 pcs, patch cord Cat6, thermal paste, alkohol pembersih, kuas, kabel ties)</td>
            <td class="py-2 text-right font-mono font-bold text-slate-900">Rp255.000</td>
          </tr>
          <tr class="py-2">
            <td class="py-2 text-slate-700">C. Media Promosi Cetak (100 kartu nama + 100 brosur A5)</td>
            <td class="py-2 text-right font-mono font-bold text-slate-900">Rp115.000</td>
          </tr>
          <tr class="py-2">
            <td class="py-2 text-slate-700">D. Dana Cadangan Darurat (± 10% dari A–C)</td>
            <td class="py-2 text-right font-mono font-bold text-slate-900">Rp95.000</td>
          </tr>
          <tr class="py-2 font-bold bg-slate-50">
            <td class="py-2 px-2 text-[#0B3A75]">Total Modal Awal</td>
            <td class="py-2 px-2 text-right font-mono text-[#0B3A75] text-sm">Rp1.000.000</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Biaya Operasional (8.2 & 8.3) -->
    <div class="bg-white rounded-lg p-6 border border-slate-200 shadow-xs space-y-4">
      <h2 class="font-heading font-bold text-base text-[#0B3A75]">
        8.2 & 8.3 Biaya Operasional Bulanan
      </h2>
      
      <div class="space-y-3 text-xs">
        <div>
          <h3 class="font-bold text-slate-800 mb-1">Biaya Tetap per Bulan (Rp127.000):</h3>
          <ul class="space-y-1 text-slate-600 list-disc list-inside">
            <li>Paket Data / Internet Teknis: <span class="font-mono font-bold text-slate-800">Rp50.000</span></li>
            <li>Promosi Rutin (Brosur, diskon referral): <span class="font-mono font-bold text-slate-800">Rp30.000</span></li>
            <li>Perawatan & Penggantian Alat Kecil: <span class="font-mono font-bold text-slate-800">Rp25.000</span></li>
            <li>Penyusutan Peralatan (umur 24 bulan): <span class="font-mono font-bold text-slate-800">Rp22.000</span></li>
          </ul>
        </div>

        <div class="pt-2 border-t border-slate-100">
          <h3 class="font-bold text-slate-800 mb-1">Biaya Variabel per Transaksi (Rp7.000):</h3>
          <ul class="space-y-1 text-slate-600 list-disc list-inside">
            <li>Transportasi Rata-rata (50% home service): <span class="font-mono font-bold text-slate-800">Rp3.000</span></li>
            <li>Bahan Habis Pakai Rata-rata: <span class="font-mono font-bold text-slate-800">Rp4.000</span></li>
          </ul>
        </div>

        <div class="pt-2 border-t border-slate-100 text-[11px] text-slate-500">
          * Komponen pengganti (SSD, router, kabel) dibayar oleh pelanggan dan tidak menjadi beban modal operasional TechCare.
        </div>
      </div>
    </div>

  </div>

  <!-- Tabel Proyeksi 6 Bulan (Bab 8.5, 8.6, 8.7) -->
  <div class="bg-white rounded-lg p-6 border border-slate-200 shadow-xs space-y-4">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
      <h2 class="font-heading font-bold text-base text-[#0B3A75]">
        8.7 Proyeksi Laba Bersih Kumulatif 6 Bulan Pertama (3 Skenario)
      </h2>
      <span class="text-xs text-slate-500">Harga rata-rata per transaksi: Rp77.000</span>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-xs text-left border-collapse">
        <thead>
          <tr class="bg-slate-50 border-b border-slate-200 text-slate-700 font-bold">
            <th class="py-2.5 px-3">Bulan</th>
            <th class="py-2.5 px-3 text-right">Konservatif (Laba)</th>
            <th class="py-2.5 px-3 text-right">Konserv. Kumulatif</th>
            <th class="py-2.5 px-3 text-right bg-blue-50/50">Normal (Laba)</th>
            <th class="py-2.5 px-3 text-right bg-blue-50/50">Normal Kumulatif</th>
            <th class="py-2.5 px-3 text-right">Optimis (Laba)</th>
            <th class="py-2.5 px-3 text-right">Optimis Kumulatif</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 font-mono">
          <tr>
            <td class="py-2 px-3 font-sans font-bold">Bulan 1</td>
            <td class="py-2 px-3 text-right">Rp153.000</td>
            <td class="py-2 px-3 text-right">Rp153.000</td>
            <td class="py-2 px-3 text-right bg-blue-50/30 font-bold">Rp293.000</td>
            <td class="py-2 px-3 text-right bg-blue-50/30">Rp293.000</td>
            <td class="py-2 px-3 text-right">Rp433.000</td>
            <td class="py-2 px-3 text-right">Rp433.000</td>
          </tr>
          <tr>
            <td class="py-2 px-3 font-sans font-bold">Bulan 2</td>
            <td class="py-2 px-3 text-right">Rp223.000</td>
            <td class="py-2 px-3 text-right">Rp376.000</td>
            <td class="py-2 px-3 text-right bg-blue-50/30 font-bold">Rp503.000</td>
            <td class="py-2 px-3 text-right bg-blue-50/30">Rp796.000</td>
            <td class="py-2 px-3 text-right">Rp853.000</td>
            <td class="py-2 px-3 text-right text-emerald-700 font-bold">Rp1.286.000 (Balik modal)</td>
          </tr>
          <tr>
            <td class="py-2 px-3 font-sans font-bold">Bulan 3</td>
            <td class="py-2 px-3 text-right">Rp293.000</td>
            <td class="py-2 px-3 text-right">Rp669.000</td>
            <td class="py-2 px-3 text-right bg-blue-50/30 font-bold">Rp713.000</td>
            <td class="py-2 px-3 text-right bg-blue-50/30 text-emerald-700 font-bold">Rp1.509.000 (Balik modal)</td>
            <td class="py-2 px-3 text-right">Rp1.273.000</td>
            <td class="py-2 px-3 text-right">Rp2.559.000</td>
          </tr>
          <tr>
            <td class="py-2 px-3 font-sans font-bold">Bulan 4</td>
            <td class="py-2 px-3 text-right">Rp363.000</td>
            <td class="py-2 px-3 text-right text-emerald-700 font-bold">Rp1.032.000 (Balik modal)</td>
            <td class="py-2 px-3 text-right bg-blue-50/30 font-bold">Rp853.000</td>
            <td class="py-2 px-3 text-right bg-blue-50/30">Rp2.362.000</td>
            <td class="py-2 px-3 text-right">Rp1.553.000</td>
            <td class="py-2 px-3 text-right">Rp4.112.000</td>
          </tr>
          <tr>
            <td class="py-2 px-3 font-sans font-bold">Bulan 5</td>
            <td class="py-2 px-3 text-right">Rp433.000</td>
            <td class="py-2 px-3 text-right">Rp1.465.000</td>
            <td class="py-2 px-3 text-right bg-blue-50/30 font-bold">Rp993.000</td>
            <td class="py-2 px-3 text-right bg-blue-50/30">Rp3.355.000</td>
            <td class="py-2 px-3 text-right">Rp1.833.000</td>
            <td class="py-2 px-3 text-right">Rp5.945.000</td>
          </tr>
          <tr>
            <td class="py-2 px-3 font-sans font-bold">Bulan 6</td>
            <td class="py-2 px-3 text-right">Rp433.000</td>
            <td class="py-2 px-3 text-right">Rp1.898.000</td>
            <td class="py-2 px-3 text-right bg-blue-50/30 font-bold">Rp993.000</td>
            <td class="py-2 px-3 text-right bg-blue-50/30">Rp4.348.000</td>
            <td class="py-2 px-3 text-right">Rp1.833.000</td>
            <td class="py-2 px-3 text-right">Rp7.778.000</td>
          </tr>
          <tr class="font-bold bg-slate-50 font-sans">
            <td class="py-2.5 px-3">Total 6 Bulan</td>
            <td class="py-2.5 px-3 text-right font-mono" colspan="2">Laba Bersih: Rp1.898.000 (38 Transaksi)</td>
            <td class="py-2.5 px-3 text-right font-mono bg-blue-100/50" colspan="2">Laba Bersih: Rp4.348.000 (73 Transaksi)</td>
            <td class="py-2.5 px-3 text-right font-mono" colspan="2">Laba Bersih: Rp7.778.000 (122 Transaksi)</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="p-3 bg-slate-50 border border-slate-200 rounded text-xs text-slate-600 leading-relaxed">
      <strong>Catatan Proposal Bab 8.7:</strong> Laba di atas dipandang sebagai penghasilan tambahan pemilik (Nur Muhibbin) selama bersekolah di SMKN 3 Yogyakarta. Pembanding UMK Kota Yogyakarta 2026 adalah Rp2.827.593 per bulan.
    </div>
  </div>

</div>

@endsection
