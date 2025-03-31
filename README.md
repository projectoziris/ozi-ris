# 🩻 OZI-RIS: Radiology Information System

**OZI-RIS** ialah sistem pengurusan radiologi yang dibangunkan menggunakan Laravel 12 dan AdminLTE. Projek ini dibina untuk memenuhi piawaian sistem rekod radiologi di UK dan boleh diperluas untuk integrasi DICOM/PACS/HL7 pada masa hadapan.

---

## 📦 Teknologi Digunakan

- PHP ^8.2
- Laravel 12.x
- AdminLTE (jeroennoten/laravel-adminlte)
- Bootstrap 4/5
- MySQL / MariaDB

---

## 🚀 Ciri Utama

- Pengurusan Pesakit (Pesakit CRUD)
- Modality Management (X-Ray, CT, MRI, dll)
- Pemeriksaan (Jenis pemeriksaan ikut modality)
- Role & Permission (coming soon)
- Dashboard + Statistik
- Siap sedia untuk integrasi DICOM/PACS

---

## ⚙️ Pemasangan Projek

```bash
git clone https://github.com/projectoziris/ozi-ris.git
cd ozi-ris
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve
