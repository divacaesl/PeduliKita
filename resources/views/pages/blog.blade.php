<x-public-layout title="Blog Kami">
    <!-- Hero Section -->
    <div class="relative bg-dark text-white min-h-[60vh] flex flex-col items-center justify-center text-center pt-40 pb-24">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1455309036818-60085d20e89d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Blog Hero" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-dark/90 via-dark/60 to-gray-50"></div>
        </div>

        <div class="relative z-10 max-w-3xl px-4" data-aos="fade-down">
            <p class="text-primary font-bold tracking-widest text-sm mb-4 uppercase">Berita & Cerita</p>
            <h1 class="font-serif text-5xl md:text-6xl font-bold mb-6">Jurnal Dampak</h1>
            <p class="text-gray-300 text-lg leading-relaxed">Baca kisah inspiratif dari lapangan, pembaruan program utama kami, dan tips tentang cara memaksimalkan dampak bantuanmu.</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Post 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition" data-aos="fade-up" data-aos-delay="100">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Post 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-xs font-bold text-primary uppercase tracking-wider">Pendidikan</span>
                        <h3 class="font-serif font-bold text-xl mt-2 mb-3 text-gray-900">Bagaimana 100 Buku Mengubah Sebuah Desa</h3>
                        <p class="text-gray-600 text-sm mb-4">Temukan efek luar biasa dari sumbangan kecil yang menyediakan perpustakaan keliling ke komunitas terpencil di Papua.</p>
                        <a href="#" class="text-sm font-semibold text-dark hover:text-primary transition">Baca Artikel &rarr;</a>
                    </div>
                </div>

                <!-- Post 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition" data-aos="fade-up" data-aos-delay="200">
                    <img src="https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Post 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-xs font-bold text-primary uppercase tracking-wider">Kesehatan</span>
                        <h3 class="font-serif font-bold text-xl mt-2 mb-3 text-gray-900">Air Bersih Menyelamatkan Nyawa</h3>
                        <p class="text-gray-600 text-sm mb-4">Proyek terbaru kami di Nusa Tenggara Timur telah membawa air bersih yang mudah diakses ke lebih dari 500 keluarga. Baca laporan lengkapnya.</p>
                        <a href="#" class="text-sm font-semibold text-dark hover:text-primary transition">Baca Artikel &rarr;</a>
                    </div>
                </div>

                <!-- Post 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition" data-aos="fade-up" data-aos-delay="300">
                    <img src="https://images.unsplash.com/photo-1551855350-c86caeaf870a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Post 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-xs font-bold text-primary uppercase tracking-wider">Tips & Panduan</span>
                        <h3 class="font-serif font-bold text-xl mt-2 mb-3 text-gray-900">5 Cara Mengenali Kampanye Terpercaya</h3>
                        <p class="text-gray-600 text-sm mb-4">Ingin berdonasi tapi tidak yakin apakah kampanyenya sah? Berikut 5 tanda bahaya dan tanda aman yang harus diperhatikan.</p>
                        <a href="#" class="text-sm font-semibold text-dark hover:text-primary transition">Baca Artikel &rarr;</a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12" data-aos="fade-up">
                <button class="border-2 border-dark text-dark font-bold px-8 py-3 rounded hover:bg-dark hover:text-white transition">Muat Lebih Banyak</button>
            </div>
        </div>
    </div>
</x-public-layout>
