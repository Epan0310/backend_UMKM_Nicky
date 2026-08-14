<footer class="bg-[#181A20] text-white py-10 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
        <div>
            <h3 class="font-bold text-base text-white">Suka Nicky</h3>
            <p class="text-xs text-slate-400 mt-1">© {{ date('Y') }} Suka Nicky Banjarnegara. Citarasa Tradisi Desa Gumiwang.</p>
        </div>
        <div class="flex space-x-6 text-xs text-slate-300">
            <a href="{{ route('tentang') }}" class="hover:text-amber-400 transition">Tentang Kami</a>
            <a href="{{ route('katalog') }}" class="hover:text-amber-400 transition">Katalog Produk</a>
            <a href="{{ url('/#lokasi') }}" class="hover:text-amber-400 transition">Lokasi Toko</a>
        </div>
    </div>
</footer>