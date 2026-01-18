# Panduan Mengelola Hasil Instalasi/Portofolio

## ✅ Sistem Sudah Tersinkronisasi!

Halaman **Hasil Instalasi** (Portofolio) sekarang sudah tersinkronisasi dengan sistem Admin. Semua data diambil dari database dan dapat dikelola melalui Admin Panel.

---

## 📍 Cara Mengakses Admin

1. Buka browser dan akses: `http://localhost:8080/login`
2. Login dengan akun admin
3. Pilih menu **Proyek/Portofolio**

---

## ➕ Cara Menambah Proyek Baru

1. Di halaman Admin > Proyek, klik tombol **"Tambah Proyek Baru"**
2. Isi form dengan data berikut:

### Field yang Harus Diisi:

#### **Judul Proyek** (Required)

- Contoh: `RS Orthopedi Siaga Raya`
- Nama proyek/lokasi yang akan ditampilkan

#### **Kategori** (Required)

- Pilih salah satu:
  - Klinik
  - Rumah Sakit
  - Institut Pendidikan
  - Area Olahraga
  - Commercial
  - Healthy Care

#### **Teks Badge**

- Contoh: `Rumah Sakit Mata`, `RSUD`, `Universitas`, `PMI`
- Text yang ditampilkan di pojok kanan atas gambar
- Jika dikosongkan, akan menggunakan nama kategori

#### **Nama Klien/Lokasi**

- Nama klien atau lokasi proyek (opsional)

#### **Deskripsi**

- Deskripsi singkat proyek (opsional)

#### **Detail Produk yang Digunakan**

- Masukkan detail produk, **SATU PRODUK PER BARIS**
- Contoh:
  ```
  Gerflor Mipolam Ambiance Ultra - 0043
  LG Hausys Origin - 1203
  Omega - LG2001
  ```

#### **Gambar Proyek** (Required)

- Upload foto hasil instalasi
- Format: JPG, JPEG, atau PNG
- Maksimal 2MB
- **Gambar akan otomatis disimpan di folder `uploads/projects/`**

3. Klik **"Simpan Proyek"**

---

## ✏️ Cara Mengedit Proyek

1. Di halaman Admin > Proyek, klik tombol **"Edit"** pada proyek yang ingin diubah
2. Ubah data sesuai kebutuhan
3. Jika ingin mengganti gambar, upload gambar baru (atau biarkan kosong jika tidak ingin mengubah gambar)
4. Klik **"Update Proyek"**

---

## 🗑️ Cara Menghapus Proyek

1. Di halaman Admin > Proyek, klik tombol **"Hapus"** pada proyek yang ingin dihapus
2. Konfirmasi penghapusan
3. Proyek dan gambarnya akan terhapus dari database dan folder

---

## 📂 Struktur File

### File Penting:

- **Controller**: `app/Controllers/Admin/Projects.php` (mengelola CRUD)
- **Model**: `app/Models/ProjectModel.php` (akses database)
- **View Admin**:
  - `app/Views/admin/projects/index.php` (daftar proyek)
  - `app/Views/admin/projects/create.php` (form tambah)
  - `app/Views/admin/projects/edit.php` (form edit)
- **View Landing Page**: `app/Views/landing-page/portofolio/index.php` (halaman publik)
- **Upload Folder**: `public/uploads/projects/` (tempat gambar disimpan)
- **Backup Static**: `app/Views/landing-page/portofolio/index-static-backup.php` (backup data lama)

---

## 🎨 Cara Menampilkan di Website

Data akan **OTOMATIS** tampil di halaman Hasil Instalasi (`http://localhost:8080/portofolio`) berdasarkan kategori:

1. **Klinik** - Ikon: 🏥 (clinic-medical)
2. **Rumah Sakit** - Ikon: 🏥 (hospital)
3. **Institut Pendidikan** - Ikon: 🎓 (graduation-cap)
4. **Area Olahraga** - Ikon: 🏃 (running)
5. **Commercial** - Ikon: 🏢 (building)
6. **Healthy Care** - Ikon: 🩺 (hand-holding-medical)

Proyek akan dikelompokkan dan ditampilkan sesuai kategorinya secara otomatis.

---

## 💡 Tips

1. **Gunakan Nama yang Jelas**: Berikan nama proyek yang deskriptif
2. **Upload Gambar Berkualitas**: Gambar akan di-resize menjadi 600x400px
3. **Detail Produk**: Tulis satu produk per baris untuk tampilan yang rapi
4. **Kategori Konsisten**: Pilih kategori yang tepat agar proyek terorganisir
5. **Badge Text**: Buat teks badge singkat dan jelas (max 2-3 kata)

---

## 🔄 Backup Data Static Lama

Data static yang sebelumnya ada di halaman portofolio sudah dibackup di:
`app/Views/landing-page/portofolio/index-static-backup.php`

Anda bisa mengimpor data tersebut ke database jika diperlukan.

---

## 📊 Database

**Tabel**: `projects`

**Kolom**:

- `id` - ID unik
- `title` - Judul proyek
- `description` - Deskripsi
- `category` - Kategori proyek
- `client_name` - Nama klien
- `image` - Nama file gambar
- `product_details` - Detail produk (multi-line text)
- `badge_text` - Teks untuk badge
- `completed_date` - Tanggal selesai
- `created_at` - Tanggal dibuat
- `updated_at` - Tanggal diupdate

---

## 🚀 Selamat Menggunakan!

Sekarang Anda bisa mengelola semua proyek hasil instalasi langsung dari Admin Panel tanpa perlu edit code lagi! 🎉
