# 📋 Sistem Informasi Pengajuan Cuti

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-12.x-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?style=for-the-badge&logo=php)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

</div>

Sistem Informasi Pengajuan Cuti adalah aplikasi web berbasis Laravel yang dirancang untuk mengelola pengajuan cuti karyawan secara digital. Aplikasi ini memungkinkan karyawan untuk mengajukan cuti dan admin untuk mengelola persetujuan cuti dengan mudah dan efisien.

## 📸 Screenshot

<!-- Tambahkan screenshot aplikasi Anda di sini -->
![Dashboard](https://via.placeholder.com/800x400/1e40af/ffffff?text=Dashboard+Screenshot)

## ✨ Demo

🌐 **Live Demo**: [Demo Link](https://your-demo-url.com) (jika tersedia)

## 📋 Table of Contents

- [🚀 Fitur Utama](#-fitur-utama)
- [🛠️ Teknologi yang Digunakan](#️-teknologi-yang-digunakan)
- [📦 Persyaratan Sistem](#-persyaratan-sistem)
- [🔧 Cara Instalasi](#-cara-instalasi)
- [👥 Default Users](#-default-users)
- [📊 Database Schema](#-database-schema)
- [🔐 Role dan Permission](#-role-dan-permission)
- [🧪 Testing](#-testing)
- [🛡️ Security](#️-security)
- [📞 Support & Kontribusi](#-support--kontribusi)

## 🚀 Fitur Utama

<div align="center">
  
### 👨‍💼 Admin Features

| Feature | Deskripsi |
|---------|-----------|
| 🏠 **Dashboard Admin** | Overview sistem dengan statistik cuti |
| 👥 **Manajemen User** | Kelola akun pengguna sistem |
| 💼 **Manajemen Jabatan** | CRUD data jabatan karyawan |
| 📋 **Manajemen Jenis Cuti** | Kelola jenis-jenis cuti yang tersedia |
| 👤 **Manajemen Karyawan** | Kelola data karyawan |
| ✅ **Persetujuan Cuti** | Approve/reject pengajuan cuti karyawan |
| 📊 **Laporan Cuti** | Monitoring dan pelaporan data cuti |

### 👤 Karyawan Features

| Feature | Deskripsi |
|---------|-----------|
| 📝 **Pengajuan Cuti** | Submit permintaan cuti dengan lampiran |
| 📄 **Riwayat Cuti** | Melihat status dan history pengajuan |
| ⚙️ **Profile Management** | Kelola profil personal |

### 🔐 Sistem Keamanan

| Feature | Deskripsi |
|---------|-----------|
| 🔒 **Role-based Access Control** | Pembatasan akses berdasarkan role |
| 🔑 **Authentication Laravel Breeze** | Sistem login yang aman |
| 🛡️ **Laravel Permission** | Manajemen permission yang fleksibel |

</div>

## 🛠️ Teknologi yang Digunakan

<div align="center">

| Category | Technology |
|----------|------------|
| **Backend** | ![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel&logoColor=white) |
| **Frontend** | ![Blade](https://img.shields.io/badge/Blade-Templates-FF2D20?style=flat&logo=laravel&logoColor=white) ![Alpine.js](https://img.shields.io/badge/Alpine.js-8BC0D0?style=flat&logo=alpine.js&logoColor=black) |
| **Styling** | ![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat&logo=tailwind-css&logoColor=white) |
| **Database** | ![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white) ![PostgreSQL](https://img.shields.io/badge/PostgreSQL-316192?style=flat&logo=postgresql&logoColor=white) |
| **Authentication** | ![Laravel Breeze](https://img.shields.io/badge/Laravel-Breeze-FF2D20?style=flat&logo=laravel&logoColor=white) |
| **Permission** | ![Spatie](https://img.shields.io/badge/Spatie-Laravel_Permission-197EC8?style=flat) |
| **Build Tools** | ![Vite](https://img.shields.io/badge/Vite-646CFF?style=flat&logo=vite&logoColor=white) |
| **PHP Version** | ![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white) |

</div>

## 📦 Persyaratan Sistem

Pastikan sistem Anda memiliki:

-   PHP >= 8.2
-   Composer
-   Node.js >= 16.x
-   NPM atau Yarn
-   MySQL >= 8.0 atau PostgreSQL >= 13
-   Web Server (Apache/Nginx) atau PHP Built-in Server

## 🔧 Cara Instalasi

### Prasyarat
Pastikan Anda sudah menginstall:
- PHP >= 8.2
- Composer
- Node.js >= 16.x
- NPM atau Yarn
- MySQL >= 8.0 atau PostgreSQL >= 13

### Langkah-langkah Instalasi

#### 1️⃣ Clone Repository
```bash
git clone https://github.com/Brynnnn12/Sistem-Informasi-Pengajuan-Cuti.git
cd leave-management
```

#### 2️⃣ Install Dependencies PHP
```bash
composer install
```

#### 3️⃣ Install Dependencies Node.js
```bash
npm install
```

#### 4️⃣ Konfigurasi Environment
```bash
# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate
```

#### 5️⃣ Konfigurasi Database
Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=leave_management
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

#### 6️⃣ Migrasi Database
```bash
# Jalankan migrasi
php artisan migrate

# Jalankan seeder (optional)
php artisan db:seed
```

#### 7️⃣ Storage Link
```bash
php artisan storage:link
```

#### 8️⃣ Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

#### 9️⃣ Jalankan Aplikasi
```bash
# Menggunakan PHP built-in server
php artisan serve
```

🎉 **Aplikasi akan berjalan di** `http://localhost:8000`

## 👥 Default Users

Setelah menjalankan seeder, Anda dapat login dengan:

| Role | Email | Password |
|------|-------|----------|
| 👨‍💼 **Admin** | `admin@example.com` | `password` |
| 👤 **Karyawan** | `employee@example.com` | `password` |

## 📊 Database Schema

<div align="center">

### 🗃️ Tabel Utama

| Tabel | Deskripsi |
|-------|-----------|
| `users` | Data pengguna sistem |
| `karyawans` | Data karyawan |
| `jabatans` | Data jabatan |
| `jenis_cutis` | Jenis-jenis cuti |
| `pengajuan_cutis` | Data pengajuan cuti |

### 🔗 Relasi Database

```mermaid
erDiagram
    users ||--|| karyawans : "has one"
    karyawans }o--|| jabatans : "belongs to"
    pengajuan_cutis }o--|| karyawans : "belongs to"
    pengajuan_cutis }o--|| jenis_cutis : "belongs to"
```

</div>

## 🔐 Role dan Permission

### Admin Role:

-   Kelola semua data master
-   Approve/reject pengajuan cuti
-   Akses laporan lengkap

### Employee Role:

-   Submit pengajuan cuti
-   View riwayat cuti sendiri
-   Update profil personal

## 📱 Responsive Design

Aplikasi ini menggunakan Tailwind CSS dan dirancang untuk:

-   Desktop browsers
-   Tablet devices
-   Mobile phones

## 🧪 Testing

Menjalankan test:

```bash
# Unit tests
php artisan test

# Feature tests dengan Pest
./vendor/bin/pest
```

## 📝 API Documentation

Jika diperlukan, API endpoints tersedia di:

-   `/api/pengajuan` - Pengajuan cuti endpoints
-   `/api/karyawan` - Karyawan data endpoints

## 🛡️ Security

-   CSRF protection enabled
-   XSS protection
-   SQL injection prevention
-   File upload validation
-   Rate limiting

## 🔄 Update Guide

Untuk update aplikasi:

```bash
git pull origin main
composer update
npm update
php artisan migrate
npm run build
php artisan config:cache
```

## 📞 Support & Kontribusi

<div align="center">

### 🤝 Kontribusi
Kontribusi sangat diterima! Ikuti langkah berikut:

1. 🍴 Fork repository
2. 🌿 Buat feature branch (`git checkout -b feature/AmazingFeature`)
3. 💾 Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. 📤 Push ke branch (`git push origin feature/AmazingFeature`)
5. 🔄 Buat Pull Request

### 📞 Dukungan
Jika Anda mengalami masalah atau memiliki pertanyaan:

[![GitHub Issues](https://img.shields.io/badge/GitHub-Issues-red?style=for-the-badge&logo=github)](https://github.com/Brynnnn12/Sistem-Informasi-Pengajuan-Cuti/issues)
[![Email](https://img.shields.io/badge/Email-Contact-blue?style=for-the-badge&logo=gmail)](mailto:your-email@example.com)

</div>

## 📈 Future Features

- [ ] 📧 Email notifications
- [ ] 📱 SMS notifications  
- [ ] 📱 Mobile app
- [ ] 📊 Advanced reporting
- [ ] 📅 Calendar integration
- [ ] ⚙️ Workflow customization
- [ ] 🔄 Multi-language support
- [ ] 📈 Analytics dashboard

## 📄 License

Aplikasi ini menggunakan [MIT License](https://opensource.org/licenses/MIT).

---

**Dibuat dengan ❤️ menggunakan Laravel Framework**
