<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Suka Nicky Banjarnegara</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#FAF9F6] text-slate-800 antialiased" x-data="{ mobileMenu: false }">

    <!-- 1. NAVBAR -->
    <x-navbar />

    <!-- 2. HERO TENTANG KAMI -->
    <section class="bg-amber-900 text-amber-50 py-16 md:py-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-block px-3.5 py-1 bg-amber-800 border border-amber-700 text-amber-200 text-xs font-bold rounded-full mb-4">
                Mengenal Lebih Dekat
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight mb-4">
                Menjaga Cita Rasa Warisan dari Desa Gumiwang
            </h1>
            <p class="max-w-2xl mx-auto text-amber-200 text-sm md:text-base leading-relaxed">
                Perjalanan UMKM Suka Nicky dalam menghadirkan olahan khas Banjarnegara berkualitas tinggi, berdaya saing, dan memberdayakan masyarakat lokal.
            </p>
        </div>
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
    </section>

    <!-- 3. KISAH UTAMA (PROFIL PERINTIS) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-5">
                <span class="text-amber-800 font-bold text-xs uppercase tracking-wider">Awal Mula Pendirian</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
                    Dedikasi Ibu Sukini & Inovasi Tepung Singkong Lokal
                </h2>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Usaha ini berawal pada tahun 1996 dari dapur sederhana Ibu Sukini di Desa Gumiwang, Banjarnegara. Berbekal ketelitian dan kecintaan pada kuliner tradisional, beliau memulai usaha pembuatan keripik pisang skala rumahan.
                </p>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Melihat potensi singkong lokal yang melimpah, pada tahun 2004 Suka Nicky melakukan terobosan menjadi pelopor pemanfaatan **Tepung Mocaf (Modified Cassava Flour)** sebagai baluran Keripik Tempe. Hasilnya adalah keripik yang ekstra renyah, gurih khas, dan bebas gluten.
                </p>
                <div class="p-4 bg-amber-50 border-l-4 border-amber-800 rounded-r-xl text-slate-700 text-xs italic">
                    "Bagi kami, membuat makanan bukan sekadar menjual rasa, tapi juga menjaga kepercayaan dan cita rasa asli tanah kelahiran."
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&q=80&w=500" alt="Ibu Sukini" class="rounded-2xl shadow-lg object-cover w-full h-64 border-2 border-white">
                <img src="https://images.unsplash.com/photo-1599490659213-e2b9527bd087?auto=format&fit=crop&q=80&w=500" alt="Proses Keripik Tempe" class="rounded-2xl shadow-lg object-cover w-full h-64 border-2 border-white mt-6">
            </div>
        </div>
    </section>

    <!-- 4. TIMELINE PERJALANAN (MILESTONE) -->
    <section class="bg-white border-y border-stone-200 py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-amber-800 font-bold text-xs uppercase tracking-wider">Jejak Langkah</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Perjalanan Suka Nicky</h2>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- 1996 -->
                <div class="bg-[#FAF9F6] p-6 rounded-2xl border border-stone-200 relative">
                    <span class="text-3xl font-extrabold text-amber-800 block mb-2">1996</span>
                    <h3 class="font-bold text-slate-900 text-sm mb-1">Awal Rintisan</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Dimulai dari produksi keripik pisang rumahan skala terbatas untuk pasar lokal.</p>
                </div>

                <!-- 2004 -->
                <div class="bg-[#FAF9F6] p-6 rounded-2xl border border-stone-200 relative">
                    <span class="text-3xl font-extrabold text-amber-800 block mb-2">2004</span>
                    <h3 class="font-bold text-slate-900 text-sm mb-1">Pionir Tempe Mocaf</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Inovasi memadukan tempe dengan tepung mocaf yang renyah dan sehat.</p>
                </div>

                <!-- 2015 -->
                <div class="bg-[#FAF9F6] p-6 rounded-2xl border border-stone-200 relative">
                    <span class="text-3xl font-extrabold text-amber-800 block mb-2">2015</span>
                    <h3 class="font-bold text-slate-900 text-sm mb-1">Ekspansi Produk</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Menambah lini produk Manisan Carica Dieng dan Abon Ikan khas.</p>
                </div>

                <!-- 2023 -->
                <div class="bg-[#FAF9F6] p-6 rounded-2xl border border-amber-300 shadow-xs relative">
                    <span class="text-3xl font-extrabold text-emerald-700 block mb-2">2023</span>
                    <h3 class="font-bold text-slate-900 text-sm mb-1">Mitra Indomaret</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Produk Abon Ikan resmi masuk jaringan ritel modern Indomaret.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. PILAR & NILAI UTAMA -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <div class="text-center mb-12">
            <span class="text-amber-800 font-bold text-xs uppercase tracking-wider">Komitmen Kami</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Nilai Utama Suka Nicky</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs text-center space-y-3">
                <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-800 font-extrabold text-xl flex items-center justify-center mx-auto">🌱</div>
                <h3 class="font-bold text-slate-900 text-base">Pemberdayaan Lokal</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Menggunakan bahan baku langsung dari petani singkong dan perajin tempe Desa Gumiwang untuk menyokong ekonomi desa.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs text-center space-y-3">
                <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-800 font-extrabold text-xl flex items-center justify-center mx-auto">✨</div>
                <h3 class="font-bold text-slate-900 text-base">Kualitas Bebas Pengawet</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Menggunakan teknik penggorengan dan pengemasan modern agar produk tahan lama secara alami tanpa zat berbahaya.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs text-center space-y-3">
                <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-800 font-extrabold text-xl flex items-center justify-center mx-auto">🤝</div>
                <h3 class="font-bold text-slate-900 text-base">Jaminan Halal & Higienis</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Seluruh proses produksi diawasi ketat dan mengantongi sertifikasi halal resmi demi ketenangan konsumen.</p>
            </div>
        </div>
    </section>

    <!-- 6. FOOTER -->
    <footer class="bg-slate-950 text-slate-400 text-xs py-12 border-t border-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <div class="flex items-center justify-center gap-3">
                <div class="w-8 h-8 rounded-full bg-amber-800 text-amber-100 flex items-center justify-center font-bold text-sm">
                    SN
                </div>
                <span class="text-base font-bold text-white">Suka Nicky Banjarnegara</span>
            </div>
            <p class="text-slate-500 max-w-md mx-auto">
                Desa Gumiwang RT 03 / RW 10, Purwanegara, Banjarnegara, Jawa Tengah 53472
            </p>
            <p class="text-slate-600 pt-4">&copy; 2026 UMKM Suka Nicky Banjarnegara. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>