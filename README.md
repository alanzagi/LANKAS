# LANKAS - Aplikasi Pengelolaan Uang Kas Kelas

LANKAS adalah Aplikasi Pengelolaan Uang Kas Kelas Berbasis Web yang dikembangkan menggunakan Laravel. Aplikasi ini dirancang untuk membantu pengguna dalam mencatat, mengelola, dan memantau pendapatan serta pengeluaran kas, terkhususnya dalam lingkungan satu kelas.

## Fitur Lengkap ✨

- Login Bendahara
- Manajemen Profile Bendahara
- Manajemen Total Keseluruhan Uang Kas
- Beranda sebagai Monitoring
- Monitoring dan CRUD data siswa
- Monitoring dan CRUD data bulan pembayaran
- Monitoring dan CRUD data pembayaran siswa
- CRUD data pengeluaran uang kas
- Monitoring & Printing data pemasukan dan pengeluaran via .pdf
- Monitoring Riwayat Uang Kas oleh Bendahara
- Monitoring Riwayat Pengeluaran oleh Bendahara

## Teknologi yang Digunakan 🛠️

- **Frontend**: TailwindCSS
- **Backend**: Laravel (11)
- **Database**: SQLite

## Persyaratan Sistem ⚙️

- PHP >= 8.2
- Composer
- Database MySQL/PostgreSQL/SQLite
- Node.js dan npm/yarn

## Instalasi 🌐

Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini secara lokal:

1. Clone repository:
``` 
git clone https://github.com/alanzagi/LANKAS.git 
cd LANKAS
```
2. Install composer
```
composer install
```
3. Install TailwindCSS
```
npm install
npm run dev
```
4. Konfigurasi file .env:
- Salin file `.env.example` menjadi `.env`:
```
cp .env.example .env
```
- Sesuaikan konfigurasi database dan lainnya sesuai kebutuhan.
5. Generate kunci aplikasi:
```
php artisan key:generate
```
6. Migrasi dan seed database:
```
php artisan migrate --seed
```
- Secara default, untuk login bendahara bisa menggunakan
`Email: alanci@gmail.com` dan `Kata Sandi: super-alci`
7. Jalankan server aplikasi:
```
php artisan serve
```
8. Akses aplikasi di browsermu melalui `http://localhost:8000`.

## Kontribusi 🙌
Aplikasi ini dikerjakan oleh perorangan dan mungkin saja masih banyak kekurangan, jika diantara kalian ada yang ingin berkontribusi bisa melakukannya dengan:
- Fork repository ini
- Buat branch baru (git checkout -b feature/NamaUpdate)
- Commit hasil dari branchmu (git commit -m 'Menambahkan update baru berupa ....')
- Push ke branch (git push origin feature/NamaUpdate)
- Buka `Pull Request`

## Dukung Saya 🚀
Jika kalian terbantu dengan project ini dan ingin memberikan tip sebagai apresiasi, bisa melalui cara di bawah:
- Berikan ⭐ ke Repository Github ini https://github.com/alanzagi/LANKAS
- atau melalui Trakteer https://trakteer.id/alan_zagi (mulai dari Rp10.000)  
Terima kasih sudah mendukung project yang saya kerjakan. ❤️

## Kerja Sama 🤝
Jika kalian membutuhkan jasa seperti deployment, pembuatan, atau konsultasi seputar aplikasi/website  
Dapat menghubungi lewat link berikut https://linktr.ee/alanzagi
