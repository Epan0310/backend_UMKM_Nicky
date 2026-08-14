<!-- NAVBAR COMPONENT (resources/views/components/layouts/navbar.blade.php) -->
<header class="sticky top-0 z-40 bg-[#FDFBF7]/95 backdrop-blur-md border-b border-stone-200/80 shadow-2xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        
        <!-- Brand / Logo (Ukuran Terkunci & Presisi) -->
        <a href="{{ url('/') }}" class="flex items-center gap-3.5 group shrink-0">
            <div class="w-11 h-11 rounded-full overflow-hidden border border-stone-300/80 shadow-xs shrink-0 group-hover:scale-105 transition duration-300">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Suka Nicky" class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col justify-center">
                <span class="text-xl sm:text-2xl font-extrabold text-[#1E2029] leading-none tracking-tight">Suka Nicky</span>
                <span class="text-[11px] font-bold text-[#A04618] mt-1 tracking-wide">Khas Banjarnegara</span>
            </div>
        </a>

        <!-- Desktop Navigation (Deteksi Otomatis Halaman Aktif) -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-semibold">
            <!-- Beranda -->
            <a href="{{ url('/') }}" 
               class="{{ request()->is('/') ? 'text-[#A04618] font-bold border-b-2 border-[#A04618] pb-1' : 'text-slate-600 hover:text-[#A04618] transition' }}">
               Beranda
            </a>

            <!-- Tentang Kami -->
            <a href="{{ route('tentang') }}" 
               class="{{ request()->routeIs('tentang') ? 'text-[#A04618] font-bold border-b-2 border-[#A04618] pb-1' : 'text-slate-600 hover:text-[#A04618] transition' }}">
               Tentang Kami
            </a>

            <!-- Katalog -->
            <a href="{{ route('katalog') }}" class="{{ request()->routeIs('katalog') ? 'text-[#A04618] font-bold border-b-2 border-[#A04618] pb-1' : 'text-slate-600 hover:text-[#A04618]' }} transition">
                Katalog
            </a>

            <!-- Link Anchor Halaman Utama -->
            <a href="{{ url('/#gubug') }}" class="text-slate-600 hover:text-[#A04618] transition">Gubug Kuliner</a>
            <a href="{{ url('/#lokasi') }}" class="text-slate-600 hover:text-[#A04618] transition">Lokasi</a>
        </nav>

        <!-- Right Action Buttons -->
        <div class="flex items-center gap-2 sm:gap-3">
            <!-- WA Button -->
            <a :href="getWaMessage()" target="_blank" class="hidden sm:flex items-center gap-2 bg-[#00A884] hover:bg-[#008f70] text-white px-4 py-2.5 rounded-full text-xs font-bold transition shadow-sm">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                Chat WA Admin
            </a>
            
            <!-- Cart Button -->
            <button @click="cartOpen = true" class="relative p-2.5 rounded-full bg-[#FAF5EF] hover:bg-stone-200/60 text-[#1E2029] border border-stone-200/80 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <span x-show="getTotalCount() > 0" x-text="getTotalCount()" class="absolute -top-1 -right-1 bg-[#A04618] text-white text-[10px] font-bold w-5 h-5 rounded-full flex items-center justify-center border-2 border-white"></span>
            </button>

            <!-- Tombol Hamburger Mobile -->
            <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 rounded-xl text-slate-700 hover:text-[#A04618] hover:bg-[#FAF5EF] transition focus:outline-none">
                <svg x-show="!mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="mobileMenu" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown Nav -->
    <div x-show="mobileMenu" 
         x-cloak 
         x-transition:enter="transition ease-out duration-200" 
         x-transition:enter-start="opacity-0 -translate-y-2" 
         x-transition:enter-end="opacity-100 translate-y-0" 
         x-transition:leave="transition ease-in duration-150" 
         x-transition:leave-start="opacity-100 translate-y-0" 
         x-transition:leave-end="opacity-0 -translate-y-2" 
         class="md:hidden bg-[#FDFBF7] border-t border-stone-200/80 px-4 pt-3 pb-5 space-y-1 font-semibold text-sm text-slate-700 shadow-xl">
        <a href="{{ url('/') }}" @click="mobileMenu = false" class="block py-2.5 px-3 rounded-xl {{ request()->is('/') ? 'bg-[#FAF5EF] text-[#A04618] font-bold' : 'hover:bg-[#FAF5EF] hover:text-[#A04618]' }} transition">Beranda</a>
        <a href="{{ route('tentang') }}" @click="mobileMenu = false" class="block py-2.5 px-3 rounded-xl {{ request()->routeIs('tentang') ? 'bg-[#FAF5EF] text-[#A04618] font-bold' : 'hover:bg-[#FAF5EF] hover:text-[#A04618]' }} transition">Tentang Kami</a>
        <a href="{{ url('/#katalog') }}" @click="mobileMenu = false" class="block py-2.5 px-3 rounded-xl hover:bg-[#FAF5EF] hover:text-[#A04618] transition">Katalog</a>
        <a href="{{ url('/#gubug') }}" @click="mobileMenu = false" class="block py-2.5 px-3 rounded-xl hover:bg-[#FAF5EF] hover:text-[#A04618] transition">Gubug Kuliner</a>
        <a href="{{ url('/#lokasi') }}" @click="mobileMenu = false" class="block py-2.5 px-3 rounded-xl hover:bg-[#FAF5EF] hover:text-[#A04618] transition">Lokasi</a>
    </div>
</header>