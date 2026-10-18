<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Load all settings into key-value array
        $settings = Setting::pluck('value', 'key')->toArray();

        // Load all active services grouped by category
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $servicesByCategory = [
            'komputer' => $services->where('category', 'komputer'),
            'jaringan' => $services->where('category', 'jaringan'),
            'linux' => $services->where('category', 'linux'),
            'keamanan' => $services->where('category', 'keamanan'),
        ];

        // Home service tiers from settings
        $homeServiceTiers = [
            [
                'label' => 'Radius Dekat',
                'distance' => 'Sampai 3 km',
                'price' => (int) ($settings['home_service_tier_1'] ?? 10000),
                'desc' => 'Area sekitar bengkel / pos layanan terdekat',
            ],
            [
                'label' => 'Radius Sedang',
                'distance' => '> 3 – 7 km',
                'price' => (int) ($settings['home_service_tier_2'] ?? 20000),
                'desc' => 'Area dalam ring road & kecamatan terdekat',
            ],
            [
                'label' => 'Radius Luar',
                'distance' => '> 7 km',
                'price' => (int) ($settings['home_service_tier_3'] ?? 35000),
                'desc' => 'Area luar kota / sesuai kesepakatan jarak',
            ],
        ];

        // 10 Official FAQs
        $faqs = [
            [
                'q' => 'Apakah bisa home service (layanan ke rumah/kantor)?',
                'a' => 'Bisa! TechCare menyediakan layanan kunjungan langsung ke lokasi Anda (rumah, kost, kantor UMKM, sekolah) untuk wilayah Yogyakarta dan sekitarnya dengan tarif transparan sesuai jarak tempuh.',
            ],
            [
                'q' => 'Apakah konsultasi awal gratis?',
                'a' => 'Ya, 100% gratis tanpa biaya tersembunyi. Anda bebas berkonsultasi via WhatsApp mengenai gejala kerusakan perangkat atau kebutuhan jaringan Anda.',
            ],
            [
                'q' => 'Apakah harga jasa sudah termasuk komponen / sparepart?',
                'a' => 'Harga yang tercantum adalah murni biaya jasa pengerjaan teknisi. Jika dibutuhkan penggantian perangkat/komponen (seperti SSD, kabel LAN, router baru, dsb.), rincian harga komponen akan dikomunikasikan dan disetujui oleh Anda terlebih dahulu sebelum dibeli/dipasang.',
            ],
            [
                'q' => 'Apakah bisa melayani instalasi Linux?',
                'a' => 'Bisa. Kami melayani instalasi berbagai distro Linux populer seperti Ubuntu, Debian, Linux Mint, Fedora, Arch, maupun distro ramah pemula lainnya dengan konfigurasi desktop siap pakai.',
            ],
            [
                'q' => 'Apakah bisa setting dual boot Windows dan Linux pada satu laptop?',
                'a' => 'Bisa. Kami menguasai partisi UEFI/GPT dan setting bootloader GRUB yang aman agar instalasi Linux berdampingan dengan Windows tanpa merusak data atau lisensi Windows bawaan Anda.',
            ],
            [
                'q' => 'Apakah kerahasiaan data saya aman saat diservis?',
                'a' => 'Sangat aman. Privasi dan etika data adalah komitmen mutlak TechCare. Kami tidak pernah membuka, menyalin, atau mengintip folder pribadi/foto Anda tanpa izin. Backup sementara (jika ada) akan dihapus tuntas setelah proses serah terima selesai.',
            ],
            [
                'q' => 'Apakah TechCare bisa memperbaiki kerusakan motherboard?',
                'a' => 'TechCare fokus pada IT Support tingkat sistem, software, instalasi, konfigurasi jaringan, maintenance, dan penggantian modul hardware standar. Untuk perbaikan motherboard tingkat komponen mikroskopik/reballing chip, kami tidak memaksakan dan dapat memberikan rujukan teknisi spesialis yang kredibel.',
            ],
            [
                'q' => 'Berapa lama estimasi waktu pengerjaan?',
                'a' => 'Sebagian besar layanan memakan waktu 30 menit hingga 2 jam tergantung jenis pekerjaan (misal optimasi atau ganti thermal paste ~45-60 menit, instal ulang sistem ~1-2 jam). Estimasi akurat akan disampaikan sebelum pengerjaan dimulai.',
            ],
            [
                'q' => 'Bagaimana cara melakukan booking jadwal layanan?',
                'a' => 'Cukup pilih layanan di katalog atau isi formulir booking di website ini, lalu klik tombol "Konsultasi via WhatsApp". Sistem kami akan langsung merangkum detail masalah Anda ke chat WhatsApp TechCare.',
            ],
            [
                'q' => 'Apakah ada garansi purna-jual?',
                'a' => 'Ya! TechCare memberikan Garansi Jasa selama 7 Hari terhitung sejak serah terima untuk memastikan kendala yang ditangani benar-benar tuntas.',
            ],
        ];

        return view('home', compact(
            'settings',
            'services',
            'servicesByCategory',
            'homeServiceTiers',
            'faqs'
        ));
    }
}
