@extends('admin.layout')

@section('title', 'Dashboard Overview')

@section('content')

<div class="space-y-6">
  
  <!-- Top Welcome Banner -->
  <div class="bg-[#131F3F] border border-[#1E2D5A] rounded-xl p-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
    <div>
      <div class="flex items-center gap-2">
        <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold uppercase bg-[#0D9BE4]/20 text-[#0D9BE4] border border-[#0D9BE4]/30">IT Support Dashboard</span>
        <span class="text-xs text-slate-400">Minggir, Sleman • Yogyakarta</span>
      </div>
      <h1 class="text-xl sm:text-2xl font-heading font-extrabold text-white mt-1.5">Ringkasan Operasional & Pemasaran</h1>
      <p class="text-xs text-slate-400 mt-0.5">Monitoring real-time pesanan pelanggan, pencapaian target BEP, dan performa trafik website.</p>
    </div>

    <div class="flex items-center gap-2">
      <a href="{{ route('admin.orders') }}" class="px-3.5 py-2 rounded-lg bg-[#0D9BE4] hover:bg-[#0c8ad0] text-white text-xs font-semibold shadow-xs flex items-center gap-2 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        <span>Lihat Semua Pesanan ({{ $stats['total'] }})</span>
      </a>
      <a href="{{ route('admin.services') }}" class="px-3.5 py-2 rounded-lg bg-[#18264E] hover:bg-[#1E3060] text-slate-200 text-xs font-semibold border border-[#233566] transition-colors">
        <span>Katalog Layanan</span>
      </a>
    </div>
  </div>

  <!-- 4 Top Metric Cards (Directly Inspired by User's Dashboard Screenshot) -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    
    <!-- 1. Estimasi Nilai Servis (Revenue Completed) -->
    <div class="bg-[#131F3F] border border-[#1E2D5A] rounded-xl p-5 relative overflow-hidden group hover:border-[#0D9BE4]/50 transition-all">
      <div class="flex items-center justify-between">
        <span class="text-xs font-medium text-slate-400">Omset Servis Selesai</span>
        <div class="w-9 h-9 rounded-lg bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 flex items-center justify-center">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
      </div>
      <div class="mt-3">
        <span class="font-mono font-extrabold text-2xl text-white tracking-tight">
          Rp{{ number_format($estimatedCompletedRevenue, 0, ',', '.') }}
        </span>
      </div>
      <div class="mt-2 flex items-center gap-1.5 text-[11px] text-emerald-400">
        <span>↑ Target BEP Ops: Rp154.000</span>
      </div>
    </div>

    <!-- 2. Total Pengunjung Unik (Privacy Analytics) -->
    <div class="bg-[#131F3F] border border-[#1E2D5A] rounded-xl p-5 relative overflow-hidden group hover:border-[#0D9BE4]/50 transition-all">
      <div class="flex items-center justify-between">
        <span class="text-xs font-medium text-slate-400">Pengunjung Unik (30 Hari)</span>
        <div class="w-9 h-9 rounded-lg bg-[#0D9BE4]/15 border border-[#0D9BE4]/30 text-[#0D9BE4] flex items-center justify-center">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
      </div>
      <div class="mt-3">
        <span class="font-mono font-extrabold text-2xl text-white tracking-tight">
          {{ $visitors30Days }}
        </span>
        <span class="text-xs text-slate-400 ml-1">visitor</span>
      </div>
      <div class="mt-2 flex items-center gap-1.5 text-[11px] text-slate-400">
        <span class="text-[#0D9BE4]">{{ $visitors7Days }} pengunjung</span>
        <span>dalam 7 hari terakhir</span>
      </div>
    </div>

    <!-- 3. Total Pesanan / Servis -->
    <div class="bg-[#131F3F] border border-[#1E2D5A] rounded-xl p-5 relative overflow-hidden group hover:border-[#0D9BE4]/50 transition-all">
      <div class="flex items-center justify-between">
        <span class="text-xs font-medium text-slate-400">Total Pesanan Booking</span>
        <div class="w-9 h-9 rounded-lg bg-indigo-500/15 border border-indigo-500/30 text-indigo-400 flex items-center justify-center">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
        </div>
      </div>
      <div class="mt-3 flex items-baseline gap-2">
        <span class="font-mono font-extrabold text-2xl text-white tracking-tight">{{ $stats['total'] }}</span>
        @if ($stats['baru'] > 0)
          <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-500 text-slate-950 font-mono">{{ $stats['baru'] }} baru</span>
        @endif
      </div>
      <div class="mt-2 text-[11px] text-slate-400 flex items-center gap-2">
        <span class="text-emerald-400">{{ $stats['selesai'] }} tuntas</span>
        <span>•</span>
        <span class="text-purple-400">{{ $stats['dikerjakan'] }} pengerjaan</span>
      </div>
    </div>

    <!-- 4. Klik WhatsApp & Konversi -->
    <div class="bg-[#131F3F] border border-[#1E2D5A] rounded-xl p-5 relative overflow-hidden group hover:border-[#0D9BE4]/50 transition-all">
      <div class="flex items-center justify-between">
        <span class="text-xs font-medium text-slate-400">Klik WA & Konversi</span>
        <div class="w-9 h-9 rounded-lg bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 flex items-center justify-center">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
        </div>
      </div>
      <div class="mt-3 flex items-baseline gap-2">
        <span class="font-mono font-extrabold text-2xl text-white tracking-tight">{{ $waClicks }}</span>
        <span class="text-xs text-slate-400">klik WA</span>
      </div>
      <div class="mt-2 flex items-center gap-1.5 text-[11px] text-amber-400">
        <span>Rasio Konversi: {{ $conversionRate }}%</span>
      </div>
    </div>

  </div>

  <!-- Middle Section: Goal / BEP Overview & Recent Activity Feed -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Left: Goal Overview (Circular Meter matching Tivo Design) -->
    <div class="lg:col-span-5 bg-[#131F3F] border border-[#1E2D5A] rounded-xl p-5 flex flex-col justify-between">
      <div>
        <div class="flex items-center justify-between">
          <div>
            <span class="text-[10px] font-mono font-bold text-[#0D9BE4] uppercase tracking-wider">Bab VIII Proposal</span>
            <h3 class="text-base font-heading font-bold text-white mt-0.5">Target BEP & Proyeksi Laba</h3>
          </div>
          <span class="px-2 py-0.5 rounded text-[10px] font-mono font-semibold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
            Bulan Ini
          </span>
        </div>
        <p class="text-xs text-slate-400 mt-1">Titik impas operasional (2 pesanan) & target gaji pemilik Rp500.000 (9 pesanan).</p>
      </div>

      <!-- Circular Radial Chart Visual -->
      <div class="py-6 flex flex-col items-center justify-center">
        <div class="relative w-44 h-44 flex items-center justify-center">
          <svg class="w-full h-full -rotate-90" viewBox="0 0 100 100">
            <!-- Background circle -->
            <circle cx="50" cy="50" r="40" class="stroke-[#18264E]" stroke-width="10" fill="transparent" />
            <!-- Progress circle -->
            @php
              $circumference = 2 * pi() * 40;
              $dashoffset = $circumference - ($circumference * ($goalProgressPercent / 100));
            @endphp
            <circle cx="50" cy="50" r="40" class="stroke-[#0D9BE4]" stroke-width="10" 
                    stroke-dasharray="{{ $circumference }}" 
                    stroke-dashoffset="{{ $dashoffset }}"
                    stroke-linecap="round" 
                    fill="transparent" />
          </svg>
          <div class="absolute inset-0 flex flex-col items-center justify-center text-center">
            <span class="font-mono font-extrabold text-3xl text-white">{{ $goalProgressPercent }}%</span>
            <span class="text-[11px] font-mono text-slate-400 uppercase">Target Tercapai</span>
          </div>
        </div>
      </div>

      <!-- Financial Metrics Breakdown -->
      <div class="grid grid-cols-3 gap-2 pt-4 border-t border-[#1E2D5A] text-center text-xs font-mono">
        <div class="p-2 rounded bg-[#0E1738]">
          <span class="text-[10px] text-slate-400 block">BEP Operasional</span>
          <strong class="text-slate-200 block mt-0.5">{{ $bepBase }} Order</strong>
          <span class="text-[10px] text-slate-500 block">(Rp154.000)</span>
        </div>
        <div class="p-2 rounded bg-[#0E1738]">
          <span class="text-[10px] text-slate-400 block">Target Bulanan</span>
          <strong class="text-[#0D9BE4] block mt-0.5">{{ $monthlyTarget }} Order</strong>
          <span class="text-[10px] text-slate-500 block">(Rp693.000)</span>
        </div>
        <div class="p-2 rounded bg-[#0E1738]">
          <span class="text-[10px] text-slate-400 block">Realisasi</span>
          <strong class="text-emerald-400 block mt-0.5">{{ $currentMonthOrders }} Order</strong>
          <span class="text-[10px] text-emerald-500 block">Bulan ini</span>
        </div>
      </div>
    </div>

    <!-- Right: Recent Activity / Audit Feed (matching Tivo screenshot) -->
    <div class="lg:col-span-7 bg-[#131F3F] border border-[#1E2D5A] rounded-xl p-5 flex flex-col justify-between">
      <div>
        <div class="flex items-center justify-between">
          <div>
            <span class="text-[10px] font-mono font-bold text-amber-400 uppercase tracking-wider">Audit Trail</span>
            <h3 class="text-base font-heading font-bold text-white mt-0.5">Aktivitas & Log Sistem Terbaru</h3>
          </div>
          <a href="{{ route('admin.activity_logs') }}" class="text-xs font-mono text-[#0D9BE4] hover:underline">Lihat Semua &rarr;</a>
        </div>
        <p class="text-xs text-slate-400 mt-1">Mencatat riwayat perubahan harga, booking masuk, dan pengaturan sistem.</p>
      </div>

      <div class="mt-4 space-y-3">
        @forelse ($recentActivities as $log)
          <div class="p-3 rounded-lg bg-[#0E1738] border border-[#1E2D5A] flex items-start gap-3 text-xs">
            <div class="w-7 h-7 rounded-full shrink-0 flex items-center justify-center font-bold text-[10px]
              @if(str_contains($log->action, 'price')) bg-amber-500/20 text-amber-300 border border-amber-500/30
              @elseif(str_contains($log->action, 'booking')) bg-emerald-500/20 text-emerald-300 border border-emerald-500/30
              @elseif(str_contains($log->action, 'order')) bg-blue-500/20 text-blue-300 border border-blue-500/30
              @else bg-slate-700 text-slate-300 @endif">
              @if(str_contains($log->action, 'price')) Rp
              @elseif(str_contains($log->action, 'booking')) +
              @elseif(str_contains($log->action, 'order')) ✓
              @else ⚙ @endif
            </div>
            <div class="flex-1 min-w-0">
              <div class="flex items-center justify-between gap-2">
                <span class="font-semibold text-slate-200 truncate">{{ $log->description }}</span>
                <span class="text-[10px] font-mono text-slate-400 shrink-0">{{ $log->created_at->diffForHumans() }}</span>
              </div>
              <span class="text-[11px] text-slate-400 block mt-0.5 font-mono">Oleh: {{ $log->user_name ?? 'Client Website' }}</span>
            </div>
          </div>
        @empty
          <div class="p-8 text-center text-slate-400 text-xs font-mono">
            Belum ada aktivitas tercatat. Aktivitas perubahan harga atau pemesanan akan otomatis muncul di sini.
          </div>
        @endforelse
      </div>

      <div class="mt-4 pt-3 border-t border-[#1E2D5A] flex items-center justify-between text-xs text-slate-400">
        <span class="font-mono text-[11px]">Audit first-party aktif tanpa pihak ketiga.</span>
        <a href="{{ route('admin.monitoring') }}" class="text-[#0D9BE4] hover:text-white font-medium flex items-center gap-1">
          <span>Detail Trafik Pengunjung</span>
          &rarr;
        </a>
      </div>
    </div>

  </div>

  <!-- Bottom Section: Recent Orders Table (Matching Order List in Screenshot) -->
  <div class="bg-[#131F3F] border border-[#1E2D5A] rounded-xl overflow-hidden shadow-xs">
    
    <div class="p-5 border-b border-[#1E2D5A] flex flex-col sm:flex-row sm:items-center justify-between gap-4">
      <div>
        <div class="flex items-center gap-2">
          <span class="text-[10px] font-mono font-bold text-emerald-400 uppercase tracking-wider">Antrean Servis</span>
          <span class="px-2 py-0.5 rounded text-[10px] font-mono bg-white/10 text-slate-300">{{ $stats['total'] }} Order</span>
        </div>
        <h3 class="text-base font-heading font-bold text-white mt-0.5">Daftar Konsultasi & Pesanan Masuk</h3>
      </div>
      <div class="flex items-center gap-2">
        <a href="{{ route('admin.orders') }}" class="px-3 py-1.5 rounded-lg bg-[#18264E] hover:bg-[#1E3060] text-slate-200 text-xs font-semibold border border-[#233566] transition-colors">
          Lihat Semua & Filter Status
        </a>
      </div>
    </div>

    @if ($recentConsultations->isEmpty())
      <div class="p-12 text-center text-slate-400 text-xs font-mono">
        Belum ada pesanan yang masuk melalui website.
      </div>
    @else
      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
          <thead class="bg-[#0E1738] text-[11px] font-mono uppercase tracking-wider text-slate-400 border-b border-[#1E2D5A]">
            <tr>
              <th class="py-3 px-4">Kode & Tanggal</th>
              <th class="py-3 px-4">Pelanggan</th>
              <th class="py-3 px-4">Perangkat & Masalah</th>
              <th class="py-3 px-4">Layanan</th>
              <th class="py-3 px-4">Status</th>
              <th class="py-3 px-4 text-right">Aksi Cepat</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#1E2D5A]">
            @foreach ($recentConsultations as $order)
              <tr class="hover:bg-white/5 transition-colors">
                <td class="py-3.5 px-4 whitespace-nowrap">
                  <span class="font-mono text-xs font-bold text-[#0D9BE4] block">#{{ $order->order_code }}</span>
                  <span class="text-[10px] text-slate-400 font-mono">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                </td>
                <td class="py-3.5 px-4">
                  <span class="font-semibold text-white block">{{ $order->customer_name }}</span>
                  <span class="text-[11px] text-slate-400 block">{{ $order->location }}</span>
                  @if($order->customer_phone)
                    <span class="text-[10px] text-slate-400 font-mono">{{ $order->customer_phone }}</span>
                  @endif
                </td>
                <td class="py-3.5 px-4 max-w-xs">
                  <span class="text-xs text-slate-200 font-medium block">{{ $order->device }}</span>
                  <p class="text-[11px] text-slate-400 truncate" title="{{ $order->problem }}">{{ $order->problem }}</p>
                </td>
                <td class="py-3.5 px-4">
                  <span class="text-xs text-slate-200 block font-medium">{{ $order->service_name }}</span>
                  @if($order->home_service_tier)
                    <span class="text-[10px] font-mono text-emerald-400 bg-emerald-500/10 px-1.5 py-0.5 rounded border border-emerald-500/20 inline-block mt-0.5">{{ $order->home_service_tier }}</span>
                  @endif
                </td>
                <td class="py-3.5 px-4">
                  <span class="px-2.5 py-1 rounded text-[11px] font-mono font-semibold 
                    @if($order->status === 'baru') bg-amber-500/20 text-amber-300 border border-amber-500/40
                    @elseif($order->status === 'dikonfirmasi') bg-blue-500/20 text-blue-300 border border-blue-500/40
                    @elseif($order->status === 'dikerjakan') bg-purple-500/20 text-purple-300 border border-purple-500/40
                    @elseif($order->status === 'selesai') bg-emerald-500/20 text-emerald-300 border border-emerald-500/40
                    @else bg-rose-500/20 text-rose-300 border border-rose-500/40 @endif">
                    {{ ucfirst($order->status) }}
                  </span>
                </td>
                <td class="py-3.5 px-4 text-right space-x-1 whitespace-nowrap">
                  <a href="{{ route('admin.orders.reply_wa', $order) }}" target="_blank" 
                     class="inline-flex items-center gap-1 px-3 py-1.5 rounded bg-emerald-600 hover:bg-emerald-500 text-white text-[11px] font-semibold transition-colors shadow-xs" title="Balas ke WhatsApp Klien">
                    <span>Balas WA</span>
                  </a>
                  <a href="{{ route('admin.orders') }}#order-{{ $order->id }}" 
                     class="inline-flex items-center px-2.5 py-1.5 rounded bg-[#18264E] hover:bg-[#1E3060] text-slate-200 text-[11px] font-semibold border border-[#233566] transition-colors">
                    Kelola
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif

  </div>

</div>

@endsection
