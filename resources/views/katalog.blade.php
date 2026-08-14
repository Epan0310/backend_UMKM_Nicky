<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Suka Nicky</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FAF8F5] text-slate-800 antialiased min-h-screen flex flex-col justify-between">

    <!-- Navbar Component (Dipanggil 1x Saja) -->
    <x-navbar />

    <!-- Main Content -->
    <main class="py-8 sm:py-12 grow">
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 pb-6 border-b border-stone-200/70 gap-4">
                <div>
                    <span class="inline-flex items-center gap-1.5 text-[#A04618] text-xs font-bold uppercase tracking-wider bg-[#A04618]/10 px-3 py-1 rounded-full">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 11h14l1 12H4L5 11z"/></svg>
                        Katalog Resmi
                    </span>
                    <h1 class="text-2xl sm:text-4xl font-extrabold text-[#1E2029] tracking-tight mt-2.5">
                        Katalog Oleh-Oleh Suka Nicky
                    </h1>
                    <p class="mt-1.5 text-slate-600 text-sm sm:text-base max-w-2xl">
                        Eksplorasi ragam olahan khas Banjarnegara alami & higienis. Diproduksi langsung dari Desa Gumiwang.
                    </p>
                </div>
                
                <div class="inline-flex items-center gap-2 text-xs text-slate-600 bg-white border border-stone-200/80 px-3.5 py-2 rounded-xl shadow-xs self-start md:self-auto font-medium">
                    <span>Menampilkan</span>
                    <span class="font-extrabold text-[#A04618] bg-[#A04618]/10 px-2 py-0.5 rounded-md">{{ $products->total() }}</span>
                    <span>Produk</span>
                </div>
            </div>

            <!-- Search, Sort & Filter Bar -->
            <form method="GET" action="{{ route('katalog') }}" class="space-y-4 mb-10">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <div class="flex flex-col sm:flex-row gap-3 justify-between items-center">
                    <!-- Search Input -->
                    <div class="relative w-full sm:max-w-md">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="Cari produk (misal: Keripik, Carica)..." 
                               class="w-full bg-white border border-stone-300/80 rounded-xl pl-10 pr-10 py-2.5 text-sm text-[#1E2029] placeholder-slate-400 focus:outline-none focus:border-[#A04618] focus:ring-2 focus:ring-[#A04618]/20 shadow-xs transition duration-200">
                        <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        
                        @if(request('search'))
                            <a href="{{ route('katalog', request()->except('search')) }}" class="absolute right-3 top-2.5 text-slate-400 hover:text-slate-600 p-1 rounded-full hover:bg-stone-100 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </a>
                        @endif
                    </div>

                    <!-- Sorting Dropdown -->
                    <div class="w-full sm:w-auto">
                        <select name="sort" onchange="this.form.submit()" class="w-full sm:w-auto bg-white border border-stone-300/80 rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-700 focus:outline-none focus:border-[#A04618] focus:ring-2 focus:ring-[#A04618]/20 shadow-xs cursor-pointer transition">
                            <option value="terbaru" {{ request('sort') == 'terbaru' || !request('sort') ? 'selected' : '' }}>Sortir: Terbaru</option>
                            <option value="harga_asc" {{ request('sort') == 'harga_asc' ? 'selected' : '' }}>Harga: Terendah</option>
                            <option value="harga_desc" {{ request('sort') == 'harga_desc' ? 'selected' : '' }}>Harga: Tertinggi</option>
                        </select>
                    </div>
                </div>

                <!-- Filter Kategori Pills -->
                <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none [-ms-overflow-style:none] [scrollbar-width:none]">
                    <a href="{{ route('katalog', array_merge(request()->except('category', 'page'))) }}" 
                       class="px-4 py-2 rounded-full text-xs font-bold whitespace-nowrap transition-all duration-200 border {{ !request('category') ? 'bg-[#A04618] text-white border-[#A04618] shadow-xs' : 'bg-white text-slate-600 border-stone-200 hover:bg-stone-100/80' }}">
                        Semua Kategori
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('katalog', array_merge(request()->all(), ['category' => $cat->slug, 'page' => 1])) }}" 
                           class="px-4 py-2 rounded-full text-xs font-bold whitespace-nowrap transition-all duration-200 border {{ request('category') == $cat->slug ? 'bg-[#A04618] text-white border-[#A04618] shadow-xs' : 'bg-white text-slate-600 border-stone-200 hover:bg-stone-100/80' }}">
                            {{ $cat->name }}
                        </a>
                    @endforeach

                    @if(request('category') || request('search') || request('sort'))
                        <a href="{{ route('katalog') }}" class="inline-flex items-center gap-1 text-xs font-bold text-rose-600 hover:text-rose-700 hover:underline ml-2 whitespace-nowrap transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            Reset Filter
                        </a>
                    @endif
                </div>
            </form>

            <!-- Product Grid -->
            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-2xl border border-stone-200/90 shadow-xs hover:shadow-xl hover:border-[#A04618]/40 transition-all duration-300 transform hover:-translate-y-1 flex flex-col group overflow-hidden">
                            
                            <!-- Gambar & Badge -->
                            <div class="relative aspect-square overflow-hidden bg-stone-100">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/600x600/FAF8F5/A04618?text=' . urlencode($product->name) }}" 
                                     alt="{{ $product->name }}" 
                                     onerror="this.onerror=null; this.src='https://placehold.co/600x600/FAF8F5/A04618?text=Suka+Nicky';"
                                     class="w-full h-full object-cover group-hover:scale-105 transition duration-500 ease-out">
                                
                                @if($product->badge)
                                    <span class="absolute top-3 left-3 bg-[#A04618] text-white text-[10px] font-extrabold px-2.5 py-1 rounded-lg shadow-xs uppercase tracking-wider">
                                        {{ $product->badge }}
                                    </span>
                                @endif

                                @if($product->weight)
                                    <span class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-md text-white text-[10px] font-semibold px-2.5 py-1 rounded-md shadow-xs">
                                        {{ $product->weight }}
                                    </span>
                                @endif
                            </div>

                            <!-- Info Produk -->
                            <div class="p-4 sm:p-5 flex flex-col grow justify-between">
                                <div>
                                    <span class="text-[10px] text-[#A04618] font-bold uppercase tracking-wider block mb-1">
                                        {{ $product->category->name ?? 'Khas Banjarnegara' }}
                                    </span>

                                    <h3 class="font-bold text-[#1E2029] text-base leading-snug group-hover:text-[#A04618] transition line-clamp-1">
                                        {{ $product->name }}
                                    </h3>

                                    <p class="text-xs text-slate-500 mt-1.5 line-clamp-2 leading-relaxed">
                                        {{ $product->description ?? 'Olahan cita rasa otentik buatan Suka Nicky Desa Gumiwang.' }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-lg font-extrabold text-[#A04618] mt-4">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </p>

                                    <!-- Tombol Aksi -->
                                    <div class="grid grid-cols-2 gap-2 mt-3 pt-3 border-t border-stone-100">
                                        <button @click="addToCart({{ json_encode($product) }})" 
                                                class="flex items-center justify-center gap-1.5 bg-[#FAF5EF] hover:bg-[#A04618] text-[#1E2029] hover:text-white text-xs font-bold py-2.5 rounded-xl border border-stone-200/80 hover:border-[#A04618] transition duration-200 group/btn cursor-pointer">
                                            <svg class="w-4 h-4 text-[#A04618] group-hover/btn:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 11h14l1 12H4L5 11z"/></svg>
                                            + Keranjang
                                        </button>
                                        
                                        <a href="https://wa.me/6285227393489?text={{ urlencode('Halo Admin Suka Nicky, saya mau pesan ' . $product->name . ' (' . ($product->weight ?? '1 pcs') . ')') }}" 
                                           target="_blank" 
                                           class="flex items-center justify-center gap-1.5 bg-[#00A884] hover:bg-[#008f70] text-white text-xs font-bold py-2.5 rounded-xl transition duration-200 shadow-xs">
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 0C5.39 0 0 5.39 0 12.031c0 2.12.553 4.188 1.606 6.01L0 24l6.104-1.601a11.98 11.98 0 0 0 5.927 1.558h.005c6.64 0 12.031-5.39 12.031-12.031 0-3.213-1.252-6.233-3.526-8.508C18.263 1.253 15.244 0 12.031 0zm0 22.013h-.004a9.96 9.96 0 0 1-5.081-1.396l-.364-.216-3.774.99.1008-3.678-.238-.379a9.957 9.957 0 0 1-1.523-5.3 9.99 9.99 0 0 1 9.99-9.991c2.67 0 5.18 1.04 7.067 2.93 1.886 1.889 2.925 4.398 2.923 7.07 0 5.513-4.481 9.99-9.99 9.99z"/></svg>
                                            Pesan WA
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    {{ $products->appends(request()->query())->links() }}
                </div>
            @else
                <!-- Empty State Modern -->
                <div class="text-center py-16 px-4 bg-white rounded-3xl border border-stone-200/80 shadow-xs max-w-lg mx-auto">
                    <div class="w-16 h-16 bg-[#A04618]/10 text-[#A04618] rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#1E2029]">Produk Tidak Ditemukan</h3>
                    <p class="text-slate-500 text-sm mt-1.5 mb-6">
                        Maaf, produk yang kamu cari belum tersedia atau tidak cocok dengan filter saat ini.
                    </p>
                    <a href="{{ route('katalog') }}" class="inline-flex items-center gap-2 bg-[#A04618] hover:bg-[#853812] text-white text-xs font-bold px-5 py-2.5 rounded-xl transition shadow-xs">
                        Lihat Semua Produk
                    </a>
                </div>
            @endif

        </section>
    </main>

    <!-- Footer Component -->
    <x-footer />

</body>
</html>