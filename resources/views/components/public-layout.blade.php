<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PeduliKita - {{ $title ?? 'Hope For Humanity' }}</title>

    <!-- Fonts & Animations -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600|playfair-display:400,600,700" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50 flex flex-col min-h-screen">

    <!-- Navigation -->
    <nav class="absolute top-0 w-full z-50 flex items-center justify-between px-8 py-6 text-white">
        <div class="flex items-center space-x-6">
            <div class="flex space-x-4 text-sm">
                <a href="#" class="hover:text-primary transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
            </div>
        </div>
        
        <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
            <a href="{{ route('home') }}" class="hover:text-primary transition {{ request()->routeIs('home') ? 'text-primary' : 'text-gray-300' }}">Beranda</a>
            <a href="{{ route('campaigns.index') }}" class="hover:text-primary transition {{ request()->routeIs('campaigns.index') ? 'text-primary' : 'text-gray-300' }}">Program</a>
            <a href="{{ route('about') }}" class="hover:text-primary transition {{ request()->routeIs('about') ? 'text-primary' : 'text-gray-300' }}">Tentang</a>
            
            <a href="{{ route('home') }}" class="text-center mx-4">
                <span class="block text-primary font-bold text-xl tracking-widest leading-none">PEDULI</span>
                <span class="block text-white font-bold text-xl tracking-widest leading-none">KITA</span>
            </a>

            <a href="{{ route('volunteer') }}" class="hover:text-primary transition {{ request()->routeIs('volunteer') ? 'text-primary' : 'text-gray-300' }}">Relawan</a>
            <a href="{{ route('blog') }}" class="hover:text-primary transition {{ request()->routeIs('blog') ? 'text-primary' : 'text-gray-300' }}">Blog</a>
            <a href="{{ route('contact') }}" class="hover:text-primary transition {{ request()->routeIs('contact') ? 'text-primary' : 'text-gray-300' }}">Kontak</a>
        </div>

        <div>
            @auth
                <a href="{{ route('dashboard') }}" class="border border-white/50 px-6 py-2 text-sm uppercase tracking-wider hover:bg-white hover:text-dark transition">Dasbor</a>
            @else
                <a href="{{ route('login') }}" class="border border-white/50 px-6 py-2 text-sm uppercase tracking-wider hover:bg-white hover:text-dark transition">Donasi</a>
            @endauth
        </div>
    </nav>

    {{ $slot }}

    <!-- Footer -->
    <footer class="bg-dark text-white py-16 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div>
                <div class="mb-6">
                    <span class="block text-primary font-bold text-xl tracking-widest leading-none">PEDULI</span>
                    <span class="block text-white font-bold text-xl tracking-widest leading-none">KITA</span>
                </div>
                <p class="text-gray-400 text-sm">Memberdayakan masyarakat dan mengubah kehidupan di seluruh pelosok negeri melalui donasi yang transparan dan berdampak nyata.</p>
            </div>
            <div>
                <h4 class="font-serif font-bold text-lg mb-4">Akses Cepat</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="{{ route('about') }}" class="hover:text-primary transition">Tentang Kami</a></li>
                    <li><a href="{{ route('campaigns.index') }}" class="hover:text-primary transition">Program Donasi</a></li>
                    <li><a href="{{ route('volunteer') }}" class="hover:text-primary transition">Jadi Relawan</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-serif font-bold text-lg mb-4">Legalitas</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-primary transition">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-primary transition">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-serif font-bold text-lg mb-4">Buletin Berita</h4>
                <p class="text-sm text-gray-400 mb-4">Berlangganan untuk mendapatkan kabar terbaru tentang program kami.</p>
                <div class="flex">
                    <input type="email" placeholder="Email Anda" class="bg-gray-800 border-none text-white px-4 py-2 text-sm w-full focus:ring-primary rounded-l-md">
                    <button class="bg-primary text-dark px-4 py-2 text-sm font-bold rounded-r-md">Gabung</button>
                </div>
            </div>
        </div>
        <div class="text-center text-gray-500 text-xs mt-12 border-t border-gray-800 pt-8">
            &copy; {{ date('Y') }} PeduliKita. All rights reserved.
        </div>
    </footer>

    <!-- AOS Animation Script -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true,
                offset: 100,
            });
        });
    </script>
    @livewireScripts
</body>
</html>
