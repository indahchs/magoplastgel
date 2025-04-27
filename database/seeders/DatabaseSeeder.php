<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => '7d08582d-0b84-4862-91a5-fd9581490c13',
            'name' => 'Fauzi Adi',
            'email' => 'fauzi@gmail.com',
            'password' => 'root123',
            'role' => 'user',
            'kelurahan' => 'Kebon Jeruk',
            'kecamatan' => 'Kebon Jeruk',
            'city' => 'Jakarta Barat',
            'province' => 'DKI Jakarta',
            'address_detail' => 'Jl. Raya Kebon Jeruk No. 1',
            'zip_code' => '11530',
            'phone_number' => '628123456789',
        ]);

        User::factory()->create([
            'id' => '9d08582d-0b84-4862-91a5-fd9581490c11',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'root123',
            'role' => 'admin',
            'kelurahan' => 'Kebon Jeruk',
            'kecamatan' => 'Kebon Jeruk',
            'city' => 'Jakarta Barat',
            'province' => 'DKI Jakarta',
            'address_detail' => 'Jl. Raya Kebon Jeruk No. 1',
            'zip_code' => '11530',
            'phone_number' => '628123456789',
        ]);

        ArticleCategory::create([
            'id' => '7d08582d-0b84-4862-91a5-fd9581490c20',
            'name' => 'Kesehatan',
        ]);

        // $this->call(ArticleSeeder::class);
    }
}
