<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@pedulikita.com',
            'role' => 'admin',
        ]);

        $user = \App\Models\User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@pedulikita.com',
        ]);

        $category1 = \App\Models\Category::create(['name' => 'Education', 'slug' => 'education']);
        $category2 = \App\Models\Category::create(['name' => 'Medical', 'slug' => 'medical']);

        $campaign1 = \App\Models\Campaign::create([
            'user_id' => $user->id,
            'category_id' => $category1->id,
            'title' => 'Help Children Go To School',
            'slug' => 'help-children-go-to-school',
            'description' => 'Many children in rural areas lack access to basic education. Your donation can help provide them with books, uniforms, and a chance for a better future. Let us come together to build a brighter tomorrow for these bright minds.',
            'target_amount' => 50000000,
            'current_amount' => 12500000,
            'status' => 'active',
        ]);

        \App\Models\TransparencyLedger::create([
            'campaign_id' => $campaign1->id,
            'title' => 'Pembelian Buku dan Seragam',
            'description' => 'Telah disalurkan dana untuk pembelian 50 paket buku sekolah dan 50 set seragam untuk anak-anak di SDN 01 Pelosok.',
            'amount' => 5000000,
            'expense_date' => now()->subDays(2),
        ]);

        \App\Models\TransparencyLedger::create([
            'campaign_id' => $campaign1->id,
            'title' => 'Perbaikan Atap Ruang Kelas',
            'description' => 'Pembayaran material dan jasa tukang untuk memperbaiki atap 2 ruang kelas yang bocor.',
            'amount' => 7000000,
            'expense_date' => now()->subDays(10),
        ]);

        \App\Models\Campaign::create([
            'user_id' => $user->id,
            'category_id' => $category2->id,
            'title' => 'Emergency Medical Fund for Mr. Budi',
            'slug' => 'emergency-medical-fund-for-mr-budi',
            'description' => 'Mr. Budi was recently diagnosed with a critical illness and requires immediate surgery. His family cannot afford the medical bills. Every contribution, no matter how small, brings hope to his recovery.',
            'target_amount' => 100000000,
            'current_amount' => 85000000,
            'status' => 'active',
        ]);
    }
}
