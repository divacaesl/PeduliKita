<?php

namespace App\Livewire\Campaigns;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Campaign;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.campaigns.index', [
            'campaigns' => Campaign::with('category')->where('status', 'active')->latest()->paginate(9)
        ])->layout('components.public-layout'); // Using public layout
    }
}
