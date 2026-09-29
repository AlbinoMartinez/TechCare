@extends('layouts.public')

@section('title', 'Alur Pelayanan 10 Tahap – TechCare IT Support')
@section('meta_description', 'SOP pelayanan TechCare dari kontak awal, diagnosis, persetujuan estimasi, pengerjaan, pengujian checklist, serah terima nota, hingga follow-up purna jual.')

@section('content')

<!-- Header Halaman -->
<section class="bg-white border-b border-[#E2DFD7] py-10">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <span class="text-xs font-bold uppercase tracking-wider text-[#1E9BE8]">Bab 6.1 Proposal</span>
    <h1 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-[#0B3A75] mt-1">
      Alur Pelayanan 10 Tahap
    </h1>
    <p class="text-xs sm:text-sm text-slate-700 mt-2 max-w-2xl leading-relaxed">
      Standar Operasional Prosedur (SOP) TechCare dirancang agar setiap tahapan jelas bagi pelanggan. Tidak ada tindakan fisik atau biaya tambahan tanpa persetujuan eksplisit Anda.
    </p>

    <!-- Golden Rule Box -->
    <div class="mt-6 p-4 bg-amber-50 border-2 border-amber-300 rounded-lg text-xs text-amber-950 flex items-start gap-3">
      <div class="w-6 h-6 rounded bg-amber-200 text-amber-900 font-bold flex items-center justify-center shrink-0 text-sm">
        !
      </div>
      <div>
        <strong class="block text-sm font-heading font-bold text-amber-950">Prinsip Mutlak Tahap 5:</strong>
        <p class="mt-0.5 leading-relaxed">
          <strong>Tanpa persetujuan pelanggan atas estimasi biaya dan risiko, tidak ada tindakan yang dilakukan pada perangkat Anda.</strong> Hak kendali sepenuhnya di tangan Anda.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Timeline 10 Tahap -->
<section class="py-12 bg-[#FAF9F6]">
  <div class="max-w-4xl mx-auto px-4 sm:px-6">
    
    @php
      $steps = [
        [
          'no' => '01',
          'title' => 'Pelanggan Menghubungi TechCare',
          'desc' => 'Lewat WhatsApp (085641487430) atau langsung. Pilihan antara home service (kunjungan ke rumah/kantor) atau membawa perangkat ke Minggir, Sleman serta jadwal dicatat.',
          'highlight' => false,
        ],
        [
          'no' => '02',
          'title' => 'Pelanggan Menjelaskan Masalah',
          'desc' => 'Pelanggan menyampaikan gejala kerusakan, jenis dan merek perangkat, serta riwayat kejadian (misalnya pernah jatuh, tersiram air, atau habis update sistem). Foto atau video kendala boleh dikirimkan lewat chat.',
          'highlight' => false,
        ],
        [
          'no' => '03',
          'title' => 'Diagnosis Awal',
          'desc' => 'Pemeriksaan gejala dan pencatatan kondisi awal fisik perangkat (goresan/baut/segel yang sudah ada). Diagnosis lewat chat 100% gratis. Diagnosis langsung di lokasi Rp25.000 (dan dipotong dari total biaya jasa bila pelanggan melanjutkan pengerjaan).',
          'highlight' => false,
        ],
        [
          'no' => '04',
          'title' => 'Penyampaian Estimasi Biaya & Waktu',
          'desc' => 'TechCare menyampaikan rincian tertulis: biaya jasa, ongkos kunjungan sesuai jarak, harga komponen bila butuh ganti modul, estimasi waktu selesai, dan potensi risiko (misalnya risiko data saat instal ulang atau partisi).',
          'highlight' => false,
        ],
        [
          'no' => '05',
          'title' => 'Pelanggan Menyetujui (Golden Rule)',
          'desc' => 'Persetujuan diberikan oleh pelanggan lewat pesan chat tertulis atau formulir persetujuan layanan. Tanpa persetujuan eksplisit, teknisi tidak akan melakukan tindakan apapun pada perangkat Anda.',
          'highlight' => true,
        ],
        [
          'no' => '06',
          'title' => 'Pengerjaan & Pencadangan Data',
          'desc' => 'Backup data penting dilakukan terlebih dahulu sebelum tindakan berisiko. Pengerjaan home service dapat disaksikan langsung oleh pelanggan. Bila muncul kendala terduga atau biaya tambahan baru, teknisi WAJIB mengonfirmasi terlebih dahulu ke pelanggan.',
          'highlight' => false,
        ],
        [
          'no' => '07',
          'title' => 'Pengujian (Checklist Troubleshooting)',
          'desc' => 'Perangkat diuji sesuai checklist Lampiran 4: uji boot sistem, koneksi Wi-Fi/LAN, fungsionalitas driver, printer, suhu pendingin, dan kestabilan sebelum diserahkan.',
          'highlight' => false,
        ],
        [
          'no' => '08',
          'title' => 'Serah Terima & Bukti Nota',
          'desc' => 'Hasil pengerjaan ditunjukkan dan dijelaskan langsung kepada pelanggan dengan bahasa yang mudah dipahami. Pelanggan menerima nota resmi (mencantumkan rincian jasa, garansi 7 hari, dan kontak).',
          'highlight' => false,
        ],
        [
          'no' => '09',
          'title' => 'Pembayaran Selesai',
          'desc' => 'Pembayaran dilakukan setelah seluruh pengerjaan tuntas dan diuji bersama. Dapat melalui uang tunai, transfer bank, atau e-wallet/QRIS.',
          'highlight' => false,
        ],
        [
          'no' => '10',
          'title' => 'Follow-up & Garansi Purna-Jual',
          'desc' => 'Satu hingga tiga hari setelah serah terima, TechCare menghubungi pelanggan via WhatsApp untuk memastikan perangkat beroperasi lancar dan menanyakan umpan balik. Garansi jasa berlaku 7 hari kalender.',
          'highlight' => false,
        ],
      ];
    @endphp

    <div class="space-y-4">
      @foreach ($steps as $st)
        <div class="bg-white border {{ $st['highlight'] ? 'border-2 border-[#1E9BE8] bg-[#F0F7FD]/40' : 'border-[#E2DFD7]' }} rounded-lg p-5 sm:p-6 transition-all shadow-2xs">
          <div class="flex items-start gap-4">
            
            <!-- Step Number Badge (Monospace) -->
            <div class="font-mono font-bold text-base {{ $st['highlight'] ? 'bg-[#0B3A75] text-white' : 'bg-slate-100 text-[#0B3A75]' }} px-3 py-1.5 rounded border border-slate-200 shrink-0">
              {{ $st['no'] }}
            </div>

            <!-- Content -->
            <div class="space-y-1">
              <div class="flex items-center gap-2 flex-wrap">
                <h2 class="font-heading font-bold text-base sm:text-lg text-[#0B3A75]">
                  {{ $st['title'] }}
                </h2>
                @if($st['highlight'])
                  <span class="text-[10px] uppercase font-bold bg-[#1E9BE8] text-white px-2 py-0.5 rounded">
                    Kunci Transparansi
                  </span>
                @endif
              </div>

              <p class="text-xs sm:text-sm text-slate-700 leading-relaxed pt-1">
                {{ $st['desc'] }}
              </p>
            </div>

          </div>
        </div>
      @endforeach
    </div>

    <!-- CTA ke WhatsApp -->
    <div class="mt-10 p-6 bg-white border border-[#E2DFD7] rounded-lg text-center space-y-3">
      <h3 class="font-heading font-bold text-base text-[#0B3A75]">Punya Pertanyaan Mengenai Alur Kerja?</h3>
      <p class="text-xs text-slate-600 max-w-md mx-auto">
        Silakan hubungi TechCare melalui WhatsApp untuk berkonsultasi mengenai perangkat Anda.
      </p>
      <div>
        <a href="https://wa.me/6285641487430?text={{ rawurlencode('Halo TechCare, saya ingin tanya mengenai alur layanan / servis perangkat.') }}" 
           target="_blank" 
           rel="noopener noreferrer" 
           class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-[#0B3A75] text-white text-xs font-bold hover:bg-[#07254C] transition-colors min-h-[44px]">
          <span>Mulai dari Tahap 1: Hubungi via WhatsApp</span>
          <span aria-hidden="true">&rarr;</span>
        </a>
      </div>
    </div>

  </div>
</section>

@endsection
