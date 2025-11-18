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
            ['name' => 'Sıcak İçecekler', 'icon' => null, 'color' => null],
            ['name' => 'Soğuk İçecekler', 'icon' => null, 'color' => null],
            ['name' => 'Tatlılar', 'icon' => null, 'color' => null],
            ['name' => 'Fırın Ürünleri', 'icon' => null, 'color' => null],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['name' => $cat['name']],
                array_merge(['cafe_id' => 1], $cat)
            );
        }
    }
}
