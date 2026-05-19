<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PeduliKita') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600|playfair-display:400,600,700" rel="stylesheet" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <div class="min-h-screen flex flex-col">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white border-b border-gray-100 py-10">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>
            
            <!-- Footer -->
            <footer class="bg-dark py-12 text-center text-gray-400 text-sm mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="mb-4">
                        <span class="block text-primary font-bold text-xl tracking-widest leading-none">THE</span>
                        <span class="block text-white font-bold text-xl tracking-widest leading-none">HOPE</span>
                        <span class="block text-primary text-xs tracking-widest">PROJECT</span>
                    </div>
                    <p>&copy; {{ date('Y') }} PeduliKita. All rights reserved.</p>
                </div>
            </footer>
        </div>

        <!-- AOS Animation Script -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                AOS.init({
                    duration: 800,
                    once: true,
                    offset: 50,
                });
            });
        </script>
    </body>
</html>
