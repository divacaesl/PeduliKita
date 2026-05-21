<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Campaign;
use App\Models\CampaignUpdate;
use Illuminate\Support\Facades\Mail;
use App\Mail\CampaignUpdateNotification;

class CampaignUpdateController extends Controller
{
    public function index($campaignId)
    {
        $updates = CampaignUpdate::where('campaign_id', $campaignId)->latest()->get();
        return response()->json(['success' => true, 'data' => $updates]);
    }

    public function store(Request $request, $campaignId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $campaign = Campaign::findOrFail($campaignId);
        
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('campaign_updates', 'public');
        }

        $update = CampaignUpdate::create([
            'campaign_id' => $campaignId,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path
        ]);

        $donorEmails = $campaign->donations()->where('status', 'paid')->pluck('guest_email')->filter()->unique();
        foreach ($donorEmails as $email) {
            try {
                Mail::to($email)->send(new CampaignUpdateNotification($update));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Failed to send update email: ' . $e->getMessage());
            }
        }

        return response()->json(['success' => true, 'message' => 'Update created and broadcasted.', 'data' => $update]);
    }
}
