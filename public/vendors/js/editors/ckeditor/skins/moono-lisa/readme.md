# Sistem Pencatatan Keuangan Keluarga

Aplikasi web sederhana untuk mencatat dan mengelola arus keuangan keluarga — pemasukan, pengeluaran, dan saldo — dibangun menggunakan **Laravel**.

## Fitur

- **Dashboard ringkasan** — menampilkan total pemasukan, total pengeluaran, dan saldo berjalan dalam bentuk kartu statistik.
- **Manajemen transaksi (CRUD)** — tambah, edit, dan hapus data transaksi keuangan.
- **Kategori transaksi** — setiap transaksi diklasifikasikan sebagai *Pemasukan* atau *Pengeluaran*.
- **Filter transaksi** — filter berdasarkan jenis transaksi dan rentang tanggal.
- **Pagination** — daftar transaksi ditampilkan dengan pagination agar tetap ringan meski data bertambah banyak.
- **Autentikasi pengguna** — sistem login untuk mengamankan akses ke data keuangan.

## Teknologi yang Digunakan

| Komponen         | Teknologi                              |
|-------------------|------------------------------------------|
| Backend           | Laravel (PHP)                          |
| Database          | MySQL                                  |
| Frontend / UI Kit | Bootstrap (Chameleon Admin Template)   |
| Icon              | Feather Icons                          |
| Environment lokal | Laragon                                |

## Instalasi

### Prasyarat

Pastikan sudah terinstal:
- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Node.js & NPM (opsional, jika ada build asset frontend)

### Langkah-langkah

1. **Clone repository**
   ```bash
   git clone https://github.com/shffira/SistemPencatatanKeluarga.git
   cd SistemPencatatanKeluarga
   ```

2. **Install dependency PHP**
   ```bash
   composer install
   ```

3. **Salin file environment**
   ```bash
   cp .env.example .env
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Konfigurasi database**

   Buka file `.env` dan sesuaikan pengaturan database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sistempencatatankeluarga
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Jalankan migrasi & seeder**
   ```bash
   php artisan migrate --seed
   ```

7. **Buat symbolic link storage** (jika menggunakan upload file/gambar)
   ```bash
   php artisan storage:link
   ```

8. **Jalankan server lokal**
   ```bash
   php artisan serve
   ```

   Aplikasi dapat diakses melalui `http://127.0.0.1:8000`.

## Akun Default (Seeder)

| Email                 | Password    |
|------------------------|-------------|
| test@example.com      | *(sesuaikan dengan isi UserSeeder)* |

> Ganti kredensial default ini setelah instalasi untuk keamanan.

## Struktur Direktori Penting

```
app/
 └── Http/Controllers/
      └── TransaksiController.php   # Logic CRUD transaksi

database/
 ├── migrations/                    # Struktur tabel database
 └── seeders/                       # Data awal (user, dsb.)

resources/
 └── views/
      ├── layouts/app.blade.php     # Layout utama
      ├── partials/                 # Navbar, sidebar, footer
      └── transaksi/                # View index, create, edit transaksi

public/
 └── chameleon/                     # Aset tema (CSS, JS, font, gambar)
```

## Kontribusi

1. Fork repository ini
2. Buat branch baru (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -m "Menambahkan fitur X"`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

## Lisensi

Project ini dibuat untuk keperluan pembelajaran / penggunaan pribadi. Sesuaikan lisensi (MIT, dsb.) sesuai kebutuhan sebelum dipublikasikan secara umum.