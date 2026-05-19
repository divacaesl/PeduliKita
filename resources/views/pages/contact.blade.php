<x-public-layout title="Hubungi Kami">
    <!-- Hero Section -->
    <div class="relative bg-dark text-white min-h-[60vh] flex flex-col items-center justify-center text-center pt-40 pb-24">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Contact Hero" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-dark/90 via-dark/60 to-gray-50"></div>
        </div>

        <div class="relative z-10 max-w-3xl px-4" data-aos="zoom-in">
            <p class="text-primary font-bold tracking-widest text-sm mb-4 uppercase">Tetap Terhubung</p>
            <h1 class="font-serif text-5xl md:text-6xl font-bold mb-6">Kami Senang Mendengar Dari Anda</h1>
            <p class="text-gray-300 text-lg leading-relaxed">Apakah Anda memiliki pertanyaan tentang sebuah program, ingin bermitra dengan kami, atau hanya ingin menyapa, tim kami siap menjawab semua pertanyaan Anda.</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <!-- Contact Info -->
                <div data-aos="fade-right">
                    <h2 class="font-serif text-3xl font-bold mb-8 text-gray-900">Informasi Kontak</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900">Kantor Pusat</h4>
                                <p class="text-gray-600 mt-1">123 Hope Avenue, Gedung 4A<br>Jakarta Selatan, Indonesia 12345</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900">Email</h4>
                                <p class="text-gray-600 mt-1">support@pedulikita.com<br>partnerships@pedulikita.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900">Telepon</h4>
                                <p class="text-gray-600 mt-1">+62 812 3456 7890<br>Senin-Jumat, 9.00 - 17.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100" data-aos="fade-left">
                    <form>
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" class="w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                                <input type="email" class="w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                                <textarea rows="4" class="w-full border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"></textarea>
                            </div>
                            <button type="button" class="w-full bg-dark text-white font-bold py-3 rounded hover:bg-gray-800 transition shadow">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
