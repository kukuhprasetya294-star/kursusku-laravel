# AI Usage Log - Pertemuan 11

- **Pengembang:** Kukuh Prasetya
- **Model AI:** Gemini AI
- **Skop Bantuan:** Penyelarasan Form Request Validation & Refactoring CRUD Controller

---

### Catatan Penggunaan AI

1. **Refactoring Form Request:**
   - Membantu konfigurasi class `StoreCourseRequest` dan `UpdateCourseRequest` untuk memisahkan validasi server-side dari controller.
   - Mengimplementasikan `Rule::unique('courses', 'code')->ignore($course)` pada proses update.

2. **Route Model Binding & Blade Integration:**
   - Menyusun alur Route Model Binding pada method `show`, `edit`, `update`, dan `destroy`.
   - Menyelaraskan komponen form edit dengan pola `old('field', $course->field)` untuk konsistensi UX.

---

*Catatan: Eksekusi migration, pengujian 14 test case boundary validation, capturing evidence, dan penanganan database MySQL dilakukan secara mandiri.*