<p align="center">
  <a href="https://laravel.com" target="_blank">
    <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
  </a>
</p>

<h1 align="center">🚀 E-Inventaris</h1>

<p align="center">
  <em>Sistem Informasi Inventaris perizinan berbasis Laravel & Filament</em>
</p>

<p align="center">
  <!-- Laravel -->
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel Badge"/>
  <!-- Filament -->
  <img src="https://img.shields.io/badge/Filament-EB3F8A?style=for-the-badge&logo=laravel&logoColor=white" alt="Filament Badge"/>
  <!-- Spatie -->
  <img src="https://img.shields.io/badge/Spatie_Permission-0081CB?style=for-the-badge&logo=php&logoColor=white" alt="Spatie Badge"/>
  <!-- Sanctum -->
  <img src="https://img.shields.io/badge/Laravel_Sanctum-6C757D?style=for-the-badge&logo=laravel&logoColor=white" alt="Sanctum Badge"/>
  <!-- Docker -->
  <img src="https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white" alt="Docker Badge"/>
  <!-- Nginx -->
  <img src="https://img.shields.io/badge/Nginx-009639?style=for-the-badge&logo=nginx&logoColor=white" alt="Nginx Badge"/>
</p>

---

## 🧩 1. Informasi Umum Proyek
- **Nama Proyek: E-Inventaris**  
- **Deskripsi Singkat :Sistem Informasi Inventaris perizinan berbasis Laravel & Filament**  
- **Pengembang / Instansi: DPMPTSP Kab. Muara Enim**  
- **Status Proyek: Aktif**  
- **URL Aplikasi: https://e-inventaris.dpmptsp.muaraenimkab.go.id**  

---

## ⚙️ 2. Teknologi yang Digunakan
| Komponen | Versi / Detail |
|-----------|----------------|
| **Laravel** | 12.x |
| **PHP** | 8.4.x |
| **Database** | MySQL / SQLite |
| **Frontend** | Filament 4 / Livewire 4 / TailwindCss |
| **Deployment** | Docker / FrankenPHP / Nginx / Octane / Vite  |
| **Library Utama** | Spatie Permission, Filament Shield, Laravel Sanctum, Fonnte API, dll |

---

## 💾 3. Instalasi & Setup

### Persyaratan Sistem
Pastikan environment kamu memenuhi spesifikasi berikut:
- PHP >= 8.2  
- Composer  
- Node.js & NPM / Yarn  
- MySQL / PostgreSQL  
- Git  

### Langkah Instalasi
```bash
# 1. Clone repository
git clone https://github.com/abdharis12/e-inventaris.git

# 2. Masuk ke folder proyek
cd e-inventaris

# 3. Install dependencies
composer install
npm install && npm run build

# 4. Salin file environment
cp .env.example .env

# 5. Generate app key
php artisan key:generate

# 6. Konfigurasi database di file .env

# 7. Jalankan migrasi dan seeder
php artisan migrate --seed

# 8. Generate Permision
php artisan shield:generate --all

# 9. Atur Role Super-Admin pada user "Administrator"
php artisan shield:super-admin

# 10. Jalankan server lokal
php artisan serve

# 11. Jalankan vite lokal
npm run dev
