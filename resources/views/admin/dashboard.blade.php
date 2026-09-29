@extends('admin.layout')

@section('title', 'Dashboard Overview')

@section('content')

<div class="space-y-8">
  
  <!-- Top Welcome & WhatsApp Status Header -->
  <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-xs flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
    <div>
      <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8] bg-[#F0F7FD] px-2.5 py-1 rounded">Pusat Kendali Teknisi</span>
      <h1 class="font-heading font-extrabold text-2xl text-[#0B3A75] mt-2">Selamat Datang, {{ auth()->user()->name }}!</h1>
      <p class="text-slate-500 text-xs mt-1">Pantau pesanan masuk, konfirmasi jadwal pengerjaan, dan kelola konfigurasi website.</p>
    </div>

    <!-- Active WhatsApp Info Pill -->
    <div class="bg-slate-50 border border-slate-200 rounded-lg p-3.5 flex items-center gap-3 shrink-0">
      <div class="w-8 h-8 rounded bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-xs">
        WA
      </div>
      <div>
        <span class="text-[10px] text-slate-500 uppercase tracking-wider font-semibold block">Nomor WhatsApp Aktif:</span>
        <span class="font-mono font-bold text-xs text-slate-800">+{{ $whatsappNumber }}</span>
      </div>
      <a href="{{ route('admin.settings') }}" class="px-2.5 py-1 rounded bg-[#0B3A75] hover:bg-[#07254C] text-white text-[11px] font-semibold transition-colors">
        Ubah
      </a>
    </div>
  </div>

  <!-- KPI Metric Cards -->
  <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
    
    <!-- Total -->
    <div class="bg-white rounded-lg p-5 border border-slate-200 shadow-2xs">
      <span class="text-xs text-slate-500 block">Total Pesanan</span>
      <span class="font-mono font-extrabold text-2xl text-slate-900 mt-1 block">{{ $stats['total'] }}</span>
      <span class="text-[11px] text-slate-400 mt-0.5 block">Semua waktu</span>
    </div>

    <!-- Baru -->
    <div class="bg-white rounded-lg p-5 border border-blue-200 bg-blue-50/20 shadow-2xs">
      <div class="flex items-center justify-between">
        <span class="text-xs font-semibold text-blue-700">Pesanan Baru</span>
        <span class="w-2 h-2 rounded-full bg-blue-600"></span>
      </div>
      <span class="font-mono font-extrabold text-2xl text-blue-700 mt-1 block">{{ $stats['baru'] }}</span>
      <span class="text-[11px] text-blue-600/80 mt-0.5 block">Perlu ditindaklanjuti</span>
    </div>

    <!-- Dikonfirmasi -->
    <div class="bg-white rounded-lg p-5 border border-amber-200 bg-amber-50/20 shadow-2xs">
      <span class="text-xs font-semibold text-amber-700 block">Dikonfirmasi</span>
      <span class="font-mono font-extrabold text-2xl text-amber-700 mt-1 block">{{ $stats['dikonfirmasi'] }}</span>
      <span class="text-[11px] text-amber-600/80 mt-0.5 block">Jadwal disepakati</span>
    </div>

    <!-- Dikerjakan -->
    <div class="bg-white rounded-lg p-5 border border-purple-200 bg-purple-50/20 shadow-2xs">
      <span class="text-xs font-semibold text-purple-700 block">Sedang Dikerjakan</span>
      <span class="font-mono font-extrabold text-2xl text-purple-700 mt-1 block">{{ $stats['dikerjakan'] }}</span>
      <span class="text-[11px] text-purple-600/80 mt-0.5 block">Proses teknisi</span>
    </div>

    <!-- Selesai -->
    <div class="bg-white rounded-lg p-5 border border-emerald-200 bg-emerald-50/20 shadow-2xs col-span-2 sm:col-span-1">
      <span class="text-xs font-semibold text-emerald-700 block">Selesai</span>
      <span class="font-mono font-extrabold text-2xl text-emerald-700 mt-1 block">{{ $stats['selesai'] }}</span>
      <span class="text-[11px] text-emerald-600/80 mt-0.5 block">Tuntas & garansi 7 hari</span>
    </div>

  </div>

  <!-- Recent Bookings Table -->
  <div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="p-5 border-b border-slate-100 flex items-center justify-between">
      <div>
        <h3 class="font-heading font-bold text-base text-[#0B3A75]">Pesanan Konsultasi Terbaru</h3>
        <p class="text-xs text-slate-500">Daftar booking yang masuk melalui website</p>
      </div>
      <a href="{{ route('admin.orders') }}" class="text-xs font-bold text-[#0B3A75] hover:text-[#1E9BE8] flex items-center gap-1">
        <span>Lihat Semua Pesanan</span>
        &rarr;
      </a>
    </div>

    @if ($recentConsultations->isEmpty())
      <div class="p-12 text-center text-slate-400 text-xs">
        <p class="font-medium text-slate-600">Belum ada pesanan yang masuk.</p>
        <p class="mt-1">Pesanan yang diajukan pengunjung website akan muncul di sini secara real-time.</p>
      </div>
    @else
      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
          <thead class="bg-slate-50 text-[11px] font-bold text-slate-500 uppercase tracking-wider border-b border-slate-200">
            <tr>
              <th class="py-3 px-4">Kode & Tanggal</th>
              <th class="py-3 px-4">Pelanggan</th>
              <th class="py-3 px-4">Perangkat & Masalah</th>
              <th class="py-3 px-4">Layanan</th>
              <th class="py-3 px-4">Status</th>
              <th class="py-3 px-4 text-right">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            @foreach ($recentConsultations as $order)
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="py-3 px-4 whitespace-nowrap">
                  <span class="font-mono text-xs font-bold text-[#0B3A75] block">{{ $order->order_code }}</span>
                  <span class="text-[11px] text-slate-400">{{ $order->created_at->format('d M Y, H:i') }}</span>
                </td>
                <td class="py-3 px-4">
                  <strong class="font-medium text-slate-900 block">{{ $order->customer_name }}</strong>
                  <span class="text-xs text-slate-500">{{ $order->location }}</span>
                  @if($order->customer_phone)
                    <span class="text-[11px] text-slate-400 block font-mono">{{ $order->customer_phone }}</span>
                  @endif
                </td>
                <td class="py-3 px-4 max-w-xs">
                  <strong class="text-xs text-slate-800 block">{{ $order->device }}</strong>
                  <p class="text-xs text-slate-500 truncate" title="{{ $order->problem }}">{{ $order->problem }}</p>
                </td>
                <td class="py-3 px-4">
                  <span class="text-xs text-slate-700 font-medium">{{ $order->service_name }}</span>
                  @if($order->home_service_tier)
                    <span class="text-[10px] block text-teal-700 bg-teal-50 px-1.5 py-0.5 rounded w-max mt-0.5">{{ $order->home_service_tier }}</span>
                  @endif
                </td>
                <td class="py-3 px-4">
                  @php $badge = $order->status_badge; @endphp
                  <span class="px-2 py-0.5 rounded text-[11px] font-semibold border {{ $badge['class'] }}">
                    {{ $badge['label'] }}
                  </span>
                </td>
                <td class="py-3 px-4 text-right space-x-1 whitespace-nowrap">
                  <a href="{{ route('admin.orders.reply_wa', $order) }}" target="_blank" class="inline-flex items-center px-2.5 py-1 rounded bg-emerald-600 hover:bg-emerald-700 text-white text-[11px] font-semibold transition-colors" title="Balas via WhatsApp">
                    Balas WA
                  </a>
                  <a href="{{ route('admin.orders') }}#order-{{ $order->id }}" class="inline-flex items-center px-2.5 py-1 rounded bg-slate-100 hover:bg-slate-200 text-slate-700 text-[11px] font-semibold transition-colors">
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
