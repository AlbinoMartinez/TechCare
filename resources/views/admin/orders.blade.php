@extends('admin.layout')

@section('title', 'Manajemen Pesanan & Booking')

@section('content')

<div class="space-y-6">
  
  <!-- Header -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="font-heading font-extrabold text-2xl text-[#0B3A75]">Daftar Pesanan & Konsultasi</h1>
      <p class="text-xs text-slate-500 mt-1">Kelola status pengerjaan, beri catatan teknisi, dan balas langsung ke WhatsApp pelanggan.</p>
    </div>
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
      <a href="{{ route('admin.orders', $key === 'semua' ? [] : ['status' => $key]) }}" 
         class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition-all border {{ $currentStatus === $key ? 'bg-[#0B3A75] text-white border-[#0B3A75]' : 'bg-white text-slate-600 border-slate-200 hover:border-slate-300' }}">
        {{ $label }}
      </a>
    @endforeach
  </div>

  <!-- Orders Grid / List -->
  @if ($consultations->isEmpty())
    <div class="bg-white rounded-xl p-16 text-center border border-slate-200">
      <p class="text-sm font-medium text-slate-600">Tidak ada pesanan dengan status '{{ $currentStatus }}'.</p>
    </div>
  @else
    <div class="space-y-4">
      @foreach ($consultations as $order)
        <div id="order-{{ $order->id }}" class="bg-white rounded-xl p-5 sm:p-6 border border-slate-200 shadow-xs hover:border-slate-300 transition-all">
          <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 pb-4 border-b border-slate-100">
            
            <div class="flex items-center gap-3">
              <span class="font-mono font-bold text-xs text-[#0B3A75] px-2.5 py-1 rounded bg-slate-100">
                #{{ $order->order_code }}
              </span>
              <span class="text-xs text-slate-400">
                Diajukan: {{ $order->created_at->format('d M Y, H:i WIB') }}
              </span>
            </div>

            <!-- Status Badge & WA Reply -->
            <div class="flex items-center gap-3 w-full lg:w-auto justify-between lg:justify-end">
              @php $badge = $order->status_badge; @endphp
              <span class="px-2.5 py-1 rounded text-xs font-bold border {{ $badge['class'] }}">
                {{ $badge['label'] }}
              </span>

              <a href="{{ route('admin.orders.reply_wa', $order) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold shadow-2xs transition-colors">
                <span>Kirim WhatsApp</span>
              </a>
            </div>

          </div>

          <!-- Order Content Grid -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 py-4 text-xs">
            
            <!-- Customer info -->
            <div class="space-y-1">
              <span class="font-bold text-slate-400 uppercase tracking-wider block text-[10px]">Data Pelanggan:</span>
              <strong class="text-sm text-slate-900 block font-heading">{{ $order->customer_name }}</strong>
              <p class="text-slate-600">Lokasi: <span class="font-medium text-slate-800">{{ $order->location }}</span></p>
              @if ($order->customer_phone)
                <p class="text-slate-600">WA: <span class="font-mono font-bold text-[#0B3A75]">{{ $order->customer_phone }}</span></p>
              @endif
              <p class="text-slate-600">Waktu diinginkan: <span class="font-medium text-slate-800">{{ $order->preferred_time }}</span></p>
            </div>

            <!-- Device & Service info -->
            <div class="space-y-1">
              <span class="font-bold text-slate-400 uppercase tracking-wider block text-[10px]">Perangkat & Layanan:</span>
              <p class="font-bold text-slate-900 text-xs">{{ $order->device }}</p>
              <p class="text-[#0B3A75] font-semibold">{{ $order->service_name }}</p>
              @if($order->home_service_tier)
                <span class="text-[11px] text-teal-800 bg-teal-50 px-2 py-0.5 rounded border border-teal-200 inline-block mt-1">
                  {{ $order->home_service_tier }}
                </span>
              @endif
              <div class="mt-2 p-2.5 rounded bg-slate-50 border border-slate-100 text-slate-700">
                <strong class="text-[11px] block text-slate-500 mb-0.5">Keluhan:</strong>
                <p class="leading-relaxed">{{ $order->problem }}</p>
              </div>
            </div>

            <!-- Management Form (Inline update) -->
            <div class="space-y-2 bg-[#FAF9F6] p-4 rounded-lg border border-slate-200">
              <span class="font-bold text-slate-500 uppercase tracking-wider block text-[10px]">Update Pengerjaan Teknisi:</span>

              <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="space-y-2.5">
                @csrf
                @method('PUT')

                <div>
                  <label class="block text-[11px] font-semibold text-slate-600 mb-1">Ubah Status:</label>
                  <select name="status" class="w-full text-xs rounded border border-slate-300 px-2.5 py-1.5 bg-white">
                    <option value="baru" {{ $order->status === 'baru' ? 'selected' : '' }}>Baru</option>
                    <option value="dikonfirmasi" {{ $order->status === 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                    <option value="dikerjakan" {{ $order->status === 'dikerjakan' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                    <option value="selesai" {{ $order->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="dibatalkan" {{ $order->status === 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                  </select>
                </div>

                <div>
                  <label class="block text-[11px] font-semibold text-slate-600 mb-1">Estimasi / Total Biaya (Rp):</label>
                  <input type="number" name="estimated_cost" value="{{ $order->estimated_cost }}" placeholder="0" class="w-full text-xs rounded border border-slate-300 px-2.5 py-1.5 font-mono">
                </div>

                <div>
                  <label class="block text-[11px] font-semibold text-slate-600 mb-1">Catatan Teknisi:</label>
                  <textarea name="technician_notes" rows="2" placeholder="Catatan hasil diagnosis atau komponen yang diganti..." class="w-full text-xs rounded border border-slate-300 px-2.5 py-1.5 bg-white">{{ $order->technician_notes }}</textarea>
                </div>

                <div class="flex items-center justify-between pt-1">
                  <button type="submit" class="px-3 py-1.5 rounded bg-[#0B3A75] hover:bg-[#07254C] text-white text-xs font-semibold transition-colors">
                    Simpan Perubahan
                  </button>
                  
                  <button type="button" 
                          onclick="if(confirm('Hapus pesanan ini?')) document.getElementById('delete-order-{{ $order->id }}').submit();" 
                          class="text-rose-600 hover:text-rose-800 text-[11px]">
                    Hapus
                  </button>
                </div>
              </form>

              <form id="delete-order-{{ $order->id }}" action="{{ route('admin.orders.delete', $order) }}" method="POST" class="hidden">
                @csrf
                @method('DELETE')
              </form>

            </div>

          </div>

        </div>
      @endforeach

      <!-- Pagination -->
      <div class="pt-4">
        {{ $consultations->links() }}
      </div>
    </div>
  @endif

</div>

@endsection
