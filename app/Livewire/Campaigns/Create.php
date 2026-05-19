<?php

namespace App\Livewire\Campaigns;

use Livewire\Component;
use App\Models\Category;
use App\Models\Campaign;
use Illuminate\Support\Str;

class Create extends Component
{
    public $title = '';
    public $description = '';
    public $target_amount;
    public $category_id;
    public $deadline;
    
    public $isOptimizing = false;

    protected $rules = [
        'title' => 'required|min:5|max:255',
        'description' => 'required|min:20',
        'target_amount' => 'required|numeric|min:100000',
        'category_id' => 'required|exists:categories,id',
        'deadline' => 'required|date|after:today',
    ];

    public function optimizeWithAI()
    {
        $this->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:10',
        ]);

        $this->isOptimizing = true;

        // Mocking an AI service call (e.g., Gemini API)
        // In production, you would use Http::post('api.gemini.com/generate', [...])
        sleep(2); // Simulate API latency

        $this->title = "Help " . $this->title . " - Urgent Support Needed!";
        $this->description = "We urgently need your help. " . $this->description . "\n\nEvery contribution brings us one step closer to our goal. Your kindness can change lives today. Please consider donating and sharing this campaign with your network.";

        $this->isOptimizing = false;
        
        // Dispatch browser event to show toast
        $this->dispatch('ai-optimized');
    }

    public function save()
    {
        $this->validate();

        $campaign = Campaign::create([
            'user_id' => auth()->id(),
            'category_id' => $this->category_id,
            'title' => $this->title,
            'slug' => Str::slug($this->title) . '-' . uniqid(),
            'description' => $this->description,
            'target_amount' => $this->target_amount,
            'current_amount' => 0,
            'deadline' => $this->deadline,
            'status' => 'pending', // Requires admin approval
        ]);

        session()->flash('message', 'Campaign created successfully! It is pending admin approval.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.campaigns.create', [
            'categories' => Category::all()
        ])->layout('layouts.app');
    }
}
