@extends('admin.layout')

@section('title', 'Katalog Layanan & Tarif Jasa')

@section('content')

<div class="space-y-6">
  
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="font-heading font-extrabold text-2xl text-[#0B3A75]">Katalog Layanan & Tarif Jasa</h1>
      <p class="text-xs text-slate-500 mt-1">Kelola 24 item layanan resmi TechCare (A1–D3). Sesuaikan harga, durasi, status utama, dan status aktif.</p>
    </div>
  </div>

  <div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="p-4 sm:p-6 border-b border-slate-100 flex items-center justify-between">
      <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Total: {{ $services->count() }} Layanan</span>
      <span class="text-xs text-slate-500">Perubahan tarif langsung aktif di website publik</span>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full text-left text-xs">
        <thead class="bg-slate-50 text-[11px] font-bold text-slate-600 uppercase tracking-wider border-b border-slate-200">
          <tr>
            <th class="py-3 px-4 w-14">Kode</th>
            <th class="py-3 px-4">Layanan</th>
            <th class="py-3 px-4 w-28">Kategori</th>
            <th class="py-3 px-4 w-32">Durasi</th>
            <th class="py-3 px-4 w-24 text-center">Utama?</th>
            <th class="py-3 px-4 w-36">Harga (Rp)</th>
            <th class="py-3 px-4 w-24 text-center">Status</th>
            <th class="py-3 px-4 w-20 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          @foreach ($services as $srv)
            <tr class="hover:bg-slate-50 transition-colors">
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

                <td class="py-3.5 px-4 font-mono font-bold text-[#0B3A75]">
                  {{ $srv->code }}
                </td>

                <td class="py-3.5 px-4 max-w-xs">
                  <strong class="font-medium text-slate-900 block">{{ $srv->name }}</strong>
                  <span class="text-[11px] text-slate-400 line-clamp-1" title="{{ $srv->description }}">{{ $srv->description }}</span>
                </td>

                <td class="py-3.5 px-4 whitespace-nowrap">
                  <span class="capitalize text-slate-600">{{ $srv->category }}</span>
                </td>

                <td class="py-3.5 px-4 whitespace-nowrap">
                  <input type="text" name="duration" value="{{ $srv->duration }}" class="text-xs rounded border border-slate-300 px-2 py-1 w-28">
                </td>

                <td class="py-3.5 px-4 text-center whitespace-nowrap">
                  <input type="checkbox" name="is_utama" value="1" {{ $srv->is_utama ? 'checked' : '' }} class="rounded text-[#0B3A75] focus:ring-0">
                </td>

                <td class="py-3.5 px-4 whitespace-nowrap">
                  <div class="flex items-center gap-1">
                    <span class="text-slate-400">Rp</span>
                    <input type="number" name="price" value="{{ $srv->price }}" class="text-xs rounded border border-slate-300 px-2 py-1 w-24 font-mono font-bold">
                  </div>
                  @if($srv->price_note)
                    <span class="text-[10px] text-slate-400 block">{{ $srv->price_note }}</span>
                  @endif
                </td>

                <td class="py-3.5 px-4 text-center whitespace-nowrap">
                  <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ $srv->is_active ? 'checked' : '' }} class="rounded text-emerald-600 focus:ring-0">
                    <span class="ml-1 text-[11px] {{ $srv->is_active ? 'text-emerald-700 font-bold' : 'text-slate-400' }}">
                      {{ $srv->is_active ? 'Aktif' : 'Non' }}
                    </span>
                  </label>
                </td>

                <td class="py-3.5 px-4 text-right whitespace-nowrap">
                  <button type="submit" class="px-2.5 py-1 rounded bg-[#0B3A75] hover:bg-[#07254C] text-white text-[11px] font-bold transition-colors">
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
