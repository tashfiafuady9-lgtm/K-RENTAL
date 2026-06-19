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
### Halaman utama
<img width="3837" height="1722" alt="image" src="https://github.com/user-attachments/assets/28575856-7614-4f5f-8aa6-8ee3ccd4f23d" />

### Customer
* Registrasi akun
* Login
* Melihat katalog handphone
* Melakukan penyewaan handphone
* Upload bukti pembayaran
* Melihat riwayat penyewaan
<img width="3837" height="1730" alt="image" src="https://github.com/user-attachments/assets/d0d49ed2-af0c-4080-8fba-adbf13567592" />
<img width="3837" height="1717" alt="image" src="https://github.com/user-attachments/assets/5fdf22d5-6a05-44c5-b96e-b34b7371ebf5" />
<img width="3837" height="1722" alt="image" src="https://github.com/user-attachments/assets/d234618b-8875-48c0-bf3c-4ec375441434" />

### Admin
* Login admin
* CRUD Merek Handphone
* CRUD Data Handphone
* Verifikasi Pembayaran
* Kelola Penyewaan
* Menyelesaikan transaksi penyewaan
<img width="3837" height="1725" alt="Screenshot 2026-06-20 042128" src="https://github.com/user-attachments/assets/de7fad97-ab2a-47c0-a805-2b6c89965327" />
<img width="3837" height="1730" alt="image" src="https://github.com/user-attachments/assets/ce6742f7-36c8-43ff-ab5c-5fb2b410cbca" />
<img width="3837" height="1710" alt="image" src="https://github.com/user-attachments/assets/9d65cce9-2903-4cd6-aa18-7cd62e46df2c" />
<img width="3837" height="1712" alt="image" src="https://github.com/user-attachments/assets/816f8760-a2fe-4abc-9723-1a2bf413ee03" />
<img width="3837" height="1712" alt="image" src="https://github.com/user-attachments/assets/21bc1351-4d54-4a10-94ff-31f2b00a8c20" />

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
