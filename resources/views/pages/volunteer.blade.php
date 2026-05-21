<x-public-layout title="Jadi Relawan">
    <div x-data="{ showModal: false, showSuccess: false, role: 'Penyelenggara Acara' }">
        <!-- Hero Section -->
        <div class="relative bg-dark text-white min-h-[60vh] flex flex-col items-center justify-center text-center pt-56 pb-24">
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1559027615-cd4628ce2751?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Volunteer Hero" class="w-full h-full object-cover opacity-30">
                <div class="absolute inset-0 bg-gradient-to-b from-dark/90 via-dark/60 to-gray-50"></div>
            </div>

            <div class="relative z-10 max-w-3xl px-4" data-aos="fade-up">
                <p class="text-primary font-bold tracking-widest text-sm mb-4 uppercase">Bergabung Bersama Kami</p>
                <h1 class="font-serif text-5xl md:text-6xl font-bold mb-6">Jadilah Relawan Hari Ini</h1>
                <p class="text-gray-300 text-lg leading-relaxed">Berikan waktu dan keahlianmu untuk membuat dampak langsung. Bergabunglah dengan komunitas global penggerak perubahan yang berdedikasi menciptakan dunia yang lebih baik.</p>
            </div>
        </div>

        <!-- Content Section -->
        <div class="bg-gray-50 py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="font-serif text-4xl font-bold mb-4 text-gray-900">Bagaimana Anda Bisa Membantu</h2>
                    <p class="text-gray-500 max-w-2xl mx-auto">Kami memiliki berbagai peluang untuk relawan dengan beragam keahlian dan ketersediaan waktu. Temukan peran yang paling sesuai untukmu.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                    <!-- Role 1 -->
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center hover:-translate-y-2 transition duration-300" data-aos="fade-up" data-aos-delay="100">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-50 text-blue-500 mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="font-bold text-xl mb-3 text-gray-900">Penyelenggara Acara</h3>
                        <p class="text-gray-600 text-sm mb-6">Bantu kami merencanakan, mengoordinasikan, dan melaksanakan acara penggalangan dana di komunitas lokalmu.</p>
                        <button @click="role = 'Penyelenggara Acara'; showModal = true" class="text-primary font-bold hover:underline">Daftar Sekarang &rarr;</button>
                    </div>

                    <!-- Role 2 -->
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center hover:-translate-y-2 transition duration-300" data-aos="fade-up" data-aos-delay="200">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-green-50 text-green-500 mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                        </div>
                        <h3 class="font-bold text-xl mb-3 text-gray-900">Promotor Program</h3>
                        <p class="text-gray-600 text-sm mb-6">Gunakan media sosialmu untuk menyebarkan kesadaran tentang kampanye donasi yang mendesak.</p>
                        <button @click="role = 'Promotor Program'; showModal = true" class="text-primary font-bold hover:underline">Daftar Sekarang &rarr;</button>
                    </div>

                    <!-- Role 3 -->
                    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center hover:-translate-y-2 transition duration-300" data-aos="fade-up" data-aos-delay="300">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-yellow-50 text-yellow-500 mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477-4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <h3 class="font-bold text-xl mb-3 text-gray-900">Penulis Konten</h3>
                        <p class="text-gray-600 text-sm mb-6">Tulis kisah dan kabar terbaru kampanye yang menarik untuk membantu mencapai target donasi lebih cepat.</p>
                        <button @click="role = 'Penulis Konten'; showModal = true" class="text-primary font-bold hover:underline">Daftar Sekarang &rarr;</button>
                    </div>
                </div>
                
                <div class="bg-dark rounded-2xl overflow-hidden shadow-2xl relative" data-aos="zoom-in">
                    <div class="absolute inset-0">
                        <img src="https://images.unsplash.com/photo-1529390079861-591de354faf5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Join us" class="w-full h-full object-cover opacity-20">
                    </div>
                    <div class="relative z-10 p-12 md:p-20 text-center text-white">
                        <h2 class="font-serif text-4xl font-bold mb-6">Siap Membuat Perubahan?</h2>
                        <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Isi formulir pendaftaran relawan kami dan tim kami akan segera menghubungimu. Setiap menit yang kamu berikan adalah menit yang mengubah dunia.</p>
                        <button @click="role = 'Pilih Peran'; showModal = true" class="bg-primary text-dark font-bold px-8 py-4 rounded hover:bg-yellow-400 transition text-lg">Kirim Aplikasi</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registration Modal -->
        <div x-show="showModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true" @click="showModal = false"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                
                <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                    
                    <div class="bg-dark px-6 py-6 border-b border-gray-700 relative">
                        <button @click="showModal = false" class="absolute top-6 right-6 text-gray-400 hover:text-white">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                        <h3 class="text-2xl leading-6 font-bold text-white" id="modal-title">Formulir Relawan</h3>
                        <p class="text-gray-400 mt-2 text-sm">Mari bergabung dan beri dampak nyata.</p>
                    </div>
                    
                    <form @submit.prevent="showModal = false; setTimeout(() => { showSuccess = true }, 300)">
                        <div class="px-6 py-6 bg-white space-y-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" required class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-0 text-gray-700 transition" placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Email</label>
                                <input type="email" required class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-0 text-gray-700 transition" placeholder="john@example.com">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Peran yang Diminati</label>
                                <select x-model="role" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-0 text-gray-700 transition font-medium">
                                    <option value="Pilih Peran" disabled>Pilih Peran</option>
                                    <option value="Penyelenggara Acara">Penyelenggara Acara</option>
                                    <option value="Promotor Program">Promotor Program</option>
                                    <option value="Penulis Konten">Penulis Konten</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Mengapa Anda Ingin Bergabung?</label>
                                <textarea rows="3" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-0 text-gray-700 transition" placeholder="Ceritakan motivasi Anda..."></textarea>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-6 py-5 border-t border-gray-100 flex flex-row-reverse">
                            <button type="submit" class="w-full sm:w-auto sm:ml-3 inline-flex justify-center rounded-xl border border-transparent px-6 py-3 bg-primary text-base font-bold text-dark shadow-sm hover:bg-yellow-400 focus:outline-none transition">Kirim Pendaftaran</button>
                            <button type="button" @click="showModal = false" class="mt-3 sm:mt-0 w-full sm:w-auto inline-flex justify-center rounded-xl border border-gray-300 px-6 py-3 bg-white text-base font-bold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none transition">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Success Notification Modal -->
        <div x-show="showSuccess" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showSuccess" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true" @click="showSuccess = false"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                
                <div x-show="showSuccess" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-2xl text-center overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md w-full p-8">
                    <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-50 mb-6">
                        <svg class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-3xl leading-6 font-bold text-gray-900 mb-4">Aplikasi Terkirim!</h3>
                    <p class="text-gray-600 text-lg mb-8 leading-relaxed">Terima kasih atas antusiasme Anda. Tim kami akan segera meninjau dan menghubungi Anda melalui email terkait proses selanjutnya.</p>
                    <button @click="showSuccess = false" class="w-full inline-flex justify-center rounded-xl border border-transparent px-6 py-4 bg-primary text-lg font-bold text-dark shadow-sm hover:bg-yellow-400 focus:outline-none transition">
                        Kembali ke Halaman
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
