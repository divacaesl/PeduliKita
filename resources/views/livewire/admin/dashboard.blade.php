<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Welcome Banner -->
        <div class="bg-dark rounded-2xl shadow-xl overflow-hidden mb-12 border-b-4 border-primary">
            <div class="p-8 md:p-12 text-white relative flex justify-between items-center">
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-bold font-serif mb-2">Admin Dashboard</h2>
                    <p class="text-gray-300">Platform overview, metrics, and campaign management.</p>
                </div>
                <div class="hidden md:block">
                    <svg class="w-24 h-24 text-gray-700" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/></svg>
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-primary">
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-2">Total Donations</h3>
                <p class="text-3xl font-bold text-gray-900">Rp {{ number_format($totalDonations, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-2">Active Campaigns</h3>
                <p class="text-3xl font-bold text-gray-900">{{ $activeCampaigns }} <span class="text-gray-400 text-sm font-normal">/ {{ $totalCampaigns }} total</span></p>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-2">Total Users</h3>
                <p class="text-3xl font-bold text-gray-900">{{ $totalUsers }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Pending Campaigns -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-900">Pending Campaigns Review</h3>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @forelse($pendingCampaigns as $campaign)
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <h4 class="text-lg font-bold text-gray-900">{{ $campaign->title }}</h4>
                                        <p class="text-sm text-gray-500">By {{ $campaign->user->name }} • Target: Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button wire:click="approveCampaign({{ $campaign->id }})" class="bg-green-100 text-green-800 px-4 py-2 rounded-md text-sm font-semibold hover:bg-green-200 transition">Approve</button>
                                        <button wire:click="rejectCampaign({{ $campaign->id }})" class="bg-red-100 text-red-800 px-4 py-2 rounded-md text-sm font-semibold hover:bg-red-200 transition">Reject</button>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600 line-clamp-2">{{ $campaign->description }}</p>
                            </div>
                        @empty
                            <div class="p-8 text-center text-gray-500">
                                No pending campaigns to review.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Recent Donations -->
            <div>
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-900">Recent Donations</h3>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @forelse($recentDonations as $donation)
                            <div class="p-5">
                                <p class="text-sm font-semibold text-gray-900">{{ $donation->is_anonymous ? 'Anonymous' : ($donation->user ? $donation->user->name : 'Guest') }}</p>
                                <p class="text-xs text-gray-500 mb-2">Donated to <span class="font-medium text-gray-700">{{ $donation->campaign->title }}</span></p>
                                <p class="text-sm font-bold text-primary">Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                            </div>
                        @empty
                            <div class="p-6 text-center text-gray-500">
                                No recent donations.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
