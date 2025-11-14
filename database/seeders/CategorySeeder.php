<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Cafe;

class CategorySeeder extends Seeder
{
    /**
     * Her kafe için uygun kategoriler oluşturur.
     */
    public function run(): void
    {
        // Kafeleri al
        $kahveDuragi = Cafe::where('email', 'info@kahveduragi.com')->first();
        $molaKafe = Cafe::where('email', 'contact@molakafe.com')->first();
        $espressoLab = Cafe::where('email', 'hello@espressolab.com')->first();

        if (!$kahveDuragi || !$molaKafe || !$espressoLab) {
            $this->command->error('❌ Kafeler bulunamadı! Önce CafeSeeder çalıştırılmalı.');
            return;
        }

        // Kahve Durağı kategorileri
        $kahveDuragiCategories = [
            ['name' => 'Sıcak İçecekler', 'icon' => '☕', 'color' => '#8B4513'],
            ['name' => 'Soğuk İçecekler', 'icon' => '🧊', 'color' => '#4169E1'],
            ['name' => 'Tatlılar', 'icon' => '🍰', 'color' => '#FF69B4'],
            ['name' => 'Kahvaltı', 'icon' => '🥐', 'color' => '#FFD700'],
        ];

        foreach ($kahveDuragiCategories as $category) {
            Category::firstOrCreate(
                [
                    'cafe_id' => $kahveDuragi->id,
                    'name' => $category['name']
                ],
                $category
            );
        }

        // Mola Kafe kategorileri
        $molaKafeCategories = [
            ['name' => 'Kahve Çeşitleri', 'icon' => '☕', 'color' => '#6F4E37'],
            ['name' => 'Çaylar', 'icon' => '🍵', 'color' => '#90EE90'],
            ['name' => 'Smoothie & Milkshake', 'icon' => '🥤', 'color' => '#FF6347'],
            ['name' => 'Atıştırmalıklar', 'icon' => '🥨', 'color' => '#DEB887'],
            ['name' => 'Özel Tarifler', 'icon' => '⭐', 'color' => '#FFD700'],
        ];

        foreach ($molaKafeCategories as $category) {
            Category::firstOrCreate(
                [
                    'cafe_id' => $molaKafe->id,
                    'name' => $category['name']
                ],
                $category
            );
        }

        // Espresso Lab kategorileri
        $espressoLabCategories = [
            ['name' => 'Signature Espresso', 'icon' => '☕', 'color' => '#2C1810'],
            ['name' => 'Filter Coffee', 'icon' => '🫖', 'color' => '#8B7355'],
            ['name' => 'Soğuk Demlemeler', 'icon' => '❄️', 'color' => '#5F9EA0'],
            ['name' => 'Ev Yapımı Pastalar', 'icon' => '🎂', 'color' => '#FF1493'],
            ['name' => 'Sandviçler', 'icon' => '🥪', 'color' => '#F4A460'],
        ];

        foreach ($espressoLabCategories as $category) {
            Category::firstOrCreate(
                [
                    'cafe_id' => $espressoLab->id,
                    'name' => $category['name']
                ],
                $category
            );
        }

        $this->command->info('✅ Tüm kafeler için kategoriler oluşturuldu!');
    }
}
