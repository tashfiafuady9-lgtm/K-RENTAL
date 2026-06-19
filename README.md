# K-RENTAL
K-RENTAL adalah aplikasi penyewaan handphone untuk konser berbasis web yang dibangun menggunakan PHP Native, MySQL, Bootstrap, dan XAMPP.

## Problem Solving
Aplikasi K-RENTAL dibuat untuk menyelesaikan beberapa permasalahan yang sering terjadi dalam proses penyewaan handphone untuk kebutuhan konser, yaitu:
* Mempermudah pelanggan dalam mencari dan menyewa handphone kualitas tinggi tanpa harus datang langsung ke tempat penyewaan.
* Mengurangi proses pencatatan manual yang rentan terhadap kesalahan data pada transaksi penyewaan.
* Memudahkan pengelolaan data merek, handphone, penyewaan, dan pembayaran melalui sistem terintegrasi.
* Menyediakan informasi ketersediaan handphone secara real-time sehingga pelanggan dapat mengetahui perangkat yang masih dapat disewa.
* Mempermudah pelanggan dalam melakukan pembayaran dengan fitur upload bukti pembayaran secara online.
* Membantu admin dalam memverifikasi pembayaran dan memantau status penyewaan dari proses pemesanan hingga pengembalian.
* Meningkatkan efisiensi pengelolaan bisnis penyewaan handphone melalui sistem berbasis web yang dapat diakses kapan saja dan di mana saja.

## Fitur
### Customer
<img width="3837" height="1730" alt="image" src="https://github.com/user-attachments/assets/d0d49ed2-af0c-4080-8fba-adbf13567592" />
* Registrasi akun
* Login
* Melihat katalog handphone
* Melakukan penyewaan handphone
* Upload bukti pembayaran
* Melihat riwayat penyewaan

### Admin
<img width="3837" height="1725" alt="Screenshot 2026-06-20 042128" src="https://github.com/user-attachments/assets/de7fad97-ab2a-47c0-a805-2b6c89965327" />
* Login admin
* CRUD Merek Handphone
* CRUD Data Handphone
* Verifikasi Pembayaran
* Kelola Penyewaan
* Menyelesaikan transaksi penyewaan

## Teknologi
* PHP Native
* MySQL
* Bootstrap 5
* HTML
* CSS
* XAMPP

## Struktur Database
Tabel yang digunakan:
1. users
2. merek
3. handphone
4. penyewaan
5. detail_penyewaan
6. pembayaran

## Cara Menjalankan
1. Clone repository
```bash
git clone https://github.com/tashfiafuady9/K-RENTAL.git
```
2. Pindahkan project ke folder htdocs
3. Import database
```text
rental_hp_konser.sql
```
ke phpMyAdmin.
4. Jalankan Apache dan MySQL pada XAMPP.
5. Buka browser
```text
http://localhost/rental_hp_konser
```
## Akun Demo
### Admin
Email:
[admin946@gmail.com](mailto:admin946@gmail.com)

Password:
admin123

### Customer
Buat akun melalui halaman registrasi.

## Developer
Nama : Tashfia Wahdah Fuady
Program Studi : Teknik Informatika
