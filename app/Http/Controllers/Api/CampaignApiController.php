<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CampaignRepositoryInterface;

class CampaignApiController extends Controller
{
    protected $campaignRepository;

    public function __construct(CampaignRepositoryInterface $campaignRepository)
    {
        $this->campaignRepository = $campaignRepository;
    }

    public function index(Request $request)
    {
        $query = \App\Models\Campaign::where('status', 'active');

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->has('urgent')) {
            $query->where('is_urgent', true);
        }

        $campaigns = $query->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $campaigns
        ]);
    }

    public function verify(Request $request, $id)
    {
        $request->validate([
            'verification_document' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $campaign = $this->campaignRepository->findById($id);

        if (!$campaign) {
            return response()->json(['message' => 'Campaign not found'], 404);
        }

        $path = $request->file('verification_document')->store('verifications', 'public');

        $this->campaignRepository->update($id, [
            'is_verified' => true,
            'verification_document' => $path,
            'status' => 'active' // automatically activate upon verification for MVP
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Campaign verified successfully',
            'document_url' => asset('storage/' . $path)
        ]);
    }
}
