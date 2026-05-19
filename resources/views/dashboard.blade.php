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
                        <p class="text-gray-300 max-w-xl">Kontribusimu membantu mengubah hidup banyak orang. Setiap donasi, berapapun jumlahnya, membawa gelombang harapan besar.</p>
                    </div>
                    <!-- Decorative Icon -->
                    <div class="absolute right-0 bottom-0 opacity-10 transform translate-x-1/4 translate-y-1/4">
                        <svg class="w-64 h-64 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    </div>
                </div>
            </div>

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
                                                        <img class="h-full w-full object-cover" src="{{ Storage::url($donation->campaign->image) }}" alt="">
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
    </div>
</x-app-layout>
