@extends('layouts.public')

@section('title', 'Kalkulator Estimasi Biaya – TechCare IT Support')
@section('meta_description', 'Hitung simulasi biaya servis komputer, laptop, dan jaringan TechCare. Pilih satu atau beberapa layanan serta jarak kunjungan home service, lalu kirim rinciannya langsung ke WhatsApp.')

@section('content')

<!-- Header Halaman -->
<section class="bg-white border-b border-[#E2DFD7] py-10">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8]">Fitur Pembeda Transparansi</span>
    <h1 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-[#0B3A75] mt-1">
      Kalkulator Estimasi Biaya Layanan
    </h1>
    <p class="text-xs sm:text-sm text-slate-700 mt-2 max-w-2xl leading-relaxed">
      Pilih satu atau lebih layanan IT yang Anda butuhkan, tentukan opsi lokasi pengerjaan, dan dapatkan total estimasi biaya transparan seketika. Rincian dapat langsung dikirimkan ke WhatsApp TechCare.
    </p>
  </div>
</section>

<!-- Kalkulator Interaktif dengan Alpine.js -->
<section class="py-10 bg-[#FAF9F6]" 
         x-data="{
           selectedServices: [],
           homeServiceTier: 0,
           homeServiceLabel: 'Bawa Sendiri ke Tempat Teknisi (Rp0)',
           
           toggleService(code, name, price) {
             const idx = this.selectedServices.findIndex(s => s.code === code);
             if (idx > -1) {
               this.selectedServices.splice(idx, 1);
             } else {
               this.selectedServices.push({ code, name, price });
             }
           },
           
           isServiceSelected(code) {
             return this.selectedServices.some(s => s.code === code);
           },
           
           subtotalServices() {
             return this.selectedServices.reduce((sum, s) => sum + s.price, 0);
           },
           
           grandTotal() {
             return this.subtotalServices() + parseInt(this.homeServiceTier);
           },

           formatRupiah(num) {
             return 'Rp' + num.toLocaleString('id-ID');
           },

           getWhatsAppUrl() {
             if (this.selectedServices.length === 0) {
               return 'https://wa.me/6285641487430?text=' + encodeURIComponent('Halo TechCare, saya ingin konsultasi mengenai biaya layanan.');
             }

             let listText = this.selectedServices.map(s => '• ' + s.name + ' (' + s.code + ') - ' + this.formatRupiah(s.price)).join('\n');
             let tierText = this.homeServiceLabel;

             let message = 'Halo TechCare, saya telah menghitung estimasi biaya di website:\n\n'
               + 'Layanan yang dipilih:\n' + listText + '\n\n'
               + 'Lokasi pengerjaan: ' + tierText + '\n'
               + 'Subtotal Jasa: ' + this.formatRupiah(this.subtotalServices()) + '\n'
               + 'Ongkos Kunjungan: ' + this.formatRupiah(parseInt(this.homeServiceTier)) + '\n'
               + '---------------------------\n'
               + 'Total Estimasi Awal: ' + this.formatRupiah(this.grandTotal()) + '\n\n'
               + 'Mohon konfirmasi ketersediaan jadwal pengerjaannya. Terima kasih.';

             return 'https://wa.me/6285641487430?text=' + encodeURIComponent(message);
           }
         }">
  
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
      
      <!-- Kolom Kiri: Pilihan Layanan & Lokasi -->
      <div class="lg:col-span-7 space-y-6">
        
        <!-- Langkah 1: Pilih Layanan -->
        <div class="bg-white border border-[#E2DFD7] rounded-lg p-5 sm:p-6 shadow-xs">
          <div class="flex items-center justify-between pb-3 border-b border-[#E2DFD7] mb-4">
            <div>
              <span class="text-[11px] font-bold uppercase tracking-wider text-[#1E9BE8]">Langkah 1</span>
              <h2 class="font-heading font-bold text-base text-[#0B3A75]">Pilih Layanan (Bisa Lebih dari Satu)</h2>
            </div>
            <span class="text-xs font-mono bg-slate-100 text-slate-700 px-2 py-1 rounded" x-text="selectedServices.length + ' dipilih'"></span>
          </div>

          <div class="space-y-4">
            @php
              $categories = [
                'komputer' => 'Komputer & Laptop',
                'jaringan' => 'Jaringan & Wi-Fi',
                'linux' => 'Sistem Operasi & Linux',
                'keamanan' => 'Keamanan Dasar',
              ];
            @endphp

            @foreach ($categories as $catKey => $catLabel)
              <div>
                <h3 class="text-xs font-heading font-bold text-slate-600 uppercase tracking-wider mb-2">
                  {{ $catLabel }}
                </h3>
                
                <div class="space-y-1.5">
                  @foreach ($services->where('category', $catKey) as $srv)
                    <label class="flex items-start justify-between gap-3 p-3 rounded-md border transition-colors cursor-pointer text-xs" 
                           :class="isServiceSelected('{{ $srv->code }}') ? 'bg-[#F0F7FD] border-[#1E9BE8] text-[#0B3A75]' : 'bg-white border-[#E2DFD7] hover:bg-[#FAF9F6] text-slate-800'">
                      <div class="flex items-start gap-2.5">
                        <input type="checkbox" 
                               value="{{ $srv->code }}" 
                               @change="toggleService('{{ $srv->code }}', '{{ addslashes($srv->name) }}', {{ $srv->price }})"
                               :checked="isServiceSelected('{{ $srv->code }}')" 
                               class="mt-0.5 rounded text-[#0B3A75] focus:ring-[#1E9BE8]">
                        <div>
                          <div class="flex items-center gap-1.5">
                            <span class="font-mono font-bold text-[11px] text-slate-500">[{{ $srv->code }}]</span>
                            <span class="font-semibold">{{ $srv->name }}</span>
                            @if($srv->is_utama)
                              <span class="text-[9px] bg-amber-100 text-[#E35E14] font-bold px-1 rounded">Utama</span>
                            @endif
                          </div>
                          <span class="text-[11px] text-slate-500 block mt-0.5">{{ $srv->duration }}</span>
                        </div>
                      </div>
                      <span class="font-mono font-bold shrink-0 text-slate-900" :class="isServiceSelected('{{ $srv->code }}') ? 'text-[#0B3A75]' : ''">
                        Rp{{ number_format($srv->price, 0, ',', '.') }}
                      </span>
                    </label>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <!-- Langkah 2: Opsi Lokasi & Home Service -->
        <div class="bg-white border border-[#E2DFD7] rounded-lg p-5 sm:p-6 shadow-xs">
          <div class="pb-3 border-b border-[#E2DFD7] mb-4">
            <span class="text-[11px] font-bold uppercase tracking-wider text-[#1E9BE8]">Langkah 2</span>
            <h2 class="font-heading font-bold text-base text-[#0B3A75]">Pilih Lokasi Pengerjaan</h2>
            <p class="text-xs text-slate-600 mt-1">Apakah Anda membawa unit ke Minggir atau butuh kunjungan ke rumah/kantor?</p>
          </div>

          <div class="space-y-2 text-xs">
            <label class="flex items-center justify-between p-3 rounded-md border cursor-pointer transition-colors"
                   :class="homeServiceTier == 0 ? 'bg-[#F0F7FD] border-[#1E9BE8]' : 'bg-white border-[#E2DFD7] hover:bg-[#FAF9F6]'">
              <div class="flex items-center gap-2.5">
                <input type="radio" 
                       name="tierSelection" 
                       value="0" 
                       x-model="homeServiceTier"
                       @change="homeServiceLabel = 'Bawa Sendiri ke Tempat Teknisi (Rp0)'"
                       class="text-[#0B3A75] focus:ring-[#1E9BE8]">
                <div>
                  <span class="font-bold text-slate-900 block">Antar Langsung ke Tempat TechCare</span>
                  <span class="text-slate-500 text-[11px]">Minggir, Sleman (dengan janji terlebih dahulu)</span>
                </div>
              </div>
              <span class="font-mono font-bold text-slate-700">Rp0</span>
            </label>

            @foreach ($homeServiceTiers as $tier)
              <label class="flex items-center justify-between p-3 rounded-md border cursor-pointer transition-colors"
                     :class="homeServiceTier == {{ $tier['price'] }} ? 'bg-[#F0F7FD] border-[#1E9BE8]' : 'bg-white border-[#E2DFD7] hover:bg-[#FAF9F6]'">
                <div class="flex items-center gap-2.5">
                  <input type="radio" 
                         name="tierSelection" 
                         value="{{ $tier['price'] }}" 
                         x-model="homeServiceTier"
                         @change="homeServiceLabel = 'Home Service: {{ $tier['distance'] }} ({{ $tier['price'] }})'"
                         class="text-[#0B3A75] focus:ring-[#1E9BE8]">
                  <div>
                    <span class="font-bold text-slate-900 block">Home Service: {{ $tier['distance'] }}</span>
                    <span class="text-slate-500 text-[11px]">{{ $tier['desc'] }}</span>
                  </div>
                </div>
                <span class="font-mono font-bold text-slate-700">Rp{{ number_format($tier['price'], 0, ',', '.') }}</span>
              </label>
            @endforeach
          </div>
        </div>

      </div>

      <!-- Kolom Kanan: Rangkuman & Tombol Kirim WhatsApp (Sticky di Desktop) -->
      <div class="lg:col-span-5 lg:sticky lg:top-24 space-y-4">
        
        <div class="bg-white border-2 border-[#0B3A75] rounded-xl p-6 shadow-sm">
          <span class="text-[11px] font-bold uppercase tracking-wider text-[#1E9BE8]">Rangkuman Perhitungan</span>
          <h2 class="font-heading font-extrabold text-xl text-[#0B3A75] mt-1 mb-4">
            Total Estimasi Biaya
          </h2>

          <!-- Rincian Layanan Terpilih -->
          <div class="space-y-2 text-xs pb-4 border-b border-[#E2DFD7]">
            <div class="flex justify-between font-bold text-slate-700">
              <span>Layanan Terpilih:</span>
              <span x-text="selectedServices.length + ' item'"></span>
            </div>

            <template x-if="selectedServices.length === 0">
              <p class="text-slate-400 italic py-2">Belum ada layanan yang dipilih. Centang layanan di sebelah kiri.</p>
            </template>

            <template x-for="(s, index) in selectedServices" :key="s.code">
              <div class="flex justify-between items-start text-slate-700 py-1">
                <span class="pr-2" x-text="(index + 1) + '. ' + s.name + ' (' + s.code + ')'"></span>
                <span class="font-mono font-medium shrink-0" x-text="formatRupiah(s.price)"></span>
              </div>
            </template>
          </div>

          <!-- Rincian Subtotal & Ongkir -->
          <div class="space-y-2 py-4 border-b border-[#E2DFD7] text-xs">
            <div class="flex justify-between text-slate-600">
              <span>Subtotal Biaya Jasa:</span>
              <span class="font-mono font-bold text-slate-900" x-text="formatRupiah(subtotalServices())">Rp0</span>
            </div>
            <div class="flex justify-between text-slate-600">
              <span>Ongkos Home Service:</span>
              <span class="font-mono font-bold text-slate-900" x-text="formatRupiah(parseInt(homeServiceTier))">Rp0</span>
            </div>
          </div>

          <!-- Total Akhir -->
          <div class="pt-4 pb-5 flex items-baseline justify-between">
            <div>
              <span class="text-xs text-slate-500 font-bold block uppercase tracking-wider">Total Estimasi Awal</span>
              <span class="text-[11px] text-slate-400">Sebelum pemeriksaan fisik</span>
            </div>
            <span class="font-mono font-extrabold text-2xl text-[#0B3A75]" x-text="formatRupiah(grandTotal())">
              Rp0
            </span>
          </div>

          <!-- Tombol WhatsApp dengan Pesan Terisi Otomatis -->
          <div class="space-y-2">
            <a :href="getWhatsAppUrl()" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="w-full inline-flex items-center justify-center gap-2.5 py-3.5 px-4 rounded-lg bg-[#0B3A75] hover:bg-[#07254C] text-white text-sm font-heading font-bold transition-colors shadow-xs min-h-[48px]">
              <svg class="w-5 h-5 fill-current text-[#1E9BE8]" viewBox="0 0 24 24" aria-hidden="true"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
              <span>Kirim Rincian ke WhatsApp</span>
            </a>

            <p class="text-[11px] text-slate-500 text-center leading-relaxed">
              Pesan terangkum otomatis sesuai pilihan Anda. Membuka chat langsung dengan Nur Muhibbin di 085641487430.
            </p>
          </div>

        </div>

        <!-- Ketentuan Transparansi Tambahan -->
        <div class="bg-[#FAF9F6] border border-[#E2DFD7] rounded-lg p-4 text-xs text-slate-600 space-y-2">
          <h3 class="font-bold text-slate-800">Catatan Perhitungan:</h3>
          <ul class="space-y-1 list-disc list-inside">
            <li>Konsultasi awal lewat WhatsApp selalu gratis.</li>
            <li>Biaya diagnosis fisik di lokasi (Rp25.000) <strong>dipotong dari total jasa</strong> jika lanjut pengerjaan.</li>
            <li>Jika ada komponen yang harus dibeli (seperti SSD atau kabel LAN), biayanya disepakati bersama sebelum dibeli.</li>
          </ul>
        </div>

      </div>

    </div>
  </div>
</section>

@endsection
