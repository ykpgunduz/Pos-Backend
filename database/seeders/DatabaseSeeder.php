<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ensure a test user exists (idempotent)
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => bcrypt('password')]
        );

        // Ensure cafes, tables and categories exist before products
        $this->call([
            CafeSeeder::class,
            CafeTableSeeder::class,
            CategorySeeder::class,
            TableDefinitionSeeder::class,
        ]);

        // Seed a small set of products
        $this->call([ProductSeeder::class]);
    }
}
