@extends('admin.layout')

@section('title', 'Katalog Layanan & Tarif Jasa')

@section('content')

<div class="space-y-6">
  
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-xl sm:text-2xl font-heading font-extrabold text-white">Katalog Layanan & Tarif Jasa</h1>
      <p class="text-xs text-slate-400 mt-1">Kelola 24 item layanan resmi TechCare (A1–D3) dari Bab IV proposal. Setiap perubahan harga dicatat di audit log.</p>
    </div>
  </div>

  <div class="bg-[#131F3F] rounded-xl border border-[#1E2D5A] overflow-hidden shadow-xs">
    <div class="p-4 sm:p-5 border-b border-[#1E2D5A] flex items-center justify-between bg-[#0E1738]">
      <span class="text-xs font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Total: {{ $services->count() }} Layanan Terdaftar</span>
      <span class="text-[11px] text-slate-400 font-mono">Perubahan tarif langsung aktif di kalkulator dan website</span>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left text-xs">
        <thead class="bg-[#0E1738] text-[11px] font-mono text-slate-400 uppercase tracking-wider border-b border-[#1E2D5A]">
          <tr>
            <th class="py-3 px-4 w-16">Kode</th>
            <th class="py-3 px-4">Layanan & Deskripsi</th>
            <th class="py-3 px-4 w-28">Kategori</th>
            <th class="py-3 px-4 w-32">Durasi</th>
            <th class="py-3 px-4 w-24 text-center">Utama?</th>
            <th class="py-3 px-4 w-40">Harga (Rp)</th>
            <th class="py-3 px-4 w-24 text-center">Status</th>
            <th class="py-3 px-4 w-24 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#1E2D5A]">
          @foreach ($services as $srv)
            <tr class="hover:bg-white/5 transition-colors">
              <form action="{{ route('admin.services.update', $srv) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="name" value="{{ $srv->name }}">
                <input type="hidden" name="category" value="{{ $srv->category }}">
                <input type="hidden" name="description" value="{{ $srv->description }}">
                <input type="hidden" name="notes" value="{{ $srv->notes }}">
                @if($srv->price_note)
                  <input type="hidden" name="price_note" value="{{ $srv->price_note }}">
                @endif

                <td class="py-3 px-4 font-mono font-bold text-[#0D9BE4]">
                  {{ $srv->code }}
                </td>

                <td class="py-3 px-4 max-w-xs">
                  <strong class="font-medium text-white block">{{ $srv->name }}</strong>
                  <span class="text-[11px] text-slate-400 line-clamp-1" title="{{ $srv->description }}">{{ $srv->description }}</span>
                  @if($srv->notes)
                    <span class="text-[10px] text-slate-500 italic block mt-0.5 line-clamp-1">{{ $srv->notes }}</span>
                  @endif
                </td>

                <td class="py-3 px-4 whitespace-nowrap">
                  <span class="px-2 py-0.5 rounded text-[10px] font-mono uppercase
                    @if($srv->category === 'komputer') bg-blue-500/20 text-blue-300 border border-blue-500/30
                    @elseif($srv->category === 'jaringan') bg-emerald-500/20 text-emerald-300 border border-emerald-500/30
                    @elseif($srv->category === 'linux') bg-amber-500/20 text-amber-300 border border-amber-500/30
                    @else bg-purple-500/20 text-purple-300 border border-purple-500/30 @endif">
                    {{ $srv->category }}
                  </span>
                </td>

                <td class="py-3 px-4">
                  <input type="text" name="duration" value="{{ $srv->duration }}" 
                         class="w-full px-2 py-1 rounded bg-[#0E1738] border border-[#1E2D5A] text-xs text-white font-mono focus:border-[#0D9BE4] focus:outline-hidden">
                </td>

                <td class="py-3 px-4 text-center">
                  <input type="checkbox" name="is_utama" value="1" {{ $srv->is_utama ? 'checked' : '' }} 
                         class="rounded bg-[#0E1738] border-[#1E2D5A] text-[#0D9BE4] focus:ring-0">
                </td>

                <td class="py-3 px-4">
                  <div class="flex items-center gap-1">
                    <span class="text-slate-400 font-mono text-[11px]">Rp</span>
                    <input type="number" name="price" value="{{ $srv->price }}" step="1000" min="0" 
                           class="w-full px-2 py-1 rounded bg-[#0E1738] border border-[#1E2D5A] text-xs text-white font-mono font-bold focus:border-[#0D9BE4] focus:outline-hidden">
                  </div>
                  @if($srv->price_note)
                    <span class="text-[10px] font-mono text-slate-500 block mt-0.5">{{ $srv->price_note }}</span>
                  @endif
                </td>

                <td class="py-3 px-4 text-center">
                  <input type="checkbox" name="is_active" value="1" {{ $srv->is_active ? 'checked' : '' }} 
                         class="rounded bg-[#0E1738] border-[#1E2D5A] text-emerald-500 focus:ring-0">
                </td>

                <td class="py-3 px-4 text-right">
                  <button type="submit" 
                          class="px-2.5 py-1 rounded bg-[#0D9BE4] hover:bg-[#0c8ad0] text-white text-[11px] font-semibold transition-colors">
                    Simpan
                  </button>
                </td>
              </form>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
