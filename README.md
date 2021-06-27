# Informasi
Website payroll pegawai sederhana ini saya buat untuk syarat tes interview di PT. BEHAESTEX. Payroll pegawai ini simulasi dari presensi manual yang di sistemkan, didalam website terdapat fitur generate presensi untuk membuat presensi pegawai secara otomatis dan hari libur (sabtu & minggu) tidak akan tergenerate. 

Kemudian staff bisa melakukan tarik data sesuai periode bulan yang di pilih, data presensi pegawai otomatis masuk ke dalam tabel payroll. dan staff bisa melakukan cetak PDF dan download gambar payroll yang pilih.

# Cara Instalasi Project
1. Download project
- [https://github.com/adityardiansyah/payroll-bhx](https://github.com/adityardiansyah/payroll-bhx)
2. Setting File .env
- Copy file .env.example dan ubah namanya menjadi .env.
- Setting Database dan sesuaikan punya anda. 

3. Import Database atau Migrate Database
- Anda bisa melakukan import database yang ada di project
  (Kelebihannya data presensi & data payroll sudah tersedia)
- Anda juga bisa melakukan `php artisan migrate --seed`
  (Kekurangannya tidak ada data presensi & data payroll yang tersedia)

# Cara penggunaan
## Akun Login
**Staff**
- Email : `staff@gmail.com`
- Password : `admin123`

**Supervisor**
- Email : `spv@gmail.com`
- Password : `admin123`

### Langkah Pertama
- Buka menu Absensi Pegawai
- Klik tombol Tambah Absensi
- Isi data

Kemudian dapat menarik data presensi di Menu Payroll
- Langkah awal harus Tarik Data Presensi dulu dengan Klik tombol **Tarik Data Presensi**
- Pilih Periode presensi
- Selesai

Kemudian dapat melihat data payroll
- Jika sudah menarik data presensi, sudah bisa dicari pada pencarian diatas.
- Pilih Periode payroll
- Akan tampil data payroll pegawai pada periode itu
- Bisa melakukan export PDF dan download bentuk gambar (jika sudah diverifikasi)
- Selesai

# API NWNP
Untuk melihat data pegawai yang tidak masuk kerja, bisa melihat datanya di link dibawah dengan menyesuaikan nama project anda.
dengan menambahkan parameter ``periode=2021-06``
[http://localhost/[nama_project]/api/get_nwnp/?periode=2021-06](http://localhost/[nama_project]/api/get_nwnp?periode=2021-06)
