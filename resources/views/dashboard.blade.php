<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between" data-aos="fade-down">
            <div>
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                    {{ __('Pusat Donasi') }}
                </h2>
                <p class="mt-2 text-gray-500">Lacak dampak dari setiap kebaikanmu.</p>
            </div>
            <div class="hidden md:flex space-x-3 mt-4 md:mt-0">
                <a href="{{ route('campaigns.index') }}" class="bg-primary text-dark font-semibold px-6 py-3 rounded hover:bg-yellow-400 transition shadow-md">Jelajahi Program</a>
                <a href="{{ route('campaigns.create') }}" class="bg-white text-dark font-semibold px-6 py-3 border border-gray-200 rounded hover:bg-gray-50 transition shadow-sm">Mulai Galang Dana</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-dark to-gray-800 rounded-2xl shadow-xl overflow-hidden mb-12" data-aos="zoom-in" data-aos-delay="100">
                <div class="p-8 md:p-12 text-white relative">
                    <div class="relative z-10">
                        <h3 class="text-2xl font-serif mb-2">Selamat datang kembali, {{ auth()->user()->name }}!</h3>
                        <p class="text-gray-300 max-w-xl mb-10">Kontribusimu membantu mengubah hidup banyak orang. Setiap donasi, berapapun jumlahnya, membawa gelombang harapan besar.</p>
                        
                        <!-- Animated Stats Section -->
                        <div class="grid grid-cols-3 gap-8 border-t border-gray-700 pt-8" x-data="statsAnimation()">
                            <div>
                                <div class="flex items-baseline text-primary font-serif mb-1">
                                    <span class="text-4xl md:text-5xl font-bold" x-text="donorsFormatted">0</span>
                                    <span class="text-2xl md:text-3xl font-bold ml-1">+</span>
                                </div>
                                <div class="text-xs md:text-sm text-gray-400 font-bold uppercase tracking-widest">Orang Berdonasi</div>
                            </div>
                            <div>
                                <div class="flex items-baseline text-primary font-serif mb-1">
                                    <span class="text-4xl md:text-5xl font-bold" x-text="helpedFormatted">0</span>
                                    <span class="text-2xl md:text-3xl font-bold ml-1">+</span>
                                </div>
                                <div class="text-xs md:text-sm text-gray-400 font-bold uppercase tracking-widest">Orang Terbantu</div>
                            </div>
                            <div>
                                <div class="flex items-baseline text-primary font-serif mb-1">
                                    <span class="text-4xl md:text-5xl font-bold" x-text="progress">0</span>
                                    <span class="text-2xl md:text-3xl font-bold ml-1">%</span>
                                </div>
                                <div class="text-xs md:text-sm text-gray-400 font-bold uppercase tracking-widest">Progress Program</div>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative Icon -->
                    <div class="absolute right-0 bottom-0 opacity-5 transform translate-x-1/4 translate-y-1/4">
                        <svg class="w-96 h-96 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    </div>
                </div>
            </div>

            <!-- Alpine script for animation -->
            <script>
                function statsAnimation() {
                    return {
                        targetDonors: {{ $totalDonors ?? 15420 }},
                        targetHelped: {{ $totalHelped ?? 8500 }},
                        targetProgress: {{ $totalProgress ?? 87 }},
                        donors: 0,
                        helped: 0,
                        progress: 0,
                        
                        get donorsFormatted() {
                            return Math.floor(this.donors).toLocaleString('id-ID');
                        },
                        get helpedFormatted() {
                            return Math.floor(this.helped).toLocaleString('id-ID');
                        },
                        
                        init() {
                            const duration = 2000; // 2 seconds
                            const interval = 20;
                            const steps = duration / interval;
                            
                            const donorStep = this.targetDonors / steps;
                            const helpedStep = this.targetHelped / steps;
                            const progressStep = this.targetProgress / steps;
                            
                            let currentStep = 0;
                            
                            const timer = setInterval(() => {
                                currentStep++;
                                
                                // Easing out effect
                                const progressRatio = currentStep / steps;
                                const easing = 1 - Math.pow(1 - progressRatio, 3); 
                                
                                this.donors = this.targetDonors * easing;
                                this.helped = this.targetHelped * easing;
                                this.progress = Math.floor(this.targetProgress * easing);
                                
                                if (currentStep >= steps) {
                                    this.donors = this.targetDonors;
                                    this.helped = this.targetHelped;
                                    this.progress = this.targetProgress;
                                    clearInterval(timer);
                                }
                            }, interval);
                        }
                    }
                }
            </script>

            <h3 class="text-2xl font-bold text-gray-900 mb-6 font-serif" data-aos="fade-up">Dampak Terbarumu</h3>
            
            @if($donations->isEmpty())
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-50 text-gray-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900 mb-2">Kamu belum melakukan donasi</h4>
                    <p class="text-gray-500 mb-6 max-w-md mx-auto">Mulai perjalanan kebaikanmu hari ini. Banyak program yang membutuhkan dukunganmu.</p>
                    <a href="{{ route('campaigns.index') }}" class="inline-block border border-primary text-primary font-semibold px-6 py-2 rounded hover:bg-primary hover:text-dark transition">Jelajahi Program</a>
                </div>
            @else
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-100">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-8 py-5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Program</th>
                                    <th scope="col" class="px-8 py-5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th scope="col" class="px-8 py-5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jumlah</th>
                                    <th scope="col" class="px-8 py-5 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @foreach($donations as $donation)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-8 py-5 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 flex-shrink-0 rounded-md overflow-hidden bg-gray-200">
                                                    @if($donation->campaign->image)
                                                        <img class="h-full w-full object-cover" src="{{ filter_var($donation->campaign->image, FILTER_VALIDATE_URL) ? $donation->campaign->image : Storage::url($donation->campaign->image) }}" alt="">
                                                    @else
                                                        <div class="h-full w-full flex items-center justify-center text-gray-400">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="ml-4">
                                                    <a href="{{ route('campaigns.show', $donation->campaign->slug) }}" class="text-sm font-bold text-gray-900 hover:text-primary transition">
                                                        {{ $donation->campaign->title }}
                                                    </a>
                                                    @if($donation->campaign->category)
                                                        <div class="text-xs text-gray-500 mt-1 uppercase tracking-wider">{{ $donation->campaign->category->name }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-5 whitespace-nowrap text-sm text-gray-500">
                                            {{ $donation->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="px-8 py-5 whitespace-nowrap text-sm font-bold text-gray-900">
                                            Rp {{ number_format($donation->amount, 0, ',', '.') }}
                                        </td>
                                        <td class="px-8 py-5 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $donation->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ ucfirst($donation->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Tracking Donasi Barang -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12" data-aos="fade-up" data-aos-delay="300">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 font-serif">Pelacakan Donasi Barang (Logistik)</h3>
            
            @if(isset($physicalDonations) && $physicalDonations->isEmpty())
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center">
                    <p class="text-gray-500">Anda belum memiliki pengiriman donasi barang fisik.</p>
                </div>
            @elseif(isset($physicalDonations))
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($physicalDonations as $pd)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col relative overflow-hidden group hover:shadow-md transition">
                            <!-- Status Badge -->
                            <div class="absolute top-0 right-0 px-4 py-1 rounded-bl-xl font-bold text-xs uppercase tracking-wider
                                {{ $pd->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $pd->status === 'shipped' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $pd->status === 'received' ? 'bg-green-100 text-green-800' : '' }}
                            ">
                                @if($pd->status === 'pending') Menunggu @endif
                                @if($pd->status === 'shipped') Sedang Dikirim @endif
                                @if($pd->status === 'received') Diterima @endif
                            </div>

                            <div class="mb-4 pr-24">
                                <h4 class="font-bold text-gray-900 text-lg line-clamp-1">{{ $pd->campaign->title ?? 'Program Terhapus' }}</h4>
                                <p class="text-xs text-gray-400 mt-1">{{ $pd->created_at->format('d M Y') }}</p>
                            </div>
                            
                            <div class="bg-gray-50 rounded-xl p-4 mb-4 flex-grow border border-gray-100">
                                <div class="mb-2">
                                    <span class="text-xs text-gray-400 block uppercase font-bold tracking-wider mb-1">Deskripsi Barang</span>
                                    <p class="text-sm font-semibold text-gray-800">{{ $pd->item_description }}</p>
                                </div>
                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <span class="text-xs text-gray-400 block uppercase font-bold tracking-wider mb-1">Kurir</span>
                                        <p class="text-sm font-semibold text-gray-800">{{ $pd->shipping_provider }}</p>
                                    </div>
                                    <div>
                                        <span class="text-xs text-gray-400 block uppercase font-bold tracking-wider mb-1">No. Resi</span>
                                        <p class="text-sm font-mono font-bold text-gray-800">{{ $pd->tracking_number }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            @if($pd->status === 'received')
                                <!-- Proof of Receipt -->
                                <div class="mt-auto border-t border-gray-100 pt-4" x-data="{ showProof: false }">
                                    <p class="text-xs text-green-600 font-bold flex items-center mb-2">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        Barang telah diterima pada {{ $pd->received_at ? $pd->received_at->format('d M Y') : '' }}
                                    </p>
                                    @if($pd->proof_image)
                                        <button @click="showProof = true" class="w-full bg-dark text-white text-sm font-bold py-2 rounded-lg hover:bg-gray-800 transition flex items-center justify-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            Lihat Bukti Foto
                                        </button>
                                        
                                        <!-- Proof Modal -->
                                        <div x-show="showProof" style="display: none;" class="fixed inset-0 z-[100] overflow-y-auto">
                                            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
                                                <div x-show="showProof" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-90 transition-opacity" @click="showProof = false"></div>
                                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                                                <div x-show="showProof" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl w-full">
                                                    <div class="relative">
                                                        <img src="{{ $pd->proof_image }}" alt="Bukti Penerimaan" class="w-full h-auto max-h-[70vh] object-contain bg-gray-100">
                                                        <button @click="showProof = false" class="absolute top-4 right-4 bg-dark/50 hover:bg-dark text-white rounded-full p-2 transition">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                        </button>
                                                    </div>
                                                    <div class="bg-white px-6 py-4">
                                                        <h3 class="text-lg font-bold text-gray-900 mb-1">Bukti Penerimaan</h3>
                                                        <p class="text-sm text-gray-500">Donasi Anda telah diterima oleh pihak kampanye.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <!-- Developer API Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 mb-12" data-aos="fade-up" data-aos-delay="400">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 font-serif">Developer API</h3>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h4 class="text-lg font-bold text-gray-900">API Key Anda</h4>
                        <p class="text-sm text-gray-500">Gunakan API Key ini untuk mengakses PeduliKita External API via Postman atau aplikasi eksternal lainnya.</p>
                    </div>
                    <form action="{{ route('api-key.generate') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-primary text-dark font-semibold px-4 py-2 rounded hover:bg-yellow-400 transition shadow-sm">
                            {{ auth()->user()->api_key ? 'Regenerate API Key' : 'Generate API Key' }}
                        </button>
                    </form>
                </div>
                
                @if(session('status'))
                    <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4 text-sm font-semibold">
                        {{ session('status') }}
                    </div>
                @endif
                
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                    <code class="text-sm font-mono text-gray-800 break-all select-all">
                        {{ auth()->user()->api_key ?? 'Belum ada API Key. Silakan generate.' }}
                    </code>
                    @if(auth()->user()->api_key)
                        <button onclick="navigator.clipboard.writeText('{{ auth()->user()->api_key }}'); alert('API Key disalin!');" class="ml-4 text-gray-500 hover:text-primary transition p-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        </button>
                    @endif
                </div>
                
                <div class="mt-6 text-sm text-gray-600">
                    <p class="font-bold mb-2">Endpoint Tersedia (Testing Postman):</p>
                    <ul class="list-disc list-inside space-y-1 ml-2">
                        <li><span class="font-mono bg-gray-100 px-1 py-0.5 rounded text-xs text-pink-600">POST /api/login</span> - Login untuk mendapatkan JWT Token</li>
                        <li><span class="font-mono bg-gray-100 px-1 py-0.5 rounded text-xs text-blue-600">GET /api/campaigns/basic</span> - Membutuhkan Basic Auth</li>
                        <li><span class="font-mono bg-gray-100 px-1 py-0.5 rounded text-xs text-blue-600">GET /api/campaigns/apikey</span> - Membutuhkan Header: <code class="text-xs">X-API-KEY</code></li>
                        <li><span class="font-mono bg-gray-100 px-1 py-0.5 rounded text-xs text-blue-600">GET /api/campaigns/jwt</span> - Membutuhkan Header: <code class="text-xs">Authorization: Bearer {token}</code></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
