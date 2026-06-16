# 🎓 CRUD Laravel - Manajemen Data Mahasiswa

[![Laravel Version](https://img.shields.io/badge/Laravel-v10.x-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/PHP-v8.x-777BB4?style=flat-square&logo=php)](https://www.php.net)
[![Bootstrap Version](https://img.shields.io/badge/Bootstrap-v4.6-7952B3?style=flat-square&logo=bootstrap)](https://getbootstrap.com)

Aplikasi berbasis web untuk mengelola data mahasiswa secara dinamis. Proyek ini diintegrasikan dengan fitur **Blade Templating Engine** menggunakan template dashboard **SB Admin 2** untuk menghasilkan antarmuka pengguna yang bersih, responsif, dan terstruktur dengan baik.

---

## ✨ Fitur Utama

Aplikasi ini mencakup fungsi dasar administrasi data (CRUD) dengan struktur komponen modular:
* ➕ **Tambah Data Mahasiswa**: Formulir input data baru yang dilengkapi dengan dukungan unggah foto profil.
* 📋 **Tampil Data Mahasiswa**: Penyajian informasi mahasiswa dalam bentuk tabel Bootstrap Card yang rapi dan elegan.
* ✏️ **Edit Data Mahasiswa**: Pembaruan informasi mahasiswa secara langsung (termasuk opsi penggantian atau mempertahankan foto lama).
* 🗑️ **Hapus Data Mahasiswa**: Penghapusan rekaman data dari sistem dengan konfirmasi keamanan *pop-up*.

---

## 🛠️ Arsitektur & Teknologi

* **Framework**: Laravel
* **Bahasa Pemrograman**: PHP
* **Database**: MySQL
* **Antarmuka/UI**: Bootstrap & SB Admin 2 Template

---

## 🚀 Panduan Menjalankan Proyek

Ikuti langkah-langkah di bawah ini untuk memasang dan menjalankan aplikasi di lingkungan lokal Anda:

### 1. Persiapan Repositori
Kloning repositori ini ke komputer lokal Anda:
```bash
git clone <url-repository-anda>
cd crud_laravel
```

### 2. Instalasi Dependensi
Unduh semua paket dependensi PHP yang dibutuhkan melalui Composer:
```bash
composer install
```

### 3. Konfigurasi Lingkungan (.env)
Salin berkas konfigurasi bawaan dan buat berkas .env baru:
```bash
cp .env.example .env
```

Buka file `.env` yang baru dibuat menggunakan kode editor Anda, lalu sesuaikan bagian konfigurasi database Anda:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Inisialisasi Aplikasi
Generate kunci enkripsi aplikasi dan jalankan migrasi tabel database:
```bash
php artisan key:generate
php artisan migrate
```

### 5. Hubungkan Storage (Untuk Akses Foto)
Pastikan folder storage terhubung agar sistem dapat memuat unggahan foto mahasiswa dengan benar:
```bash
php artisan storage:link
```

### 6. Jalankan Server Lokal
Nyalakan server development Laravel:
```bash
php artisan serve
```

Buka peramban (browser) Anda dan akses alamat: `http://127.0.0.1:8000/student`

---

## 👨‍💻 Kontributor

**Nama**: Dwiki Nur Setiyanto

**NIM**: 4342511027