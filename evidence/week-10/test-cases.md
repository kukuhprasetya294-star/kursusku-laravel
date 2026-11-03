# Test Cases - Pertemuan 10

**Modul:** Management Course (Create & Read Data)  
**Tanggal Pengujian:** 4 November 2026  
**Penguji:** Kukuh Prasetya  

| ID | Skenario Pengujian | Expected Result | Actual Result | Status |
|---|---|---|---|---|
| **TC01** | Akses Halaman Index Kursus | Halaman `/courses` tampil rapi menampilkan tabel data. | Sesuai ekspektasi | **PASS** |
| **TC02** | Akses Form Tambah Kursus | Halaman `/courses/create` menampilkan form input data. | Sesuai ekspektasi | **PASS** |
| **TC03** | Validasi Input Kosong | Menampilkan pesan error validasi pada field yang wajib diisi. | Sesuai ekspektasi | **PASS** |
| **TC04** | Validasi Kuota Minus / 0 | Menolak nilai kuota <= 0 dan menampilkan error validation. | Sesuai ekspektasi | **PASS** |
| **TC05** | Simpan Data Kursus Baru | Data tersimpan ke MySQL dan diredirect ke `/courses` dengan pesan sukses. | Sesuai ekspektasi | **PASS** |
| **TC06** | Formatting Tanggal Mulai | Tanggal `start_date` diformat rapi via Eloquent Cast (`d M Y`). | Sesuai ekspektasi | **PASS** |
| **TC07** | Menampilkan Minimal 8 Data | Tabel index mampu menampilkan 8+ baris data kursus dari database. | Sesuai ekspektasi | **PASS** |
| **TC08** | Urutan Data Terbaru | Data kursus ditampilkan dari yang paling baru diinput (latest). | Sesuai ekspektasi | **PASS** |