# StokKita — Aplikasi Manajemen Inventaris Barang

Project Laravel untuk tugas Pertemuan 5: memindahkan konsep inventaris barang ke arsitektur Laravel.
Nama, desain, dan data contoh dibuat berbeda dari repository referensi teman.

## Fitur
- Dashboard ringkasan jumlah barang, kategori, dan stok menipis
- CRUD kategori
- CRUD barang
- Validasi form
- Pencarian dan filter kategori
- Pagination
- Seeder data contoh
- Blade layout responsif sederhana

## Persyaratan
- PHP 8.2+
- Composer
- MySQL/MariaDB (misalnya dari XAMPP)
- Ekstensi PHP yang dibutuhkan Laravel aktif

## Cara memasang
1. Pastikan Composer dan PHP sudah bisa dijalankan dari terminal.
2. Ekstrak folder project ini.
3. Buka terminal di folder `StokKita-Laravel`.
4. Jalankan:
   ```bash
   composer create-project laravel/laravel . 
   ```
   **Penting:** perintah di atas hanya dipakai jika folder ini masih kosong. Karena file aplikasi StokKita sudah tersedia, cara yang disarankan adalah membuat project Laravel baru dahulu:
   ```bash
   composer create-project laravel/laravel stok-kita
   ```
   Lalu salin/merge folder `app`, `database`, `resources`, dan `routes` dari paket ini ke folder `stok-kita`, timpa file dengan nama sama, dan lanjutkan langkah berikut.
5. Salin `.env.example` menjadi `.env` (di Windows bisa menggunakan File Explorer atau `copy .env.example .env`).
6. Buat database MySQL bernama `stok_kita`.
7. Atur bagian database di `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=stok_kita
   DB_USERNAME=root
   DB_PASSWORD=
   ```
8. Jalankan:
   ```bash
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
   ```
9. Buka `http://127.0.0.1:8000`.

## Screenshot untuk laporan
Ambil screenshot:
1. Halaman dashboard (`/`)
2. Daftar barang (`/barang`)
3. Form tambah barang (`/barang/create`)
4. Form edit barang (`/barang/{id}/edit`)
5. Daftar kategori (`/kategori`)
6. Terminal setelah `php artisan migrate --seed`
7. Daftar route dari `php artisan route:list`

## Penjelasan arsitektur MVC
- **Model** (`Barang`, `Kategori`): mengatur representasi data dan relasi database.
- **View** (`resources/views`): menampilkan dashboard, daftar, dan form melalui Blade.
- **Controller** (`DashboardController`, `BarangController`, `KategoriController`): menerima request, memvalidasi input, berinteraksi dengan model, lalu mengembalikan view atau redirect.
- **Migration**: mendefinisikan struktur tabel dengan kode yang dapat dilacak versinya.
- **Seeder**: mengisi kategori dan barang contoh agar aplikasi bisa langsung diuji.

## Alur contoh tambah barang
Pengguna membuka form `/barang/create` → mengisi form → form mengirim request POST → `BarangController@store` memvalidasi input → data disimpan melalui model Eloquent → pengguna diarahkan kembali ke `/barang` dengan pesan sukses → data tampil di daftar barang.

## Catatan
Paket ini berisi file aplikasi yang perlu digabungkan ke kerangka Laravel standar. Folder `vendor` dan file inti Laravel tidak disertakan karena dihasilkan oleh Composer.
