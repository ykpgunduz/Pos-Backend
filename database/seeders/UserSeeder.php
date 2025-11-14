<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cafe;

class UserSeeder extends Seeder
{
    /**
     * Her kafe için çalışanlar ve müşteriler oluşturur.
     * Not: Users tablosunda sadece name, email, password alanları var.
     */
    public function run(): void
    {
        // Kafeleri al
        $kahveDuragi = Cafe::where('email', 'info@kahveduragi.com')->first();
        $molaKafe = Cafe::where('email', 'contact@molakafe.com')->first();
        $espressoLab = Cafe::where('email', 'hello@espressolab.com')->first();

        if (!$kahveDuragi || !$molaKafe || !$espressoLab) {
            $this->command->error('❌ Kafeler bulunamadı!');
            return;
        }

        // Kahve Durağı Çalışanları
        $kahveDuragiUsers = [
            [
                'name' => 'Ahmet Yılmaz (Kahve Durağı - Yönetici)',
                'email' => 'ahmet@kahveduragi.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Ayşe Demir (Kahve Durağı - Barista)',
                'email' => 'ayse@kahveduragi.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Mehmet Kaya (Kahve Durağı - Garson)',
                'email' => 'mehmet@kahveduragi.com',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($kahveDuragiUsers as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }

        // Mola Kafe Çalışanları
        $molaKafeUsers = [
            [
                'name' => 'Zeynep Şahin (Mola Kafe - Yönetici)',
                'email' => 'zeynep@molakafe.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Can Arslan (Mola Kafe - Barista)',
                'email' => 'can@molakafe.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Elif Çelik (Mola Kafe - Garson)',
                'email' => 'elif@molakafe.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Burak Öztürk (Mola Kafe - Aşçı)',
                'email' => 'burak@molakafe.com',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($molaKafeUsers as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }

        // Espresso Lab Çalışanları
        $espressoLabUsers = [
            [
                'name' => 'Deniz Aydın (Espresso Lab - Yönetici)',
                'email' => 'deniz@espressolab.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Cem Yıldız (Espresso Lab - Baş Barista)',
                'email' => 'cem@espressolab.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Selin Koç (Espresso Lab - Barista)',
                'email' => 'selin@espressolab.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Mert Acar (Espresso Lab - Garson)',
                'email' => 'mert@espressolab.com',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($espressoLabUsers as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }

        // Test Müşterileri (Genel)
        $testCustomers = [
            [
                'name' => 'Test Müşteri',
                'email' => 'customer@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Ali Veli',
                'email' => 'ali@test.com',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($testCustomers as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }

        $this->command->info('✅ Tüm kafeler için kullanıcılar oluşturuldu!');
        $this->command->info('   📋 Toplam: ' . User::count() . ' kullanıcı');
    }
}
