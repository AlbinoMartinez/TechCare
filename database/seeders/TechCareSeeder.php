<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TechCareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@techcare.id'],
            [
                'name' => 'Nur Muhibbin (Admin)',
                'password' => Hash::make('techcare123'),
            ]
        );

        // 2. Dynamic Settings from Proposal
        $settings = [
            // Contact
            ['key' => 'whatsapp_number', 'value' => '6285641487430', 'group' => 'contact', 'label' => 'Nomor WhatsApp (format internasional)'],
            ['key' => 'whatsapp_display', 'value' => '085641487430', 'group' => 'contact', 'label' => 'Display Nomor WhatsApp'],
            ['key' => 'email', 'value' => 'Ibinyo19@gmail.com', 'group' => 'contact', 'label' => 'Email Resmi'],
            ['key' => 'instagram', 'value' => 'TechCare', 'group' => 'contact', 'label' => 'Instagram'],
            ['key' => 'tiktok', 'value' => 'TechCaree', 'group' => 'contact', 'label' => 'TikTok'],

            // Business info
            ['key' => 'business_name', 'value' => 'TechCare', 'group' => 'business', 'label' => 'Nama Usaha'],
            ['key' => 'tagline', 'value' => 'Jasa IT Support, Maintenance Komputer, dan Jaringan', 'group' => 'business', 'label' => 'Tagline'],
            ['key' => 'founder_name', 'value' => 'Nur Muhibbin', 'group' => 'business', 'label' => 'Nama Pemilik / Teknisi'],
            ['key' => 'founder_role', 'value' => 'Pemilik / Teknisi', 'group' => 'business', 'label' => 'Peran'],
            ['key' => 'founder_background', 'value' => 'Jurusan Teknik Komputer dan Jaringan (TKJ), SMKN 3 Yogyakarta', 'group' => 'business', 'label' => 'Latar Belakang'],
            ['key' => 'business_type', 'value' => 'Usaha jasa perorangan', 'group' => 'business', 'label' => 'Bentuk Usaha'],
            ['key' => 'address', 'value' => 'Minggir, Sleman, Yogyakarta', 'group' => 'business', 'label' => 'Alamat'],
            ['key' => 'service_area', 'value' => 'Yogyakarta dan sekitarnya', 'group' => 'business', 'label' => 'Wilayah Layanan'],
            ['key' => 'operational_hours', 'value' => 'Senin–Jumat: 16.00–20.00 WIB, Sabtu: 09.00–17.00 WIB, Minggu: dengan janji terlebih dahulu', 'group' => 'business', 'label' => 'Jam Operasional'],

            // Home service rates
            ['key' => 'home_service_tier_1', 'value' => '10000', 'group' => 'rates', 'label' => 'Home Service (Sampai 3 km)'],
            ['key' => 'home_service_tier_2', 'value' => '20000', 'group' => 'rates', 'label' => 'Home Service (> 3 – 7 km)'],
            ['key' => 'home_service_tier_3', 'value' => '35000', 'group' => 'rates', 'label' => 'Home Service (> 7 km atau kesepakatan)'],
            ['key' => 'diagnosis_fee', 'value' => '25000', 'group' => 'rates', 'label' => 'Biaya Diagnosis Langsung (dipotong jika lanjut)'],
            ['key' => 'warranty_days', 'value' => '7', 'group' => 'rates', 'label' => 'Masa Garansi Jasa (Hari Kalender)'],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(['key' => $s['key']], $s);
        }

        // 3. 24 Services exactly from Proposal Bab IV
        $services = [
            // ==========================================
            // 4.1 Komputer dan Laptop (A1 - A9)
            // ==========================================
            [
                'code' => 'A1',
                'name' => 'Diagnosis dan troubleshooting',
                'category' => 'komputer',
                'description' => 'Pemeriksaan penyebab masalah komputer/laptop (error, sering restart, tidak masuk sistem) dan penjelasan hasilnya.',
                'duration' => '30–60 menit',
                'price' => 25000,
                'price_note' => null,
                'notes' => 'Layanan utama. Konsultasi awal lewat WhatsApp gratis. Biaya dipotong dari jasa bila pelanggan lanjut pengerjaan.',
                'is_utama' => true,
                'sort_order' => 1,
            ],
            [
                'code' => 'A2',
                'name' => 'Optimasi laptop/PC lemot',
                'category' => 'komputer',
                'description' => 'Membersihkan program yang tidak perlu, mengatur startup, memperbarui driver dan sistem, serta memeriksa penyimpanan.',
                'duration' => '1–2 jam',
                'price' => 50000,
                'price_note' => null,
                'notes' => 'Layanan utama. Tidak menjamin secepat perangkat baru. Bila penyebabnya hardware, pelanggan disarankan upgrade (SSD/RAM).',
                'is_utama' => true,
                'sort_order' => 2,
            ],
            [
                'code' => 'A3',
                'name' => 'Instalasi ulang Windows',
                'category' => 'komputer',
                'description' => 'Instal Windows, driver dasar, pembaruan sistem, dan software dasar gratis (browser, PDF reader, 7-Zip, LibreOffice).',
                'duration' => '2–3 jam',
                'price' => 80000,
                'price_note' => null,
                'notes' => 'Layanan utama. Memakai lisensi milik pelanggan atau tanpa aktivasi sesuai pilihan pelanggan. TechCare tidak memakai aktivator ilegal.',
                'is_utama' => true,
                'sort_order' => 3,
            ],
            [
                'code' => 'A4',
                'name' => 'Backup dan pemindahan data',
                'category' => 'komputer',
                'description' => 'Menyalin data yang ditunjuk pelanggan sebelum tindakan berisiko dan mengembalikannya setelah selesai.',
                'duration' => '1–2 jam (sampai 50 GB)',
                'price' => 40000,
                'price_note' => null,
                'notes' => 'Layanan tambahan. Lebih dari 50 GB, +Rp10.000 tiap 50 GB. Media penyimpanan disediakan pelanggan.',
                'is_utama' => false,
                'sort_order' => 4,
            ],
            [
                'code' => 'A5',
                'name' => 'Instalasi driver dan software',
                'category' => 'komputer',
                'description' => 'Instal driver dan software legal/freeware/open source sesuai kebutuhan.',
                'duration' => '30–60 menit',
                'price' => 30000,
                'price_note' => null,
                'notes' => 'Layanan tambahan. Sudah termasuk dalam paket A3.',
                'is_utama' => false,
                'sort_order' => 5,
            ],
            [
                'code' => 'A6',
                'name' => 'Migrasi HDD ke SSD',
                'category' => 'komputer',
                'description' => 'Memasang SSD milik pelanggan, memindahkan sistem (cloning) atau instal ulang, dan memeriksa proses boot.',
                'duration' => '2–3 jam',
                'price' => 100000,
                'price_note' => null,
                'notes' => 'Layanan utama. SSD dibeli pelanggan. Hanya untuk perangkat yang mudah dibongkar. Backup sangat disarankan.',
                'is_utama' => true,
                'sort_order' => 6,
            ],
            [
                'code' => 'A7',
                'name' => 'Cek kesehatan storage',
                'category' => 'komputer',
                'description' => 'Membaca status HDD/SSD dengan tools gratis dan membuat laporan sederhana.',
                'duration' => '20–30 menit',
                'price' => 25000,
                'price_note' => null,
                'notes' => 'Layanan tambahan. Hasilnya berupa indikasi, bukan jaminan disk tidak akan rusak.',
                'is_utama' => false,
                'sort_order' => 7,
            ],
            [
                'code' => 'A8',
                'name' => 'Maintenance PC/laptop (software)',
                'category' => 'komputer',
                'description' => 'Membersihkan software, update, cek storage, dan membersihkan debu bagian luar.',
                'duration' => '1–2 jam',
                'price' => 75000,
                'price_note' => null,
                'notes' => 'Layanan tambahan. Dapat menjadi dasar paket langganan pada Tahap 3.',
                'is_utama' => false,
                'sort_order' => 8,
            ],
            [
                'code' => 'A9',
                'name' => 'Pembersihan internal dan thermal paste',
                'category' => 'komputer',
                'description' => 'Membersihkan kipas dan heatsink serta mengganti thermal paste (sudah termasuk pasta).',
                'duration' => '2–3 jam',
                'price' => 100000,
                'price_note' => null,
                'notes' => 'Layanan tambahan. Hanya untuk perangkat yang mudah dibongkar dan sudah tidak bergaransi resmi. Perlu persetujuan tertulis.',
                'is_utama' => false,
                'sort_order' => 9,
            ],

            // ==========================================
            // 4.2 Jaringan (B1 - B7)
            // ==========================================
            [
                'code' => 'B1',
                'name' => 'Troubleshooting Wi-Fi dan koneksi',
                'category' => 'jaringan',
                'description' => 'Memeriksa penyebab Wi-Fi lambat, putus, atau tidak ada internet (pengaturan router, kabel, perangkat pengguna, posisi perangkat).',
                'duration' => '1–2 jam',
                'price' => 50000,
                'price_note' => null,
                'notes' => 'Layanan utama. Bila gangguan berasal dari penyedia internet atau jalur kabel di luar rumah, TechCare hanya membantu mengidentifikasi.',
                'is_utama' => true,
                'sort_order' => 10,
            ],
            [
                'code' => 'B2',
                'name' => 'Setting router',
                'category' => 'jaringan',
                'description' => 'Instalasi awal router/access point: nama Wi-Fi, password, DHCP, pengaturan keamanan dasar, dan uji koneksi.',
                'duration' => '1–1,5 jam',
                'price' => 60000,
                'price_note' => null,
                'notes' => 'Layanan utama. Router disediakan pelanggan. Konfigurasi lanjutan seperti VLAN tidak termasuk.',
                'is_utama' => true,
                'sort_order' => 11,
            ],
            [
                'code' => 'B3',
                'name' => 'Penggantian konfigurasi Wi-Fi',
                'category' => 'jaringan',
                'description' => 'Mengganti nama dan password Wi-Fi, mengatur channel, dan menyambungkan ulang perangkat.',
                'duration' => '30–45 menit',
                'price' => 30000,
                'price_note' => null,
                'notes' => 'Layanan tambahan.',
                'is_utama' => false,
                'sort_order' => 12,
            ],
            [
                'code' => 'B4',
                'name' => 'Setting jaringan LAN sederhana',
                'category' => 'jaringan',
                'description' => 'Menghubungkan 2–5 perangkat dalam satu jaringan lokal, berbagi file/folder, dan pengaturan IP dasar.',
                'duration' => '3–4 jam',
                'price' => 150000,
                'price_note' => null,
                'notes' => 'Layanan tambahan. Kabel dan switch disediakan pelanggan. Untuk lebih dari 5 perangkat, dikonsultasikan lebih dulu.',
                'is_utama' => false,
                'sort_order' => 13,
            ],
            [
                'code' => 'B5',
                'name' => 'Setting printer jaringan',
                'category' => 'jaringan',
                'description' => 'Memasang printer di jaringan Wi-Fi/LAN dan menginstal driver pada 2 komputer.',
                'duration' => '1–1,5 jam',
                'price' => 60000,
                'price_note' => null,
                'notes' => 'Layanan utama. Tiap komputer tambahan +Rp15.000.',
                'is_utama' => true,
                'sort_order' => 14,
            ],
            [
                'code' => 'B6',
                'name' => 'Pembuatan kabel LAN',
                'category' => 'jaringan',
                'description' => 'Memasang konektor RJ45 (crimping) dan menguji kabel dengan LAN tester.',
                'duration' => '15 menit per kabel',
                'price' => 10000,
                'price_note' => '/ kabel',
                'notes' => 'Layanan tambahan. Kabel dan konektor dihitung terpisah sesuai harga beli.',
                'is_utama' => false,
                'sort_order' => 15,
            ],
            [
                'code' => 'B7',
                'name' => 'Konfigurasi perangkat jaringan dasar',
                'category' => 'jaringan',
                'description' => 'Pengaturan access point, Wi-Fi extender, atau switch unmanaged.',
                'duration' => '1–1,5 jam',
                'price' => 60000,
                'price_note' => null,
                'notes' => 'Layanan tambahan. Perangkat disediakan pelanggan.',
                'is_utama' => false,
                'sort_order' => 16,
            ],

            // ==========================================
            // 4.3 Sistem Operasi dan Linux (C1 - C5)
            // ==========================================
            [
                'code' => 'C1',
                'name' => 'Instalasi Linux',
                'category' => 'linux',
                'description' => 'Instal distro Linux populer (misalnya Ubuntu atau Linux Mint) sebagai satu-satunya sistem operasi, termasuk driver dasar dan update.',
                'duration' => '2–3 jam',
                'price' => 100000,
                'price_note' => null,
                'notes' => 'Layanan utama. TechCare menjelaskan bahwa tidak semua software Windows dapat berjalan di Linux. Backup disarankan.',
                'is_utama' => true,
                'sort_order' => 17,
            ],
            [
                'code' => 'C2',
                'name' => 'Dual boot Windows–Linux',
                'category' => 'linux',
                'description' => 'Membagi partisi dan memasang Linux berdampingan dengan Windows.',
                'duration' => '3–4 jam',
                'price' => 150000,
                'price_note' => null,
                'notes' => 'Layanan tambahan. Backup wajib. Ada risiko kehilangan data saat pengaturan partisi.',
                'is_utama' => false,
                'sort_order' => 18,
            ],
            [
                'code' => 'C3',
                'name' => 'Konfigurasi dasar Linux',
                'category' => 'linux',
                'description' => 'Pengaturan awal: update, driver, bahasa dan waktu, paket dasar, serta pengenalan terminal dan manajer paket.',
                'duration' => '1–1,5 jam',
                'price' => 50000,
                'price_note' => null,
                'notes' => 'Layanan tambahan.',
                'is_utama' => false,
                'sort_order' => 19,
            ],
            [
                'code' => 'C4',
                'name' => 'Development environment dasar',
                'category' => 'linux',
                'description' => 'Instal editor/IDE, Git, dan runtime dasar (misalnya Python, PHP dan MySQL, atau Node.js) sesuai kebutuhan.',
                'duration' => '1,5–2 jam',
                'price' => 75000,
                'price_note' => null,
                'notes' => 'Layanan tambahan. Untuk pemula. Tidak termasuk konfigurasi server produksi.',
                'is_utama' => false,
                'sort_order' => 20,
            ],
            [
                'code' => 'C5',
                'name' => 'Konfigurasi software sesuai kebutuhan',
                'category' => 'linux',
                'description' => 'Instal dan atur 3–5 software legal/freeware yang diminta pelanggan.',
                'duration' => '1 jam',
                'price' => 40000,
                'price_note' => null,
                'notes' => 'Layanan tambahan.',
                'is_utama' => false,
                'sort_order' => 21,
            ],

            // ==========================================
            // 4.4 Keamanan Dasar (D1 - D3)
            // ==========================================
            [
                'code' => 'D1',
                'name' => 'Paket keamanan dasar',
                'category' => 'keamanan',
                'description' => 'Update sistem, mengaktifkan dan memeriksa Windows Security atau antivirus legal/gratis, pengaturan firewall dasar, dan memeriksa program mencurigakan.',
                'duration' => '1–1,5 jam',
                'price' => 65000,
                'price_note' => null,
                'notes' => 'Layanan utama. Tidak menjamin bebas dari serangan, tetapi membantu menurunkan risiko. Lisensi antivirus berbayar milik pelanggan.',
                'is_utama' => true,
                'sort_order' => 22,
            ],
            [
                'code' => 'D2',
                'name' => 'Edukasi keamanan password dan data pribadi',
                'category' => 'keamanan',
                'description' => 'Pengenalan password yang kuat, password manager, verifikasi dua langkah, tanda penipuan dan phishing, serta pengelolaan data pribadi.',
                'duration' => '30–45 menit',
                'price' => 30000,
                'price_note' => '/ sesi individu',
                'notes' => 'Layanan tambahan. Rp30.000 per sesi individu, Rp75.000 per sesi kelompok (maks. 5 orang). Cocok untuk kelas, komunitas, dan UMKM.',
                'is_utama' => false,
                'sort_order' => 23,
            ],
            [
                'code' => 'D3',
                'name' => 'Pengaturan backup rutin',
                'category' => 'keamanan',
                'description' => 'Mengatur backup otomatis atau manual ke media atau cloud milik pelanggan.',
                'duration' => '1 jam',
                'price' => 40000,
                'price_note' => null,
                'notes' => 'Layanan tambahan. Akun dan cloud milik pelanggan. TechCare tidak menyimpan password pelanggan.',
                'is_utama' => false,
                'sort_order' => 24,
            ],
        ];

        // Wipe old services to ensure clean 24 items with exact codes
        Service::query()->delete();

        foreach ($services as $srv) {
            Service::create($srv);
        }
    }
}
