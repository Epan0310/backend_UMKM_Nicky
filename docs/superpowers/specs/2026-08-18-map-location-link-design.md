# Desain Integrasi Tombol Lokasi

## Tujuan

Menghubungkan seluruh tombol lokasi utama pada website ke tampilan peta lokasi usaha yang sudah diberikan, tanpa menutup halaman website yang sedang dibuka.

## Ruang Lingkup

- Tombol **Lokasi** pada navbar desktop membuka peta lokasi tujuan.
- Tombol **Lokasi** pada navbar mobile membuka peta lokasi tujuan.
- Tombol **Petunjuk Arah Lokasi Warung** membuka tujuan yang sama.
- Tautan dibuka pada tab baru dengan atribut keamanan `rel="noopener noreferrer"`.
- Navigasi dan fitur lain tidak diubah.

## Arsitektur

Integrasi menggunakan tautan eksternal langsung pada elemen anchor Blade. Pendekatan ini tidak memerlukan API key, JavaScript tambahan, perubahan database, atau endpoint backend baru.

## Alur Data

1. Pengunjung menekan tombol lokasi.
2. Browser membuka tautan lokasi yang dikonfigurasi pada tab baru.
3. Layanan peta menampilkan titik lokasi dan menyediakan navigasi pengguna.

## Penanganan Kesalahan

Jika layanan peta atau koneksi internet pengguna sedang bermasalah, halaman website tetap terbuka pada tab asal. Tidak ada state aplikasi yang berubah.

## Pengujian

- Feature test memastikan halaman utama berhasil dimuat.
- Feature test memastikan tombol lokasi memakai tautan tujuan yang benar.
- Feature test memastikan tautan dibuka pada tab baru dan memiliki atribut keamanan.
- Pemeriksaan browser memastikan tombol dapat diklik dari tampilan desktop dan mobile.
