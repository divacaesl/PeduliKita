<?php

namespace App\Livewire\Campaigns;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Campaign;
use Livewire\Attributes\Url;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public $category = '';

    public function render()
    {
        $query = Campaign::with('category')->where('status', 'active');

        if ($this->category) {
            $query->whereHas('category', function ($q) {
                $q->where('slug', $this->category);
            });
        }

        return view('livewire.campaigns.index', [
            'campaigns' => $query->latest()->paginate(9)
        ])->layout('components.public-layout');
    }
}
