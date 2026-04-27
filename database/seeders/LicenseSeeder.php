<?php

namespace Database\Seeders;

use App\Models\License;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LicenseSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = User::pluck('id');       // tüm user id'leri çek
        $products = Product::all();         // tüm ürünleri çek

        foreach ($products as $product) {   // her ürün için
            for ($i = 0; $i < 8; $i++) {   // 8 lisans oluştur
                License::create([
                    'product_id'  => $product->id,
                    'user_id'     => $i < 3 ? $userIds->random() : null, // ilk 3 satılmış, kalanlar null
                    'license_key' => Str::uuid(),
                ]);
            }
        }
    }
}