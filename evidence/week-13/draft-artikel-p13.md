# Draft Artikel Ilmiah — Pertemuan 13

- **Nama:** Kukuh Prasetya
- **NIM:** 2524233
- **Program Studi:** Pendidikan Teknik Informatika dan Komputer (PTIK) — UIN Sjech M. Djamil Djambek Bukittinggi
- **Proyek:** Sistem Informasi Pendaftaran Kursus (*Kursusku*)

---

## 1. Judul Sementara
**Implementasi Pencarian, Filter Status, dan Pagination Server-Side dengan Progressive Enhancement Ajax pada Sistem Pendaftaran Kursus Berbasis Laravel**

## 2. Problem Statement
Seiring bertambahnya data kursus pada aplikasi *Kursusku* (23 entri kursus dengan variasi status `open`, `closed`, dan `draft`), tampilan daftar kursus dalam satu halaman panjang tanpa pembatasan baris membuat pengguna kesulitan menemukan kursus tertentu berdasarkan kode maupun nama. Selain itu, tanpa mekanisme penyaringan status dan pembagian halaman, proses penelusuran data menjadi kurang efisien dan rentan kehilangan konteks pencarian saat pengguna berpindah halaman.

## 3. Gap Sederhana
Pada versi proyek pertemuan sebelumnya, halaman `courses/index` hanya menampilkan seluruh data kursus secara mentah tanpa parameter pencarian (`q`), filter status, maupun pembatasan jumlah baris per halaman. Sistem membutuhkan mekanisme *data discovery* berbasis `GET` yang mempertahankan *query string* antar halaman (`withQueryString()`), tetap berfungsi penuh meskipun JavaScript dinonaktifkan (*graceful degradation*), serta mendukung pembaruan hasil secara asinkron menggunakan jQuery Ajax dengan *debounce* 300 ms untuk mengurangi pengiriman *request* berlebih saat mengetik.

## 4. Metode Pengembangan
Pengembangan dilakukan secara bertahap pada proyek Laravel *Kursusku* tanpa mengubah skema tabel database yang sudah ada:
1. **Identifikasi Kebutuhan & Persiapan Data Uji:** Menyiapkan 23 data kursus dengan variasi kode (`CRS-001` s.d. `CRS-022` dan `WEB-001`), judul berspasi, dan status (`open`, `closed`, `draft`).
2. **Implementasi Query Server-Side:** Menambahkan query kondisional `when()` untuk parameter pencarian `q` (pada kolom `code` dan `name`), validasi daftar status yang diizinkan (`$allowedStatuses`), serta `paginate(10)->withQueryString()` pada `CourseController@index`.
3. **Antarmuka Form GET & Empty State:** Menyusun form pencarian dengan method `GET` pada `courses/index.blade.php` serta penanganan kondisi 0 hasil menggunakan `@forelse` dan `@empty`.
4. **Progressive Enhancement Ajax:** Memisahkan tampilan tabel dan tautan pagination ke partial view `courses/_results.blade.php`, menyediakan respons parsial (`partial=1`), serta menambahkan jQuery Ajax *live search* dengan *debounce* 300 ms dan intersepsi klik pagination.
5. **Pengujian Fungsional & Fallback Non-JS:** Menguji lima skenario utama, mode tanpa JavaScript, serta inspeksi permintaan jaringan pada DevTools Network.

## 5. Tabel Skenario Uji (Test Matrix)

| No | Skenario | Input / Langkah | Expected | Actual | Status |
| :--- | :--- | :--- | :--- | :--- | :--- |
| 1 | 0 hasil | Cari keyword `tidak-ada-xyz-999` | Empty state tampil tanpa error server | Pesan "Tidak ada kursus yang sesuai pencarian/filter." tampil tanpa error | Pass |
| 2 | 1 hasil | Cari kode unik `CRS-001` | Tepat 1 record kursus tampil | Tampil tepat 1 data kursus (`CRS-001`) | Pass |
| 3 | > 10 hasil | Pilih filter status `Open` (13 data) | Maksimal 10 data pada page 1 + pagination tampil | Page 1 menampilkan 10 data dan pagination halaman 1–2 muncul | Pass |
| 4 | Keyword spasi | Cari keyword `Web Modern` | Keyword spasi terbaca benar dan data relevan tampil | URL/parameter membaca spasi dan menampilkan data *Pemrograman Web Modern* | Pass |
| 5 | Filter + page 2 | Pilih status `Open` lalu pindah ke page 2 | Parameter `status=open` tetap terjaga pada page 2 | Halaman 2 menampilkan 3 sisa data berstatus `Open` dengan filter tetap aktif | Pass |
| 6 | Fallback Non-JS | Nonaktifkan JavaScript di DevTools lalu klik Cari | Form GET tetap menyaring data melalui reload normal | Pencarian dan filter tetap berjalan normal lewat reload halaman GET | Pass |
| 7 | Ajax + Debounce | Ketik keyword cepat & klik pagination Ajax (Network tab) | Request `partial=1` terkirim setelah jeda 300 ms tanpa full reload | Request XHR dengan `partial=1` terkirim setelah jeda 300 ms dan tabel ter-update | Pass |

## 6. Hasil & Pembahasan Awal
- Pengujian pada 23 data kursus (terdiri dari 13 kursus `open` serta kombinasi `closed` dan `draft`) menunjukkan seluruh skenario pencarian, filter status, dan pembagian 10 data per halaman berjalan sesuai rancangan pada arsitektur `GET` dengan state yang dipertahankan melalui `withQueryString()`.
- Pemisahan *baseline* form `GET` menjaga fungsionalitas penelusuran tetap dapat diakses ketika JavaScript dinonaktifkan, sementara lapisan jQuery Ajax dengan *debounce* 300 ms mempercepat pembaruan tabel dan pagination secara parsial tanpa memuat ulang seluruh halaman.

## 7. Referensi Awal
- Laravel Documentation (11.x). *Database: Pagination (`withQueryString`) & Eloquent Query Builder*. https://laravel.com/docs/pagination
- jQuery API Documentation. *jQuery.get() & Event Delegation (`.on()`)*. https://api.jquery.com/jQuery.get/
- RPS Mata Kuliah Bahasa Pemrograman III (PHP & MySQL), Program Studi PTIK, UIN Sjech M. Djamil Djambek Bukittinggi, 2026.