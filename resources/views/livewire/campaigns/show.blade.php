<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
            <div class="md:flex">
                <!-- Image -->
                <div class="md:w-1/2 h-64 md:h-auto relative">
                    @if($campaign->image)
                        <img src="{{ Storage::url($campaign->image) }}" alt="{{ $campaign->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No Image</span>
                        </div>
                    @endif
                </div>
                
                <!-- Info Box -->
                <div class="md:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                    @if($campaign->category)
                        <span class="text-xs font-semibold tracking-wider uppercase text-primary mb-3">{{ $campaign->category->name }}</span>
                    @endif
                    <h1 class="font-serif text-3xl lg:text-4xl font-bold mb-4">{{ $campaign->title }}</h1>
                    <p class="text-gray-500 mb-6 text-sm">Organized by <span class="font-semibold text-gray-800">{{ $campaign->user->name }}</span></p>

                    <!-- Progress -->
                    @php
                        $percentage = $campaign->target_amount > 0 ? min(100, ($campaign->current_amount / $campaign->target_amount) * 100) : 0;
                    @endphp
                    <div class="mb-6">
                        <div class="flex justify-between items-end mb-2">
                            <span class="text-3xl font-bold">Rp {{ number_format($campaign->current_amount, 0, ',', '.') }}</span>
                            <span class="text-gray-500 text-sm">of Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-primary h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>

                    <!-- Action -->
                    <div class="mt-6">
                        @if (session()->has('message'))
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <h3 class="font-semibold text-gray-800 mb-4">Select Donation Amount</h3>
                        <div class="grid grid-cols-3 gap-3 mb-4">
                            <button wire:click="setAmount(50000)" class="border rounded py-2 transition focus:outline-none {{ $amount == 50000 ? 'border-primary bg-primary/10 text-primary font-medium' : 'border-gray-300 text-gray-600 hover:border-primary hover:text-primary' }}">Rp 50k</button>
                            <button wire:click="setAmount(100000)" class="border rounded py-2 transition focus:outline-none {{ $amount == 100000 ? 'border-primary bg-primary/10 text-primary font-medium' : 'border-gray-300 text-gray-600 hover:border-primary hover:text-primary' }}">Rp 100k</button>
                            <button wire:click="setAmount(500000)" class="border rounded py-2 transition focus:outline-none {{ $amount == 500000 ? 'border-primary bg-primary/10 text-primary font-medium' : 'border-gray-300 text-gray-600 hover:border-primary hover:text-primary' }}">Rp 500k</button>
                        </div>
                        <input type="number" placeholder="Custom Amount (min 10000)" class="w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary mb-2" wire:model="amount">
                        @error('amount') <span class="text-red-500 text-sm mb-4 block">{{ $message }}</span> @enderror
                        <button wire:click="submitDonation" class="w-full bg-dark text-white font-bold text-lg py-4 rounded hover:bg-gray-800 transition shadow-lg hover:shadow-xl mt-4">Donate Now</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Description & Updates Tabs -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden" x-data="{ tab: 'story' }">
            <div class="border-b border-gray-200">
                <nav class="flex -mb-px px-6" aria-label="Tabs">
                    <button @click="tab = 'story'" :class="{'border-primary text-primary': tab === 'story', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'story'}" class="whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm">Story</button>
                    <button @click="tab = 'ledger'" :class="{'border-primary text-primary': tab === 'ledger', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'ledger'}" class="whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm">Transparency Ledger</button>
                </nav>
            </div>
            
            <!-- Story Tab -->
            <div x-show="tab === 'story'" class="p-8 prose max-w-none text-gray-600">
                {!! nl2br(e($campaign->description)) !!}
            </div>

            <!-- Ledger Tab -->
            <div x-show="tab === 'ledger'" class="p-8" style="display: none;">
                <div class="mb-6 flex justify-between items-center bg-green-50 p-4 rounded-lg border border-green-100">
                    <div>
                        <h4 class="font-bold text-green-900">Total Funds Disbursed</h4>
                        <p class="text-sm text-green-700">Detailed breakdown of how your donations are creating impact.</p>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-green-700">Rp {{ number_format($campaign->ledgers->sum('amount'), 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="relative border-l-2 border-gray-200 ml-3 space-y-8 pb-4">
                    @forelse($campaign->ledgers as $ledger)
                        <div class="relative pl-8">
                            <!-- Timeline dot -->
                            <div class="absolute w-4 h-4 bg-primary rounded-full -left-[9px] top-1 border-4 border-white shadow"></div>
                            
                            <div class="bg-gray-50 border border-gray-100 rounded-lg p-5">
                                <div class="flex justify-between items-start mb-2">
                                    <h5 class="font-bold text-gray-900">{{ $ledger->title }}</h5>
                                    <span class="bg-gray-200 text-gray-700 text-xs font-semibold px-2 py-1 rounded">Rp {{ number_format($ledger->amount, 0, ',', '.') }}</span>
                                </div>
                                <p class="text-xs text-primary font-semibold mb-3">{{ $ledger->expense_date->format('F d, Y') }}</p>
                                <p class="text-sm text-gray-600">{{ $ledger->description }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="pl-8 text-gray-500 text-sm">
                            No transparency ledger updates yet. Funds are currently being held or allocated.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</div>
