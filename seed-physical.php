<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = \App\Models\User::where('email', 'user@pedulikita.com')->first();
$campaign = \App\Models\Campaign::first();

if ($user && $campaign) {
    \App\Models\PhysicalDonation::create([
        'user_id' => $user->id,
        'campaign_id' => $campaign->id,
        'item_description' => '2 Kardus Pakaian Bekas Layak Pakai, 1 Dus Obat-obatan P3K',
        'shipping_provider' => 'JNE',
        'tracking_number' => 'JNE1234567890',
        'status' => 'received',
        'proof_image' => 'https://images.unsplash.com/photo-1578592391696-64ebbfeb4b55?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'received_at' => now()->subDays(2),
    ]);
    \App\Models\PhysicalDonation::create([
        'user_id' => $user->id,
        'campaign_id' => $campaign->id,
        'item_description' => '10 Selimut Tebal',
        'shipping_provider' => 'SiCepat',
        'tracking_number' => 'SICEPAT0987654321',
        'status' => 'shipped',
    ]);
    echo "Seeded physical donations successfully.\n";
} else {
    echo "User or Campaign not found.\n";
}
