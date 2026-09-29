<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Response;

class PageController extends Controller
{
    protected function getSettings(): array
    {
        return Setting::pluck('value', 'key')->toArray();
    }

    protected function getHomeServiceTiers(array $settings): array
    {
        return [
            [
                'id' => 'tier_1',
                'label' => 'Radius Dekat (≤ 3 km)',
                'distance' => 'Sampai 3 km',
                'price' => (int) ($settings['home_service_tier_1'] ?? 10000),
                'desc' => 'Area Minggir dan sekitarnya',
            ],
            [
                'id' => 'tier_2',
                'label' => 'Radius Sedang (> 3 – 7 km)',
                'distance' => 'Lebih dari 3 km sampai 7 km',
                'price' => (int) ($settings['home_service_tier_2'] ?? 20000),
                'desc' => 'Kecamatan sekitar (Moyudan, Godean, Seyegan, dsk.)',
            ],
            [
                'id' => 'tier_3',
                'label' => 'Radius Luar (> 7 km)',
                'distance' => 'Lebih dari 7 km',
                'price' => (int) ($settings['home_service_tier_3'] ?? 35000),
                'desc' => 'Wilayah Yogyakarta lainnya / sesuai kesepakatan jarak',
            ],
        ];
    }

    public function home()
    {
        $settings = $this->getSettings();
        $utamaServices = Service::active()->utama()->orderBy('sort_order')->get();
        $homeServiceTiers = $this->getHomeServiceTiers($settings);

        return view('pages.home', compact('settings', 'utamaServices', 'homeServiceTiers'));
    }

    public function layanan()
    {
        $settings = $this->getSettings();
        $services = Service::active()->orderBy('sort_order')->get();
        $homeServiceTiers = $this->getHomeServiceTiers($settings);

        $servicesByCategory = [
            'komputer' => $services->where('category', 'komputer'),
            'jaringan' => $services->where('category', 'jaringan'),
            'linux' => $services->where('category', 'linux'),
            'keamanan' => $services->where('category', 'keamanan'),
        ];

        return view('pages.layanan', compact('settings', 'services', 'servicesByCategory', 'homeServiceTiers'));
    }

    public function kalkulator()
    {
        $settings = $this->getSettings();
        $services = Service::active()->orderBy('sort_order')->get();
        $homeServiceTiers = $this->getHomeServiceTiers($settings);

        return view('pages.kalkulator', compact('settings', 'services', 'homeServiceTiers'));
    }

    public function alur()
    {
        $settings = $this->getSettings();
        return view('pages.alur', compact('settings'));
    }

    public function kebijakan()
    {
        $settings = $this->getSettings();
        return view('pages.kebijakan', compact('settings'));
    }

