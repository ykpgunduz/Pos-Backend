<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Cafe;

class CafeSeeder extends Seeder
{
    /**
     * Veritabanına 3 gerçekçi kafe ekler.
     */
    public function run(): void
    {
        $cafes = [
            [
                'name' => 'Kahve Durağı',
                'email' => 'info@kahveduragi.com',
                'password' => Hash::make('password123'),
                'description' => 'Özel çekirdek kahveleri ve ev yapımı pastalarıyla hizmet veren modern bir kafe.',
                'phone' => '0212 555 0101',
                'address' => 'Bağdat Caddesi No:123, Kadıköy, İstanbul',
                'address_link' => 'https://maps.google.com/?q=Kadikoy+Istanbul',
                'insta_name' => '@kahveduragi',
                'insta_link' => 'https://instagram.com/kahveduragi',
                'opening_time' => 8,  // 08:00
                'closing_time' => 22, // 22:00
            ],
            [
                'name' => 'Mola Kafe',
                'email' => 'contact@molakafe.com',
                'password' => Hash::make('password123'),
                'description' => 'Huzurlu atmosferi ve özel kahve çeşitleriyle gününüze mola verin.',
                'phone' => '0216 444 0202',
                'address' => 'Nişantaşı Mahallesi, Vali Konağı Caddesi No:45, Şişli, İstanbul',
                'address_link' => 'https://maps.google.com/?q=Nisantasi+Istanbul',
                'insta_name' => '@molakafe',
                'insta_link' => 'https://instagram.com/molakafe',
                'opening_time' => 7,  // 07:00
                'closing_time' => 23, // 23:00
            ],
            [
                'name' => 'Espresso Lab',
                'email' => 'hello@espressolab.com',
                'password' => Hash::make('password123'),
                'description' => 'Kahve tutkunları için özel blend\'ler ve barista eğitimleri.',
                'phone' => '0212 333 0303',
                'address' => 'İstiklal Caddesi No:87, Beyoğlu, İstanbul',
                'address_link' => 'https://maps.google.com/?q=Istiklal+Beyoglu',
                'insta_name' => '@espressolab',
                'insta_link' => 'https://instagram.com/espressolab',
                'opening_time' => 9,  // 09:00
                'closing_time' => 24, // 24:00 (Gece yarısı)
            ],
        ];

        foreach ($cafes as $cafeData) {
            Cafe::firstOrCreate(
                ['email' => $cafeData['email']],
                $cafeData
            );
        }

        $this->command->info('✅ 3 kafe başarıyla oluşturuldu!');
    }
}
