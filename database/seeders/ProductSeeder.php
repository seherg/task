<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{

    public function run(): void
    {
        Product::create(['name' => 'Windows 11 Pro', 'description' => 'Microsoft Windows 11 Pro lisansı', 'price' => 299.99]);
        Product::create(['name' => 'Office 365', 'description' => 'Microsoft Office 365 lisansı', 'price' => 199.99]);
        Product::create(['name' => 'Adobe Photoshop', 'description' => 'Adobe Photoshop lisansı', 'price' => 499.99]);
    }

}
