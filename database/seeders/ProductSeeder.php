<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert 5 manual products (hand-crafted)
        Product::create([
            'cafe_id' => 1,
            'category_id' => 1,
            'image' => null,
            'name' => 'Espresso',
            'description' => 'Küçük, sert ve aromatik espresso shot.',
            'price' => 120,
            'stock' => 50,
            'active' => true,
            'star' => 5,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 2,
            'image' => null,
            'name' => 'Cappuccino',
            'description' => 'Süt köpüğü ile servis edilen klasik cappuccino.',
            'price' => 180,
            'stock' => 30,
            'active' => true,
            'star' => 4,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 2,
            'image' => null,
            'name' => 'Latte',
            'description' => 'Sütlü ve yumuşak latte.',
            'price' => 170,
            'stock' => 25,
            'active' => true,
            'star' => 4,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 3,
            'image' => null,
            'name' => 'Earl Grey Tea',
            'description' => 'Bergamot aromalı siyah çay.',
            'price' => 90,
            'stock' => 40,
            'active' => true,
            'star' => 3,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 4,
            'image' => null,
            'name' => 'Chocolate Muffin',
            'description' => 'Taze çikolatalı muffin.',
            'price' => 140,
            'stock' => 20,
            'active' => true,
            'star' => 5,
        ]);
    }
}
