<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Suka Nicky - Oleh-Oleh Khas Banjarnegara' }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#FDFBF7] text-[#1E2029] antialiased min-h-screen flex flex-col justify-between font-sans">

    <!-- Navbar dipanggil sekali di sini -->
    <x-navbar />

    <!-- Tempat isi konten dari tiap halaman dimasukkan -->
    <main class="grow">
        {{ $slot }}
    </main>

    <!-- Footer dipanggil sekali di sini -->
    <x-footer />

</body>
</html>