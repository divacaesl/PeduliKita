<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Donation;

class UserProfileController extends Controller
{
    public function show($id)
    {
        $user = User::with(['campaigns' => function($q) {
            $q->where('status', 'active');
        }])->findOrFail($id);

        $totalCampaigns = $user->campaigns()->count();
        
        $totalFundsRaised = Donation::whereHas('campaign', function($q) use ($id) {
            $q->where('user_id', $id);
        })->where('status', 'paid')->sum('amount');

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'avatar' => $user->avatar,
                'bio' => $user->bio,
                'stats' => [
                    'total_campaigns' => $totalCampaigns,
                    'total_funds_raised' => $totalFundsRaised,
                    'active_campaigns' => $user->campaigns->count()
                ],
                'campaigns' => $user->campaigns
            ]
        ]);
    }
}
