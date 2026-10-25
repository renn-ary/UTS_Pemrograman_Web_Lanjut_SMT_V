# Inventaris Neo

Aplikasi manajemen inventaris toko komputer berbasis Laravel dan MySQL
dengan antarmuka Neobrutalism.

## Fitur

- Autentikasi login dan logout
- Dashboard ringkasan inventaris
- CRUD kategori
- CRUD barang
- Relasi Category hasMany Item
- Validasi dan foreign key
- Seeder data awal

## Persyaratan

- PHP sesuai versi Laravel proyek
- Composer
- MySQL atau MariaDB
- Ekstensi PHP yang dibutuhkan Laravel

## Instalasi

1. Clone repository.
2. Jalankan `composer install`.
3. Salin `.env.example` menjadi `.env`.
4. Buat database `inventaris_db`.
5. Sesuaikan konfigurasi database pada `.env`.
6. Jalankan `php artisan key:generate`.
7. Jalankan `php artisan migrate --seed`.
8. Jalankan `php artisan serve`.
9. Buka `http://127.0.0.1:8000/login`.

## Relasi Database

- Category memiliki banyak Item.
- Item dimiliki satu Category.

## Catatan

Jangan mengunggah file `.env`, kredensial asli,
atau informasi rahasia ke repository.