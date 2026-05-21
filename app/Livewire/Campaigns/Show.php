<?php

namespace App\Livewire\Campaigns;

use Livewire\Component;
use App\Models\Campaign;

class Show extends Component
{
    public $campaign;
    public $amount;
    public $payment_method = 'qris';

    // Physical Donation Properties
    public $item_description;
    public $shipping_provider = 'JNE';
    public $tracking_number;

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
        if (!auth()->check()) {
            session()->put('url.intended', route('campaigns.show', $this->campaign->slug));
            return redirect()->route('login');
        }

        $this->validate([
            'amount' => 'required|numeric|min:10000',
            'payment_method' => 'required|string',
        ]);

        $donation = \App\Models\Donation::create([
            'user_id' => auth()->id(),
            'campaign_id' => $this->campaign->id,
            'amount' => $this->amount,
            'status' => 'pending', 
            'payment_method' => $this->payment_method,
        ]);

        // Mocking successful payment for MVP UI without actual redirect
        $donation->update(['status' => 'paid']);
        $this->campaign->increment('current_amount', $this->amount);

        session()->flash('message', 'Terima kasih, donasi Anda berhasil diterima!');
        return redirect()->route('campaigns.show', $this->campaign->slug);
    }

    public function submitPhysicalDonation()
    {
        if (!auth()->check()) {
            return $this->redirectToLogin();
        }

        $this->validate([
            'item_description' => 'required|string|max:255',
            'shipping_provider' => 'required|string',
            'tracking_number' => 'required|string',
        ]);

        \App\Models\PhysicalDonation::create([
            'user_id' => auth()->id(),
            'campaign_id' => $this->campaign->id,
            'item_description' => $this->item_description,
            'shipping_provider' => $this->shipping_provider,
            'tracking_number' => $this->tracking_number,
            'status' => 'shipped',
        ]);

        $this->reset(['item_description', 'tracking_number']);
        session()->flash('physical_message', 'Donasi barang Anda berhasil didaftarkan. Terima kasih!');
    }

    public function redirectToLogin()
    {
        session()->put('url.intended', route('campaigns.show', $this->campaign->slug));
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.campaigns.show')->layout('components.public-layout');
    }
}
