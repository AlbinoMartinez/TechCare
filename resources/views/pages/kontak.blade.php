@extends('layouts.public')

@section('title', 'Kontak, Lokasi & Form Pemesanan – TechCare Minggir Sleman')
@section('meta_description', 'Hubungi TechCare di Minggir, Sleman via WhatsApp. Tersedia formulir pemesanan cepat, panduan lokasi Google Maps, informasi jam operasional, dan tanya jawab.')

@section('content')

@php
  $waNumber = $settings['whatsapp_number'] ?? '6285641487430';
  $waClean = preg_replace('/[^0-9]/', '', $waNumber);
  $waDisplay = $settings['whatsapp_display'] ?? '085641487430';
  $email = $settings['email'] ?? 'Ibinyo19@gmail.com';
  $mapsUrl = $settings['maps_url'] ?? 'https://maps.app.goo.gl/bLgzixN3HGV4mmVz9';
  $instagramUrl = $settings['instagram'] ?? 'https://instagram.com/mohiebenn';
  $tiktokUrl = $settings['tiktok'] ?? 'https://www.tiktok.com/@albinmnn_';
@endphp

<!-- Header Halaman -->
<section class="bg-white border-b border-slate-200 py-10 sm:py-12">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <span class="text-xs font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Pemesanan & Konsultasi</span>
    <h1 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-[#063970] mt-1">
      Kontak, Lokasi & Formulir Pemesanan
    </h1>
    <p class="text-xs sm:text-sm text-slate-600 mt-2 max-w-2xl leading-relaxed">
      Ada kendala pada laptop, komputer, atau Wi-Fi? Isi formulir singkat di bawah atau hubungi langsung via WhatsApp. Kami siap datang ke rumah/kantor Anda atau menerima perangkat di workshop Minggir, Sleman.
    </p>
  </div>
</section>

<section class="py-12 bg-[#FAF9F6]">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
      
      <!-- ==========================================
           KOLOM KIRI: FORM PEMESANAN
      ========================================== -->
      <div class="lg:col-span-7 space-y-6" id="form-pemesanan">
        
        <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-xs">
          
          <div class="pb-4 border-b border-slate-200 mb-6">
            <span class="text-[11px] font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Pemesanan Terdata</span>
            <h2 class="font-heading font-extrabold text-xl text-[#063970] mt-1">
              Formulir Pemesanan Layanan
            </h2>
            <p class="text-xs text-slate-600 mt-1">
              Isi data berikut. Setelah tombol diklik, data tercatat di antrean sistem dan pesan terformat otomatis siap dikirim ke WhatsApp TechCare.
            </p>
          </div>

          <!-- Error Alert -->
          @if ($errors->any())
            <div class="mb-5 p-3.5 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl text-xs space-y-1">
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
                       class="w-full text-xs rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#063970] focus:outline-hidden focus:ring-1 focus:ring-[#063970]">
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
                       class="w-full text-xs rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#063970] focus:outline-hidden focus:ring-1 focus:ring-[#063970]">
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
                       class="w-full text-xs rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#063970] focus:outline-hidden focus:ring-1 focus:ring-[#063970]">
              </div>

              <div>
                <label for="service_name" class="block font-bold text-slate-700 mb-1">
                  Layanan yang Dibutuhkan <span class="text-rose-600">*</span>
                </label>
                <select id="service_name" 
                        name="service_name" 
                        required 
                        class="w-full text-xs rounded-xl border border-slate-200 px-3.5 py-2.5 bg-white focus:border-[#063970] focus:outline-hidden focus:ring-1 focus:ring-[#063970]">
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
                        class="w-full text-xs rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#063970] focus:outline-hidden focus:ring-1 focus:ring-[#063970]">{{ old('problem') }}</textarea>
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
                       class="w-full text-xs rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#063970] focus:outline-hidden focus:ring-1 focus:ring-[#063970]">
              </div>

              <div>
                <label for="home_service_tier" class="block font-bold text-slate-700 mb-1">
                  Pilihan Layanan Lokasi
                </label>
                <select id="home_service_tier" 
                        name="home_service_tier" 
                        class="w-full text-xs rounded-xl border border-slate-200 px-3.5 py-2.5 bg-white focus:border-[#063970] focus:outline-hidden focus:ring-1 focus:ring-[#063970]">
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
                     class="w-full text-xs rounded-xl border border-slate-200 px-3.5 py-2.5 focus:border-[#063970] focus:outline-hidden focus:ring-1 focus:ring-[#063970]">
            </div>

            <!-- Tombol Kirim -->
            <div class="pt-3">
              <button type="submit" 
                      class="w-full inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl bg-[#063970] hover:bg-[#04274d] text-white text-sm font-heading font-bold transition-colors shadow-xs min-h-[48px]">
                <svg class="w-5 h-5 fill-current text-emerald-400" viewBox="0 0 24 24" aria-hidden="true"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.694.074-2.228-.564-1.785-.742-2.92-2.56-3.008-2.678-.09-.118-.722-.962-.722-1.838 0-.877.46-1.309.623-1.485.164-.176.357-.221.477-.221.121 0 .241.002.348.007.112.006.262-.043.409.313.153.37.522 1.272.568 1.365.046.092.077.2.015.323-.062.123-.093.2-.184.308-.092.108-.193.241-.276.324-.092.092-.188.192-.081.376.107.185.477.786 1.023 1.272.704.628 1.297.822 1.482.914.185.093.293.078.401-.047.108-.124.462-.538.585-.723.123-.185.247-.154.416-.092.17.061 1.077.508 1.262.6.185.092.308.138.354.215.046.077.046.446-.098.851z"/></svg>
                <span>Simpan Pesanan & Lanjut ke WhatsApp</span>
              </button>
            </div>

            <p class="text-[11px] text-slate-500 text-center pt-1 leading-relaxed font-mono">
              🔒 Privasi Anda terjamin. Tidak ada tindakan fisik pada perangkat sebelum Anda menyetujui rincian estimasi biaya.
            </p>

          </form>

        </div>

      </div>

      <!-- ==========================================
           KOLOM KANAN: KONTAK & JAM OPERASIONAL
      ========================================== -->
      <div class="lg:col-span-5 space-y-6">
        
        <!-- Info Kontak Lengkap -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 space-y-4 shadow-xs text-xs">
          <span class="text-[11px] font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Kontak Resmi</span>
          <h2 class="font-heading font-extrabold text-lg text-[#063970]">
            Informasi Kontak TechCare
          </h2>

          <div class="space-y-3 pt-2 text-slate-700">
            <div>
              <span class="text-slate-500 block text-[11px]">WhatsApp (Pemesanan & Konsultasi):</span>
              <a href="https://wa.me/{{ $waClean }}" target="_blank" rel="noopener noreferrer" class="font-mono font-bold text-sm text-[#063970] hover:text-[#0D9BE4] inline-flex items-center gap-1.5 mt-0.5">
                <span>{{ $waDisplay }}</span>
                <span class="text-xs text-emerald-600 font-sans font-normal">(Chat Aktif)</span>
              </a>
            </div>

            <div>
              <span class="text-slate-500 block text-[11px]">Email Resmi:</span>
              <a href="mailto:{{ $email }}" class="font-semibold text-slate-900 hover:text-[#063970]">
                {{ $email }}
              </a>
            </div>

            <div>
              <span class="text-slate-500 block text-[11px]">Lokasi Workshop:</span>
              <p class="font-semibold text-slate-900">Minggir, Sleman, D.I. Yogyakarta</p>
              <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="text-[11px] text-[#0D9BE4] hover:underline inline-flex items-center gap-1 mt-0.5">
                <span>Buka di Google Maps</span> &rarr;
              </a>
            </div>

            <div class="pt-2 border-t border-slate-100">
              <span class="text-slate-500 block text-[11px] mb-1">Media Sosial Resmi:</span>
              <div class="flex items-center gap-3">
                <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer" class="text-slate-700 hover:text-[#063970] font-medium flex items-center gap-1">
                  <span>Instagram: @mohiebenn</span>
                </a>
                <span class="text-slate-300">•</span>
                <a href="{{ $tiktokUrl }}" target="_blank" rel="noopener noreferrer" class="text-slate-700 hover:text-[#063970] font-medium flex items-center gap-1">
                  <span>TikTok: @albinmnn_</span>
                </a>
              </div>
            </div>

            <div class="pt-2 border-t border-slate-100">
              <span class="text-slate-500 block text-[11px] mb-1">Metode Pembayaran:</span>
              <p class="text-slate-700 leading-relaxed">
                Tunai (Cash), QRIS, GoPay, DANA, ShopeePay, dan Transfer Bank a.n. Nur Muhibbin.
              </p>
            </div>
          </div>
        </div>

        <!-- Jam Operasional Nyata -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 space-y-3 shadow-xs text-xs">
          <span class="text-[11px] font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Waktu Pelayanan</span>
          <h2 class="font-heading font-extrabold text-base text-[#063970]">
            Jam Operasional Servis
          </h2>

          <div class="space-y-2 text-slate-700 pt-1">
            <div class="flex justify-between py-1.5 border-b border-slate-100">
              <span class="font-semibold">Senin – Jumat</span>
              <span class="font-mono text-slate-900 font-bold">16.00 – 20.00 WIB</span>
            </div>
            <div class="flex justify-between py-1.5 border-b border-slate-100">
              <span class="font-semibold">Sabtu</span>
              <span class="font-mono text-slate-900 font-bold">09.00 – 17.00 WIB</span>
            </div>
            <div class="flex justify-between py-1.5">
              <span class="font-semibold">Minggu</span>
              <span class="text-slate-600 font-mono">Dengan janji terlebih dahulu</span>
            </div>
          </div>

          <p class="text-[11px] text-slate-500 pt-1 italic">
            * Pesan WhatsApp di luar jam kerja tetap diterima dan dibalas segera saat online.
          </p>
        </div>

      </div>

    </div>

    <!-- ==========================================
         BAGIAN BAWAH: 10 FAQ RESMI
    ========================================== -->
    <div class="mt-14 pt-10 border-t border-slate-200">
      <div class="max-w-2xl mb-8">
        <span class="text-xs font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Tanya Jawab</span>
        <h2 class="font-heading font-extrabold text-2xl text-[#063970] mt-1">
          Pertanyaan yang Sering Diajukan (FAQ)
        </h2>
        <p class="text-xs sm:text-sm text-slate-600 mt-1">
          Sepuluh tanya-jawab seputar ketentuan layanan, harga, garansi, dan teknis pengerjaan di TechCare.
        </p>
      </div>

      <div class="space-y-3" x-data="{ openFaq: null }">
        @foreach ($faqs as $idx => $f)
          <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-2xs">
            <button type="button" 
                    @click="openFaq = (openFaq === {{ $idx }} ? null : {{ $idx }})" 
                    class="w-full text-left p-4 flex items-center justify-between gap-3 text-xs sm:text-sm font-heading font-bold text-[#063970] hover:bg-slate-50 transition-colors min-h-[44px]">
              <span>{{ $idx + 1 }}. {{ $f['q'] }}</span>
              <span class="font-mono font-bold text-sm text-slate-400 shrink-0" x-text="openFaq === {{ $idx }} ? '−' : '+'">+</span>
            </button>
            <div x-show="openFaq === {{ $idx }}" x-cloak class="p-4 pt-0 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 bg-slate-50/50">
              {{ $f['a'] }}
            </div>
          </div>
        @endforeach
      </div>

    </div>

  </div>
</section>

@endsection
