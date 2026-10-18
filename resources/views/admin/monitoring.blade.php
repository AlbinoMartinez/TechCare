@extends('admin.layout')

@section('title', 'Monitoring & Trafik Privacy-Friendly')

@section('content')

<div class="space-y-6">
  
  <div>
    <h1 class="text-xl sm:text-2xl font-heading font-extrabold text-white">Monitoring Pengunjung & Interaksi First-Party</h1>
    <p class="text-xs text-slate-400 mt-1">Sistem pencatatan trafik mandiri tanpa Google Analytics. Tidak menyimpan alamat IP mentah, mengabaikan bot/crawler, dan melindungi privasi pengunjung.</p>
  </div>

  <!-- Row 1: Daily Visitors Trend Table & Device Breakdown -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Daily Visitors (14 Days) -->
    <div class="lg:col-span-8 bg-[#131F3F] border border-[#1E2D5A] rounded-xl overflow-hidden">
      <div class="p-4 sm:p-5 border-b border-[#1E2D5A] bg-[#0E1738] flex items-center justify-between">
        <span class="text-xs font-mono font-bold text-white">Tren Kunjungan Harian (14 Hari Terakhir)</span>
        <span class="text-[10px] font-mono text-[#0D9BE4]">Hashed Daily Visitor ID</span>
      </div>

      @if ($dailyVisitors->isEmpty())
        <div class="p-12 text-center text-slate-400 text-xs font-mono">
          Belum ada data kunjungan publik tercatat.
        </div>
      @else
        <div class="overflow-x-auto">
          <table class="w-full text-left text-xs">
            <thead class="bg-[#0E1738] text-[10px] font-mono text-slate-400 uppercase tracking-wider border-b border-[#1E2D5A]">
              <tr>
                <th class="py-2.5 px-4">Tanggal</th>
                <th class="py-2.5 px-4 text-center">Pengunjung Unik</th>
                <th class="py-2.5 px-4 text-center">Total Tayangan Halaman</th>
                <th class="py-2.5 px-4">Visual Batang</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-[#1E2D5A] font-mono">
              @php
                $maxVisitors = max(1, $dailyVisitors->max('unique_visitors'));
              @endphp
              @foreach ($dailyVisitors as $dv)
                <tr class="hover:bg-white/5 transition-colors">
                  <td class="py-2.5 px-4 text-slate-300 font-bold">{{ $dv->date }}</td>
                  <td class="py-2.5 px-4 text-center text-[#0D9BE4] font-bold">{{ $dv->unique_visitors }}</td>
                  <td class="py-2.5 px-4 text-center text-slate-400">{{ $dv->total_views }}</td>
                  <td class="py-2.5 px-4 w-48">
                    @php
                      $widthPercent = round(($dv->unique_visitors / $maxVisitors) * 100);
                    @endphp
                    <div class="w-full bg-[#0E1738] h-2.5 rounded-full overflow-hidden">
                      <div class="bg-[#0D9BE4] h-full rounded-full" style="width: {{ $widthPercent }}%"></div>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>

    <!-- Device Breakdown & Interactions -->
    <div class="lg:col-span-4 space-y-6">
      
      <!-- Device Breakdown -->
      <div class="bg-[#131F3F] border border-[#1E2D5A] rounded-xl p-5">
        <h3 class="text-xs font-mono font-bold text-white uppercase tracking-wider mb-3">Distribusi Perangkat</h3>
        
        <div class="space-y-3 text-xs">
          @forelse ($deviceBreakdown as $device)
            <div>
              <div class="flex items-center justify-between mb-1 font-mono">
                <span class="text-slate-300 capitalize">{{ $device->device_class }}</span>
                <span class="text-white font-bold">{{ $device->count }} hits</span>
              </div>
              <div class="w-full bg-[#0E1738] h-2 rounded-full overflow-hidden">
                <div class="bg-indigo-500 h-full rounded-full" style="width: {{ min(100, $device->count * 10) }}%"></div>
              </div>
            </div>
          @empty
            <p class="text-slate-400 font-mono text-[11px]">Belum ada data perangkat.</p>
          @endforelse
        </div>
      </div>

      <!-- Events Triggered -->
      <div class="bg-[#131F3F] border border-[#1E2D5A] rounded-xl p-5">
        <h3 class="text-xs font-mono font-bold text-white uppercase tracking-wider mb-3">Interaksi Pengunjung (Events)</h3>
        
        <div class="space-y-2.5 text-xs font-mono">
          @forelse ($events as $ev)
            <div class="flex items-center justify-between p-2 rounded bg-[#0E1738] border border-[#1E2D5A]">
              <span class="text-slate-300">{{ $ev->event_name }}</span>
              <span class="px-2 py-0.5 rounded font-bold bg-[#0D9BE4]/20 text-[#0D9BE4] border border-[#0D9BE4]/30">
                {{ $ev->count }} kali
              </span>
            </div>
          @empty
            <p class="text-slate-400 text-[11px]">Belum ada event interaksi tercatat.</p>
          @endforelse
        </div>
      </div>

    </div>

  </div>

  <!-- Row 2: Top Pages & Referrers -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    
    <!-- Top Pages -->
    <div class="bg-[#131F3F] border border-[#1E2D5A] rounded-xl overflow-hidden">
      <div class="p-4 border-b border-[#1E2D5A] bg-[#0E1738]">
        <span class="text-xs font-mono font-bold text-white">Halaman Terpopuler (Top Pages)</span>
      </div>
      <div class="divide-y divide-[#1E2D5A] text-xs font-mono">
        @forelse ($topPages as $tp)
          <div class="p-3 px-4 flex items-center justify-between hover:bg-white/5 transition-colors">
            <span class="text-slate-200 truncate">{{ $tp->path }}</span>
            <span class="px-2 py-0.5 rounded bg-[#18264E] text-[#0D9BE4] font-bold">{{ $tp->views }} views</span>
          </div>
        @empty
          <div class="p-6 text-center text-slate-400 text-xs">Belum ada tayangan halaman.</div>
        @endforelse
      </div>
    </div>

    <!-- Top Referrers -->
    <div class="bg-[#131F3F] border border-[#1E2D5A] rounded-xl overflow-hidden">
      <div class="p-4 border-b border-[#1E2D5A] bg-[#0E1738]">
        <span class="text-xs font-mono font-bold text-white">Sumber Trafik (Referrers)</span>
      </div>
      <div class="divide-y divide-[#1E2D5A] text-xs font-mono">
        @forelse ($topReferrers as $tr)
          <div class="p-3 px-4 flex items-center justify-between hover:bg-white/5 transition-colors">
            <span class="text-slate-200 truncate">{{ $tr->referrer_host }}</span>
            <span class="px-2 py-0.5 rounded bg-[#18264E] text-emerald-400 font-bold">{{ $tr->count }} visits</span>
          </div>
        @empty
          <div class="p-6 text-center text-slate-400 text-xs">Trafik langsung / direct atau belum ada rujukan eksternal.</div>
        @endforelse
      </div>
    </div>

  </div>

</div>

@endsection