    public function kontak()
    {
        $settings = $this->getSettings();
        $services = Service::active()->orderBy('sort_order')->get();
        $homeServiceTiers = $this->getHomeServiceTiers($settings);

        $faqs = [
            [
                'q' => 'Apakah bisa home service (layanan ke rumah atau lokasi pelanggan)?',
                'a' => 'Bisa. TechCare menyediakan layanan kunjungan langsung ke lokasi pelanggan (rumah, tempat kost, toko UMKM, sekolah) untuk wilayah Yogyakarta dan sekitarnya dengan ongkos transparan berdasarkan jarak (mulai Rp10.000 untuk jarak sampai 3 km). Pelanggan juga dapat membawa perangkat ke Minggir, Sleman dengan membuat janji terlebih dahulu.',
            ],
            [
                'q' => 'Apakah konsultasi awal dikenakan biaya?',
                'a' => 'Konsultasi awal lewat WhatsApp 100% gratis. Pelanggan dapat menceritakan kendala perangkat terlebih dahulu. Bila memerlukan diagnosis fisik langsung di lokasi, biayanya Rp25.000 dan biaya tersebut dipotong dari total biaya jasa bila pelanggan melanjutkan pengerjaan.',
            ],
            [
                'q' => 'Apakah tarif jasa sudah termasuk komponen atau suku cadang baru?',
                'a' => 'Belum. Harga yang tercantum adalah murni biaya jasa teknisi. Bila pengerjaan membutuhkan komponen seperti SSD baru, router, atau kabel LAN panjang, komponen tersebut disediakan/dibeli sendiri oleh pelanggan atau dibayar di muka jika meminta bantuan teknisi untuk membelikannya.',
            ],
            [
                'q' => 'Bagaimana TechCare menjaga keamanan dan kerahasiaan data saya?',
                'a' => 'Sesuai Bab X proposal, TechCare memegang komitmen etika ketat: tidak membuka file pribadi (foto, chat, dokumen), tidak menyalin data tanpa persetujuan, tidak meminta maupun menyimpan password akun, dan backup sementara langsung dihapus setelah serah terima tuntas dikonfirmasi.',
            ],
            [
                'q' => 'Apakah TechCare memakai software bajakan atau aktivator crack?',
                'a' => 'Sama sekali tidak. TechCare menolak pemakaian activator ilegal, crack, atau software bajakan. Kami hanya menginstal software resmi dengan lisensi milik pelanggan, atau alternatif legal freeware dan open source (seperti LibreOffice, 7-Zip, browser resmi, Linux).',
            ],
            [
                'q' => 'Bagaimana ketentuan garansi jasa 7 hari?',
                'a' => 'Garansi berlaku 7 hari kalender sejak serah terima untuk kendala yang disebabkan langsung oleh pengerjaan TechCare (misal driver belum lengkap atau setting Wi-Fi bermasalah). Garansi berupa perbaikan ulang tanpa biaya jasa. Garansi tidak mencakup kerusakan hardware baru, virus akibat pemakaian sesudah serah terima, atau kelalaian pemakaian.',
            ],
            [
                'q' => 'Apakah bisa instal Linux atau dual boot bersama Windows?',
                'a' => 'Bisa. TechCare melayani instalasi distro Linux populer (Ubuntu, Linux Mint, Debian, dsb.) baik sebagai sistem operasi utama (Rp100.000) maupun dual boot berdampingan dengan Windows (Rp150.000) dengan partisi aman dan backup data terlebih dahulu.',
            ],
            [
                'q' => 'Berapa lama estimasi waktu pengerjaan?',
                'a' => 'Pengerjaan standar memakan waktu 30 menit hingga 3 jam tergantung jenis layanan (misal optimasi 1–2 jam, setting router 1–1,5 jam, instal ulang 2–3 jam). Perangkat yang dibawa ke tempat teknisi diselesaikan paling lambat 3 hari kerja.',
            ],
            [
                'q' => 'Pekerjaan apa saja yang tidak diterima oleh TechCare?',
                'a' => 'TechCare membatasi diri pada pekerjaan sesuai kompetensi: tidak menerima perbaikan mikrosolder chip/motherboard, pemulihan data dari hard disk fisik yang rusak berat, pembobolan password/akun orang lain, dan software bajakan.',
            ],
            [
                'q' => 'Bagaimana metode pembayarannya?',
                'a' => 'Pembayaran dilakukan setelah pengerjaan selesai dan diuji bersama, dapat secara tunai, transfer bank, atau e-wallet/QRIS.',
            ],
        ];

        return view('pages.kontak', compact('settings', 'services', 'homeServiceTiers', 'faqs'));
    }

    public function sitemap(): Response
    {
        $urls = [
            route('home'),
            route('layanan'),
            route('kalkulator'),
            route('alur'),
            route('kebijakan'),
            route('kontak'),
        ];

        $content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($urls as $url) {
            $content .= "  <url>\n";
            $content .= "    <loc>{$url}</loc>\n";
            $content .= "    <lastmod>" . date('Y-m-d') . "</lastmod>\n";
            $content .= "    <changefreq>weekly</changefreq>\n";
            $content .= "    <priority>" . ($url === route('home') ? '1.0' : '0.8') . "</priority>\n";
            $content .= "  </url>\n";
        }
        $content .= '</urlset>';

        return response($content, 200, ['Content-Type' => 'application/xml']);
    }
}
