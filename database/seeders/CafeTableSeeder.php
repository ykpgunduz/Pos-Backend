<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cafe;
use App\Models\CafeTable;

class CafeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there's at least one cafe (should already be created by CafeSeeder)
        $cafe = Cafe::first();

        if (! $cafe) {
            $cafe = Cafe::firstOrCreate([
                'name' => 'Default Cafe',
            ], [
                'description' => 'Default cafe created by seeder',
                'phone' => '0000000000',
                'address' => 'Default address',
            ]);
        }

        // Ensure exactly 12 tables exist for this cafe (idempotent)
        for ($i = 1; $i <= 12; $i++) {
            CafeTable::firstOrCreate(
                [
                    'cafe_id' => $cafe->id,
                    'table_number' => $i,
                ],
                [
                    // no order info — you'll populate order-related fields at runtime
                    'order_number' => null,
                    'customer' => null,
                    'status' => 'available',
                    'treat' => 0,
                    'total_amount' => 0,
                ]
            );
        }
    }
}
