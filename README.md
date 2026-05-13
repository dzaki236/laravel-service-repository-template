# Laravel Repository Service Pattern

Dokumentasi ini menjelaskan cara clone project, install package, setup database, menjalankan aplikasi, dan beberapa hal penting yang perlu diperhatikan saat pengembangan.

## Ringkasan Project

Project ini menggunakan Laravel 9 dengan pendekatan Repository Service Pattern untuk memisahkan logika akses data dan logika bisnis. Contoh fitur utama yang tersedia adalah CRUD `Bahan Baku`.

Struktur penting:

- `app/Models/BahanBaku.php`: model untuk tabel `bahan_baku`.
- `app/Repositories/`: layer akses data.
- `app/Services/`: layer logika bisnis.
- `app/Http/Controllers/BahanBakuController.php`: controller CRUD bahan baku.
- `resources/views/bahan-baku/`: halaman Blade untuk CRUD bahan baku.
- `routes/web.php`: route web aplikasi.

## Prasyarat

Pastikan perangkat sudah memiliki:

- PHP `8.0.2` atau lebih baru.
- Composer.
- Node.js dan npm.
- MySQL atau MariaDB.
- Git.

Cek versi dengan perintah:

```bash
php -v
composer -V
node -v
npm -v
git --version
```

## Clone Project

Clone repository dari remote project:

```bash
git clone https://github.com/dzaki236/laravel-service-repository-template.git
cd laravel-repository-service-pattern
```

Ganti `https://github.com/dzaki236/laravel-service-repository-template.git` dengan URL repository Git yang sebenarnya.

## Install Package Backend

Install dependency Laravel menggunakan Composer:

```bash
composer install
```

Jika ingin memperbarui dependency sesuai constraint di `composer.json`, gunakan:

```bash
composer update
```

Gunakan `composer install` untuk setup normal dari repository karena perintah ini mengikuti `composer.lock` bila tersedia.

## Install Package Frontend

Install dependency frontend untuk Vite:

```bash
npm install
```

Dependency frontend utama berada di `package.json`, termasuk `vite`, `laravel-vite-plugin`, dan `axios`.

## Setup Environment

Salin file environment:

```bash
cp .env.example .env
```

Jika menggunakan PowerShell di Windows:

```powershell
Copy-Item .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Pastikan nilai `APP_KEY` sudah terisi di file `.env`.

## Setup Database

Buat database baru di MySQL atau MariaDB, misalnya:

```sql
CREATE DATABASE laravel_repository_service_pattern;
```

Sesuaikan konfigurasi database di file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_repository_service_pattern
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan konfigurasi database lokal Anda.

Setelah konfigurasi database benar, jalankan migrasi:

```bash
php artisan migrate
```

Migrasi akan membuat tabel bawaan Laravel serta tabel `bahan_baku` dengan kolom:

- `id`
- `nama`
- `kode`
- `stok`
- `satuan`
- `harga`
- `created_at`
- `updated_at`

## Menjalankan Aplikasi

Jalankan server Laravel:

```bash
php artisan serve
```

Secara default aplikasi berjalan di:

```text
http://127.0.0.1:8000
```

## Route Utama

Project mendaftarkan resource route berikut:

```php
Route::resource('bahan-baku', BahanBakuController::class);
```

Route ini menghasilkan endpoint web untuk:

- Melihat daftar bahan baku.
- Membuka form tambah bahan baku.
- Menyimpan bahan baku baru.
- Membuka form edit bahan baku.
- Mengupdate bahan baku.
- Menghapus bahan baku.

## Perintah Artisan yang Sering Dipakai

Bersihkan cache konfigurasi dan aplikasi:

```bash
php artisan optimize:clear
```

Jalankan migrasi ulang dari awal untuk database:

```bash
php artisan migrate:fresh --seed
```

Jalankan Tinker:

```bash
php artisan tinker
```

## Hal Penting yang Perlu Diperhatikan

- Jangan commit file `.env` karena berisi konfigurasi lokal dan dapat berisi data sensitif.
- Pastikan database sudah dibuat sebelum menjalankan `php artisan migrate`.
- Jalankan `php artisan key:generate` setelah membuat file `.env`.
- Jalankan `npm run dev` saat pengembangan agar asset Vite tersedia.
- Field `kode` pada tabel `bahan_baku` bersifat unik, sehingga tidak boleh ada dua bahan baku dengan kode yang sama.
- Project ini menggunakan Repository Service Pattern, jadi perubahan akses data sebaiknya diletakkan di repository, sedangkan logika bisnis diletakkan di service.
- Sebelum deploy production, ubah `APP_ENV=production`, `APP_DEBUG=false`, dan pastikan konfigurasi database serta cache sudah sesuai environment server.

## Troubleshooting

Jika muncul error `No application encryption key has been specified`, jalankan:

```bash
php artisan key:generate
```

Jika perubahan `.env` belum terbaca, jalankan:

```bash
php artisan optimize:clear
```

Jika tabel belum ditemukan, pastikan database benar dan jalankan:

```bash
php artisan migrate
```