@extends('admin.layout')

@section('title', 'Manajemen Pesanan & Booking')

@section('content')

<div class="space-y-6">
  
  <!-- Header -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-xl sm:text-2xl font-heading font-extrabold text-white">Daftar Pesanan & Konsultasi</h1>
      <p class="text-xs text-slate-400 mt-1">Kelola status pengerjaan, atur estimasi biaya, beri catatan teknisi, dan balas via WhatsApp.</p>
    </div>

    <!-- Search Form -->
    <form action="{{ route('admin.orders') }}" method="GET" class="flex items-center gap-2">
      <input type="text" name="search" value="{{ $search ?? '' }}" 
             placeholder="Cari kode, nama, HP..." 
             class="px-3.5 py-2 rounded-lg bg-[#131F3F] border border-[#1E2D5A] text-xs text-white placeholder-slate-500 focus:outline-hidden focus:border-[#0D9BE4] w-48 sm:w-64 font-mono">
      @if(!empty($currentStatus) && $currentStatus !== 'semua')
        <input type="hidden" name="status" value="{{ $currentStatus }}">
      @endif
      <button type="submit" class="px-3 py-2 rounded-lg bg-[#0D9BE4] hover:bg-[#0c8ad0] text-white text-xs font-semibold">
        Cari
      </button>
      @if(!empty($search))
        <a href="{{ route('admin.orders') }}" class="px-2.5 py-2 rounded-lg bg-[#18264E] text-slate-400 hover:text-white text-xs">Reset</a>
      @endif
    </form>
  </div>

  <!-- Status Filter Tabs -->
  <div class="flex flex-wrap gap-2 pt-1">
    @php
      $statuses = [
        'semua' => 'Semua',
        'baru' => 'Baru',
        'dikonfirmasi' => 'Dikonfirmasi',
        'dikerjakan' => 'Sedang Dikerjakan',
        'selesai' => 'Selesai',
        'dibatalkan' => 'Dibatalkan',
      ];
    @endphp

    @foreach ($statuses as $key => $label)
      <a href="{{ route('admin.orders', array_merge($key === 'semua' ? [] : ['status' => $key], !empty($search) ? ['search' => $search] : [])) }}" 
         class="px-3.5 py-1.5 rounded-lg text-xs font-mono font-semibold transition-all border {{ $currentStatus === $key ? 'bg-[#0D9BE4] text-white border-[#0D9BE4] shadow-xs' : 'bg-[#131F3F] text-slate-300 border-[#1E2D5A] hover:border-slate-500' }}">
        {{ $label }}
      </a>
    @endforeach
  </div>

  <!-- Orders Grid / List -->
  @if ($consultations->isEmpty())
    <div class="bg-[#131F3F] rounded-xl p-16 text-center border border-[#1E2D5A]">
      <p class="text-sm font-mono text-slate-400">Tidak ada pesanan dengan kriteria filter saat ini.</p>
    </div>
  @else
    <div class="space-y-4">
      @foreach ($consultations as $order)
        <div id="order-{{ $order->id }}" class="bg-[#131F3F] rounded-xl p-5 sm:p-6 border border-[#1E2D5A] shadow-xs hover:border-[#0D9BE4]/40 transition-all">
          <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 pb-4 border-b border-[#1E2D5A]">
            
            <div class="flex items-center gap-3">
              <span class="font-mono font-bold text-xs text-[#0D9BE4] px-2.5 py-1 rounded bg-[#0E1738] border border-[#1E2D5A]">
                #{{ $order->order_code }}
              </span>
              <span class="text-xs text-slate-400 font-mono">
                Diajukan: {{ $order->created_at->format('d M Y, H:i WIB') }}
              </span>
            </div>

            <!-- Status Badge & WA Reply -->
            <div class="flex items-center gap-3 w-full lg:w-auto justify-between lg:justify-end">
              <span class="px-2.5 py-1 rounded text-xs font-mono font-semibold
                @if($order->status === 'baru') bg-amber-500/20 text-amber-300 border border-amber-500/40
                @elseif($order->status === 'dikonfirmasi') bg-blue-500/20 text-blue-300 border border-blue-500/40
                @elseif($order->status === 'dikerjakan') bg-purple-500/20 text-purple-300 border border-purple-500/40
                @elseif($order->status === 'selesai') bg-emerald-500/20 text-emerald-300 border border-emerald-500/40
                @else bg-rose-500/20 text-rose-300 border border-rose-500/40 @endif">
                {{ ucfirst($order->status) }}
              </span>

              <a href="{{ route('admin.orders.reply_wa', $order) }}" target="_blank" 
                 class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-semibold transition-colors shadow-xs">
                <span>Balas WhatsApp</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
              </a>
            </div>

          </div>

          <!-- Order Details Grid -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 py-4 text-xs">
            
            <!-- Col 1: Customer Info -->
            <div class="space-y-2">
              <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block">Informasi Pelanggan</span>
              <p class="font-bold text-sm text-white">{{ $order->customer_name }}</p>
              @if ($order->customer_phone)
                <p class="text-slate-300 font-mono">No. WA: {{ $order->customer_phone }}</p>
              @endif
              <p class="text-slate-400">Lokasi: <span class="text-slate-200">{{ $order->location }}</span></p>
              @if ($order->home_service_tier)
                <span class="inline-block px-2 py-0.5 rounded text-[10px] font-mono bg-teal-900/60 text-teal-300 border border-teal-700/50">
                  {{ $order->home_service_tier }}
                </span>
              @endif
            </div>

            <!-- Col 2: Service & Device Request -->
            <div class="space-y-2">
              <span class="text-[10px] font-mono uppercase tracking-wider text-slate-400 block">Layanan & Kendala</span>
              <p class="font-bold text-slate-200">{{ $order->service_name }}</p>
              <p class="text-slate-300">Perangkat: <span class="font-medium text-white">{{ $order->device }}</span></p>
              <div class="p-2.5 rounded bg-[#0E1738] border border-[#1E2D5A] text-slate-300 mt-1">
                <span class="text-[10px] font-mono text-slate-400 block mb-0.5">Deskripsi Keluhan:</span>
                <p class="italic text-xs text-slate-300">"{{ $order->problem }}"</p>
              </div>
              <p class="text-slate-400">Preferensi Waktu: <span class="text-slate-200">{{ $order->preferred_time }}</span></p>
            </div>

            <!-- Col 3: Technician Workstation / Form Update -->
            <div class="bg-[#0E1738] p-4 rounded-lg border border-[#1E2D5A]">
              <span class="text-[10px] font-mono uppercase tracking-wider text-[#0D9BE4] block font-bold mb-3">Tindakan Teknisi</span>

              <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="space-y-3">
                @csrf
                @method('PUT')

                <div>
                  <label class="text-[11px] text-slate-300 block mb-1">Ubah Status</label>
                  <select name="status" class="w-full px-2.5 py-1.5 rounded bg-[#131F3F] border border-[#1E2D5A] text-xs text-white focus:outline-hidden focus:border-[#0D9BE4]">
                    <option value="baru" {{ $order->status === 'baru' ? 'selected' : '' }}>Baru (Menunggu Respon)</option>
                    <option value="dikonfirmasi" {{ $order->status === 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi (Jadwal Disetujui)</option>
                    <option value="dikerjakan" {{ $order->status === 'dikerjakan' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                    <option value="selesai" {{ $order->status === 'selesai' ? 'selected' : '' }}>Selesai (Garansi Aktif)</option>
                    <option value="dibatalkan" {{ $order->status === 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                  </select>
                </div>

                <div>
                  <label class="text-[11px] text-slate-300 block mb-1">Estimasi / Biaya Final (Rp)</label>
                  <input type="number" name="estimated_cost" value="{{ $order->estimated_cost }}" placeholder="cth: 80000" class="w-full px-2.5 py-1.5 rounded bg-[#131F3F] border border-[#1E2D5A] text-xs text-white font-mono focus:outline-hidden focus:border-[#0D9BE4]">
                </div>

                <div>
                  <label class="text-[11px] text-slate-300 block mb-1">Catatan Internal Teknisi</label>
                  <textarea name="technician_notes" rows="2" placeholder="Catatan partisi, kendala khusus, dll..." class="w-full px-2.5 py-1.5 rounded bg-[#131F3F] border border-[#1E2D5A] text-xs text-white focus:outline-hidden focus:border-[#0D9BE4]">{{ $order->technician_notes }}</textarea>
                </div>

                <div class="flex items-center justify-between pt-1">
                  <button type="submit" class="px-3 py-1.5 rounded bg-[#0D9BE4] hover:bg-[#0c8ad0] text-white text-xs font-semibold transition-colors">
                    Simpan Update
                  </button>
                  <button type="button" 
                          onclick="if(confirm('Yakin ingin menghapus pesanan ini?')) document.getElementById('delete-form-{{ $order->id }}').submit();"
                          class="text-rose-400 hover:text-rose-300 text-[11px]">
                    Hapus
                  </button>
                </div>
              </form>

              <form id="delete-form-{{ $order->id }}" action="{{ route('admin.orders.delete', $order) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
              </form>

            </div>

          </div>
        </div>
      @endforeach
    </div>

    <!-- Pagination -->
    <div class="pt-4">
      {{ $consultations->links() }}
    </div>
  @endif

</div>

@endsection
