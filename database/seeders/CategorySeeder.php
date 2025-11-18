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
            ['id' => 1, 'name' => 'Sıcak İçecekler', 'icon' => null, 'color' => null],
            ['id' => 2, 'name' => 'Soğuk İçecekler', 'icon' => null, 'color' => null],
            ['id' => 3, 'name' => 'Tatlılar', 'icon' => null, 'color' => null],
            ['id' => 4, 'name' => 'Fırın Ürünleri', 'icon' => null, 'color' => null],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['name' => $cat['name']],
                array_merge(['cafe_id' => 1], $cat)
            );
        }
    }
}
