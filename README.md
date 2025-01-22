
markdown
Salin
Edit
# Manajemen dan Informasi BEM Kampus

Sistem manajemen dan informasi BEM Kampus untuk pengolahan data, manajemen proposal, serta komunikasi antar anggota. Platform ini bertujuan untuk mempermudah pengelolaan kegiatan organisasi BEM dengan berbagai fitur yang berguna bagi pengurus dan anggota.

## Fitur Utama

### 1. **Manajemen Proposal**
   - Menyimpan, mengelola, dan memproses proposal acara.
   - Fitur upload dan download dokumen proposal.
   - Status proposal (terima, revisi, tolak).

### 2. **Manajemen Anggota**
   - Data lengkap anggota BEM, termasuk peran, kontak, dan status aktif.
   - Fitur pengelompokan anggota berdasarkan departemen (misal: Kominfo, Keuangan, dll).

### 3. **Jadwal Kegiatan**
   - Kalender kegiatan BEM, seperti rapat, acara, dan deadline proposal.
   - Pengingat kegiatan untuk anggota yang terlibat.

### 4. **Manajemen Keuangan**
   - Pengelolaan anggaran dan laporan keuangan.
   - Input dan pemantauan transaksi keuangan (pemasukan dan pengeluaran).
   - Laporan keuangan yang dapat diexport (misal, Excel, PDF).

### 5. **Manajemen Tugas**
   - Pembagian tugas antara anggota BEM.
   - Pengaturan tenggat waktu dan status tugas.
   - Fitur notifikasi jika ada tugas yang mendekati deadline.

### 6. **Sistem Komunikasi**
   - Fitur chat antar anggota untuk mempermudah diskusi.
   - Pengumuman untuk seluruh anggota BEM.

### 7. **Dokumentasi dan Arsip**
   - Tempat penyimpanan dokumen organisasi seperti notulen rapat, foto acara, dan laporan tahunan.
   - Pencarian dokumen berdasarkan kategori atau tag.

### 8. **Pengaturan Pengguna dan Izin Akses**
   - Manajemen hak akses berdasarkan peran (Presiden, Wakil, Bendahara, dll).
   - Fitur login untuk setiap anggota dengan keamanan berbasis role.

### 9. **Statistik dan Laporan**
   - Melihat perkembangan aktivitas BEM secara keseluruhan.
   - Laporan mingguan/bulanan mengenai kinerja tim dan penggunaan anggaran.

## Teknologi yang Digunakan

- **Backend**: Laravel
- **Frontend**: Blade (Laravel templating engine)
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Library**: SweetAlert2, DataTable, DomPDF

## Instalasi

1. Clone repository ini:
   ```bash
   git clone https://github.com/username/bem-management.git
Masuk ke direktori proyek:

bash
Salin
Edit
cd bem-management
Install dependensi:

bash
Salin
Edit
composer install
npm install
Copy file .env.example menjadi .env dan sesuaikan konfigurasi database:

bash
Salin
Edit
cp .env.example .env
Generate key aplikasi:

bash
Salin
Edit
php artisan key:generate
Jalankan migrasi untuk membuat tabel database:

bash
Salin
Edit
php artisan migrate
Jalankan aplikasi:

bash
Salin
Edit
php artisan serve
Akses aplikasi di browser dengan URL: http://localhost:8000.

Kontribusi
Jika Anda ingin berkontribusi pada proyek ini, silakan lakukan fork pada repository ini dan buat pull request dengan perubahan yang diinginkan. Pastikan untuk mengikuti pedoman pengkodean yang telah ditetapkan.

Lisensi
Proyek ini menggunakan lisensi MIT. Lihat file LICENSE untuk informasi lebih lanjut.

create by arioveisa.me