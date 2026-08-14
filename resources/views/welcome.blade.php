<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suka Nicky - Oleh-Oleh & Camilan Khas Banjarnegara</title>

    <!-- Tailwind CSS CDN & Alpine.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
        html { scroll-behavior: smooth; }
        section[id], footer[id] { scroll-margin-top: 5.5rem; }
    </style>
</head>
<body class="bg-[#FAF9F6] text-slate-800 antialiased" 
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
              { id: 1, name: 'Keripik Tempe Mocaf', category: 'keripik', price: 15000, badge: 'BEST SELLER', badgeBg: 'bg-amber-500', desc: 'Renyah, gurih, bebas gluten dengan baluran tepung singkong pilihan.', img: 'https://images.unsplash.com/photo-1599490659213-e2b9527bd087?auto=format&fit=crop&q=80&w=400' },
              { id: 2, name: 'Manisan Carica Premium', category: 'carica', price: 20000, badge: 'OLEH-OLEH KHAS', badgeBg: 'bg-emerald-600', desc: 'Buah pepaya Dieng segar dalam racikan sirup manis alami.', img: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&q=80&w=400' },
              { id: 3, name: 'Abon Ikan Gurih', category: 'olahan', price: 25000, badge: 'MITRA INDOMARET', badgeBg: 'bg-amber-800', desc: 'Olahan daging ikan segar berkualitas, cocok untuk lauk praktis.', img: 'https://images.unsplash.com/photo-1589301760014-d929f3979dbc?auto=format&fit=crop&q=80&w=400' },
              { id: 4, name: 'Sale Pisang Madu', category: 'keripik', price: 18000, badge: 'RENYAH', badgeBg: 'bg-amber-500', desc: 'Pisang pilihan diolah dengan lapisan manis legit khas Banjarnegara.', img: 'https://images.unsplash.com/photo-1566478989037-eec170784d0b?auto=format&fit=crop&q=80&w=400' }
          ],
          chatMessages: [
              { sender: 'bot', text: 'Halo! Ada yang bisa kami bantu seputar produk camilan & oleh-oleh Suka Nicky Banjarnegara?' }
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
          },
          sendQuickReply(type) {
              if(type === 'harga') {
                  this.chatMessages.push({ sender: 'user', text: 'Berapa daftar harganya?' });
                  setTimeout(() => {
                      this.chatMessages.push({ sender: 'bot', text: 'Harga produk kami sangat terjangkau, mulai dari Rp 15.000 hingga Rp 25.000 per kemasan.' });
                  }, 400);
              } else if(type === 'lokasi') {
                  this.chatMessages.push({ sender: 'user', text: 'Di mana lokasi tokonya?' });
                  setTimeout(() => {
                      this.chatMessages.push({ sender: 'bot', text: 'Kami berlokasi di Desa Gumiwang RT 03 / RW 10, Kec. Purwanegara, Kab. Banjarnegara.' });
                  }, 400);
              } else if(type === 'pesan') {
                  this.chatMessages.push({ sender: 'user', text: 'Bagaimana cara pemesanan?' });
                  setTimeout(() => {
                      this.chatMessages.push({ sender: 'bot', text: 'Cukup pilih produk di katalog web ini, klik tombol (+), lalu checkout via WhatsApp!' });
                  }, 400);
              }
          }
      }">

    <!-- 1. NAVBAR -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-amber-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Logo -->
            <a href="#" class="flex items-center gap-3 group">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Suka Nicky" class="w-10 h-10 rounded-full object-cover shadow-md shadow-amber-500/20 group-hover:scale-105 transition">
                <div>
                    <span class="text-xl font-bold text-amber-950 block leading-tight">Suka Nicky</span>
                    <span class="text-[10px] text-amber-600 font-semibold tracking-wide">Khas Banjarnegara</span>
                </div>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
                <a href="#" class="text-amber-800 border-b-2 border-amber-600 pb-1">Beranda</a>
                <a href="#tentang" class="hover:text-amber-700 transition">Tentang Kami</a>
                <a href="#katalog" class="hover:text-amber-700 transition">Katalog</a>
                <a href="#gubug" class="hover:text-amber-700 transition">Gubug Kuliner</a>
                <a href="#lokasi" class="hover:text-amber-700 transition">Lokasi</a>
            </nav>

            <!-- Right Action Buttons -->
            <div class="flex items-center gap-2 sm:gap-3">
                <a :href="getWaMessage()" target="_blank" class="hidden sm:flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2.5 rounded-full text-xs font-bold transition shadow-md shadow-emerald-600/20">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Chat WA Admin
                </a>
                
                <button @click="cartOpen = true" class="relative p-2.5 rounded-full bg-amber-50 hover:bg-amber-100 text-amber-800 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span x-show="getTotalCount() > 0" x-text="getTotalCount()" class="absolute -top-1 -right-1 bg-amber-600 text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center border-2 border-white"></span>
                </button>

                <!-- Tombol Hamburger Mobile -->
                <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 rounded-lg text-slate-700 hover:text-amber-800 hover:bg-amber-50 transition focus:outline-none">
                    <svg x-show="!mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Dropdown Menu Mobile -->
        <div x-show="mobileMenu" 
             x-cloak 
             x-transition:enter="transition ease-out duration-200" 
             x-transition:enter-start="opacity-0 -translate-y-2" 
             x-transition:enter-end="opacity-100 translate-y-0" 
             x-transition:leave="transition ease-in duration-150" 
             x-transition:leave-start="opacity-100 translate-y-0" 
             x-transition:leave-end="opacity-0 -translate-y-2" 
             class="md:hidden bg-white border-t border-amber-100 px-4 pt-3 pb-5 space-y-2 font-semibold text-sm text-slate-700 shadow-xl">
            <a href="#" @click="mobileMenu = false" class="block py-2 px-3 rounded-lg hover:bg-amber-50 hover:text-amber-800 transition">Beranda</a>
            <a href="#tentang" @click="mobileMenu = false" class="block py-2 px-3 rounded-lg hover:bg-amber-50 hover:text-amber-800 transition">Tentang Kami</a>
            <a href="#katalog" @click="mobileMenu = false" class="block py-2 px-3 rounded-lg hover:bg-amber-50 hover:text-amber-800 transition">Katalog</a>
            <a href="#gubug" @click="mobileMenu = false" class="block py-2 px-3 rounded-lg hover:bg-amber-50 hover:text-amber-800 transition">Gubug Kuliner</a>
            <a href="#lokasi" @click="mobileMenu = false" class="block py-2 px-3 rounded-lg hover:bg-amber-50 hover:text-amber-800 transition">Lokasi</a>
            
            <div class="pt-2">
                <a :href="getWaMessage()" target="_blank" class="flex sm:hidden items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2.5 rounded-xl text-xs font-bold transition shadow-md">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    Chat WA Admin
                </a>
            </div>
        </div>
    </header>

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
                <div class="w-10 h-10 rounded-full bg-white shadow-sm border border-amber-100 flex items-center justify-center text-amber-700 font-bold">✓</div>
                <span class="text-xs font-bold text-slate-800">100% Halal Alami</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-white shadow-sm border border-amber-100 flex items-center justify-center text-amber-700 font-bold">🌿</div>
                <span class="text-xs font-bold text-slate-800">Inovasi Tepung Mocaf</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-white shadow-sm border border-amber-100 flex items-center justify-center text-amber-700 font-bold">🏪</div>
                <span class="text-xs font-bold text-slate-800">Mitra Indomaret</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <div class="w-10 h-10 rounded-full bg-white shadow-sm border border-amber-100 flex items-center justify-center text-amber-700 font-bold">⭐</div>
                <span class="text-xs font-bold text-slate-800">Resep Warisan 1996</span>
            </div>
        </div>
    </section>

    <!-- 4. PRODUK UNGGULAN KATALOG -->
    <section id="katalog" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-10 gap-4">
            <div>
                <span class="text-amber-700 text-xs font-bold uppercase tracking-wider">Katalog Produk</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Pilihan Favorit Oleh-Oleh</h2>
                <p class="text-slate-500 text-xs sm:text-sm">Diproduksi higienis langsung dari dapur Suka Nicky Desa Gumiwang</p>
            </div>
            <div class="flex items-center gap-2">
                <button @click="selectedCategory = 'all'" :class="selectedCategory === 'all' ? 'bg-amber-800 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50'" class="px-4 py-2 rounded-lg text-xs font-bold transition">Semua</button>
                <button @click="selectedCategory = 'keripik'" :class="selectedCategory === 'keripik' ? 'bg-amber-800 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50'" class="px-4 py-2 rounded-lg text-xs font-semibold transition">Keripik</button>
                <button @click="selectedCategory = 'carica'" :class="selectedCategory === 'carica' ? 'bg-amber-800 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50'" class="px-4 py-2 rounded-lg text-xs font-semibold transition">Carica</button>
                <button @click="selectedCategory = 'olahan'" :class="selectedCategory === 'olahan' ? 'bg-amber-800 text-white' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50'" class="px-4 py-2 rounded-lg text-xs font-semibold transition">Olahan Ikan</button>
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <template x-for="product in products" :key="product.id">
                <div x-show="selectedCategory === 'all' || selectedCategory === product.category" x-transition class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow-lg transition group flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-square rounded-xl bg-slate-100 overflow-hidden mb-3">
                            <span :class="product.badgeBg" class="absolute top-2 left-2 text-white text-[9px] font-extrabold px-2 py-0.5 rounded shadow z-10" x-text="product.badge"></span>
                            <img :src="product.img" :alt="product.name" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <span class="text-[10px] text-amber-700 font-bold block uppercase" x-text="product.category"></span>
                        <h3 class="font-bold text-sm text-slate-900 line-clamp-1" x-text="product.name"></h3>
                        <p class="text-xs text-slate-500 mt-1 line-clamp-2" x-text="product.desc"></p>
                    </div>
                    <div class="mt-4 flex items-center justify-between pt-2 border-t border-slate-100">
                        <span class="font-extrabold text-amber-900 text-base" x-text="'Rp ' + product.price.toLocaleString('id-ID')"></span>
                        <button @click="addToCart(product)" class="w-8 h-8 rounded-full bg-amber-500 hover:bg-amber-600 text-white font-bold flex items-center justify-center transition shadow-md shadow-amber-500/20">+</button>
                    </div>
                </div>
            </template>
        </div>
    </section>

    <!-- 5. KISAH KAMI (TENTANG SUKA NICKY) -->
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
                    Berawal dari usaha keripik pisang rumahan pada tahun 1996, Ibu Sukini mengembangkan inovasi keripik tempe berbalut tepung mocaf sejak 2004. Perjalanan ini melahirkan merek **Suka Nicky** yang konsisten memberdayakan petani lokal Desa Gumiwang.
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
                        <a href="https://maps.google.com" target="_blank" class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-6 py-3 rounded-xl text-xs transition shadow-lg shadow-amber-500/20">
                            📍 Petunjuk Arah Lokasi Warung
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div class="aspect-square rounded-xl bg-amber-800/50 overflow-hidden border border-amber-700/50">
                        <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&q=80&w=400" class="w-full h-full object-cover">
                    </div>
                    <div class="aspect-square rounded-xl bg-amber-800/50 overflow-hidden border border-amber-700/50">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&q=80&w=400" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. CARA PESAN KELUAR -->
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
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Suka Nicky" class="w-10 h-10 rounded-full object-cover shadow-md shadow-amber-500/20">
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

    <!-- 9. SLIDE-OVER CARI KERANJANG DINAMIS -->
    <div x-show="cartOpen" class="fixed inset-0 z-50 overflow-hidden" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div @click="cartOpen = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
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
                    <a :href="getWaMessage()" target="_blank" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white text-center font-bold py-3.5 rounded-xl text-xs transition block shadow-lg shadow-emerald-600/20">
                        Kirim Pesanan ke WhatsApp &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 10. WIDGET FLOATING CHATBOT CS DIGITAL (Pojok Kanan Bawah) -->
    <div class="fixed bottom-6 right-6 z-40">
        <!-- Chat Drawer Window -->
        <div x-show="chatOpen" class="mb-4 w-80 bg-white rounded-2xl shadow-2xl border border-slate-200 overflow-hidden" x-cloak x-transition>
            <div class="bg-amber-500 text-white p-4 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-full bg-white text-amber-600 font-bold flex items-center justify-center text-xs">CS</div>
                    <span class="font-bold text-xs">Asisten Suka Nicky</span>
                </div>
                <button @click="chatOpen = false" class="text-white text-lg font-bold">&times;</button>
            </div>
            
            <div class="p-4 space-y-3 text-xs text-slate-600 h-64 overflow-y-auto bg-slate-50 flex flex-col">
                <template x-for="(msg, idx) in chatMessages" :key="idx">
                    <div :class="msg.sender === 'bot' ? 'bg-white text-slate-700 border-slate-200 self-start' : 'bg-amber-500 text-white self-end'" class="p-3 rounded-xl border shadow-sm max-w-[85%]">
                        <p x-text="msg.text"></p>
                    </div>
                </template>
            </div>

            <div class="p-2 border-t border-slate-100 bg-white flex flex-wrap gap-1">
                <button @click="sendQuickReply('harga')" class="px-2.5 py-1 bg-amber-50 hover:bg-amber-100 text-amber-900 rounded-full text-[10px] font-semibold border border-amber-200 transition">Cek Harga</button>
                <button @click="sendQuickReply('lokasi')" class="px-2.5 py-1 bg-amber-50 hover:bg-amber-100 text-amber-900 rounded-full text-[10px] font-semibold border border-amber-200 transition">Lokasi Toko</button>
                <button @click="sendQuickReply('pesan')" class="px-2.5 py-1 bg-amber-50 hover:bg-amber-100 text-amber-900 rounded-full text-[10px] font-semibold border border-amber-200 transition">Cara Pesan</button>
            </div>
        </div>

        <!-- Trigger Button -->
        <button @click="chatOpen = !chatOpen" class="w-13 h-13 p-3.5 bg-amber-500 hover:bg-amber-600 text-white rounded-full shadow-2xl flex items-center justify-center transition transform active:scale-95">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        </button>
    </div>

</body>
</html>