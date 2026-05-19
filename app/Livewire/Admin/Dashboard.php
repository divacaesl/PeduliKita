<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;

class Dashboard extends Component
{
    public function approveCampaign(Campaign $campaign)
    {
        $campaign->update(['status' => 'active']);
    }

    public function rejectCampaign(Campaign $campaign)
    {
        $campaign->update(['status' => 'rejected']);
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'totalCampaigns' => Campaign::count(),
            'activeCampaigns' => Campaign::where('status', 'active')->count(),
            'totalDonations' => Donation::where('status', 'paid')->sum('amount'),
            'totalUsers' => User::count(),
            'pendingCampaigns' => Campaign::with('user')->where('status', 'pending')->latest()->get(),
            'recentDonations' => Donation::with(['user', 'campaign'])->where('status', 'paid')->latest()->take(5)->get(),
        ])->layout('layouts.app');
    }
}
