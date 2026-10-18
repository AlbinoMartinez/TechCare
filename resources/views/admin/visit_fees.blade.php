@extends('admin.layout')

@section('title', 'Tarif Ongkos Kunjungan (Home Service)')

@section('content')

<div class="space-y-6">
  
  <div>
    <h1 class="text-xl sm:text-2xl font-heading font-extrabold text-white">Tarif Ongkos Kunjungan (Home Service)</h1>
    <p class="text-xs text-slate-400 mt-1">Sesuai Bab IV Bagian 4.5 proposal usaha TechCare. Tarif ini digunakan pada kalkulator estimasi dan pemesanan.</p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach ($visitFees as $vf)
      <div class="bg-[#131F3F] border border-[#1E2D5A] rounded-xl p-5 flex flex-col justify-between">
        <form action="{{ route('admin.visit_fees.update', $vf) }}" method="POST" class="space-y-4">
          @csrf
          @method('PUT')

          <div class="flex items-center justify-between pb-3 border-b border-[#1E2D5A]">
            <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">
              {{ strtoupper(str_replace('_', ' ', $vf->tier_name)) }}
            </span>
            <label class="flex items-center gap-1.5 text-xs text-slate-300">
              <input type="checkbox" name="is_active" value="1" {{ $vf->is_active ? 'checked' : '' }} class="rounded bg-[#0E1738] border-[#1E2D5A] text-emerald-500">
              <span>Aktif</span>
            </label>
          </div>

          <div>
            <label class="text-[11px] text-slate-400 font-mono block mb-1">Label Jarak Radius</label>
            <input type="text" name="distance_label" value="{{ $vf->distance_label }}" class="w-full px-3 py-1.5 rounded bg-[#0E1738] border border-[#1E2D5A] text-xs text-white focus:border-[#0D9BE4] focus:outline-hidden">
          </div>

          <div>
            <label class="text-[11px] text-slate-400 font-mono block mb-1">Tarif Ongkos (Rp)</label>
            <div class="flex items-center gap-1">
              <span class="text-slate-400 font-mono text-xs">Rp</span>
              <input type="number" name="fee" value="{{ $vf->fee }}" step="1000" min="0" class="w-full px-3 py-1.5 rounded bg-[#0E1738] border border-[#1E2D5A] text-sm text-white font-mono font-bold focus:border-[#0D9BE4] focus:outline-hidden">
            </div>
          </div>

          <div>
            <label class="text-[11px] text-slate-400 font-mono block mb-1">Catatan Wilayah</label>
            <input type="text" name="notes" value="{{ $vf->notes }}" class="w-full px-3 py-1.5 rounded bg-[#0E1738] border border-[#1E2D5A] text-xs text-slate-300 focus:border-[#0D9BE4] focus:outline-hidden">
          </div>

          <div class="pt-2">
            <button type="submit" class="w-full py-2 rounded-lg bg-[#0D9BE4] hover:bg-[#0c8ad0] text-white text-xs font-semibold transition-colors">
              Simpan Perubahan
            </button>
          </div>
        </form>
      </div>
    @endforeach
  </div>

  <div class="bg-[#0E1738] border border-[#1E2D5A] rounded-xl p-5 text-xs text-slate-400 space-y-2">
    <strong class="text-white block font-mono">Dasar Perhitungan (Bab IV 4.5 Proposal):</strong>
    <p>Ongkos kunjungan mencakup biaya bahan bakar motor, keausan kendaraan, dan waktu perjalanan pulang-pergi dari markas TechCare di Minggir, Sleman. Rata-rata biaya nyata dalam perhitungan operasional adalah Rp6.000 (12 km PP × Rp500/km).</p>
  </div>

</div>

@endsection
