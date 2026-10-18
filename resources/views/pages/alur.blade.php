@extends('layouts.public')

@section('title', 'Alur Pelayanan 10 Tahap – TechCare IT Support Sleman')
@section('meta_description', 'SOP pelayanan TechCare dari kontak awal, diagnosis, persetujuan estimasi biaya, pengerjaan teliti, pengujian checklist, serah terima nota, hingga follow-up purna jual.')

@section('content')

@php
  $waNumber = $settings['whatsapp_number'] ?? '6285641487430';
  $waClean = preg_replace('/[^0-9]/', '', $waNumber);
  $waDisplay = $settings['whatsapp_display'] ?? '085641487430';
@endphp

<!-- Header Halaman -->
<section class="bg-white border-b border-slate-200 py-10 sm:py-12">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <span class="text-xs font-mono font-bold uppercase tracking-wider text-[#0D9BE4]">Standar Pelayanan Transparan</span>
    <h1 class="font-heading font-extrabold text-2xl sm:text-3xl md:text-4xl text-[#063970] mt-1">
      Alur Pelayanan 10 Tahap
    </h1>
    <p class="text-xs sm:text-sm text-slate-600 mt-2 max-w-2xl leading-relaxed">
      Standar Operasional Prosedur (SOP) TechCare dirancang agar setiap tahapan pengerjaan jelas bagi pelanggan. Tidak ada pembongkaran perangkat atau biaya tambahan tanpa persetujuan eksplisit Anda.
    </p>

    <!-- Golden Rule Box -->
    <div class="mt-6 p-4 sm:p-5 bg-amber-50 border-2 border-amber-300 rounded-xl text-xs text-amber-950 flex items-start gap-3.5 shadow-2xs">
      <div class="w-7 h-7 rounded-lg bg-amber-200 text-amber-900 font-bold flex items-center justify-center shrink-0 text-sm">
        !
      </div>
      <div>
        <strong class="block text-sm font-heading font-bold text-amber-950">Prinsip Mutlak Tahap 5:</strong>
        <p class="mt-0.5 leading-relaxed">
          <strong>Tanpa persetujuan pelanggan atas estimasi biaya dan risiko pengerjaan, tidak ada tindakan yang dilakukan pada perangkat Anda.</strong> Hak kendali biaya dan keputusan sepenuhnya berada di tangan Anda.
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
          'desc' => "Lewat WhatsApp ({$waDisplay}) atau langsung. Anda bisa memilih antara home service (teknisi datang ke rumah/kantor) atau membawa perangkat ke Minggir, Sleman dengan jadwal yang disepakati bersama.",
          'highlight' => false,
        ],
        [
          'no' => '02',
          'title' => 'Pelanggan Menjelaskan Masalah',
          'desc' => 'Pelanggan menceritakan gejala kerusakan, jenis dan merek perangkat, serta riwayat kejadian (misalnya pernah jatuh, tersiram air, atau mendadak mati setelah update sistem). Foto atau video kendala sangat dianjurkan dikirimkan via chat.',
          'highlight' => false,
        ],
        [
          'no' => '03',
          'title' => 'Diagnosis Awal',
          'desc' => 'Pemeriksaan gejala dan pencatatan kondisi fisik awal perangkat (goresan, baut, segel yang sudah ada). Diagnosis lewat chat 100% gratis. Diagnosis fisik langsung di lokasi Rp25.000 (dan langsung dipotong dari total biaya jasa bila pengerjaan dilanjutkan).',
          'highlight' => false,
        ],
        [
          'no' => '04',
          'title' => 'Penyampaian Estimasi Biaya & Waktu',
          'desc' => 'TechCare menyampaikan rincian tertulis: biaya jasa resmi, ongkos kunjungan sesuai jarak, harga komponen baru bila perlu ganti part (SSD/RAM), estimasi lama pengerjaan, dan potensi risiko teknis.',
          'highlight' => false,
        ],
        [
          'no' => '05',
          'title' => 'Pelanggan Menyetujui (Golden Rule)',
          'desc' => 'Persetujuan diberikan oleh pelanggan lewat pesan chat tertulis atau formulir persetujuan kerja. Tanpa persetujuan eksplisit Anda, teknisi tidak akan membongkar atau mengubah apapun pada perangkat.',
          'highlight' => true,
        ],
        [
          'no' => '06',
          'title' => 'Pengerjaan & Pencadangan Data',
          'desc' => 'Backup data penting dilakukan terlebih dahulu sebelum tindakan berisiko (seperti instal ulang atau partisi). Pengerjaan home service dapat disaksikan langsung oleh pelanggan. Jika muncul kendala tak terduga, teknisi WAJIB konfirmasi terlebih dahulu.',
          'highlight' => false,
        ],
        [
          'no' => '07',
          'title' => 'Pengujian (Checklist Menyeluruh)',
          'desc' => 'Perangkat diuji secara teliti: uji boot sistem, koneksi Wi-Fi/LAN, fungsionalitas audio & keyboard, driver perangkat, kestabilan suhu, dan performa aplikasi sebelum diserahkan.',
          'highlight' => false,
        ],
        [
          'no' => '08',
          'title' => 'Serah Terima & Bukti Nota',
          'desc' => 'Hasil pengerjaan ditunjukkan dan dijelaskan langsung kepada pelanggan dengan bahasa sehari-hari yang mudah dipahami. Pelanggan menerima nota resmi yang mencantumkan rincian jasa, masa garansi 7 hari, dan kontak teknisi.',
          'highlight' => false,
        ],
        [
          'no' => '09',
          'title' => 'Pembayaran Selesai',
          'desc' => 'Pembayaran baru dilakukan setelah seluruh pengerjaan tuntas dan diuji bersama. Dapat melalui uang tunai (cash), transfer bank, atau e-wallet/QRIS (GoPay, DANA, ShopeePay).',
          'highlight' => false,
        ],
        [
          'no' => '10',
          'title' => 'Follow-up & Garansi Purna-Jual',
          'desc' => 'Satu hingga tiga hari setelah serah terima, TechCare menghubungi pelanggan via WhatsApp untuk memastikan perangkat beroperasi lancar dan menanyakan kondisi pemakaian. Garansi jasa berlaku 7 hari kalender.',
          'highlight' => false,
        ],
      ];
    @endphp

    <div class="space-y-4">
      @foreach ($steps as $st)
        <div class="bg-white border {{ $st['highlight'] ? 'border-2 border-[#0D9BE4] bg-[#F0F7FD]/40' : 'border-slate-200' }} rounded-xl p-5 sm:p-6 transition-all shadow-2xs">
          <div class="flex items-start gap-4">
            
            <!-- Step Number Badge (Monospace) -->
            <div class="font-mono font-bold text-base {{ $st['highlight'] ? 'bg-[#063970] text-white' : 'bg-slate-100 text-[#063970]' }} px-3 py-1.5 rounded-lg border border-slate-200 shrink-0">
              {{ $st['no'] }}
            </div>

            <!-- Content -->
            <div class="space-y-1">
              <div class="flex items-center gap-2 flex-wrap">
                <h2 class="font-heading font-bold text-base sm:text-lg text-[#063970]">
                  {{ $st['title'] }}
                </h2>
                @if($st['highlight'])
                  <span class="text-[10px] uppercase font-bold bg-[#0D9BE4] text-white px-2 py-0.5 rounded font-mono">
                    Kunci Transparansi
                  </span>
                @endif
              </div>

              <p class="text-xs sm:text-sm text-slate-600 leading-relaxed pt-1">
                {{ $st['desc'] }}
              </p>
            </div>

          </div>
        </div>
      @endforeach
    </div>

    <!-- CTA ke WhatsApp -->
    <div class="mt-10 p-6 sm:p-8 bg-white border border-slate-200 rounded-2xl text-center space-y-3 shadow-xs">
      <h3 class="font-heading font-bold text-base sm:text-lg text-[#063970]">Punya Pertanyaan Mengenai Alur Kerja?</h3>
      <p class="text-xs text-slate-600 max-w-md mx-auto leading-relaxed">
        Silakan hubungi TechCare melalui WhatsApp untuk berkonsultasi mengenai keluhan laptop, PC, atau jaringan Anda.
      </p>
      <div class="pt-2">
        <a href="https://wa.me/{{ $waClean }}?text={{ rawurlencode('Halo Mas Nur (TechCare), saya ingin tanya mengenai alur servis perangkat saya.') }}" 
           target="_blank" 
           rel="noopener noreferrer" 
           class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-[#063970] hover:bg-[#0D9BE4] text-white text-xs font-bold transition-colors min-h-[44px] shadow-xs">
          <span>Mulai dari Tahap 1: Hubungi via WhatsApp</span>
          <span aria-hidden="true">&rarr;</span>
        </a>
      </div>
    </div>

  </div>
</section>

@endsection
