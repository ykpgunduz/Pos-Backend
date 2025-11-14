<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Veritabanını seed eder.
     *
     * Çalıştırma: php artisan db:seed
     * veya: php artisan migrate:fresh --seed
     */
    public function run(): void
    {
        $this->command->info('🚀 Veritabanı seed işlemi başlatılıyor...');
        $this->command->newLine();

        // 1. Kafeleri oluştur
        $this->command->info('1️⃣  Kafeler oluşturuluyor...');
        $this->call(CafeSeeder::class);
        $this->command->newLine();

        // 2. Kullanıcıları oluştur
        $this->command->info('2️⃣  Kullanıcılar oluşturuluyor...');
        $this->call(UserSeeder::class);
        $this->command->newLine();

        // 3. Masaları oluştur
        $this->command->info('3️⃣  Masalar oluşturuluyor...');
        $this->call(CafeTableSeeder::class);
        $this->command->newLine();

        // 4. Kategorileri oluştur
        $this->command->info('4️⃣  Kategoriler oluşturuluyor...');
        $this->call(CategorySeeder::class);
        $this->command->newLine();

        // 5. Ürünleri oluştur
        $this->command->info('5️⃣  Ürünler oluşturuluyor...');
        $this->call(ProductSeeder::class);
        $this->command->newLine();

        $this->command->info('✅ Tüm seed işlemleri başarıyla tamamlandı!');
        $this->command->newLine();

        // Özet bilgi
        $this->displaySummary();
    }

    /**
     * Seed işlemi sonrası özet bilgileri gösterir.
     */
    private function displaySummary(): void
    {
        $this->command->info('📊 ÖZET BİLGİLER:');
        $this->command->table(
            ['Model', 'Adet'],
            [
                ['Kafeler', \App\Models\Cafe::count()],
                ['Kullanıcılar', \App\Models\User::count()],
                ['Masalar', \App\Models\CafeTable::count()],
                ['Kategoriler', \App\Models\Category::count()],
                ['Ürünler', \App\Models\Product::count()],
            ]
        );

        $this->command->newLine();
        $this->command->info('🔐 TEST GİRİŞ BİLGİLERİ:');
        $this->command->newLine();

        $this->command->info('Kafeler (API Login):');
        $this->command->line('  • Kahve Durağı: info@kahveduragi.com / password123');
        $this->command->line('  • Mola Kafe: contact@molakafe.com / password123');
        $this->command->line('  • Espresso Lab: hello@espressolab.com / password123');
        $this->command->newLine();

        $this->command->info('Kullanıcılar (Çalışanlar):');
        $this->command->line('  • ahmet@kahveduragi.com / password123 (Manager)');
        $this->command->line('  • zeynep@molakafe.com / password123 (Manager)');
        $this->command->line('  • deniz@espressolab.com / password123 (Manager)');
        $this->command->newLine();
    }
}
