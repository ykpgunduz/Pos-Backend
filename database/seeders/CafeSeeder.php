<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            ['email' => 'cafe@example.com'],
            [
                'name' => 'Default Cafe',
                'password' => Hash::make('password'),
                'description' => 'Default cafe created by seeder',
                'phone' => '0000000000',
                'address' => 'Default address',
                'address_link' => null,
                'insta_name' => null,
                'insta_link' => null,
                'opening_time' => null,
                'closing_time' => null,
                'table_count' => 10,
            ]
        );
    }
}
