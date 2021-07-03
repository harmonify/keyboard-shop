Aplikasi ini merupakan sebuah aplikasi web e-commerce yang dibuat untuk memenuhi tugas akhir mata kuliah Pemrograman Web dan Web Service dengan menggunakan komponen-komponen sebagai berikut.
* PHP 8.0.6
* Apache 2.4.47
* MariaDB 10.4.19
* phpMyAdmin 5.1.0
* Bootstrap 5.0.1

Seorang pengguna aplikasi ini dapat diassign satu role dari role yang berbeda-beda (secara default ada 2 role) dan akan diassign role 'user' secara default:
1. user.
2. administrator.

Berikut merupakan fitur-fitur umum yang tersedia untuk seluruh pengguna aplikasi ini.
1. Registrasi.
2. Login.
3. Melihat profile sendiri.
4. Mengubah profile sendiri.
5. Logout.
Adapun beberapa fitur khusus yang hanya diberikan kepada pengguna dengan role administrator.


Untuk mengakses akun admin, gunakan username dan password berikut.
  username: admin
  password: admin

Seorang admin memiliki fitur khusus:
+ Mengubah data user secara manual
+ Mengubah role user lain
+ Menghapus user
+ Menambah role baru
+ Menghapus role yang telah dibuat
+ Bebas mengakses halaman di folder admin maupun pages


Untuk mengakses akun user biasa, gunakan username dan password berikut.
  username: wendy
  password: wendy

Seorang user biasa memiliki semua fitur umum aplikasi ini.

Seorang user tidak bisa :
- Mengakses semua halaman di folder admin
- Melihat profile user lain
- Mengubah profile user lain
- Mengubah role user lain
- Menghapus user lain
- Menambah role baru
- Menghapus role yang telah dibuat
