# Test Matrix - Pertemuan 9

**Modul:** Form Pendaftaran Kursus & Integrasi Ajax  
**Tanggal Pengujian:** 3 November 2026  
**Penguji:** Kukuh Prasetya  

| ID | Skenario Pengujian | Langkah Pengujian | Hasil yang Diharapkan | Status |
|---|---|---|---|---|
| **TP01** | Tampilan Beranda | Buka URL `/` pada browser. | Halaman Beranda tampil dengan layout navbar Bootstrap yang konsisten. | **PASS** |
| **TP02** | Navbar Responsive / Collapse | Ubah ukuran browser ke mode mobile / layar kecil. | Tombol hamburger navbar dapat diklik dan menu collapse bekerja dengan baik. | **PASS** |
| **TP03** | Tampilan Form Pendaftaran | Buka URL `/enrollments/create`. | Halaman pendaftaran tampil dengan struktur layout yang sama dengan Beranda. | **PASS** |
| **TP04** | Form Select Default State | Perhatikan dropdown pilihan kursus saat pertama kali dimuat. | Dropdown select kosong dan menampilkan instruksi default (`-- pilih kursus --`). | **PASS** |
| **TP05** | Availability Course 1 (PHP Dasar) | Pilih opsi "PHP Dasar" pada dropdown. | Mengembalikan jumlah kursi tersisa yang benar via Ajax (8 kursi). | **PASS** |
| **TP06** | Availability Course 2 (Web Dasar) | Pilih opsi "Web Dasar" pada dropdown. | Mengembalikan jumlah kursi tersisa yang benar via Ajax (12 kursi). | **PASS** |
| **TP07** | Availability Course 3 (Laravel Dasar) | Pilih opsi "Laravel Dasar" pada dropdown. | Mengembalikan jumlah kursi tersisa yang benar via Ajax (4 kursi). | **PASS** |
| **TP08** | Submit Form (POST Valid) | Isi Nama, Email valid, Pilih Kursus, lalu klik tombol submit. | Data POST valid diterima server dan pengguna diredirect ke Beranda dengan flash message. | **PASS** |
| **TP09** | Validasi Email Tidak Valid | Isi email tanpa format yang benar (misal: `kukuh-invalid-email`) lalu submit. | Form menolak input dan menghasilkan pesan validation error dari browser/Laravel. | **PASS** |
| **TP10** | Status Network Availability JSON | Buka F12 DevTools > tab Network > jalankan pengecekan kursus. | Request Ajax availability berstatus HTTP 200 (Sukses) dan menghasilkan response JSON valid. | **PASS** |
| **TP11** | Pemeriksaan Console Browser | Buka F12 DevTools > tab Console saat berinteraksi dengan form. | Tampilan Console bersih dan bebas dari error Javascript penting. | **PASS** |