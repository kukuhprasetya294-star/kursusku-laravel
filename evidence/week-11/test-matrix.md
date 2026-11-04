# Test Matrix - Pertemuan 11

**Modul:** CRUD Course Lengkap & Form Request Validation  
**Tanggal Pengujian:** 4 November 2026  
**Penguji:** Kukuh Prasetya  

| No | Skenario Pengujian | Input Contoh / Tindakan | Hasil yang Diharapkan | Status | Bukti File |
|---|---|---|---|---|---|
| 1 | Duplicate code saat create | `code = "WEB-001"` (sudah ada) | Ditolak; error dekat field code | **PASS** | `04-validation-duplicate-code.png` |
| 2 | Nama kosong | `name = ""` | Ditolak; error name required | **PASS** | Evaluasi Lokal |
| 3 | Nama terlalu pendek | `name = "AI"` | Ditolak; minimal 3 karakter | **PASS** | Evaluasi Lokal |
| 4 | Fee negatif | `fee = -1000` | Ditolak; min 0 | **PASS** | Evaluasi Lokal |
| 5 | Fee bukan integer | `fee = "abc"` | Ditolak; harus integer | **PASS** | Evaluasi Lokal |
| 6 | Quota nol | `quota = 0` | Ditolak; min 1 | **PASS** | Evaluasi Lokal |
| 7 | Quota 501 | `quota = 501` | Ditolak; max 500 | **PASS** | `05-validation-quota-501.png` |
| 8 | Boundary quota minimum | `quota = 1` | Diterima | **PASS** | Evaluasi Lokal |
| 9 | Boundary quota maksimum | `quota = 500` | Diterima | **PASS** | Evaluasi Lokal |
| 10 | Status invalid | `status = "active"` | Ditolak oleh rule in:draft,open,closed | **PASS** | Evaluasi Lokal |
| 11 | Update dengan code sendiri | Edit nama tanpa ubah code | Berhasil disimpan (Rule unique ignore) | **PASS** | Evaluasi Lokal |
| 12 | Update ke code Course lain | Ubah code ke milik record lain | Ditolak unique error | **PASS** | Evaluasi Lokal |
| 13 | Update normal | Ubah data valid | Berhasil; diredirect ke detail + flash message | **PASS** | `06-update-success.png` |
| 14 | Delete dengan konfirmasi | Klik Hapus -> Confirm OK | Data terhapus dari DB + flash message | **PASS** | `07-delete-success.png` |