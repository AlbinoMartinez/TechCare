@extends('layouts.public')

@section('title', 'FAQ & Form Pemesanan – TechCare IT Support')
@section('meta_description', 'Hubungi TechCare di Minggir, Sleman via WhatsApp 085641487430. Tersedia form pemesanan langsung, informasi jam operasional, dan 10 tanya jawab resmi seputar layanan.')

@section('content')

<!-- Header Halaman -->
<section class="bg-white border-b border-[#E2DFD7] py-10">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8]">Tanya Jawab & Pemesanan</span>
    <h1 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-[#0B3A75] mt-1">
      FAQ, Kontak & Form Pemesanan Layanan
    </h1>
    <p class="text-xs sm:text-sm text-slate-700 mt-2 max-w-2xl leading-relaxed">
      Ada pertanyaan sebelum memesan? Pelajari jawaban pertanyaan umum di bawah, atau isi formulir singkat untuk memesan jadwal. Pesanan akan otomatis dicatat ke sistem dan langsung terhubung ke WhatsApp.
    </p>
  </div>
</section>

<section class="py-12 bg-[#FAF9F6]">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
      
      <!-- ==========================================
           KOLOM KIRI: FORM PEMESANAN (Bab 6.3)
      ========================================== -->
      <div class="lg:col-span-7 space-y-6" id="form-pemesanan">
        
        <div class="bg-white border border-[#E2DFD7] rounded-lg p-6 sm:p-8 shadow-xs">
          
          <div class="pb-4 border-b border-[#E2DFD7] mb-6">
            <span class="text-[11px] font-bold uppercase tracking-wider text-[#1E9BE8]">Pemesanan Terdata</span>
            <h2 class="font-heading font-extrabold text-xl text-[#0B3A75] mt-1">
              Formulir Pemesanan Layanan
            </h2>
            <p class="text-xs text-slate-600 mt-1">
              Isi data berikut. Setelah tombol diklik, data tercatat di antrean sistem dan pesan terformat otomatis siap dikirim ke WhatsApp TechCare.
            </p>
          </div>

          <!-- Error Alert -->
          @if ($errors->any())
            <div class="mb-5 p-3.5 bg-rose-50 border border-rose-200 text-rose-800 rounded text-xs space-y-1">
              <strong class="block font-bold">Mohon periksa isian formulir:</strong>
              <ul class="list-disc list-inside">
                @foreach ($errors->all() as $err)
                  <li>{{ $err }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('booking.store') }}" method="POST" id="bookingForm" class="space-y-4 text-xs">
            @csrf

            <!-- Honeypot anti-spam (invisible to humans, bots will fill it) -->
            <div class="hidden" aria-hidden="true">
              <label for="website_hp">Jangan isi kolom ini jika Anda manusia</label>
              <input type="text" name="website_hp" id="website_hp" tabindex="-1" autocomplete="off">
            </div>

            <!-- Nama & No WA -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="customer_name" class="block font-bold text-slate-700 mb-1">
                  Nama Lengkap <span class="text-rose-600">*</span>
                </label>
                <input type="text" 
                       id="customer_name" 
                       name="customer_name" 
                       value="{{ old('customer_name') }}" 
                       required 
                       placeholder="Contoh: Rian Prasetyo" 
                       class="w-full text-xs rounded border border-[#E2DFD7] px-3 py-2.5 focus:border-[#0B3A75] focus:outline-hidden focus:ring-1 focus:ring-[#0B3A75]">
              </div>

              <div>
                <label for="customer_phone" class="block font-bold text-slate-700 mb-1">
                  Nomor WhatsApp Anda <span class="text-slate-400 font-normal">(opsional)</span>
                </label>
                <input type="text" 
                       id="customer_phone" 
                       name="customer_phone" 
                       value="{{ old('customer_phone') }}" 
                       placeholder="Contoh: 081234567890" 
                       class="w-full text-xs rounded border border-[#E2DFD7] px-3 py-2.5 focus:border-[#0B3A75] focus:outline-hidden focus:ring-1 focus:ring-[#0B3A75]">
              </div>
            </div>

            <!-- Jenis Perangkat & Pilihan Layanan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="device" class="block font-bold text-slate-700 mb-1">
                  Jenis / Merek Perangkat <span class="text-rose-600">*</span>
                </label>
                <input type="text" 
                       id="device" 
                       name="device" 
                       value="{{ old('device') }}" 
                       required 
                       placeholder="Contoh: Laptop Asus Vivobook / PC Rakitan / Router IndiHome" 
                       class="w-full text-xs rounded border border-[#E2DFD7] px-3 py-2.5 focus:border-[#0B3A75] focus:outline-hidden focus:ring-1 focus:ring-[#0B3A75]">
              </div>

              <div>
                <label for="service_name" class="block font-bold text-slate-700 mb-1">
                  Layanan yang Dibutuhkan <span class="text-rose-600">*</span>
                </label>
                <select id="service_name" 
                        name="service_name" 
                        required 
                        class="w-full text-xs rounded border border-[#E2DFD7] px-3 py-2.5 bg-white focus:border-[#0B3A75] focus:outline-hidden focus:ring-1 focus:ring-[#0B3A75]">
                  <option value="">-- Pilih Layanan IT --</option>
                  @foreach ($services as $srv)
                    <option value="{{ $srv->name }} ({{ $srv->code }})" {{ old('service_name') === $srv->name . ' (' . $srv->code . ')' ? 'selected' : '' }}>
                      {{ $srv->code }} — {{ $srv->name }} ({{ $srv->formatted_price }})
                    </option>
                  @endforeach
                  <option value="Konsultasi Kendala Lainnya" {{ old('service_name') === 'Konsultasi Kendala Lainnya' ? 'selected' : '' }}>
                    Konsultasi Kendala Lainnya
                  </option>
                </select>
              </div>
            </div>

            <!-- Masalah yang Dialami -->
            <div>
              <label for="problem" class="block font-bold text-slate-700 mb-1">
                Jelaskan Masalah / Gejala yang Dialami <span class="text-rose-600">*</span>
              </label>
              <textarea id="problem" 
                        name="problem" 
                        rows="3" 
                        required 
                        placeholder="Contoh: Laptop lambat saat buka aplikasi dan Wi-Fi kadang putus sendiri. Riwayat: tidak pernah terkena air." 
                        class="w-full text-xs rounded border border-[#E2DFD7] px-3 py-2.5 focus:border-[#0B3A75] focus:outline-hidden focus:ring-1 focus:ring-[#0B3A75]">{{ old('problem') }}</textarea>
            </div>

            <!-- Lokasi & Opsi Kunjungan -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label for="location" class="block font-bold text-slate-700 mb-1">
                  Lokasi Anda (Kecamatan / Daerah) <span class="text-rose-600">*</span>
                </label>
                <input type="text" 
                       id="location" 
                       name="location" 
                       value="{{ old('location') }}" 
                       required 
                       placeholder="Contoh: Minggir / Moyudan / Godean / Seyegan" 
                       class="w-full text-xs rounded border border-[#E2DFD7] px-3 py-2.5 focus:border-[#0B3A75] focus:outline-hidden focus:ring-1 focus:ring-[#0B3A75]">
              </div>

              <div>
                <label for="home_service_tier" class="block font-bold text-slate-700 mb-1">
                  Pilihan Layanan Lokasi
                </label>
                <select id="home_service_tier" 
                        name="home_service_tier" 
                        class="w-full text-xs rounded border border-[#E2DFD7] px-3 py-2.5 bg-white focus:border-[#0B3A75] focus:outline-hidden focus:ring-1 focus:ring-[#0B3A75]">
                  <option value="Antar Sendiri ke Minggir">Saya Antar ke Minggir (Rp0)</option>
                  <option value="Home Service ≤ 3 km (Rp10.000)">Home Service: Sampai 3 km (+Rp10.000)</option>
                  <option value="Home Service > 3–7 km (Rp20.000)">Home Service: > 3 – 7 km (+Rp20.000)</option>
                  <option value="Home Service > 7 km (Rp35.000/kesepakatan)">Home Service: > 7 km (+Rp35.000/kesepakatan)</option>
                </select>
              </div>
            </div>

            <!-- Waktu yang Diinginkan -->
            <div>
              <label for="preferred_time" class="block font-bold text-slate-700 mb-1">
                Waktu yang Diinginkan <span class="text-rose-600">*</span>
              </label>
              <input type="text" 
                     id="preferred_time" 
                     name="preferred_time" 
                     value="{{ old('preferred_time') }}" 
                     required 
                     placeholder="Contoh: Hari ini jam 17.00 WIB / Besok Sabtu siang" 
                     class="w-full text-xs rounded border border-[#E2DFD7] px-3 py-2.5 focus:border-[#0B3A75] focus:outline-hidden focus:ring-1 focus:ring-[#0B3A75]">
            </div>

            <!-- Tombol Kirim -->
            <div class="pt-3">
              <button type="submit" 
                      class="w-full inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-lg bg-[#0B3A75] hover:bg-[#07254C] text-white text-sm font-heading font-bold transition-colors shadow-xs min-h-[48px]">
                <svg class="w-5 h-5 fill-current text-[#1E9BE8]" viewBox="0 0 24 24" aria-hidden="true"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
                <span>Simpan Pesanan & Buka WhatsApp</span>
              </button>
            </div>

            <p class="text-[11px] text-slate-500 text-center pt-1 leading-relaxed">
              🔒 Privasi data aman. Tidak ada tindakan fisik pada perangkat sebelum Anda menyetujui rincian estimasi biaya.
            </p>

          </form>

        </div>

      </div>

      <!-- ==========================================
           KOLOM KANAN: KONTAK & JAM OPERASIONAL
      ========================================== -->
      <div class="lg:col-span-5 space-y-6">
        
        <!-- Info Kontak Lengkap Proposal -->
        <div class="bg-white border border-[#E2DFD7] rounded-lg p-6 space-y-4 shadow-xs text-xs">
          <span class="text-[11px] font-bold uppercase tracking-wider text-[#1E9BE8]">Kontak Resmi</span>
          <h2 class="font-heading font-extrabold text-lg text-[#0B3A75]">
            Informasi Kontak TechCare
          </h2>

          <div class="space-y-3 pt-2 text-slate-700">
            <div>
              <span class="text-slate-500 block text-[11px]">WhatsApp (Pemesanan & Konsultasi):</span>
              <a href="https://wa.me/6285641487430" target="_blank" rel="noopener noreferrer" class="font-mono font-bold text-sm text-[#0B3A75] hover:text-[#1E9BE8] inline-flex items-center gap-1.5 mt-0.5">
                <span>085641487430</span>
                <span class="text-xs text-emerald-600 font-sans font-normal">(Chat Aktif)</span>
              </a>
            </div>

            <div>
              <span class="text-slate-500 block text-[11px]">Email Resmi:</span>
              <a href="mailto:Ibinyo19@gmail.com" class="font-semibold text-slate-900 hover:text-[#0B3A75]">
                Ibinyo19@gmail.com
              </a>
            </div>

            <div>
              <span class="text-slate-500 block text-[11px]">Alamat Usaha:</span>
              <p class="font-semibold text-slate-900">Minggir, Sleman, D.I. Yogyakarta</p>
              <p class="text-[11px] text-slate-500">Menerima perangkat langsung (dengan janji temu terlebih dahulu).</p>
            </div>

            <div>
              <span class="text-slate-500 block text-[11px]">Media Sosial Resmi:</span>
              <p class="text-slate-800">
                Instagram: <strong class="text-slate-900">TechCare</strong> | TikTok: <strong class="text-slate-900">TechCaree</strong>
              </p>
            </div>
          </div>
        </div>

        <!-- Jam Operasional Nyata (Bab 6.2) -->
        <div class="bg-white border border-[#E2DFD7] rounded-lg p-6 space-y-3 shadow-xs text-xs">
          <span class="text-[11px] font-bold uppercase tracking-wider text-[#1E9BE8]">Bab 6.2 Proposal</span>
          <h2 class="font-heading font-extrabold text-base text-[#0B3A75]">
            Jam Operasional Layanan
          </h2>

          <div class="space-y-2 text-slate-700 pt-1">
            <div class="flex justify-between py-1 border-b border-slate-100">
              <span class="font-semibold">Senin – Jumat</span>
              <span class="font-mono text-slate-900">16.00 – 20.00 WIB</span>
            </div>
            <div class="flex justify-between py-1 border-b border-slate-100">
              <span class="font-semibold">Sabtu</span>
              <span class="font-mono text-slate-900">09.00 – 17.00 WIB</span>
            </div>
            <div class="flex justify-between py-1">
              <span class="font-semibold">Minggu</span>
              <span class="text-slate-600">Dengan janji terlebih dahulu</span>
            </div>
          </div>

          <p class="text-[11px] text-slate-500 pt-1 italic">
            * Pesan WhatsApp di luar jam operasional tetap diterima dan dibalas paling lambat dalam 24 jam.
          </p>
        </div>

      </div>

    </div>

    <!-- ==========================================
         BAGIAN BAWAH: 10 FAQ RESMI PROPOSAL
    ========================================== -->
    <div class="mt-14 pt-10 border-t border-[#E2DFD7]">
      <div class="max-w-2xl mb-8">
        <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8]">Tanya Jawab</span>
        <h2 class="font-heading font-extrabold text-2xl text-[#0B3A75] mt-1">
          Pertanyaan yang Sering Diajukan (FAQ)
        </h2>
        <p class="text-xs sm:text-sm text-slate-600 mt-1">
          Sepuluh tanya-jawab seputar ketentuan layanan, harga, garansi, dan teknis pengerjaan di TechCare.
        </p>
      </div>

      <div class="space-y-3" x-data="{ openFaq: null }">
        @foreach ($faqs as $idx => $f)
          <div class="bg-white border border-[#E2DFD7] rounded-lg overflow-hidden">
            <button type="button" 
                    @click="openFaq = (openFaq === {{ $idx }} ? null : {{ $idx }})" 
                    class="w-full text-left p-4 flex items-center justify-between gap-3 text-xs sm:text-sm font-heading font-bold text-[#0B3A75] hover:bg-[#FAF9F6] transition-colors min-h-[44px]">
              <span>{{ $idx + 1 }}. {{ $f['q'] }}</span>
              <span class="font-mono font-bold text-sm text-slate-400 shrink-0" x-text="openFaq === {{ $idx }} ? '−' : '+'">+</span>
            </button>
            <div x-show="openFaq === {{ $idx }}" x-cloak class="p-4 pt-0 text-xs sm:text-sm text-slate-700 leading-relaxed border-t border-slate-100 bg-[#FAF9F6]/50">
              {{ $f['a'] }}
            </div>
          </div>
        @endforeach
      </div>

    </div>

  </div>
</section>

@endsection
