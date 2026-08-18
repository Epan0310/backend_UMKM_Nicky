# Map Location Link Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Membuat tombol Lokasi pada navbar dan CTA Petunjuk Arah membuka titik lokasi usaha yang diberikan pada tab baru.

**Architecture:** Gunakan tautan eksternal langsung pada anchor Blade yang sudah ada. Tidak ada API, JavaScript, endpoint backend, atau perubahan database; perilaku diverifikasi melalui hasil render view Laravel.

**Tech Stack:** Laravel 13, Blade, PHP regression script, Vite.

## Global Constraints

- Semua tombol lokasi utama menggunakan tujuan `https://maps.app.goo.gl/7RwZBqbxb8ahMeop7`.
- Tautan dibuka pada tab baru dengan `target="_blank"`.
- Setiap tautan eksternal memakai `rel="noopener noreferrer"`.
- Navigasi dan fitur lain tidak diubah.

---

### Task 1: Integrasi tautan lokasi pada navbar dan halaman utama

**Files:**
- Create: `tests/Regression/location_links.php`
- Modify: `resources/views/components/navbar.blade.php:36-37,74-76`
- Modify: `resources/views/welcome.blade.php:82-86,281-285`

**Interfaces:**
- Consumes: Source Blade `components.navbar` dan `welcome`.
- Produces: Anchor lokasi dengan atribut `href`, `target`, dan `rel` yang konsisten.

- [ ] **Step 1: Write the failing test**

```php
<?php

$root = dirname(__DIR__, 2);
$mapUrl = 'https://maps.app.goo.gl/7RwZBqbxb8ahMeop7';
$secureAttributes = sprintf(
    'href="%s" target="_blank" rel="noopener noreferrer"',
    $mapUrl,
);

$expectations = [
    $root.'/resources/views/components/navbar.blade.php' => 2,
    $root.'/resources/views/welcome.blade.php' => 2,
];

foreach ($expectations as $file => $expectedCount) {
    $contents = file_get_contents($file);
    $actualCount = substr_count($contents, $secureAttributes);

    if ($actualCount !== $expectedCount) {
        fwrite(STDERR, sprintf(
            "FAIL: %s expected %d secure location links, found %d.\n",
            $file,
            $expectedCount,
            $actualCount,
        ));
        exit(1);
    }
}

echo "PASS: every primary location action uses the configured map safely.\n";
```

- [ ] **Step 2: Run test to verify it fails**

Run:

```bash
php tests/Regression/location_links.php
```

Expected: `FAIL`, karena tombol Lokasi masih menuju anchor halaman dan CTA masih menuju halaman peta generik.

- [ ] **Step 3: Write minimal implementation**

Ubah kedua anchor **Lokasi** dalam `resources/views/components/navbar.blade.php` menjadi:

```blade
<a href="https://maps.app.goo.gl/7RwZBqbxb8ahMeop7" target="_blank" rel="noopener noreferrer" class="text-slate-600 hover:text-[#A04618] transition">Lokasi</a>
```

```blade
<a href="https://maps.app.goo.gl/7RwZBqbxb8ahMeop7" target="_blank" rel="noopener noreferrer" @click="mobileMenu = false" class="block py-2.5 px-3 rounded-xl hover:bg-[#FAF5EF] hover:text-[#A04618] transition">Lokasi</a>
```

Ubah anchor **Lokasi** pada dropdown halaman utama dan CTA petunjuk arah dalam `resources/views/welcome.blade.php` menjadi:

```blade
<a href="https://maps.app.goo.gl/7RwZBqbxb8ahMeop7" target="_blank" rel="noopener noreferrer" @click="mobileMenu = false" class="block py-2 px-3 rounded-lg hover:bg-amber-50 hover:text-amber-800 transition">Lokasi</a>
```

```blade
<a href="https://maps.app.goo.gl/7RwZBqbxb8ahMeop7" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-6 py-3 rounded-xl text-xs transition shadow-lg shadow-amber-500/20">
    📍 Petunjuk Arah Lokasi Warung
</a>
```

- [ ] **Step 4: Run focused and full verification**

Run:

```bash
php tests/Regression/location_links.php
php -l tests/Regression/location_links.php
npm run build
```

Expected: seluruh test `PASS` dan Vite selesai dengan exit code `0`.

- [ ] **Step 5: Verify in a real browser**

Run Laravel pada `http://127.0.0.1:8000`, buka halaman utama, lalu periksa tombol Lokasi pada viewport desktop dan mobile. Klik tombol dan pastikan tab baru mengarah ke lokasi tujuan.

- [ ] **Step 6: Commit**

```bash
git add tests/Regression/location_links.php resources/views/components/navbar.blade.php resources/views/welcome.blade.php docs/superpowers/plans/2026-08-18-map-location-link.md
git commit -m "fix: hubungkan tombol lokasi ke peta usaha"
```
