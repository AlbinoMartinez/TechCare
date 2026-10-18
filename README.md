# TECHCARE – Jasa IT Support, Maintenance Komputer, dan Jaringan

Website Bisnis Resmi Multi-Page & Portal Manajemen Operasional IT oleh **Nur Muhibbin** (Teknik Komputer dan Jaringan — SMKN 3 Yogyakarta), berlokasi di Minggir, Sleman, D.I. Yogyakarta.

Sumber kebenaran seluruh data, harga, alur kerja, etika privasi, dan analisis keuangan 100% mengacu pada **Proposal Usaha Jasa Mandiri TechCare (September 2026)** serta klarifikasi di `docs/PERTANYAAN.md`.

---

## 🌟 Arsitektur & Fitur Utama

Website dibangun menggunakan **Laravel 12**, **Tailwind CSS v4**, **Alpine.js**, dan **SQLite** (siap migrasi ke MySQL):

### 1. Sistem Desain Anti-AI Slop
- **Palet Warna Sampling Logo Resmi (`public/images/techcare-logo.png`):**
  - Navy Utama: `#063970`
  - Biru Langit: `#0D9BE4`
  - Background: `#FAF9F6` (publik) dan `#0B132B` (admin panel modern dark tech)
  - Aksen Aksi: Hijau WhatsApp & Amber status
- **Konsep Tampilan:** Lembar Spesifikasi Teknis + Nota Servis (sesuai Lampiran 1 proposal). Monospace tabular untuk kode (`A1`–`D3`) dan nominal rupiah.
- **Bebas AI Slop:** Tanpa gradien ungu-pink generik, tanpa blob/orb dekoratif, tanpa testimoni palsu/dummy, dan tanpa klaim kosong.

### 2. Halaman Publik Multi-Page
1. **Beranda (`/`)**: Value proposition jelas, 3 jaminan kerja (persetujuan di awal, backup data, software legal), katalog layanan utama mulai dari, alur kerja, dan area layanan Minggir, Sleman.
2. **Layanan & Harga (`/layanan`)**: Daftar 24 layanan lengkap (A1–D3) dengan filter kategori, estimasi waktu, tarif, catatan teknis, tabel ongkos kunjungan (3 tier), dan daftar transparan **Layanan yang Tidak Diterima (Bab 4.6)**.
3. **Kalkulator Estimasi (`/kalkulator`)**: Interaktif dengan Alpine.js untuk estimasi biaya multi-layanan + jarak home service, nota estimasi otomatis, dan tombol **"Kirim ke WhatsApp"**.
4. **Alur Layanan (`/alur-layanan`)**: 10 tahap pengerjaan operasional dari Bab 6.1 proposal dengan prinsip teguh *"Tanpa persetujuan estimasi, tidak ada tindakan fisik"*.
5. **Kebijakan & Garansi (`/kebijakan`)**: Garansi jasa 7 hari kalender, hal yang tidak dicakup, dan komitmen perlindungan privasi data pelanggan (Bab X).
6. **FAQ & Kontak (`/kontak`)**: Tanya jawab resmi, jam operasional, link Google Maps, link medsos (Instagram & TikTok), serta form booking online.
7. **Sitemap XML (`/sitemap.xml`)**: Index SEO otomatis seluruh halaman publik.

### 3. Dashboard Admin Modern Dark Tech (`/admin`)
Terinspirasi dari tema dashboard profesional modern (gelap, kontras tajam, informatif):
- **Overview Dashboard:**
  - 4 KPI cards: Omset servis selesai, pengunjung unik (7 & 30 hari), total booking per status, total klik WA & rasio konversi.
  - **Goal & BEP Progress Meter:** Visual circular progress menuju titik impas operasional (2 transaksi/bulan) dan target pendapatan pemilik (9 transaksi/bulan).
  - **Recent Activity Feed:** Riwayat audit log perubahan data.
  - **Tabel Antrean Pesanan:** Kode order unik, perangkat, keluhan, status badge, dan tombol aksi langsung **"Balas via WhatsApp"**.
- **Katalog 24 Layanan (`/admin/services`):** Edit tarif harga, durasi, status utama, dan status aktif. Setiap perubahan harga otomatis dicatat ke log audit.
- **Ongkos Kunjungan (`/admin/visit-fees`):** Kelola 3 tier jarak radius home service proposal Bab IV 4.5.
- **Testimoni Nyata (`/admin/testimonials`):** Manajemen ulasan asli pelanggan dengan validasi izin tampil (`consent_to_publish`) dan status terbit. Section testimoni otomatis disembunyikan jika belum ada yang terbit.
- **Log Aktivitas & Audit Trail (`/admin/activity-logs`):** Mencatat siapa mengubah apa, kapan, serta nilai sebelum dan sesudah perubahan.
- **Monitoring Trafik First-Party (`/admin/monitoring`):** Analisis pengunjung tanpa Google Analytics. Bebas cookie pihak ketiga, tidak pernah menyimpan IP mentah (menggunakan hashed rolling salt harian), mengabaikan bot/crawler otomatis.
- **Data Keuangan Internal (`/admin/keuangan`):** Rincian modal awal Rp1.000.000, biaya tetap Rp127.000/bln, biaya variabel Rp7.000/order, dan proyeksi 3 skenario 6 bulan dari Bab VIII.
- **Pengaturan Usaha (`/admin/settings`):** Konfigurasi WhatsApp, email, jam operasional, alamat publik, Google Maps, link TikTok/Instagram, serta rekening bank & e-wallet/QRIS.

