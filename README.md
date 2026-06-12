# Metodologi Penelitian – Sistem Persewaan

PS Rental Management System
# Deskripsi
PS Rental Management System adalah aplikasi berbasis web yang digunakan untuk mengelola proses penyewaan PlayStation. Sistem ini memungkinkan pengguna melakukan penyewaan PlayStation, sementara administrator dapat mengelola data PlayStation, transaksi penyewaan, pengembalian, dan riwayat transaksi.

Repository ini dikembangkan sebagai bagian dari pembelajaran Analisis dan Pengembangan Sistem Informasi pada mata kuliah Metodologi Penelitian.

# Fitur Utama
User
- Melihat daftar PlayStation yang tersedia
- Melakukan penyewaan PlayStation
- Melihat status penyewaan
Administrator
- Login Admin
- Mengelola data PlayStation
- Mengelola data penyewaan
- Mengelola pengembalian PlayStation
- Melihat riwayat transaksi
- Menyelesaikan transaksi penyewaan

# Teknologi yang Digunakan
- PHP Native
- MySQL
- CSS3
- Apache
- XAMPP

# Struktur Project
## Struktur Project

```text
Project_MP/
│
├── admin/
│   ├── login.php
│   ├── logout.php
│   ├── playstations.php
│   ├── rentals.php
│   ├── return.php
│   ├── finish_rent.php
│   └── history.php
│
├── includes/
│   ├── db.php
│   ├── auth.php
│   └── helpers.php
│
├── public/
│   ├── index.php
│   ├── rent.php
│   ├── rent_list.php
│   ├── sewa.php
│   ├── form_sewa.php
│   ├── proses_sewa.php
│   ├── check.php
│   └── style.css
│
├── sql/
│   └── ps_rental.sql
│
├── user/
│   └── index.php
│
└── README.md
```

# Cara Instalasi
1. Clone Repository
git clone https://github.com/renaldican04/Project_MP.git
2. Simpan Project ke Folder htdocs
C:\xampp\htdocs\ps-rental
3. Jalankan XAMPP
Aktifkan:
- Apache
- MySQL
4. Import Database
Buka phpMyAdmin
Buat database baru dengan nama:
ps_rental
Import file:
sql/ps_rental.sql
5. Konfigurasi Database
Periksa file:
includes/db.php
Pastikan konfigurasi database sesuai:
$host = "localhost";
$username = "root";
$password = "";
$database = "ps_rental";
6. Jalankan Aplikasi
Buka browser:
http://localhost/ps-rental/public/

# Tujuan Project
Memenuhi tugas akademik
Mempelajari implementasi PHP dan MySQL
Memahami proses bisnis sistem persewaan
Mengembangkan kemampuan analisis dan pengembangan sistem informasi

# Ruang Lingkup
Analisis proses bisnis sistem persewaan
Identifikasi kebutuhan fungsional dan non-fungsional
Implementasi sistem persewaan berbasis web

# Output
Dokumentasi proses bisnis
Dokumen kebutuhan sistem
Prototype aplikasi sistem persewaan

# Peran
System Analyst

# Catatan
Project ini dibuat untuk keperluan pembelajaran, dokumentasi analisis sistem informasi, serta implementasi sistem persewaan berbasis web menggunakan PHP dan MySQL.
