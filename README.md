# TECHCARE – Jasa IT Support, Maintenance Komputer, dan Jaringan

Website Bisnis Resmi Multi-Page & Portal Manajemen Layanan IT oleh **Nur Muhibbin** (Jurusan Teknik Komputer dan Jaringan — SMKN 3 Yogyakarta), Minggir, Sleman, Yogyakarta.

Sumber kebenaran seluruh data, harga, alur, etika, dan analisis keuangan mengacu pada **Proposal Usaha Jasa Mandiri TechCare (September 2026)**.

---

## 🌟 Arsitektur & Fitur Utama

Website dibangun menggunakan **Laravel 12**, **Tailwind CSS v4**, **Alpine.js**, dan **SQLite** dengan prinsip desain **Anti AI Slop**:
- Palet warna resmi TechCare: Navy `#0B3A75`, Navy Gelap `#07254C`, Biru `#1E9BE8`, Aksen `#E35E14`, Latar Hangat `#FAF9F6`.
- Tipografi: Heading Manrope, body Inter, dan harga/angka monospace (IBM Plex Mono).
- Desain mobile-first, kontras WCAG AA, target sentuh minimal 44px, tanpa elemen klise (tanpa gradien ungu-pink, tanpa neon glow, tanpa blob, tanpa testimoni karangan).

### 1. Halaman Publik (Multi-Page)
1. **Beranda (`/`)**: Value proposition jelas, alur 3 langkah ringkas, katalog 9 layanan utama, ongkos kunjungan, dan profil teknisi.
2. **Layanan & Harga (`/layanan`)**: Tabel 24 layanan lengkap (A1–D3) dengan filter kategori, harga monospace, estimasi durasi, dan bagian jujur **Layanan yang Tidak Diterima (Bab 4.6)**.
3. **Kalkulator Estimasi (`/kalkulator`)**: Pemilihan multi-layanan interaktif dengan Alpine.js, opsi jarak kunjungan home service (Rp0, Rp10.000, Rp20.000, Rp35.000), total otomatis, dan tombol **"Kirim ke WhatsApp"** dengan ringkasan pesan terformat.
4. **Alur Layanan (`/alur-layanan`)**: Penjelasan 10 tahap pengerjaan dari Bab 6.1 proposal, menegaskan prinsip *Golden Rule*: **"Tanpa persetujuan estimasi biaya, tidak ada tindakan fisik pada perangkat"**.
5. **Data & Garansi (`/kebijakan`)**: Kebijakan privasi data (Bab 10.1), software legal anti-bajakan (Bab 10.2), garansi jasa 7 hari kalender (Bab 6.7), dan batasan pekerjaan.
6. **FAQ & Kontak (`/kontak`)**: 10 FAQ resmi proposal, info jam operasional, dan Formulir Pemesanan (dilengkapi honeypot anti-spam dan penyimpanan database sebelum redirect ke WhatsApp).
7. **Sitemap XML (`/sitemap.xml`)**: Index SEO seluruh URL publik.

### 2. Panel Admin Terproteksi (`/admin`)
- **Autentikasi Session**: Akses admin dilindungi login (`admin@techcare.id`).
- **Dashboard Overview**: Metrik pesanan masuk, counter status, dan shortcut kontak WhatsApp teknisi.
- **Manajemen Pesanan Masuk**: Filter status, update catatan teknisi, update estimasi biaya, dan tombol langsung respon WhatsApp.
- **Katalog Layanan (24 Jasa)**: Sesuaikan tarif harga, durasi pengerjaan, flag layanan utama, dan status aktif/nonaktif.
- **Data & Proyeksi Keuangan Internal (Bab VIII)**: Halaman khusus terproteksi di admin (`/admin/keuangan`) yang memuat data modal awal Rp1.000.000, biaya tetap Rp127.000/bulan, biaya variabel Rp7.000/transaksi, BEP 2 transaksi/bulan, dan proyeksi laba kumulatif 6 bulan untuk 3 skenario (Konservatif, Normal, Optimistis).
- **Pengaturan Bisnis**: Ubah nomor WhatsApp tujuan tanpa menyentuh kode, atur tarif home service, dan ganti password admin.

---

## 🔑 Kredensial Login Admin

| Parameter | Nilai Default |
| :--- | :--- |
| **URL Login** | `http://127.0.0.1:8000/admin/login` |
| **Email** | `admin@techcare.id` |
| **Password** | `techcare123` |

---

## 🚀 Menjalankan Website & Pengujian

### 1. Jalankan Local Server
```powershell
php artisan serve
```
Akses di browser: `http://127.0.0.1:8000`

### 2. Jalankan Test Suite (23 Tests, 100% Pass)
```powershell
php artisan test
```

### 3. Kompilasi Aset Frontend (Bila Mengubah Tampilan)
```powershell
npm.cmd run build
```
