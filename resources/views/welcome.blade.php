<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suka Nicky Banjarnegara - Pelopor Keripik Tempe Mocaf</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js CDN -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-[#FAF9F6] text-slate-800 antialiased"
      @open-cart.window="cartOpen = true"
      x-data="{ 
          cartOpen: false, 
          chatOpen: false, 
          mobileMenu: false,
          selectedCategory: 'all',
          cart: [
              { id: 1, name: 'Keripik Tempe Mocaf', price: 15000, qty: 1 },
              { id: 2, name: 'Manisan Carica Premium', price: 20000, qty: 1 }
          ],
          products: [
              { id: 1, name: 'Keripik Tempe Mocaf', category: 'keripik', price: 15000, badge: 'BEST SELLER', desc: 'Renyah, gurih, bebas gluten dengan baluran tepung singkong pilihan.', img: 'https://images.unsplash.com/photo-1599490659213-e2b9527bd087?auto=format&fit=crop&q=80&w=400' },
              { id: 2, name: 'Manisan Carica Premium', category: 'carica', price: 20000, badge: 'OLEH-OLEH KHAS', desc: 'Buah pepaya Dieng segar dalam racikan sirup manis alami.', img: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&q=80&w=400' },
              { id: 3, name: 'Abon Ikan Gurih', category: 'olahan', price: 25000, badge: 'MITRA INDOMARET', desc: 'Olahan daging ikan segar berkualitas, cocok untuk lauk praktis.', img: 'https://images.unsplash.com/photo-1589301760014-d929f3979dbc?auto=format&fit=crop&q=80&w=400' },
              { id: 4, name: 'Sale Pisang Madu', category: 'keripik', price: 18000, badge: 'RENYAH', desc: 'Pisang pilihan diolah dengan lapisan manis legit khas Banjarnegara.', img: 'https://images.unsplash.com/photo-1566478989037-eec170784d0b?auto=format&fit=crop&q=80&w=400' }
          ],
          addToCart(product) {
              let item = this.cart.find(i => i.id === product.id);
              if (item) {
                  item.qty++;
              } else {
                  this.cart.push({ id: product.id, name: product.name, price: product.price, qty: 1 });
              }
              this.cartOpen = true;
          },
          updateQty(index, amount) {
              if (this.cart[index].qty + amount > 0) {
                  this.cart[index].qty += amount;
              } else {
                  this.cart.splice(index, 1);
              }
          },
          removeFromCart(index) {
              this.cart.splice(index, 1);
          },
          getTotal() {
              return this.cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
          },
          getTotalCount() {
              return this.cart.reduce((sum, item) => sum + item.qty, 0);
          },
          getWaMessage() {
              if (this.cart.length === 0) return 'https://wa.me/6285227393489';
              let text = 'Halo Admin Suka Nicky, saya mau pesan:\n';
              this.cart.forEach(i => {
                  text += `- ${i.qty}x ${i.name} (@Rp ${i.price.toLocaleString('id-ID')})\n`;
              });
              text += `\nTotal Estimasi: Rp ${this.getTotal().toLocaleString('id-ID')}`;
              return 'https://wa.me/6285227393489?text=' + encodeURIComponent(text);
          }
      }">

    <!-- 1. NAVBAR -->
    <x-navbar />

    <!-- 2. HERO SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="inline-block px-3.5 py-1 bg-amber-100 border border-amber-200 text-amber-800 text-xs font-bold rounded-full">
                    Sejak 1996 • Pelopor Olahan Mocaf
                </span>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                    Cita Rasa Otentik Banjarnegara, Pelopor Keripik Tempe Mocaf
                </h1>
                <p class="text-slate-600 text-sm md:text-base leading-relaxed">
                    Menghadirkan kehangatan tradisi Desa Gumiwang melalui olahan kuliner dan oleh-oleh premium. Perpaduan resep warisan dan inovasi tepung singkong lokal untuk kualitas terbaik.
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#katalog" class="bg-amber-800 hover:bg-amber-900 text-white font-bold px-7 py-3.5 rounded-xl text-sm transition shadow-lg shadow-amber-900/15">
                        Beli Sekarang
                    </a>
                    <a href="#katalog" class="bg-white hover:bg-slate-50 border border-slate-300 text-slate-700 font-bold px-7 py-3.5 rounded-xl text-sm transition">
                        Lihat Katalog
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="aspect-4/3 rounded-3xl overflow-hidden shadow-2xl bg-amber-100 border-4 border-white">
                    <img src="https://images.unsplash.com/photo-1627308595229-7830a5c91f9f?auto=format&fit=crop&q=80&w=800" alt="Keripik Tempe Suka Nicky" class="w-full h-full object-cover">
                </div>
                <div class="absolute -bottom-5 -left-5 bg-white p-4 rounded-2xl shadow-xl border border-slate-100 hidden sm:flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold">✓</div>
                    <div>
                        <span class="text-xs font-bold text-slate-800 block">Tersedia di Indomaret</span>
                        <span class="text-[10px] text-slate-500">Produk Abon Ikan Resmi</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. TRUST BADGES -->
    <section class="bg-amber-50/60 border-y border-amber-100/80 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-white shadow-xs border border-amber-100 flex items-center justify-center text-amber-700 font-bold">✓</div>
                <span class="text-xs font-bold text-slate-800">100% Halal Alami</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-white shadow-xs border border-amber-100 flex items-center justify-center text-amber-700 font-bold">🌿</div>
                <span class="text-xs font-bold text-slate-800">Inovasi Tepung Mocaf</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-white shadow-xs border border-amber-100 flex items-center justify-center text-amber-700 font-bold">🏪</div>
                <span class="text-xs font-bold text-slate-800">Mitra Indomaret</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-white shadow-xs border border-amber-100 flex items-center justify-center text-amber-700 font-bold">⭐</div>
                <span class="text-xs font-bold text-slate-800">Resep Warisan 1996</span>
            </div>
        </div>
    </section>

    <!-- 4. PRODUK UNGGULAN KATALOG -->
     <section id="katalog" class="py-12 bg-[#FAF8F5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="mb-8">
            <span class="text-xs font-bold text-[#A04618] uppercase tracking-wider block mb-1">
                Katalog Produk
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#1E2029]">
                Pilihan Favorit Oleh-Oleh
            </h2>
            <p class="text-sm text-slate-500 mt-1">
                Diproduksi higienis langsung dari dapur Suka Nicky Desa Gumiwang
            </p>
        </div>

        <!-- Product Grid Dynamic -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($featuredProducts as $product)
                <div class="bg-white rounded-2xl border border-stone-200/80 shadow-xs hover:shadow-lg transition duration-300 flex flex-col justify-between overflow-hidden group">
                    <div>
                        <!-- Gambar & Badge -->
                        <div class="relative aspect-square bg-stone-100 overflow-hidden">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/600x600/FAF8F5/A04618?text=' . urlencode($product->name) }}" 
                                 alt="{{ $product->name }}" 
                                 onerror="this.onerror=null; this.src='https://placehold.co/600x600/FAF8F5/A04618?text=Suka+Nicky';"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                            @if($product->badge)
                                <span class="absolute top-3 left-3 bg-[#E2A03F] text-stone-900 text-[10px] font-extrabold px-2.5 py-1 rounded-md uppercase tracking-wider shadow-xs">
                                    {{ $product->badge }}
                                </span>
                            @endif
                        </div>

                        <!-- Detail Produk -->
                        <div class="p-4">
                            <span class="text-[10px] text-[#A04618] font-bold uppercase tracking-wider block mb-1">
                                {{ $product->category->name ?? 'Unggulan' }}
                            </span>
                            <h3 class="font-extrabold text-[#1E2029] text-base group-hover:text-[#A04618] transition line-clamp-1">
                                {{ $product->name }}
                            </h3>
                            <p class="text-xs text-slate-500 mt-1.5 line-clamp-2 leading-relaxed">
                                {{ $product->description ?? 'Olahan cita rasa otentik buatan Suka Nicky.' }}
                            </p>
                        </div>
                    </div>

                    <!-- Harga & Tombol Tambah -->
                    <div class="px-4 pb-4 flex items-center justify-between">
                        <span class="text-base font-extrabold text-[#1E2029]">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                        
                        <button @click="addToCart({{ json_encode($product) }})" 
                                class="w-9 h-9 bg-[#A04618] hover:bg-[#853812] text-white rounded-full flex items-center justify-center transition shadow-xs cursor-pointer"
                                title="Tambah ke Keranjang">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-slate-400">
                    Belum ada produk favorit dari database.
                </div>
            @endforelse
        </div>

    </div>
</section>
    

    <!-- 5. KISAH KAMI -->
    <section id="tentang" class="bg-slate-900 text-white py-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <div class="aspect-4/3 rounded-3xl overflow-hidden bg-slate-800 border-2 border-slate-700 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&q=80&w=800" alt="Ibu Sukini Suka Nicky" class="w-full h-full object-cover opacity-90">
                </div>
                <div class="absolute -bottom-6 -right-6 bg-amber-800 text-amber-100 p-5 rounded-2xl text-xs max-w-xs shadow-xl hidden sm:block border border-amber-600">
                    <p class="italic">"Kualitas dan kejujuran rasa adalah doa dalam setiap resep olahan kami."</p>
                    <span class="block mt-2 font-bold text-amber-300">— Ibu Sukini (Perintis Suka Nicky)</span>
                </div>
            </div>

            <div class="space-y-6">
                <span class="text-amber-400 text-xs font-extrabold uppercase tracking-widest">Kisah & Milestone</span>
                <h2 class="text-3xl font-extrabold">Dari Dapur Gumiwang ke Seluruh Nusantara</h2>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Berawal dari usaha keripik pisang rumahan pada tahun 1996, Ibu Sukini mengembangkan inovasi keripik tempe berbalut tepung mocaf sejak 2004. Perjalanan ini melahirkan merek <strong>Suka Nicky</strong> yang konsisten memberdayakan petani lokal Desa Gumiwang.
                </p>

                <div class="space-y-3 pt-2">
                    <div class="flex items-start gap-3">
                        <span class="bg-amber-500/20 text-amber-400 font-bold px-2.5 py-1 rounded text-xs border border-amber-500/30">1996</span>
                        <p class="text-xs text-slate-300">Rintisan awal usaha makanan ringan rumahan di Banjarnegara.</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="bg-amber-500/20 text-amber-400 font-bold px-2.5 py-1 rounded text-xs border border-amber-500/30">2004</span>
                        <p class="text-xs text-slate-300">Pelopor penggunaan Tepung Mocaf lokal untuk keripik tempe renyah.</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="bg-amber-500/20 text-amber-400 font-bold px-2.5 py-1 rounded text-xs border border-amber-500/30">2023</span>
                        <p class="text-xs text-slate-300">Produk Abon Ikan Suka Nicky resmi masuk jaringan toko Indomaret.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. GUBUG KULINER SPOTLIGHT -->
    <section id="gubug" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="bg-gradient-to-r from-amber-900 to-slate-900 rounded-3xl p-8 sm:p-12 text-white shadow-2xl relative overflow-hidden">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="space-y-4">
                    <span class="bg-amber-500 text-slate-950 font-extrabold text-[10px] px-3 py-1 rounded-full uppercase">Kuliner Dine-In</span>
                    <h2 class="text-2xl sm:text-4xl font-extrabold">Gubug Suka Nicky</h2>
                    <p class="text-amber-100 text-xs sm:text-sm leading-relaxed">
                        Nikmati santapan khas Banjarnegara dengan suasana pedesaan yang asri di Desa Gumiwang. Sajian unggulan Ikan Patin Asap, Nasi Krekel, dan Es Dawet Ayu siap memanjakan lidah Anda.
                    </p>
                    <div class="pt-2">
                        <a href="https://maps.app.goo.gl/7RwZBqbxb8ahMeop7" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-6 py-3 rounded-xl text-xs transition shadow-lg shadow-amber-500/20">
                            📍 Petunjuk Arah Lokasi Warung
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="aspect-square rounded-xl bg-amber-800/50 overflow-hidden border border-amber-700/50">
                        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&q=80&w=400" alt="Gubug Kuliner 1" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-xl bg-amber-800/50 overflow-hidden border border-amber-700/50">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=400" alt="Gubug Kuliner 2" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. CARA PESAN -->
    <section class="bg-white py-16 border-y border-slate-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-extrabold text-slate-900">Cara Mudah Pemesanan</h2>
            <p class="text-slate-500 text-xs sm:text-sm mt-1 mb-12">Tanpa ribet buat akun, langsung terhubung ke WhatsApp Admin</p>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 space-y-3">
                    <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-800 font-extrabold text-lg flex items-center justify-center mx-auto">1</div>
                    <h3 class="font-bold text-slate-900 text-sm">Pilih Produk</h3>
                    <p class="text-xs text-slate-500">Pilih varian keripik atau oleh-oleh kesukaanmu dari katalog web.</p>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 space-y-3">
                    <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-800 font-extrabold text-lg flex items-center justify-center mx-auto">2</div>
                    <h3 class="font-bold text-slate-900 text-sm">Masuk Keranjang</h3>
                    <p class="text-xs text-slate-500">Cek ulang jumlah pesananmu di tombol keranjang bagian atas.</p>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 space-y-3">
                    <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-800 font-extrabold text-lg flex items-center justify-center mx-auto">3</div>
                    <h3 class="font-bold text-slate-900 text-sm">Kirim ke WhatsApp</h3>
                    <p class="text-xs text-slate-500">Klik tombol WA, rincian pesanan otomatis terkirim ke Admin!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. LOKASI TOKO & FOOTER -->
    <footer id="lokasi" class="bg-slate-950 text-slate-400 text-xs py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-amber-800 text-amber-100 flex items-center justify-center font-bold text-lg">
                        SN
                    </div>
                    <span class="text-lg font-bold text-white">Suka Nicky Banjarnegara</span>
                </div>
                <p class="text-slate-400 leading-relaxed">
                    Sentra camilan, oleh-oleh khas, dan warung makan tradisional khas Banjarnegara. Dibuat alami, bersih, dan higienis.
                </p>
            </div>

            <div>
                <span class="text-white font-bold block mb-4 text-sm">Alamat Toko & Operasional</span>
                <p class="leading-relaxed mb-2">
                    Desa Gumiwang RT 03 / RW 10, Kecamatan Purwanegara, Kabupaten Banjarnegara, Jawa Tengah 53472
                </p>
                <p class="text-amber-400 font-semibold">Buka Setiap Hari: 08.00 - 20.00 WIB</p>
            </div>

            <div>
                <span class="text-white font-bold block mb-4 text-sm">Kontak & Media Sosial</span>
                <p class="mb-2">WhatsApp: <a :href="getWaMessage()" target="_blank" class="text-emerald-400 font-bold hover:underline">+62 852-2739-3489</a></p>
                <p class="mb-2">Instagram: <a href="https://instagram.com/suka_nicky" target="_blank" class="text-amber-400 hover:underline">@suka_nicky</a></p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 border-t border-slate-900 text-center text-slate-600">
            &copy; 2026 UMKM Suka Nicky Banjarnegara. All Rights Reserved.
        </div>
    </footer>

    <!-- 9. SLIDE-OVER DRAWER KERANJANG DINAMIS -->
    <div x-show="cartOpen" 
         class="fixed inset-0 z-50 overflow-hidden" 
         x-cloak 
         x-transition:enter="transition ease-out duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="transition ease-in duration-200" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0">
        <div @click="cartOpen = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-xs"></div>
        <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
            <div class="w-screen max-w-md bg-white p-6 shadow-2xl flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between border-b pb-4 mb-4">
                        <h3 class="font-bold text-slate-900 text-base">Keranjang Belanja</h3>
                        <button @click="cartOpen = false" class="text-slate-400 hover:text-slate-600 text-2xl font-bold">&times;</button>
                    </div>

                    <!-- Items Container -->
                    <div class="space-y-4 max-h-[60vh] overflow-y-auto pr-1">
                        <template x-if="cart.length === 0">
                            <p class="text-slate-400 text-xs text-center py-8">Keranjang belanja Anda masih kosong.</p>
                        </template>
                        <template x-for="(item, index) in cart" :key="item.id">
                            <div class="flex items-center justify-between border-b pb-3">
                                <div class="flex-1 pr-2">
                                    <span class="font-bold text-xs text-slate-900 block" x-text="item.name"></span>
                                    <span class="text-[10px] text-slate-500" x-text="'Rp ' + item.price.toLocaleString('id-ID')"></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="flex items-center border border-slate-200 rounded-lg overflow-hidden">
                                        <button @click="updateQty(index, -1)" class="px-2 py-0.5 bg-slate-100 text-slate-600 text-xs font-bold hover:bg-slate-200">-</button>
                                        <span class="px-2 text-xs font-bold text-slate-800" x-text="item.qty"></span>
                                        <button @click="updateQty(index, 1)" class="px-2 py-0.5 bg-slate-100 text-slate-600 text-xs font-bold hover:bg-slate-200">+</button>
                                    </div>
                                    <span class="font-extrabold text-xs text-amber-900 w-16 text-right" x-text="'Rp ' + (item.price * item.qty).toLocaleString('id-ID')"></span>
                                    <button @click="removeFromCart(index)" class="text-red-400 hover:text-red-600 text-xs ml-1 font-bold">&times;</button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="border-t pt-4 space-y-3">
                    <div class="flex items-center justify-between text-sm font-bold">
                        <span>Total Estimasi:</span>
                        <span class="text-amber-900 text-base" x-text="'Rp ' + getTotal().toLocaleString('id-ID')"></span>
                    </div>
                    <a :href="getWaMessage()" 
                       target="_blank" 
                       class="block w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-center text-xs rounded-xl shadow-md transition">
                        Checkout via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
