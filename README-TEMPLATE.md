# Integrasi Template Admin dan Guest — Aroma Avvolgente

## Perubahan
- Halaman Guest `/` memakai template ChocoLux dari `public/guest/`.
- Halaman Admin `/admin` memakai template DarkPan dari `public/admin/`.
- Logo Aroma Avvolgente tersedia di `public/guest/images/logo.svg` dan `public/admin/img/logo.svg`.
- Route Guest dan Admin didefinisikan di `routes/web.php`.
- Asset CSS/JavaScript/Gambar dipanggil melalui helper Laravel `asset()`.

## Cara menjalankan
1. Ekstrak ZIP dan buka folder `AromaAvvolgente` di VS Code.
2. Pastikan PHP 8.3+ dan Composer tersedia.
3. Jika file `.env` belum ada, salin `.env.example` menjadi `.env`.
4. Jalankan `composer install` jika folder `vendor` tidak tersedia atau dependensi belum terpasang.
5. Jalankan `php artisan key:generate` jika `APP_KEY` masih kosong.
6. Jalankan `php artisan serve`.
7. Buka `http://127.0.0.1:8000/` untuk Guest dan `http://127.0.0.1:8000/admin` untuk Admin.

## Catatan
- File `.env` sengaja tidak disertakan dalam ZIP. Jangan commit file `.env` ke repositori.
- Setelah memastikan kedua halaman berjalan, jalankan `git status`, `git add routes/web.php resources/views public/guest public/admin`, `git commit -m "feat: integrate admin and guest templates"`, lalu `git push`.
- Template Guest masih menggunakan konten contoh bawaan ChocoLux; ubah teks dan foto agar sesuai dengan kebutuhan proyek akhir.
