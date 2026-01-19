# CV Dinamika Inti - Company Profile & Portfolio System

Aplikasi web Profil Perusahaan dan Manajemen Portofolio yang dibangun menggunakan **CodeIgniter 4**. Sistem ini dirancang untuk kecepatan, keamanan, dan kemudahan pengelolaan konten (CMS) bagi perusahaan kontraktor, interior, atau penyedia jasa.

## 🚀 Fitur Unggulan

### 🌟 Sisi Publik (Frontend)
- **Desain Modern & Responsif:** Tampilan profesional yang menyesuaikan layar HP, Tablet, dan Desktop.
- **Portofolio Interaktif:** Galeri proyek dengan filter kategori (Masonry/Isotope).
- **Pencarian Global:** Mencari Produk, Proyek, dan Artikel Blog dalam satu kolom pencarian.
- **SEO Optimized:** Mendukung *Schema.org (JSON-LD)*, *Open Graph* (Preview WA/FB), Sitemap XML otomatis, dan URL ramah SEO.
- **Interaksi Pengunjung:**
  - Tombol WhatsApp Melayang (Floating Widget).
  - Formulir Kontak & Testimoni Pelanggan.
  - Halaman FAQ (Tanya Jawab) Accordion.
- **Performa Tinggi:** Kompresi gambar otomatis dan caching halaman.

### 🛡️ Panel Admin (Backend)
- **Dashboard Statistik:** Grafik pengunjung harian (7 hari terakhir), statistik produk, dan pesan masuk.
- **Manajemen Konten (CRUD):**
  - **Banner/Slider:** Ubah gambar utama halaman depan tanpa coding.
  - **Produk:** Kelola katalog dengan harga, kategori, dan editor teks (WYSIWYG).
  - **Proyek:** Upload portofolio dengan detail produk yang digunakan.
  - **Blog:** Tulis artikel untuk SEO.
  - **FAQ:** Tambah/Edit pertanyaan umum.
- **Moderasi Testimoni:** Setujui atau tolak ulasan pelanggan sebelum tampil di web.
- **Pengaturan Situs:** Ganti Judul, No HP, Email, dan Alamat kantor langsung dari admin.
- **Keamanan & Utilitas:**
  - Backup Database (Download SQL).
  - Manajemen Akun Admin (Ganti Password).
  - Visitor Counter (Pelacak Pengunjung).

## 🛠️ Teknologi yang Digunakan
- **Framework:** CodeIgniter 4.x (PHP 8.1+)
- **Database:** MySQL
- **Frontend:** Bootstrap 5, jQuery, Owl Carousel, Isotope.js
- **Editor:** Summernote WYSIWYG
- **Charts:** Chart.js

## ⚙️ Persyaratan Server
- PHP versi 8.1 atau lebih baru.
- Ekstensi PHP: `intl`, `mbstring`, `json`, `mysql`, `gd`.
- Web Server (Apache/Nginx).

## 📦 Cara Instalasi

1.  **Clone Repository**
    ```bash
    git clone https://github.com/username-anda/cv-dinamika.git
    cd cv-dinamika
    ```

2.  **Install Dependencies**
    Pastikan Anda memiliki Composer terinstall.
    ```bash
    composer install
    ```

3.  **Konfigurasi Environment**
    Salin file `env` menjadi `.env` dan sesuaikan konfigurasi database.
    ```bash
    cp env .env
    ```
    Buka file `.env` dan edit bagian ini:
    ```ini
    CI_ENVIRONMENT = development
    app.baseURL = 'http://localhost:8080'

    database.default.hostname = localhost
    database.default.database = nama_database_anda
    database.default.username = root
    database.default.password = 
    database.default.DBDriver = MySQLi
    ```

4.  **Migrasi Database**
    Jalankan perintah ini untuk membuat semua tabel yang diperlukan:
    ```bash
    php spark migrate
    ```

5.  **Buat Akun Admin Pertama**
    Anda perlu memasukkan user admin secara manual ke database untuk login pertama kali (karena belum ada seeder). Jalankan SQL berikut di phpMyAdmin atau terminal MySQL:
    ```sql
    INSERT INTO users (username, password, name) VALUES 
    ('admin', '$2y$10$u/7.1X.1X.1X.1X.1X.1X.1X.1X.1X.1X', 'Administrator');
    -- Password default: admin123 (Hash ini hanya contoh, sebaiknya generate sendiri via: php spark hash:password admin123)
    ```

6.  **Jalankan Server**
    ```bash
    php spark serve
    ```
    Buka browser di `http://localhost:8080`.

## 📂 Struktur Folder Penting
- `app/Controllers/Admin` - Logika Backend.
- `app/Views/landing-page` - Tampilan Frontend.
- `app/Views/admin` - Tampilan Backend.
- `public/uploads` - Tempat penyimpanan gambar (Banner, Produk, dll).
- `public/css` & `public/js` - Aset statis.

## 🔒 Keamanan
Aplikasi ini dilengkapi dengan:
- **CSRF Protection:** Melindungi semua formulir dari serangan lintas situs.
- **Password Hashing:** Menggunakan Bcrypt untuk password admin.
- **Filter Routes:** Proteksi halaman admin dari akses tanpa login.
- **XSS Cleaning:** Sanitasi output data.

## 📄 Lisensi
Hak Cipta © 2026 CV Dinamika Inti.
Dibuat dengan ❤️ menggunakan CodeIgniter 4.