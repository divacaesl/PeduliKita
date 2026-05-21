<div class="pt-32 pb-12 bg-gray-50 min-h-screen" x-data="{ showDonationSuccess: {{ session()->has('message') ? 'true' : 'false' }}, showPhysicalSuccess: {{ session()->has('physical_message') ? 'true' : 'false' }}, showPhysicalModal: false }">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-12 border border-gray-100">
            <div class="md:flex">
                <!-- Image -->
                <div class="md:w-1/2 h-64 md:h-auto relative">
                    @if($campaign->image)
                        <img src="{{ filter_var($campaign->image, FILTER_VALIDATE_URL) ? $campaign->image : Storage::url($campaign->image) }}" alt="{{ $campaign->title }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Fallback Image" class="w-full h-full object-cover opacity-80">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-dark/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <span class="bg-primary text-dark text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">{{ $campaign->category->name ?? 'Program' }}</span>
                    </div>
                </div>
                
                <!-- Info Box -->
                <div class="md:w-1/2 p-8 lg:p-12 flex flex-col justify-center relative">
                    <h1 class="font-serif text-3xl lg:text-4xl font-bold mb-4 leading-tight text-gray-900">{{ $campaign->title }}</h1>
                    <p class="text-gray-500 mb-8 text-sm">Diselenggarakan oleh <span class="font-semibold text-gray-800">{{ $campaign->user->name }}</span></p>

                    <!-- Progress -->
                    @php
                        $percentage = $campaign->target_amount > 0 ? min(100, ($campaign->current_amount / $campaign->target_amount) * 100) : 0;
                    @endphp
                    <div class="mb-8 p-6 bg-gray-50 rounded-xl border border-gray-100">
                        <div class="flex justify-between items-end mb-3">
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold mb-1">Terkumpul</p>
                                <span class="text-3xl font-bold text-gray-900">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</span>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold mb-1">Target</p>
                                <span class="text-sm font-semibold text-gray-700">Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-primary h-3 rounded-full relative" style="width: {{ $percentage }}%">
                                <div class="absolute -right-2 -top-1.5 w-6 h-6 bg-white rounded-full shadow border-2 border-primary"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Action -->
                    <div>
                        
                        <h3 class="font-bold text-gray-900 mb-3 text-lg">Pilih Nominal Donasi</h3>
                        <div class="grid grid-cols-3 gap-3 mb-4">
                            <button wire:click="setAmount(50000)" class="border-2 rounded-xl py-3 transition focus:outline-none {{ $amount == 50000 ? 'border-primary bg-primary/10 text-primary font-bold' : 'border-gray-200 text-gray-600 hover:border-primary hover:text-primary' }}">Rp 50k</button>
                            <button wire:click="setAmount(100000)" class="border-2 rounded-xl py-3 transition focus:outline-none {{ $amount == 100000 ? 'border-primary bg-primary/10 text-primary font-bold' : 'border-gray-200 text-gray-600 hover:border-primary hover:text-primary' }}">Rp 100k</button>
                            <button wire:click="setAmount(500000)" class="border-2 rounded-xl py-3 transition focus:outline-none {{ $amount == 500000 ? 'border-primary bg-primary/10 text-primary font-bold' : 'border-gray-200 text-gray-600 hover:border-primary hover:text-primary' }}">Rp 500k</button>
                        </div>
                        <input type="number" placeholder="Nominal Lainnya (min 10000)" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-0 mb-2 text-gray-700 font-medium transition" wire:model="amount">
                        @error('amount') <span class="text-red-500 text-sm mb-4 block font-medium">{{ $message }}</span> @enderror
                        
                        <h3 class="font-bold text-gray-900 mb-3 mt-6 text-lg">Metode Pembayaran</h3>
                        <select wire:model="payment_method" class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-0 text-gray-700 font-medium transition mb-2">
                            <option value="qris">QRIS (Gopay, OVO, Dana, LinkAja)</option>
                            <option value="bca">Bank Transfer - BCA</option>
                            <option value="mandiri">Bank Transfer - Mandiri</option>
                            <option value="bni">Bank Transfer - BNI</option>
                        </select>
                        @error('payment_method') <span class="text-red-500 text-sm mb-4 block font-medium">{{ $message }}</span> @enderror

                        <button wire:click="submitDonation" class="w-full bg-dark text-primary font-bold text-lg py-4 rounded-xl hover:bg-gray-800 hover:text-yellow-400 transition shadow-lg hover:shadow-xl mt-6 flex items-center justify-center group">
                            <span>Donasi Sekarang</span>
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>

                        <div class="relative flex py-5 items-center">
                            <div class="flex-grow border-t border-gray-200"></div>
                            <span class="flex-shrink-0 mx-4 text-gray-400 text-sm font-semibold tracking-wider">ATAU</span>
                            <div class="flex-grow border-t border-gray-200"></div>
                        </div>

                        @auth
                            <button @click="showPhysicalModal = true" class="w-full bg-white text-dark border-2 border-dark font-bold text-lg py-3 rounded-xl hover:bg-gray-50 transition shadow hover:shadow-md flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                <span>Kirim Donasi Barang (Logistik)</span>
                            </button>
                        @else
                            <button wire:click="redirectToLogin" class="w-full bg-white text-dark border-2 border-dark font-bold text-lg py-3 rounded-xl hover:bg-gray-50 transition shadow hover:shadow-md flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                <span>Kirim Donasi Barang (Logistik)</span>
                            </button>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Description & Updates Tabs -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" x-data="{ tab: 'story' }">
            <div class="border-b border-gray-100 bg-gray-50/50">
                <nav class="flex px-6 space-x-2" aria-label="Tabs">
                    <button @click="tab = 'story'" :class="{'border-primary text-gray-900': tab === 'story', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'story'}" class="whitespace-nowrap py-5 px-6 border-b-2 font-bold text-sm transition">Kisah Program</button>
                    <button @click="tab = 'ledger'" :class="{'border-primary text-gray-900': tab === 'ledger', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'ledger'}" class="whitespace-nowrap py-5 px-6 border-b-2 font-bold text-sm transition">Laporan Transparansi</button>
                </nav>
            </div>
            
            <!-- Story Tab -->
            <div x-show="tab === 'story'" class="p-8 md:p-12 prose max-w-none text-gray-600 leading-relaxed text-lg">
                {!! nl2br(e($campaign->description)) !!}
            </div>

            <!-- Ledger Tab -->
            <div x-show="tab === 'ledger'" class="p-8 md:p-12" style="display: none;">
                <div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-center bg-green-50/50 p-6 rounded-xl border border-green-100">
                    <div class="mb-4 md:mb-0">
                        <h4 class="font-bold text-green-900 text-lg mb-1">Total Dana Disalurkan</h4>
                        <p class="text-sm text-green-700">Rincian penggunaan dana donasi secara transparan.</p>
                    </div>
                    <div class="text-left md:text-right">
                        <p class="text-3xl font-bold text-green-700">Rp {{ number_format($campaign->ledgers->sum('amount'), 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="relative border-l-2 border-gray-200 ml-4 space-y-10 pb-4">
                    @forelse($campaign->ledgers as $ledger)
                        <div class="relative pl-10">
                            <!-- Timeline dot -->
                            <div class="absolute w-5 h-5 bg-primary rounded-full -left-[11px] top-1 border-4 border-white shadow-sm"></div>
                            
                            <div class="bg-white border border-gray-100 shadow-sm rounded-xl p-6 hover:shadow-md transition">
                                <div class="flex flex-col md:flex-row justify-between md:items-center mb-4">
                                    <h5 class="font-bold text-gray-900 text-lg mb-2 md:mb-0">{{ $ledger->title }}</h5>
                                    <span class="bg-gray-100 text-gray-800 text-sm font-bold px-3 py-1.5 rounded-lg">Rp {{ number_format($ledger->amount, 0, ',', '.') }}</span>
                                </div>
                                <p class="text-sm text-primary font-bold mb-4 uppercase tracking-wider">{{ $ledger->expense_date->format('d F Y') }}</p>
                                <p class="text-gray-600 leading-relaxed">{{ $ledger->description }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="pl-10 text-gray-500 italic">
                            Belum ada laporan penyaluran dana. Dana saat ini masih dikumpulkan.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

    <!-- Donation Success Modal -->
    <div x-show="showDonationSuccess" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="showDonationSuccess" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true" @click="showDonationSuccess = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div x-show="showDonationSuccess" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-2xl text-center overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md w-full p-8">
                <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-50 mb-6">
                    <svg class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-3xl leading-6 font-bold text-gray-900 mb-4">Donasi Berhasil!</h3>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">Terima kasih atas kebaikan hati Anda. Donasi akan segera disalurkan ke pihak yang membutuhkan.</p>
                <button @click="showDonationSuccess = false" class="w-full inline-flex justify-center rounded-xl border border-transparent px-6 py-4 bg-primary text-lg font-bold text-dark shadow-sm hover:bg-yellow-400 focus:outline-none transition">
                    Lanjutkan
                </button>
            </div>
        </div>
    </div>

    <!-- Physical Donation Modal -->
    <div x-show="showPhysicalModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="showPhysicalModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true" @click="showPhysicalModal = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div x-show="showPhysicalModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                
                <div class="bg-dark px-6 py-6 border-b border-gray-700 relative">
                    <button @click="showPhysicalModal = false" class="absolute top-6 right-6 text-gray-400 hover:text-white">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                    <h3 class="text-2xl leading-6 font-bold text-white" id="modal-title">Donasi Barang Fisik</h3>
                    <p class="text-gray-400 mt-2 text-sm">Kirim obat-obatan, pakaian, atau makanan melalui kurir ekspedisi.</p>
                </div>
                
                <form wire:submit.prevent="submitPhysicalDonation">
                    <div class="px-6 py-6 bg-white space-y-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Barang yang Dikirim</label>
                            <textarea wire:model="item_description" rows="2" required class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-0 text-gray-700 transition" placeholder="Contoh: 1 Dus Pakaian Bekas Layak Pakai"></textarea>
                            @error('item_description') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Pilih Kurir Ekspedisi</label>
                            <select wire:model="shipping_provider" required class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-0 text-gray-700 transition font-medium">
                                <option value="JNE">JNE</option>
                                <option value="J&T Express">J&T Express</option>
                                <option value="Pos Indonesia">Pos Indonesia</option>
                                <option value="SiCepat">SiCepat</option>
                                <option value="GoSend / GrabExpress">GoSend / GrabExpress</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            @error('shipping_provider') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor Resi / Lacak</label>
                            <input type="text" wire:model="tracking_number" required class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:border-primary focus:ring-0 text-gray-700 transition" placeholder="Masukkan Nomor Resi">
                            @error('tracking_number') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="bg-gray-50 px-6 py-5 border-t border-gray-100 flex flex-row-reverse">
                        <button type="submit" @click="setTimeout(() => { if (!@this.hasErrors) showPhysicalModal = false }, 500)" class="w-full sm:w-auto sm:ml-3 inline-flex justify-center rounded-xl border border-transparent px-6 py-3 bg-primary text-base font-bold text-dark shadow-sm hover:bg-yellow-400 focus:outline-none transition">Kirim Bukti Resi</button>
                        <button type="button" @click="showPhysicalModal = false" class="mt-3 sm:mt-0 w-full sm:w-auto inline-flex justify-center rounded-xl border border-gray-300 px-6 py-3 bg-white text-base font-bold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none transition">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Physical Donation Success Modal -->
    <div x-show="showPhysicalSuccess" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="showPhysicalSuccess" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true" @click="showPhysicalSuccess = false"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div x-show="showPhysicalSuccess" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-2xl text-center overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md w-full p-8">
                <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-50 mb-6">
                    <svg class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-3xl leading-6 font-bold text-gray-900 mb-4">Resi Tersimpan!</h3>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">Anda dapat melacak status pengiriman dan bukti penerimaan foto/video dari Dasbor Anda.</p>
                <button @click="showPhysicalSuccess = false" class="w-full inline-flex justify-center rounded-xl border border-transparent px-6 py-4 bg-primary text-lg font-bold text-dark shadow-sm hover:bg-yellow-400 focus:outline-none transition">
                    Mengerti
                </button>
            </div>
        </div>
    </div>
</div>
