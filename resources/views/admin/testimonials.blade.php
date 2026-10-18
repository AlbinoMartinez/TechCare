@extends('admin.layout')

@section('title', 'Manajemen Testimoni Klien')

@section('content')

<div class="space-y-6">
  
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-xl sm:text-2xl font-heading font-extrabold text-white">Testimoni Klien Asli</h1>
      <p class="text-xs text-slate-400 mt-1">Hanya memuat testimoni autentik dengan persetujuan pelanggan. Jika belum ada yang diterbitkan, website publik tidak akan menampilkan section testimoni.</p>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Left: Add Testimonial Form -->
    <div class="lg:col-span-5 bg-[#131F3F] border border-[#1E2D5A] rounded-xl p-5">
      <h3 class="text-sm font-heading font-bold text-white mb-1">Tambah Testimoni Nyata</h3>
      <p class="text-[11px] text-slate-400 mb-4">Input ulasan kepuasan dari pelanggan yang telah dikonfirmasi selesai.</p>

      <form action="{{ route('admin.testimonials.store') }}" method="POST" class="space-y-3 text-xs">
        @csrf

        <div>
          <label class="text-[11px] text-slate-300 block mb-1">Nama Pelanggan</label>
          <input type="text" name="customer_name" required placeholder="cth: Mas Budi / Mbak Rina" 
                 class="w-full px-3 py-2 rounded bg-[#0E1738] border border-[#1E2D5A] text-white text-xs focus:border-[#0D9BE4] focus:outline-hidden">
        </div>

        <div>
          <label class="text-[11px] text-slate-300 block mb-1">Peran / Profesi / Lokasi</label>
          <input type="text" name="customer_role" placeholder="cth: Mahasiswa UGM / UMKM Minggir" 
                 class="w-full px-3 py-2 rounded bg-[#0E1738] border border-[#1E2D5A] text-white text-xs focus:border-[#0D9BE4] focus:outline-hidden">
        </div>

        <div>
          <label class="text-[11px] text-slate-300 block mb-1">Jenis Perangkat & Layanan</label>
          <div class="grid grid-cols-2 gap-2">
            <input type="text" name="device_type" placeholder="Perangkat (Laptop HP)" 
                   class="w-full px-3 py-2 rounded bg-[#0E1738] border border-[#1E2D5A] text-white text-xs focus:border-[#0D9BE4] focus:outline-hidden">
            <input type="text" name="service_name" placeholder="Layanan (Instal Ulang)" 
                   class="w-full px-3 py-2 rounded bg-[#0E1738] border border-[#1E2D5A] text-white text-xs focus:border-[#0D9BE4] focus:outline-hidden">
          </div>
        </div>

        <div>
          <label class="text-[11px] text-slate-300 block mb-1">Isi Ulasan / Feedback</label>
          <textarea name="feedback" rows="3" required placeholder="Cerita pengalaman pengerjaan teknisi..." 
                    class="w-full px-3 py-2 rounded bg-[#0E1738] border border-[#1E2D5A] text-white text-xs focus:border-[#0D9BE4] focus:outline-hidden"></textarea>
        </div>

        <div>
          <label class="text-[11px] text-slate-300 block mb-1">Rating Kepuasan (1 - 5 Bintang)</label>
          <select name="rating" class="w-full px-3 py-2 rounded bg-[#0E1738] border border-[#1E2D5A] text-white text-xs focus:border-[#0D9BE4] focus:outline-hidden font-mono">
            <option value="5">★★★★★ (5 Bintang - Sangat Puas)</option>
            <option value="4">★★★★☆ (4 Bintang - Puas)</option>
            <option value="3">★★★☆☆ (3 Bintang - Cukup)</option>
          </select>
        </div>

        <div class="space-y-2 pt-2 border-t border-[#1E2D5A]">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="consent_to_publish" value="1" required class="rounded bg-[#0E1738] border-[#1E2D5A] text-[#0D9BE4]">
            <span class="text-[11px] text-slate-300">Pelanggan telah memberikan izin tampil (Consent)</span>
          </label>
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="is_published" value="1" class="rounded bg-[#0E1738] border-[#1E2D5A] text-emerald-500">
            <span class="text-[11px] text-slate-300">Terbitkan langsung ke website publik</span>
          </label>
        </div>

        <div class="pt-2">
          <button type="submit" class="w-full py-2.5 rounded-lg bg-[#0D9BE4] hover:bg-[#0c8ad0] text-white font-semibold text-xs transition-colors shadow-xs">
            Simpan Testimoni
          </button>
        </div>
      </form>
    </div>

    <!-- Right: Testimonial List -->
    <div class="lg:col-span-7 bg-[#131F3F] border border-[#1E2D5A] rounded-xl overflow-hidden">
      <div class="p-4 sm:p-5 border-b border-[#1E2D5A] bg-[#0E1738] flex items-center justify-between">
        <span class="text-xs font-mono font-bold text-slate-300">Daftar Testimoni ({{ $testimonials->total() }})</span>
        <span class="text-[11px] font-mono text-emerald-400">Published: {{ \App\Models\Testimonial::where('is_published', true)->count() }}</span>
      </div>

      @if ($testimonials->isEmpty())
        <div class="p-12 text-center text-slate-400 text-xs font-mono space-y-2">
          <p class="font-bold text-slate-300">Belum ada testimoni tersimpan.</p>
          <p>Sesuai etika dan integritas data, tidak ada data dummy palsu yang dibuat secara otomatis.</p>
        </div>
      @else
        <div class="divide-y divide-[#1E2D5A] p-4 space-y-4">
          @foreach ($testimonials as $t)
            <div class="p-4 rounded-lg bg-[#0E1738] border border-[#1E2D5A] space-y-3 text-xs">
              <div class="flex items-start justify-between gap-2">
                <div>
                  <h4 class="font-bold text-white text-sm">{{ $t->customer_name }}</h4>
                  <span class="text-[11px] text-slate-400 font-mono">{{ $t->customer_role ?? 'Pelanggan TechCare' }}</span>
                </div>
                <div class="text-right">
                  <span class="text-amber-400 font-mono font-bold">{{ str_repeat('★', $t->rating) }}</span>
                  <span class="block text-[10px] text-slate-500 font-mono">{{ $t->created_at->format('d/m/Y') }}</span>
                </div>
              </div>

              <p class="text-slate-300 italic">"{{ $t->feedback }}"</p>

              <div class="flex items-center justify-between pt-2 border-t border-[#1E2D5A]">
                <div class="flex items-center gap-2">
                  <form action="{{ route('admin.testimonials.toggle', $t) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" 
                            class="px-2.5 py-1 rounded text-[10px] font-mono font-bold {{ $t->is_published ? 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/40' : 'bg-slate-700 text-slate-300' }}">
                      {{ $t->is_published ? '✓ TERBIT' : 'DRAFT' }}
                    </button>
                  </form>
                  @if($t->consent_to_publish)
                    <span class="text-[10px] font-mono text-emerald-400">Consent OK</span>
                  @endif
                </div>

                <form action="{{ route('admin.testimonials.delete', $t) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-rose-400 hover:text-rose-300 text-[11px]">Hapus</button>
                </form>
              </div>
            </div>
          @endforeach
        </div>

        <div class="p-4 border-t border-[#1E2D5A]">
          {{ $testimonials->links() }}
        </div>
      @endif

    </div>

  </div>

</div>

@endsection
