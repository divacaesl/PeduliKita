<div>
    <!-- Hero Section -->
    <div class="relative bg-dark text-white min-h-[50vh] flex flex-col items-center justify-center text-center pt-40 pb-24">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Campaigns Hero" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-dark/90 via-dark/60 to-gray-50"></div>
        </div>

        <div class="relative z-10 max-w-3xl px-4" data-aos="fade-down">
            <p class="text-primary font-bold tracking-widest text-sm mb-4 uppercase">Program Kami</p>
            <h1 class="font-serif text-5xl md:text-6xl font-bold mb-6">Jelajahi Program Kebaikan</h1>
            <p class="text-gray-300 text-lg leading-relaxed">Temukan program yang membutuhkan bantuanmu. Bersama kita bisa membuat perbedaan nyata dalam hidup orang lain.</p>
        </div>
    </div>

    <!-- Content Section -->
    <div class="py-16 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($campaigns as $index => $campaign)
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 flex flex-col h-full" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="h-56 overflow-hidden relative">
                        @if($campaign->image)
                            <img src="{{ Storage::url($campaign->image) }}" alt="{{ $campaign->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">Tidak ada gambar</span>
                            </div>
                        @endif
                        <!-- Progress bar mock -->
                        @php
                            $percentage = $campaign->target_amount > 0 ? min(100, ($campaign->current_amount / $campaign->target_amount) * 100) : 0;
                        @endphp
                        <div class="absolute bottom-0 left-0 w-full bg-gray-200 h-1.5">
                            <div class="bg-primary h-1.5" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        @if($campaign->category)
                            <span class="text-xs font-semibold tracking-wider uppercase text-primary mb-2">{{ $campaign->category->name }}</span>
                        @endif
                        <h3 class="font-serif text-xl font-bold mb-3"><a href="{{ route('campaigns.show', $campaign->slug) }}" class="hover:text-primary transition">{{ $campaign->title }}</a></h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">{{ $campaign->description }}</p>
                        
                        <div class="mt-auto">
                            <div class="flex justify-between text-sm mb-4">
                                <span class="font-bold">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</span>
                                <span class="text-gray-500">terkumpul dari Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</span>
                            </div>
                            <a href="{{ route('campaigns.show', $campaign->slug) }}" class="block w-full text-center bg-gray-900 text-white font-semibold py-3 rounded hover:bg-gray-800 transition">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12" data-aos="fade-up">
                    <p class="text-gray-500 text-lg">Belum ada program aktif saat ini.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $campaigns->links() }}
        </div>
    </div>
</div>
