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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-white">
        <div class="flex min-h-screen">
            <!-- Form Section -->
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-8 sm:p-12">
                <div class="w-full max-w-md">
                    <div class="mb-10 text-center lg:text-left">
                        <a href="/" wire:navigate class="inline-block mb-6">
                            <div class="text-center lg:text-left">
                                <span class="block text-primary font-bold text-2xl tracking-widest leading-none">THE</span>
                                <span class="block text-dark font-bold text-2xl tracking-widest leading-none">HOPE</span>
                                <span class="block text-primary text-sm tracking-widest">PROJECT</span>
                            </div>
                        </a>
                        <h2 class="text-3xl font-serif font-bold text-gray-900">Welcome Back</h2>
                        <p class="text-gray-500 mt-2">Sign in to continue your journey of giving.</p>
                    </div>

                    {{ $slot }}
                    
                    @if (request()->routeIs('login'))
                        <div class="mt-8 text-center text-sm text-gray-600">
                            Don't have an account? <a href="{{ route('register') }}" class="font-bold text-primary hover:text-yellow-600 transition" wire:navigate>Create one now</a>
                        </div>
                    @elseif (request()->routeIs('register'))
                        <div class="mt-8 text-center text-sm text-gray-600">
                            Already have an account? <a href="{{ route('login') }}" class="font-bold text-primary hover:text-yellow-600 transition" wire:navigate>Sign in here</a>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Image Section -->
            <div class="hidden lg:block lg:w-1/2 relative bg-dark">
                <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Hope for Humanity" class="absolute inset-0 w-full h-full object-cover opacity-60">
                <div class="absolute inset-0 bg-gradient-to-t from-dark/90 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-16 text-white">
                    <h3 class="font-serif text-4xl font-bold mb-4">"No one has ever become poor by giving."</h3>
                    <p class="text-gray-300 font-medium">— Anne Frank</p>
                </div>
            </div>
        </div>
    </body>
</html>
