<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Beverages', 'icon' => null, 'color' => null],
            ['name' => 'Hot Drinks', 'icon' => null, 'color' => null],
            ['name' => 'Cold Drinks', 'icon' => null, 'color' => null],
            ['name' => 'Bakery', 'icon' => null, 'color' => null],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['name' => $cat['name']],
                array_merge(['cafe_id' => 1], $cat)
            );
        }
    }
}
