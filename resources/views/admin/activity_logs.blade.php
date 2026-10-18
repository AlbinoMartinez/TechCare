@extends('admin.layout')

@section('title', 'Log Aktivitas & Audit Trail')

@section('content')

<div class="space-y-6">
  
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-xl sm:text-2xl font-heading font-extrabold text-white">Log Aktivitas & Audit Trail</h1>
      <p class="text-xs text-slate-400 mt-1">Mencatat siapa yang mengubah apa dan kapan, termasuk riwayat penyesuaian harga layanan dan pembaruan pengaturan.</p>
    </div>
  </div>

  <div class="bg-[#131F3F] border border-[#1E2D5A] rounded-xl overflow-hidden shadow-xs">
    <div class="p-4 sm:p-5 border-b border-[#1E2D5A] bg-[#0E1738] flex items-center justify-between">
      <span class="text-xs font-mono font-bold text-[#0D9BE4]">Riwayat Audit Tercatat ({{ $logs->total() }} Kejadian)</span>
      <span class="text-[11px] font-mono text-slate-400">First-party audit logging aktif</span>
    </div>

    @if ($logs->isEmpty())
      <div class="p-16 text-center text-slate-400 text-xs font-mono">
        Belum ada catatan log aktivitas dalam sistem.
      </div>
    @else
      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
          <thead class="bg-[#0E1738] text-[11px] font-mono uppercase tracking-wider text-slate-400 border-b border-[#1E2D5A]">
            <tr>
              <th class="py-3 px-4 w-44">Waktu (WIB)</th>
              <th class="py-3 px-4 w-32">Pelaksana</th>
              <th class="py-3 px-4 w-36">Aksi</th>
              <th class="py-3 px-4">Deskripsi Perubahan</th>
              <th class="py-3 px-4">Nilai Sebelum / Sesudah</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-[#1E2D5A]">
            @foreach ($logs as $log)
              <tr class="hover:bg-white/5 transition-colors">
                <td class="py-3 px-4 whitespace-nowrap font-mono text-slate-400 text-[11px]">
                  {{ $log->created_at->format('d/m/Y H:i:s') }}
                  <span class="block text-[10px] text-slate-500">{{ $log->created_at->diffForHumans() }}</span>
                </td>
                <td class="py-3 px-4 font-medium text-slate-200">
                  {{ $log->user_name ?? 'Client' }}
                </td>
                <td class="py-3 px-4 whitespace-nowrap">
                  <span class="px-2 py-0.5 rounded text-[10px] font-mono font-bold
                    @if(str_contains($log->action, 'price')) bg-amber-500/20 text-amber-300 border border-amber-500/30
                    @elseif(str_contains($log->action, 'booking')) bg-emerald-500/20 text-emerald-300 border border-emerald-500/30
                    @elseif(str_contains($log->action, 'order')) bg-blue-500/20 text-blue-300 border border-blue-500/30
                    @else bg-purple-500/20 text-purple-300 border border-purple-500/30 @endif">
                    {{ $log->action }}
                  </span>
                </td>
                <td class="py-3 px-4 text-slate-300">
                  {{ $log->description }}
                </td>
                <td class="py-3 px-4 text-slate-400 font-mono text-[10px]">
                  @if($log->old_values || $log->new_values)
                    <div class="space-y-0.5">
                      @if($log->old_values)
                        <div class="text-rose-400 line-through">Lama: {{ json_encode($log->old_values) }}</div>
                      @endif
                      @if($log->new_values)
                        <div class="text-emerald-400">Baru: {{ json_encode($log->new_values) }}</div>
                      @endif
                    </div>
                  @else
                    <span class="text-slate-600">-</span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="p-4 border-t border-[#1E2D5A]">
        {{ $logs->links() }}
      </div>
    @endif
  </div>

</div>

@endsection
