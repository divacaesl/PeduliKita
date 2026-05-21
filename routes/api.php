<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CampaignApiController;

Route::post('/login', [AuthController::class, 'login']); // For JWT

// Basic Auth Endpoints
Route::middleware('auth.basic')->group(function () {
    Route::get('/campaigns/basic', [CampaignApiController::class, 'index']);
});

// API Key Endpoints
Route::middleware('api_key')->group(function () {
    Route::get('/campaigns/apikey', [CampaignApiController::class, 'index']);
});

// JWT Auth Endpoints
Route::middleware('jwt')->group(function () {
    Route::get('/campaigns/jwt', [CampaignApiController::class, 'index']);
    Route::post('/campaigns/{id}/verify', [CampaignApiController::class, 'verify']);
});

use App\Http\Controllers\Api\DonationApiController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\Api\CampaignUpdateController;

Route::post('/donations/guest', [DonationApiController::class, 'storeGuest']);
Route::get('/users/{id}/profile', [UserProfileController::class, 'show']);
Route::get('/campaigns/{id}/updates', [CampaignUpdateController::class, 'index']);

// JWT Auth Endpoints (for Creators/Admins)
Route::middleware('jwt')->group(function () {
    Route::post('/campaigns/{id}/updates', [CampaignUpdateController::class, 'store']);
});
