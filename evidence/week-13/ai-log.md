# AI Usage Log — Pertemuan 13

- **Nama:** Kukuh Prasetya
- **NIM:** 2524233
- **Proyek:** Kursusku (Laravel)

| Prompt / Masalah | Saran AI | Diterima / Ditolak | Alasan + Hasil Test |
| :--- | :--- | :--- | :--- |
| Penyesuaian `CourseController@index` untuk pencarian `q`, filter status `open/closed/draft`, dan `paginate(10)->withQueryString()` | Menggunakan Eloquent `when()` dengan daftar `$allowedStatuses` agar filter kosong tidak mengembalikan 0 hasil | Diterima | Query aman untuk semua kombinasi `q` dan `status`; parameter URL tetap terjaga saat pindah ke halaman 2 |
| Pemisahan partial view `_results.blade.php` dan jQuery Ajax *live search* dengan *debounce* 300 ms serta fallback non-JS | Mempertahankan form `GET` standar dan membungkus tabel + pagination dalam `#course-results` untuk respons `partial=1` | Diterima | Pencarian tetap berjalan saat JavaScript dimatikan di DevTools, dan request Ajax berjalan mulus pada tab Network |