@extends('admin.layout')

@section('title', 'Perencanaan & Data Keuangan Internal (Bab VIII)')

@section('content')

<div class="space-y-6">
  
  <!-- Header -->
  <div class="bg-[#131F3F] rounded-xl p-5 border border-[#1E2D5A] shadow-xs flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
    <div>
      <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-[#0D9BE4] bg-[#0E1738] px-2.5 py-1 rounded border border-[#1E2D5A]">
        Bab VIII Proposal Usaha Mandiri
      </span>
      <h1 class="font-heading font-extrabold text-xl sm:text-2xl text-white mt-2">
        Data & Proyeksi Keuangan TechCare
      </h1>
      <p class="text-xs text-slate-400 mt-1">
        Rincian modal awal Rp1.000.000, biaya operasional tetap Rp127.000/bln, biaya variabel Rp7.000/transaksi, BEP, dan simulasi 6 bulan.
      </p>
    </div>

    <div class="text-xs text-amber-300 bg-amber-950/40 border border-amber-500/40 p-3 rounded-lg max-w-sm">
      <strong class="text-amber-200 block font-bold">🔒 Dokumen Finansial Internal:</strong>
      Data pada halaman ini adalah analisis kelayakan finansial internal proposal dan tidak dipublikasikan ke konsumen.
    </div>
  </div>

  <!-- KPI Kunci Keuangan (Bab 8.8 Ringkasan Keterkaitan Angka) -->
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
    
    <div class="bg-[#131F3F] rounded-xl p-5 border border-[#1E2D5A]">
      <span class="text-xs text-slate-400 block font-mono">Modal Awal (Bab 8.1)</span>
      <span class="font-mono font-extrabold text-2xl text-[#0D9BE4] mt-1 block">Rp1.000.000</span>
      <span class="text-[10px] text-slate-500 mt-1 block font-mono">Alat, bahan, promosi, cadangan</span>
    </div>

    <div class="bg-[#131F3F] rounded-xl p-5 border border-[#1E2D5A]">
      <span class="text-xs text-slate-400 block font-mono">Biaya Tetap / Bulan (8.2)</span>
      <span class="font-mono font-extrabold text-2xl text-white mt-1 block">Rp127.000</span>
      <span class="text-[10px] text-slate-500 mt-1 block font-mono">Kuota, promosi, rawat, susut</span>
    </div>

    <div class="bg-[#131F3F] rounded-xl p-5 border border-[#1E2D5A]">
      <span class="text-xs text-slate-400 block font-mono">BEP Operasional (8.8)</span>
      <span class="font-mono font-extrabold text-2xl text-emerald-400 mt-1 block">2 Transaksi</span>
      <span class="text-[10px] text-slate-500 mt-1 block font-mono">± Rp154.000 / bulan</span>
    </div>

    <div class="bg-[#131F3F] rounded-xl p-5 border border-[#1E2D5A]">
      <span class="text-xs text-slate-400 block font-mono">Balik Modal (Skenario Normal)</span>
      <span class="font-mono font-extrabold text-2xl text-indigo-400 mt-1 block">Bulan ke-3</span>
      <span class="text-[10px] text-slate-500 mt-1 block font-mono">Kumulatif laba: Rp1.509.000</span>
    </div>

  </div>

  <!-- Rincian Modal Awal & Biaya Operasional -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    
    <!-- Modal Awal Table -->
    <div class="bg-[#131F3F] rounded-xl border border-[#1E2D5A] overflow-hidden">
      <div class="p-4 border-b border-[#1E2D5A] bg-[#0E1738] flex items-center justify-between">
        <h3 class="font-heading font-bold text-sm text-white">Rincian Kebutuhan Modal Awal (Bab 8.1)</h3>
        <span class="font-mono font-bold text-xs text-[#0D9BE4]">Total: Rp1.000.000</span>
      </div>
      <table class="w-full text-xs text-left">
        <thead class="bg-[#0E1738] text-[10px] font-mono text-slate-400 uppercase tracking-wider border-b border-[#1E2D5A]">
          <tr>
            <th class="py-2.5 px-4">Komponen Kebutuhan</th>
            <th class="py-2.5 px-4 text-right">Alokasi Biaya</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#1E2D5A] font-mono">
          <tr class="hover:bg-white/5">
            <td class="py-2.5 px-4 text-slate-300">Peralatan Kerja (toolkit obeng, flashdisk 32GB, tester, crimping, adaptor SATA, antistatik, tas)</td>
            <td class="py-2.5 px-4 text-right text-white font-bold">Rp535.000</td>
          </tr>
          <tr class="hover:bg-white/5">
            <td class="py-2.5 px-4 text-slate-300">Bahan Habis Pakai (konektor RJ45, patch cord, thermal paste, alkohol IPA, kuas, cable ties)</td>
            <td class="py-2.5 px-4 text-right text-white font-bold">Rp255.000</td>
          </tr>
          <tr class="hover:bg-white/5">
            <td class="py-2.5 px-4 text-slate-300">Promosi Awal (cetak kartu nama 100 lbr & brosur A5 100 lbr)</td>
            <td class="py-2.5 px-4 text-right text-white font-bold">Rp115.000</td>
          </tr>
          <tr class="hover:bg-white/5">
            <td class="py-2.5 px-4 text-slate-300">Dana Cadangan Operasional (± 10%)</td>
            <td class="py-2.5 px-4 text-right text-white font-bold">Rp95.000</td>
          </tr>
          <tr class="bg-[#0E1738] font-bold">
            <td class="py-3 px-4 text-white">TOTAL MODAL AWAL</td>
            <td class="py-3 px-4 text-right text-[#0D9BE4]">Rp1.000.000</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Biaya Operasional (Tetap & Variabel) -->
    <div class="bg-[#131F3F] rounded-xl border border-[#1E2D5A] overflow-hidden">
      <div class="p-4 border-b border-[#1E2D5A] bg-[#0E1738] flex items-center justify-between">
        <h3 class="font-heading font-bold text-sm text-white">Struktur Biaya Operasional (Bab 8.2 & 8.3)</h3>
        <span class="font-mono text-xs text-emerald-400">Fixed + Variable</span>
      </div>
      <table class="w-full text-xs text-left">
        <thead class="bg-[#0E1738] text-[10px] font-mono text-slate-400 uppercase tracking-wider border-b border-[#1E2D5A]">
          <tr>
            <th class="py-2.5 px-4">Pos Pengeluaran</th>
            <th class="py-2.5 px-4 text-right">Nilai / Satuan</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#1E2D5A] font-mono">
          <tr class="bg-[#0E1738]/50">
            <td colspan="2" class="py-1.5 px-4 text-[10px] font-bold uppercase tracking-wider text-slate-400">Biaya Tetap Bulanan (Rp127.000)</td>
          </tr>
          <tr class="hover:bg-white/5">
            <td class="py-2 px-4 text-slate-300">• Paket data & internet (WA & referensi teknis)</td>
            <td class="py-2 px-4 text-right text-white">Rp50.000 / bln</td>
          </tr>
          <tr class="hover:bg-white/5">
            <td class="py-2 px-4 text-slate-300">• Promosi rutin & potongan diskon referral</td>
            <td class="py-2 px-4 text-right text-white">Rp30.000 / bln</td>
          </tr>
          <tr class="hover:bg-white/5">
            <td class="py-2 px-4 text-slate-300">• Perawatan alat & penggantian alat kecil</td>
            <td class="py-2 px-4 text-right text-white">Rp25.000 / bln</td>
          </tr>
          <tr class="hover:bg-white/5">
            <td class="py-2 px-4 text-slate-300">• Penyusutan peralatan (umur 24 bulan)</td>
            <td class="py-2 px-4 text-right text-white">Rp22.000 / bln</td>
          </tr>
          <tr class="bg-[#0E1738]/50">
            <td colspan="2" class="py-1.5 px-4 text-[10px] font-bold uppercase tracking-wider text-slate-400">Biaya Variabel per Transaksi (Rp7.000)</td>
          </tr>
          <tr class="hover:bg-white/5">
            <td class="py-2 px-4 text-slate-300">• Transportasi bensin (50% transaksi home service)</td>
            <td class="py-2 px-4 text-right text-white">Rp3.000 / order</td>
          </tr>
          <tr class="hover:bg-white/5">
            <td class="py-2 px-4 text-slate-300">• Bahan habis pakai rata-rata (pasta, konektor, IPA)</td>
            <td class="py-2 px-4 text-right text-white">Rp4.000 / order</td>
          </tr>
          <tr class="bg-[#0E1738] font-bold">
            <td class="py-2.5 px-4 text-white">MARGIN KONTRIBUSI (Rp77.000 - Rp7.000)</td>
            <td class="py-2.5 px-4 text-right text-emerald-400">Rp70.000 / order</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

  <!-- Proyeksi Penjualan & Laba 6 Bulan (Bab 8.6 & 8.7) -->
  <div class="bg-[#131F3F] rounded-xl border border-[#1E2D5A] overflow-hidden">
    <div class="p-4 sm:p-5 border-b border-[#1E2D5A] bg-[#0E1738] flex flex-col sm:flex-row sm:items-center justify-between gap-2">
      <div>
        <h3 class="font-heading font-bold text-sm text-white">Simulasi Penjualan & Laba Kumulatif 6 Bulan (Bab 8.6 & 8.7)</h3>
        <p class="text-[11px] text-slate-400 mt-0.5">Pembanding UMK Kota Yogyakarta 2026: Rp2.827.593/bulan.</p>
      </div>
      <span class="text-xs font-mono text-[#0D9BE4]">Rata-rata Pendapatan: Rp77.000/order</span>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-xs text-left">
        <thead class="bg-[#0E1738] text-[10px] font-mono text-slate-400 uppercase tracking-wider border-b border-[#1E2D5A]">
          <tr>
            <th class="py-3 px-4">Parameter Skenario</th>
            <th class="py-3 px-4 text-center">Bulan 1</th>
            <th class="py-3 px-4 text-center">Bulan 2</th>
            <th class="py-3 px-4 text-center">Bulan 3</th>
            <th class="py-3 px-4 text-center">Bulan 4</th>
            <th class="py-3 px-4 text-center">Bulan 5</th>
            <th class="py-3 px-4 text-center">Bulan 6</th>
            <th class="py-3 px-4 text-right">Total Transaksi</th>
            <th class="py-3 px-4 text-right">Balik Modal</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#1E2D5A] font-mono">
          
          <!-- Skenario Konservatif -->
          <tr class="hover:bg-white/5">
            <td class="py-3 px-4 text-slate-200">
              <strong class="text-white block font-sans">Konservatif (2 order/minggu)</strong>
              <span class="text-[10px] text-slate-500">Pendapatan 6 bln: Rp2.926.000</span>
            </td>
            <td class="py-3 px-4 text-center">4</td>
            <td class="py-3 px-4 text-center">5</td>
            <td class="py-3 px-4 text-center">6</td>
            <td class="py-3 px-4 text-center">7</td>
            <td class="py-3 px-4 text-center">8</td>
            <td class="py-3 px-4 text-center">8</td>
            <td class="py-3 px-4 text-right font-bold text-slate-200">38 order</td>
            <td class="py-3 px-4 text-right text-amber-400 font-bold">Bulan ke-4</td>
          </tr>

          <!-- Skenario Normal -->
          <tr class="hover:bg-white/5 bg-[#0E1738]/40">
            <td class="py-3 px-4 text-slate-200">
              <strong class="text-[#0D9BE4] block font-sans">Normal / Target (4 order/minggu)</strong>
              <span class="text-[10px] text-slate-500">Pendapatan 6 bln: Rp5.621.000</span>
            </td>
            <td class="py-3 px-4 text-center font-bold text-[#0D9BE4]">6</td>
            <td class="py-3 px-4 text-center font-bold text-[#0D9BE4]">9</td>
            <td class="py-3 px-4 text-center font-bold text-[#0D9BE4]">12</td>
            <td class="py-3 px-4 text-center font-bold text-[#0D9BE4]">14</td>
            <td class="py-3 px-4 text-center font-bold text-[#0D9BE4]">16</td>
            <td class="py-3 px-4 text-center font-bold text-[#0D9BE4]">16</td>
            <td class="py-3 px-4 text-right font-bold text-[#0D9BE4]">73 order</td>
            <td class="py-3 px-4 text-right text-emerald-400 font-bold">Bulan ke-3</td>
          </tr>

          <!-- Skenario Optimistis -->
          <tr class="hover:bg-white/5">
            <td class="py-3 px-4 text-slate-200">
              <strong class="text-emerald-400 block font-sans">Optimistis (7 order/minggu)</strong>
              <span class="text-[10px] text-slate-500">Pendapatan 6 bln: Rp9.394.000</span>
            </td>
            <td class="py-3 px-4 text-center">8</td>
            <td class="py-3 px-4 text-center">14</td>
            <td class="py-3 px-4 text-center">20</td>
            <td class="py-3 px-4 text-center">24</td>
            <td class="py-3 px-4 text-center">28</td>
            <td class="py-3 px-4 text-center">28</td>
            <td class="py-3 px-4 text-right font-bold text-emerald-400">122 order</td>
            <td class="py-3 px-4 text-right text-emerald-400 font-bold">Bulan ke-2</td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
