<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Campaign;
use App\Models\TransparencyLedger;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@pedulikita.com',
            'role' => 'admin',
        ]);

        // Regular User
        $user = User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@pedulikita.com',
        ]);

        // Create Categories
        $categories = [
            'Pangan Sehat' => 'pangan-sehat',
            'Pendidikan' => 'pendidikan',
            'Kesehatan' => 'kesehatan',
            'Air Bersih' => 'air-bersih',
            'Kasih Sayang' => 'kasih-sayang',
            'Bantuan Bencana' => 'bantuan-bencana',
        ];

        $catModels = [];
        foreach ($categories as $name => $slug) {
            $catModels[$slug] = Category::create(['name' => $name, 'slug' => $slug]);
        }

        // Dummy Campaigns
        // 1. Pangan Sehat
        $c1 = Campaign::create([
            'user_id' => $user->id,
            'category_id' => $catModels['pangan-sehat']->id,
            'title' => 'Bantuan Sembako untuk Keluarga Prasejahtera di Pelosok',
            'slug' => Str::slug('Bantuan Sembako untuk Keluarga Prasejahtera di Pelosok'),
            'description' => 'Banyak keluarga yang kesulitan memenuhi kebutuhan pokok mereka setiap harinya. Bantuan pangan sehat dan bergizi sangat mereka butuhkan untuk bertahan hidup dan mencegah gizi buruk pada anak-anak mereka. Mari sisihkan sedikit rezeki kita untuk mereka.',
            'target_amount' => 25000000,
            'current_amount' => 5500000,
            'status' => 'active',
        ]);

        TransparencyLedger::create([
            'campaign_id' => $c1->id,
            'title' => 'Distribusi Sembako Tahap 1',
            'description' => 'Telah disalurkan 50 paket sembako berupa beras, minyak, dan telur ke warga Desa Suka Maju.',
            'amount' => 5000000,
            'expense_date' => now()->subDays(3),
        ]);

        // 2. Pendidikan
        Campaign::create([
            'user_id' => $admin->id,
            'category_id' => $catModels['pendidikan']->id,
            'title' => 'Beasiswa Pendidikan untuk Anak Yatim Piatu',
            'slug' => Str::slug('Beasiswa Pendidikan untuk Anak Yatim Piatu'),
            'description' => 'Pendidikan adalah kunci meraih masa depan. Sayangnya, banyak anak yatim piatu yang harus putus sekolah karena kendala biaya. Donasi Anda akan membantu mereka mendapatkan perlengkapan sekolah dan melunasi biaya SPP.',
            'target_amount' => 75000000,
            'current_amount' => 20000000,
            'status' => 'active',
        ]);

        // 3. Kesehatan
        Campaign::create([
            'user_id' => $user->id,
            'category_id' => $catModels['kesehatan']->id,
            'title' => 'Bantu Pak Budi Sembuh dari Penyakit Kritis',
            'slug' => Str::slug('Bantu Pak Budi Sembuh dari Penyakit Kritis'),
            'description' => 'Pak Budi adalah tulang punggung keluarga yang baru saja didiagnosa penyakit kritis dan membutuhkan operasi segera. Keluarga tidak memiliki biaya yang cukup. Setiap rupiah dari Anda adalah harapan bagi Pak Budi.',
            'target_amount' => 100000000,
            'current_amount' => 85100000,
            'status' => 'active',
        ]);

        // 4. Air Bersih
        Campaign::create([
            'user_id' => $admin->id,
            'category_id' => $catModels['air-bersih']->id,
            'title' => 'Bangun Sumur Air Bersih di NTT',
            'slug' => Str::slug('Bangun Sumur Air Bersih di NTT'),
            'description' => 'Warga di beberapa desa di NTT harus berjalan sejauh 5 km setiap harinya hanya untuk mendapatkan air yang bahkan kurang layak konsumsi. Mari kita bangun sumur bor untuk memudahkan akses air bersih bagi mereka.',
            'target_amount' => 150000000,
            'current_amount' => 45000000,
            'status' => 'active',
        ]);

        // 5. Kasih Sayang
        Campaign::create([
            'user_id' => $user->id,
            'category_id' => $catModels['kasih-sayang']->id,
            'title' => 'Renovasi Panti Jompo Kasih Bunda',
            'slug' => Str::slug('Renovasi Panti Jompo Kasih Bunda'),
            'description' => 'Panti jompo Kasih Bunda saat ini kondisinya sangat memprihatinkan dengan atap yang sering bocor saat hujan. Mari berikan tempat yang nyaman bagi para lansia di masa tua mereka.',
            'target_amount' => 60000000,
            'current_amount' => 32000000,
            'status' => 'active',
        ]);

        // 6. Bantuan Bencana
        Campaign::create([
            'user_id' => $admin->id,
            'category_id' => $catModels['bantuan-bencana']->id,
            'title' => 'Tanggap Darurat Korban Gempa',
            'slug' => Str::slug('Tanggap Darurat Korban Gempa'),
            'description' => 'Gempa bumi baru saja melanda dan menghancurkan ratusan rumah warga. Mereka saat ini tinggal di tenda pengungsian dengan logistik yang sangat terbatas. Bantuan tenda, obat-obatan, dan selimut sangat dibutuhkan sekarang.',
            'target_amount' => 200000000,
            'current_amount' => 125000000,
            'status' => 'active',
        ]);
    }
}
