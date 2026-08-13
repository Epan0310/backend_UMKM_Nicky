# Suka Nicky Website

Website katalog produk dan layanan digital **Suka Nicky** — kuliner dan camilan khas Banjarnegara.

---

## Tech Stack

| Layer | Teknologi | Versi |
|-------|-----------|-------|
| Framework | Laravel | 13.x |
| Language | PHP | 8.5+ |
| Frontend Reactivity | Livewire | 4.x |
| Template Engine | Blade | - |
| CSS Framework | Tailwind CSS | 4.x |
| JS Framework | Alpine.js | 3.x |
| Admin Panel | Filament | 5.x |
| Database | MySQL / MariaDB | 8.0+ |
| ORM | Eloquent | - |
| Testing | Pest | 5.x |
| Asset Bundler | Vite | 8.x |

---

## Requirements

Pastikan sistem kamu memenuhi requirement berikut sebelum instalasi:

- **PHP** >= 8.3 (dengan extension: `pdo_mysql`, `mbstring`, `xml`, `curl`, `zip`, `bcmath`, `gd`, `intl`, `fileinfo`, `session`, `openssl`)
- **Composer** >= 2.x
- **Node.js** >= 22.x
- **npm** >= 10.x
- **MySQL** >= 8.0 atau **MariaDB** >= 10.6
- **Git** >= 2.x

---

## Installation

### 1. Clone Repository

```bash
git clone https://github.com/Epan0310/backend_UMKM_Nicky.git suka-nicky
cd suka-nicky
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node Dependencies

```bash
npm install
```

### 4. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Database Setup

Buat database terlebih dahulu:

```sql
CREATE DATABASE db_suka_nicky CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Edit file `.env` sesuaikan dengan konfigurasi database kamu:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_suka_nicky
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

Jalankan migration:

```bash
php artisan migrate
```

### 6. Storage Link

```bash
php artisan storage:link
```

---

## Running Development Server

### Cara 1 — Laravel Artisan Dev (Recommended)

Menjalankan Laravel + Vite secara bersamaan:

```bash
php artisan dev
```

### Cara 2 — Manual (dua terminal terpisah)

Terminal 1 — Backend:
```bash
php artisan serve
```

Terminal 2 — Frontend (Vite dev server):
```bash
npm run dev
```

Aplikasi tersedia di: `http://localhost:8000`

---

## Build Frontend Assets

Untuk production atau testing build:

```bash
npm run build
```

Assets akan di-generate ke `/public/build/`.

---

## Running Tests

```bash
php artisan test
```

Atau menggunakan Pest langsung:

```bash
./vendor/bin/pest
```

---

## Admin Panel

Admin panel menggunakan **Filament 5** tersedia di:

```
http://localhost:8000/admin
```

Untuk membuat akun admin pertama:

```bash
php artisan make:filament-user
```

Ikuti prompt untuk mengisi nama, email, dan password admin.

> ⚠️ **Jangan commit password admin ke repository.**

---

## Git Workflow

### Branch Structure

```
main          ← Production-ready, selalu stabil
develop       ← Integration branch, semua feature merge ke sini dulu
feature/*     ← Feature development
```

### Flow

```
feature/nama-fitur
      ↓
   develop
      ↓
   testing
      ↓
    main
```

### Membuat Feature Branch

```bash
git checkout develop
git pull origin develop
git checkout -b feature/nama-fitur
```

### Merge Feature ke Develop

```bash
git checkout develop
git merge feature/nama-fitur --no-ff
git push origin develop
```

---

## Conventional Commits

Gunakan format Conventional Commits untuk semua commit message:

```
feat:     Fitur baru
fix:      Bugfix
refactor: Refactor kode (tidak mengubah behavior)
style:    Perubahan style/formatting
docs:     Perubahan dokumentasi
test:     Menambah atau memperbaiki test
chore:    Update dependency, konfigurasi build, dll
```

Contoh:

```bash
git commit -m "feat: tambah halaman katalog produk"
git commit -m "fix: perbaiki bug di form checkout"
git commit -m "docs: update README instalasi"
```

---

## Project Structure

```
suka-nicky/
│
├── app/
│   ├── Filament/          ← Admin panel resources & pages
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   ├── Livewire/          ← Livewire components
│   ├── Models/            ← Eloquent models
│   ├── Providers/         ← Service providers
│   └── Services/          ← Business logic services (ChatbotService, dll)
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   ├── css/
│   │   └── app.css        ← Tailwind CSS entry point
│   ├── js/
│   │   └── app.js         ← Alpine.js entry point
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       └── welcome.blade.php
│
├── routes/
│   ├── web.php
│   └── console.php
│
├── tests/
│   ├── Feature/
│   └── Unit/
│
├── .env.example
├── .gitignore
├── composer.json
├── package.json
├── README.md
└── vite.config.js
```

---

## Environment Variables

| Variable | Default | Keterangan |
|----------|---------|-----------|
| `APP_NAME` | `Suka Nicky` | Nama aplikasi |
| `APP_ENV` | `local` | Environment (`local`, `production`) |
| `APP_DEBUG` | `true` | Debug mode (set `false` di production) |
| `APP_URL` | `http://localhost:8000` | Base URL aplikasi |
| `DB_CONNECTION` | `mysql` | Driver database |
| `DB_DATABASE` | `db_suka_nicky` | Nama database |
| `DB_USERNAME` | `root` | Username database |
| `DB_PASSWORD` | _(kosong)_ | Password database |
| `SESSION_DRIVER` | `file` | Driver session |
| `CACHE_STORE` | `file` | Driver cache |
| `QUEUE_CONNECTION` | `sync` | Driver queue |
| `MAIL_MAILER` | `log` | Driver email (development) |

---

## Notes

- **Jangan commit file `.env`** — sudah ada di `.gitignore`
- **Jangan push ke `main` langsung** — selalu lewat `develop` dulu
- **Node.js hanya digunakan untuk build asset** — tidak dibutuhkan di production server
- **Redis tidak diperlukan** untuk development; session/cache menggunakan file driver
- **Chatbot** akan diimplementasikan di fase berikutnya menggunakan service layer

---

## Roadmap Fitur (Fase Berikutnya)

```
PUBLIC
├── Homepage
├── Katalog Produk & Detail
├── Pencarian & Filter Kategori
├── Keranjang & WhatsApp Checkout
├── Galeri & Testimoni
├── Halaman Kontak
└── Chatbot (FAQ + Produk hybrid)

ADMIN (Filament)
├── Dashboard Analytics
├── Manajemen Produk & Kategori
├── Variasi & Gambar Produk
├── FAQ Chatbot
├── Galeri & Testimoni
└── Pengaturan Website
```

---

*Dibuat untuk project kuliah nyata — UMKM Suka Nicky, Banjarnegara.*
