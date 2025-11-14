<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cafe;
use App\Models\CafeTable;

class CafeTableSeeder extends Seeder
{
    /**
     * Her kafe için 12 masa oluşturur.
     */
    public function run(): void
    {
        // Tüm kafeleri al
        $cafes = Cafe::all();

        if ($cafes->isEmpty()) {
            $this->command->error('❌ Hiç kafe bulunamadı! Önce CafeSeeder çalıştırılmalı.');
            return;
        }

        $totalTables = 0;

        // Her kafe için 12 masa oluştur
        foreach ($cafes as $cafe) {
            for ($i = 1; $i <= 12; $i++) {
                CafeTable::firstOrCreate(
                    [
                        'cafe_id' => $cafe->id,
                        'table_number' => $i,
                    ],
                    [
                        'order_number' => null,
                        'customer' => null,
                        'status' => 'available', // Müsait
                        'treat' => 0,
                        'total_amount' => 0,
                    ]
                );
                $totalTables++;
            }

            $this->command->info("   ✓ {$cafe->name}: 12 masa oluşturuldu");
        }

        $this->command->info("✅ Toplam {$totalTables} masa oluşturuldu!");
    }
}
