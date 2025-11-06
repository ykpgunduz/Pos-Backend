<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cafe;

class CafeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure at least one cafe exists for FK relations
        Cafe::firstOrCreate(
            ['name' => 'Default Cafe'],
            [
                'description' => 'Default cafe created by seeder',
                'phone' => '0000000000',
                'address' => 'Default address',
                'address_link' => null,
                'insta_name' => null,
                'insta_link' => null,
                'opening_time' => null,
                'closing_time' => null,
            ]
        );
    }
}