---

## 🔑 Kredensial & Pembuatan Admin Aman

### 1. Akun Default Seeder
- **URL Login:** `http://127.0.0.1:8000/admin/login`
- **Email:** `admin@techcare.id`
- **Password:** `techcare123`

### 2. Pembuatan Akun Admin Baru (Interactive CLI)
Untuk membuat atau mengganti akun admin dengan password aman secara interaktif:
```powershell
php artisan techcare:create-admin
```
Command ini akan meminta Nama, Email, dan Password (dengan validasi minimal 8 karakter dan konfirmasi).

---

## 🚀 Panduan Setup Lokal

```powershell
# 1. Install dependensi Composer & NPM
composer install
npm.cmd install

# 2. Setup environment & database SQLite
copy .env.example .env
php artisan key:generate
php artisan migrate --seed

# 3. Build aset frontend (Tailwind CSS v4 & Alpine)
npm.cmd run build

# 4. Jalankan local development server
php artisan serve
```

Akses website publik: `http://127.0.0.1:8000`  
Akses panel admin: `http://127.0.0.1:8000/admin`

---

## 🧪 Menjalankan Test Suite (Pest / PHPUnit)

Semua fungsionalitas kritis diuji secara otomatis (30 tests, 168 assertions):
```powershell
php artisan test
```

Cakupan pengujian meliputi:
- Idempotensi seeder (bisa dijalankan berulang tanpa duplikasi)
- Penyimpanan booking & pembuatan link redirect WhatsApp
- Proteksi spam bot (honeypot field)
- Kalkulator estimasi biaya sesuai data database
- Monitoring privasi: mengabaikan bot, tidak menyimpan IP mentah, hashing harian
- Audit log aktivitas saat admin mengubah harga layanan
- Halaman publik langsung mencerminkan perubahan harga admin
- Filter testimoni: testimoni draft/unpublished tidak tampil di publik

---

## 🌐 Panduan Deploy ke Hosting PHP / cPanel

1. **Persyaratan Server:** PHP 8.2 atau 8.3+, ekstensi `pdo_sqlite` (atau `pdo_mysql`), `mbstring`, `fileinfo`, `openssl`.
2. **Upload Berkas:**
   - Unggah seluruh folder proyek ke server hosting (misalnya di luar `public_html`, contoh: `/home/username/techcare`).
   - Arahkan Document Root domain atau subdomain ke folder `/home/username/techcare/public`.
3. **Konfigurasi `.env` di Server:**
   - Set `APP_ENV=production` dan `APP_DEBUG=false`.
   - Set `APP_URL=https://domainanda.com`.
   - Jika menggunakan MySQL di cPanel, sesuaikan `DB_CONNECTION=mysql`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.
4. **Optimasi Produksi:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
5. **Keamanan:** Pastikan file `.env` tidak dapat diakses langsung melalui browser (terlindungi oleh web server `.htaccess` bawaan Laravel).

---

## ☁️ Panduan Deploy ke Vercel & GitHub

Proyek ini telah dikonfigurasi penuh untuk deployment serverless di **Vercel** menggunakan runtime `vercel-php`:

### File Konfigurasi Vercel:
- `vercel.json`: Konfigurasi runtime PHP, penanganan file statis (`/build`, `/brand`, `/fonts`, `/images`), dan redirect direktori cache ke `/tmp`.
- `api/index.php`: Serverless front-controller yang otomatis membuat folder storage di `/tmp` dan menyalin template database `database/database.sqlite` ke `/tmp/database.sqlite` yang writable.
- `.vercelignore`: Memastikan ukuran bundle tetap ringkas tanpa dependensi lokal atau dev tools.

### Langkah Deploy ke Vercel via GitHub:
1. **Push ke GitHub:**
   ```bash
   git remote add origin https://github.com/<username>/<nama-repo>.git
   git branch -M main
   git push -u origin main
   ```
2. **Import di Dashboard Vercel:**
   - Buka [vercel.com/new](https://vercel.com/new) dan hubungkan akun GitHub Anda.
   - Pilih repository TechCare yang baru saja di-push.
   - **Framework Preset:** Pilih `Other`.
   - **Root Directory:** `./`
3. **Environment Variables di Vercel:**
   Pada bagian **Environment Variables**, tambahkan:
   - `APP_NAME` : `TechCare`
   - `APP_ENV` : `production`
   - `APP_KEY` : `base64:hWwUzPlEF/KFGQuFg0WQkPvnvkVLkqQv17r1rHRiKac=` (atau generate baru)
   - `APP_DEBUG` : `false`
   - `APP_URL` : `https://<nama-project>.vercel.app`
4. **Klik "Deploy":** Vercel akan memproses build dan website langsung aktif diakses secara global.

