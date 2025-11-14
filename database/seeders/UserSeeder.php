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
                'name' => 'Ahmet Yılmaz',
                'email' => 'ahmet@kahveduragi.com',
                'password' => Hash::make('password123'),
                'role' => 'manager', // Yönetici
            ],
            [
                'name' => 'Ayşe Demir',
                'email' => 'ayse@kahveduragi.com',
                'password' => Hash::make('password123'),
                'role' => 'barista', // Barista
            ],
            [
                'name' => 'Mehmet Kaya',
                'email' => 'mehmet@kahveduragi.com',
                'password' => Hash::make('password123'),
                'role' => 'waiter', // Garson
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
                'name' => 'Zeynep Şahin',
                'email' => 'zeynep@molakafe.com',
                'password' => Hash::make('password123'),
                'role' => 'manager',
            ],
            [
                'name' => 'Can Arslan',
                'email' => 'can@molakafe.com',
                'password' => Hash::make('password123'),
                'role' => 'barista',
            ],
            [
                'name' => 'Elif Çelik',
                'email' => 'elif@molakafe.com',
                'password' => Hash::make('password123'),
                'role' => 'waiter',
            ],
            [
                'name' => 'Burak Öztürk',
                'email' => 'burak@molakafe.com',
                'password' => Hash::make('password123'),
                'role' => 'chef', // Aşçı
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
                'name' => 'Deniz Aydın',
                'email' => 'deniz@espressolab.com',
                'password' => Hash::make('password123'),
                'role' => 'manager',
            ],
            [
                'name' => 'Cem Yıldız',
                'email' => 'cem@espressolab.com',
                'password' => Hash::make('password123'),
                'role' => 'head_barista', // Baş Barista
            ],
            [
                'name' => 'Selin Koç',
                'email' => 'selin@espressolab.com',
                'password' => Hash::make('password123'),
                'role' => 'barista',
            ],
            [
                'name' => 'Mert Acar',
                'email' => 'mert@espressolab.com',
                'password' => Hash::make('password123'),
                'role' => 'waiter',
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
                'role' => 'customer',
            ],
            [
                'name' => 'Ali Veli',
                'email' => 'ali@test.com',
                'password' => Hash::make('password123'),
                'role' => 'customer',
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
