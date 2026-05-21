<x-public-layout>
    <!-- Hero Section -->
    <div class="relative bg-dark text-white min-h-screen flex flex-col pt-24">

        <!-- Hero Content -->
        <!-- Adding a placeholder background image with an overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Hero Background" class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-b from-dark/80 via-dark/40 to-dark"></div>
        </div>

        <div class="relative z-10 flex-grow flex items-center justify-center text-center px-4 pt-32">
            <div class="max-w-3xl" data-aos="fade-up">
                <h1 class="font-serif text-5xl md:text-7xl font-bold mb-6">Harapan Untuk Kemanusiaan</h1>
                <p class="text-gray-300 text-sm md:text-base leading-relaxed mb-10 max-w-2xl mx-auto">
                    Bersama kita bisa membuat perubahan nyata. Setiap donasi Anda adalah langkah kecil yang membawa harapan besar bagi mereka yang membutuhkan. Mari wujudkan dunia yang lebih baik.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('login') }}" class="bg-primary text-dark font-semibold px-8 py-4 w-full sm:w-auto hover:bg-yellow-400 transition">Donasi Sekarang</a>
                    <a href="#discover" class="bg-gray-900 border border-gray-700 text-white font-semibold px-8 py-4 w-full sm:w-auto hover:bg-gray-800 transition">Jelajahi Program</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-white py-16 md:py-24 relative z-20 -mt-20 mx-4 md:mx-16 rounded-xl shadow-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center border-b border-gray-100 pb-12">
                <!-- Feature 1 -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="flex justify-center mb-4">
                        <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"></path></svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold mb-3">Pangan Sehat</h3>
                    <p class="text-gray-500 text-sm mb-4">Menyalurkan bantuan makanan bergizi untuk keluarga prasejahtera agar terhindar dari gizi buruk.</p>
                    <a href="{{ route('campaigns.index', ['category' => 'pangan-sehat']) }}" class="text-xs uppercase tracking-wider text-gray-400 hover:text-dark underline decoration-1 underline-offset-4">Mulai Berdonasi</a>
                </div>
                <!-- Feature 2 -->
                <div data-aos="fade-up" data-aos-delay="200">
                    <div class="flex justify-center mb-4">
                        <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold mb-3">Pendidikan</h3>
                    <p class="text-gray-500 text-sm mb-4">Membangun sekolah dan menyediakan buku bagi anak-anak di pelosok negeri agar meraih cita-citanya.</p>
                    <a href="{{ route('campaigns.index', ['category' => 'pendidikan']) }}" class="text-xs uppercase tracking-wider text-gray-400 hover:text-dark underline decoration-1 underline-offset-4">Mulai Berdonasi</a>
                </div>
                <!-- Feature 3 -->
                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="flex justify-center mb-4">
                        <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold mb-3">Kesehatan</h3>
                    <p class="text-gray-500 text-sm mb-4">Bantuan pengobatan dan fasilitas medis untuk saudara kita yang sedang berjuang melawan penyakit kronis.</p>
                    <a href="{{ route('campaigns.index', ['category' => 'kesehatan']) }}" class="text-xs uppercase tracking-wider text-gray-400 hover:text-dark underline decoration-1 underline-offset-4">Mulai Berdonasi</a>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center pt-12">
                <!-- Feature 4 -->
                <div data-aos="fade-up" data-aos-delay="400">
                    <div class="flex justify-center mb-4">
                        <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11.25l1.5 1.5.75-.75V8.758l2.276-.61a3 3 0 10-3.675-3.675l-.61 2.277H12l-.75.75 1.5 1.5M15 11.25l-8.47 8.47c-.34.34-.8.53-1.28.53s-.94-.19-1.28-.53l-.97-.97c-.34-.34-.53-.8-.53-1.28s.19-.94.53-1.28l8.47-8.47m0 0l2.5 2.5m-3-3l1.5-1.5"></path></svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold mb-3">Air Bersih</h3>
                    <p class="text-gray-500 text-sm mb-4">Menyediakan akses sumur air bersih dan sanitasi layak bagi desa-desa yang mengalami kekeringan ekstrem.</p>
                    <a href="{{ route('campaigns.index', ['category' => 'air-bersih']) }}" class="text-xs uppercase tracking-wider text-gray-400 hover:text-dark underline decoration-1 underline-offset-4">Mulai Berdonasi</a>
                </div>
                <!-- Feature 5 -->
                <div data-aos="fade-up" data-aos-delay="500">
                    <div class="flex justify-center mb-4">
                        <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path></svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold mb-3">Kasih Sayang</h3>
                    <p class="text-gray-500 text-sm mb-4">Dukungan psikologis dan bantuan sosial untuk panti asuhan, kaum difabel, serta lansia terlantar.</p>
                    <a href="{{ route('campaigns.index', ['category' => 'kasih-sayang']) }}" class="text-xs uppercase tracking-wider text-gray-400 hover:text-dark underline decoration-1 underline-offset-4">Pelajari & Ikut Serta</a>
                </div>
                <!-- Feature 6 -->
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="flex justify-center mb-4">
                        <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="font-serif text-xl font-bold mb-3">Bantuan Bencana</h3>
                    <p class="text-gray-500 text-sm mb-4">Respons cepat tanggap darurat bencana alam, distribusi tenda, obat-obatan, dan pemulihan pasca-bencana.</p>
                    <a href="{{ route('campaigns.index', ['category' => 'bantuan-bencana']) }}" class="text-xs uppercase tracking-wider text-gray-400 hover:text-dark underline decoration-1 underline-offset-4">Mulai Berdonasi</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Causes -->
    <div id="discover" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-serif text-4xl font-bold mb-4">Program Pilihan</h2>
                <p class="text-xs tracking-[0.2em] text-gray-500 uppercase">KAMI MENDENGAR DAN PEDULI</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Cause 1 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md group hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Cause 1" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <!-- Progress bar mock -->
                        <div class="absolute bottom-0 left-0 w-full bg-gray-200 h-1">
                            <div class="bg-primary h-1 w-[75%]"></div>
                        </div>
                    </div>
                    <div class="p-8 text-center">
                        <h3 class="font-serif text-2xl font-bold mb-4 line-clamp-2">Bantu Pembangunan Fasilitas Air Bersih di NTT</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">Warga desa di pelosok NTT harus berjalan 5 kilometer setiap hari hanya untuk mendapatkan air bersih. Mari bantu bangun sumur bor untuk mereka.</p>
                        <a href="{{ route('campaigns.index') }}" class="inline-block border-b-2 border-dark font-semibold text-sm pb-1 hover:text-primary hover:border-primary transition">Donasi untuk program ini</a>
                    </div>
                </div>

                <!-- Cause 2 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md group hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Cause 2" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute bottom-0 left-0 w-full bg-gray-200 h-1">
                            <div class="bg-primary h-1 w-[45%]"></div>
                        </div>
                    </div>
                    <div class="p-8 text-center">
                        <h3 class="font-serif text-2xl font-bold mb-4 line-clamp-2">Beasiswa Untuk Anak Yatim Piatu Berprestasi</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">Ratusan anak yatim berprestasi terancam putus sekolah. Dukunganmu akan membantu mereka meraih cita-cita dan masa depan yang lebih baik.</p>
                        <a href="{{ route('campaigns.index') }}" class="inline-block border-b-2 border-dark font-semibold text-sm pb-1 hover:text-primary hover:border-primary transition">Donasi untuk program ini</a>
                    </div>
                </div>

                <!-- Cause 3 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md group hover:shadow-xl transition duration-300" data-aos="fade-up" data-aos-delay="300">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1518398046578-8cca57782e17?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Cause 3" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute bottom-0 left-0 w-full bg-gray-200 h-1">
                            <div class="bg-primary h-1 w-[90%]"></div>
                        </div>
                    </div>
                    <div class="p-8 text-center">
                        <h3 class="font-serif text-2xl font-bold mb-4 line-clamp-2">Renovasi Panti Asuhan Tunas Bangsa</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">Panti asuhan Tunas Bangsa mengalami kerusakan parah akibat badai. Mari bantu perbaiki rumah mereka agar anak-anak bisa tidur dengan aman dan nyaman.</p>
                        <a href="{{ route('campaigns.index') }}" class="inline-block border-b-2 border-dark font-semibold text-sm pb-1 hover:text-primary hover:border-primary transition">Donasi untuk program ini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-public-layout>
