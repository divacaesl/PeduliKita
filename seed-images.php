<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$images = [
    'pangan-sehat' => 'https://images.unsplash.com/photo-1593113563332-e147ce1f09bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    'pendidikan' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    'kesehatan' => 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    'air-bersih' => 'https://images.unsplash.com/photo-1520694478166-daaaaec95b69?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    'kasih-sayang' => 'https://images.unsplash.com/photo-1518398046578-8cca57782e17?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    'bantuan-bencana' => 'https://images.unsplash.com/photo-1561703666-4e5c8e3cc383?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
];

foreach(\App\Models\Campaign::with('category')->get() as $campaign) {
    $catSlug = $campaign->category->slug ?? null;
    if ($catSlug && isset($images[$catSlug])) {
        $campaign->update(['image' => $images[$catSlug]]);
    }
}
echo "Images seeded.\n";
