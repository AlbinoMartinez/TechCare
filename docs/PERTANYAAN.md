# DAFTAR PERTANYAAN & KLARIFIKASI DATA TECHCARE
Dokumen ini mencatat data yang ambigu, kontradiktif, atau berupa placeholder di dalam proposal (`docs/proposal.pdf`).
Sesuai instruksi dan prinsip integritas data: field kosong/placeholder **tidak ditampilkan** pada website publik sampai pemilik usaha mengisinya melalui Panel Admin atau konfigurasi.

---

### 1. Rekening Bank & E-Wallet / QRIS
- **Temuan di Proposal:** Bab VI Bagian 6.4 (halaman 23): *"Pembayaran dapat dilakukan secara tunai, transfer bank ke [NOMOR REKENING], atau e-wallet/QRIS ke [AKUN E-WALLET]."* 
- **Status di Sistem:** Placeholder `[NOMOR REKENING]` dan `[AKUN E-WALLET]` **tidak diisi sembarangan**.
- **Perlakuan di Website:** Informasi rekening dan e-wallet disembunyikan secara otomatis di website publik selama nilai setting masih kosong.
- **Pertanyaan untuk Pemilik:** 
  1. Bank apa yang digunakan, nomor rekening, dan nama pemilik rekening? Nur Muhibbin
  2. Apakah menggunakan QRIS statis atau e-wallet tertentu (GoPay/Dana/OVO/ShopeePay)? gunakan gopay dana shopeepay/qris

---

### 2. Nomor WhatsApp Operasional
- **Temuan di Proposal:**
  - Bab II Bagian 2.3 (halaman 8) & Lampiran 1 (halaman 42): tercantum WhatsApp `085641487430`.
  - Bab V Bagian 5.3 & 5.5 (halaman 19, 20): tertulis placeholder `[NOMOR WHATSAPP]`.
- **Status di Sistem:** Menggunakan nomor `085641487430` (format internasional `6285641487430`) yang tercantum di Profil Usaha Bab II sebagai data awal default di database setting.
- **Pertanyaan untuk Pemilik:** Apakah nomor `085641487430` ini sudah aktif sebagai WhatsApp Business resmi, atau akan diganti dengan nomor lain? masih no pribadi namun itu nanti bisa untuk saya membalas pesan untuk client(baru demo)

---

### 3. Alamat Titik Temu / Drop-Off Perangkat
- **Temuan di Proposal:**
  - Bab II Bagian 2.3: *"Minggir, Sleman, Yogyakarta"*.
  - Bab V Bagian 5.3: *"Pelanggan juga dapat membawa perangkat ke [ALAMAT] dengan janji terlebih dahulu"*.
- **Status di Sistem:** Website publik hanya menampilkan teks area umum: **"Minggir, Sleman, Yogyakarta"** (tanpa alamat jalan/nomor rumah detail) untuk menjaga privasi tempat tinggal pemilik, dengan keterangan bahwa drop-off perangkat harus membuat janji terlebih dahulu via WhatsApp.
- **Pertanyaan untuk Pemilik:** Apakah titik drop-off akan diarahkan langsung via share-location WhatsApp setelah konsultasi disetujui? iya soalnya saya bisa dateng ke rumah client kalo ga client yang datang. https://maps.app.goo.gl/bLgzixN3HGV4mmVz9

---

### 4. Tautan Media Sosial (Instagram & TikTok)
- **Temuan di Proposal:** Bab II Bagian 2.3 mencatat Instagram: `TechCare` dan TikTok: `TechCaree`.
- **Status di Sistem:** Disediakan kolom pengaturan di admin settings. Jika belum ada tautan URL aktif yang valid, tombol/link sosial media dinonaktifkan atau disembunyikan di antarmuka publik agar tidak mengarah ke link mati.
- **Pertanyaan untuk Pemilik:** Apa URL lengkap profil Instagram dan TikTok yang sudah siap diakses publik? https://www.tiktok.com/@albinmnn_?_r=1&_t=ZS-9AYKxnaagVh  https://instagram.com/mohiebenn?exln=MWI5cHNuMWZienI4Zw%3D%3D

---

### 5. Email Publik Usaha
- **Temuan di Proposal:** Bab II Bagian 2.3 mencatat email `Ibinyo19@gmail.com`.
- **Status di Sistem:** Tersimpan di settings. Sesuai instruksi, email publik bersifat opsional (boleh dikosongkan/disembunyikan dari footer jika komunikasi hanya fokus melalui WhatsApp).
- **Pertanyaan untuk Pemilik:** Apakah email `Ibinyo19@gmail.com` ingin ditampilkan di footer/kontak publik, atau kontak pelanggan difokuskan 100% ke WhatsApp? public aja juga gapapa

---

### 6. Sumber Modal & Sitasi Proposal (Dokumen Akademik)
- **Temuan di Proposal:** 
  - Bab VIII Bagian 8.1: *"Sumber modal: [SUMBER MODAL, misalnya tabungan pribadi]"*
  - Daftar Sumber nomor 3: *"[LENGKAPI JUDUL DAN NAMA PENULIS]"*
- **Status di Sistem:** Merupakan bagian dari proposal/laporan akademik dan tidak relevan untuk website publik konsumen, sehingga tidak ditampilkan di website publik.
