<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TableDefinition;

class TableDefinitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Salon Masaları
        for ($i = 1; $i <= 10; $i++) {
            TableDefinition::create([
                'cafe_id' => 1,
                'name' => "Salon {$i}",
                'area' => 'Salon',
                'table_number' => $i,
                'capacity' => $i % 2 == 0 ? 4 : 2, // Çift numaralılar 4 kişilik, tek numaralılar 2 kişilik
                'position_x' => null,
                'position_y' => null,
                'is_active' => true,
                'notes' => null,
            ]);
        }

        // Bahçe Masaları
        for ($i = 1; $i <= 8; $i++) {
            TableDefinition::create([
                'cafe_id' => 1,
                'name' => "Bahçe {$i}",
                'area' => 'Bahçe',
                'table_number' => $i,
                'capacity' => $i <= 4 ? 4 : 6, // İlk 4 masa 4 kişilik, diğerleri 6 kişilik
                'position_x' => null,
                'position_y' => null,
                'is_active' => true,
                'notes' => null,
            ]);
        }

        // Teras Masaları
        for ($i = 1; $i <= 5; $i++) {
            TableDefinition::create([
                'cafe_id' => 1,
                'name' => "Teras {$i}",
                'area' => 'Teras',
                'table_number' => $i,
                'capacity' => 2,
                'position_x' => null,
                'position_y' => null,
                'is_active' => true,
                'notes' => 'Manzaralı',
            ]);
        }

        // VIP Masalar
        for ($i = 1; $i <= 3; $i++) {
            TableDefinition::create([
                'cafe_id' => 1,
                'name' => "VIP {$i}",
                'area' => 'VIP',
                'table_number' => $i,
                'capacity' => 6,
                'position_x' => null,
                'position_y' => null,
                'is_active' => true,
                'notes' => 'Özel alan - Rezervasyon gerekli',
            ]);
        }

        // Pasif bir masa örneği
        TableDefinition::create([
            'cafe_id' => 1,
            'name' => 'Salon 11',
            'area' => 'Salon',
            'table_number' => 11,
            'capacity' => 4,
            'position_x' => null,
            'position_y' => null,
            'is_active' => false,
            'notes' => 'Bakımda',
        ]);
    }
}
