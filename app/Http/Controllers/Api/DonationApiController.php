<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;
use Illuminate\Support\Str;
use App\Mail\TargetReachedNotification;

class DonationApiController extends Controller
{
    public function storeGuest(Request $request)
    {
        $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'amount' => 'required|numeric|min:1000',
            'payment_method' => 'required|string',
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'message' => 'nullable|string',
            'is_anonymous' => 'boolean'
        ]);

        $campaign = Campaign::find($request->campaign_id);

        if (!$campaign || $campaign->status !== 'active') {
            return response()->json(['message' => 'Campaign is not active'], 400);
        }

        $donation = Donation::create([
            'campaign_id' => $request->campaign_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
            'is_anonymous' => $request->is_anonymous ?? false,
            'message' => $request->message,
            'guest_name' => $request->guest_name,
            'guest_email' => $request->guest_email,
            'transaction_id' => (string) Str::uuid()
        ]);

        // Note: For MVP, we will simulate changing the status to paid
        $donation->update(['status' => 'paid']);

        // Increment current_amount on campaign
        $campaign->increment('current_amount', $donation->amount);
        $campaign->refresh(); // get updated values

        // Send Email Receipt
        try {
            \Illuminate\Support\Facades\Mail::to($donation->guest_email)->send(new \App\Mail\DonationReceipt($donation));
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Failed to send donation receipt: ' . $e->getMessage());
        }

        // Check if target is reached and send notification to creator
        if ($campaign->current_amount >= $campaign->target_amount) {
            try {
                \Illuminate\Support\Facades\Mail::to($campaign->user->email)->send(new TargetReachedNotification($campaign));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Failed to send target reached email: ' . $e->getMessage());
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Guest donation created successfully',
            'data' => $donation
        ]);
    }
}
