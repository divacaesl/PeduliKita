<?php

namespace App\Livewire\Campaigns;

use Livewire\Component;
use App\Models\Campaign;

class Show extends Component
{
    public $campaign;
    public $amount;

    public function mount(Campaign $campaign)
    {
        $this->campaign = $campaign->load(['category', 'user', 'ledgers' => function($query) {
            $query->orderBy('expense_date', 'desc');
        }]);
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function submitDonation()
    {
        $this->validate([
            'amount' => 'required|numeric|min:10000',
        ]);

        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $donation = \App\Models\Donation::create([
            'user_id' => auth()->id(),
            'campaign_id' => $this->campaign->id,
            'amount' => $this->amount,
            'status' => 'pending', // Midtrans will update this later
            'payment_method' => 'midtrans',
        ]);

        // Mocking successful payment for MVP UI without actual midtrans redirect
        $donation->update(['status' => 'paid']);
        $this->campaign->increment('current_amount', $this->amount);

        session()->flash('message', 'Thank you for your donation!');
        return redirect()->route('campaigns.show', $this->campaign->slug);
    }

    public function render()
    {
        return view('livewire.campaigns.show')->layout('layouts.guest');
    }
}
