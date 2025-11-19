<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kahve Ürünleri
        Product::create([
            'cafe_id' => 1,
            'category_id' => 1,
            'image' => null,
            'name' => 'Espresso',
            'description' => 'Küçük, sert ve aromatik espresso shot.',
            'price' => 45.00,
            'cost' => 12.50,
            'stock' => 50,
            'active' => true,
            'star' => 5,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 1,
            'image' => null,
            'name' => 'Americano',
            'description' => 'Espresso ve sıcak su ile hazırlanan klasik.',
            'price' => 50.00,
            'cost' => 15.00,
            'stock' => 45,
            'active' => true,
            'star' => 5,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 1,
            'image' => null,
            'name' => 'Türk Kahvesi',
            'description' => 'Geleneksel Türk kahvesi.',
            'price' => 40.00,
            'cost' => 10.00,
            'stock' => 60,
            'active' => true,
            'star' => 5,
        ]);

        // Süt Bazlı Kahveler
        Product::create([
            'cafe_id' => 1,
            'category_id' => 2,
            'image' => null,
            'name' => 'Cappuccino',
            'description' => 'Süt köpüğü ile servis edilen klasik cappuccino.',
            'price' => 65.00,
            'cost' => 22.50,
            'stock' => 30,
            'active' => true,
            'star' => 4,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 2,
            'image' => null,
            'name' => 'Latte',
            'description' => 'Sütlü ve yumuşak latte.',
            'price' => 60.00,
            'cost' => 20.00,
            'stock' => 25,
            'active' => true,
            'star' => 4,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 2,
            'image' => null,
            'name' => 'Flat White',
            'description' => 'Mikroköpük ile hazırlanan güçlü kahve.',
            'price' => 70.00,
            'cost' => 25.00,
            'stock' => 20,
            'active' => true,
            'star' => 5,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 2,
            'image' => null,
            'name' => 'Mocha',
            'description' => 'Çikolata ve espresso karışımı.',
            'price' => 75.00,
            'cost' => 28.00,
            'stock' => 35,
            'active' => true,
            'star' => 5,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 2,
            'image' => null,
            'name' => 'Caramel Macchiato',
            'description' => 'Karamel soslu macchiato.',
            'price' => 80.00,
            'cost' => 30.00,
            'stock' => 28,
            'active' => true,
            'star' => 4,
        ]);

        // Çaylar
        Product::create([
            'cafe_id' => 1,
            'category_id' => 3,
            'image' => null,
            'name' => 'Earl Grey Tea',
            'description' => 'Bergamot aromalı siyah çay.',
            'price' => 35.00,
            'cost' => 8.00,
            'stock' => 40,
            'active' => true,
            'star' => 3,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 3,
            'image' => null,
            'name' => 'Yeşil Çay',
            'description' => 'Antioksidan açısından zengin yeşil çay.',
            'price' => 30.00,
            'cost' => 7.00,
            'stock' => 50,
            'active' => true,
            'star' => 4,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 3,
            'image' => null,
            'name' => 'Nane Limon',
            'description' => 'Ferahlatıcı nane-limon çayı.',
            'price' => 30.00,
            'cost' => 6.50,
            'stock' => 45,
            'active' => true,
            'star' => 4,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 3,
            'image' => null,
            'name' => 'Ihlamur',
            'description' => 'Rahatlatıcı ıhlamur çayı.',
            'price' => 28.00,
            'cost' => 6.00,
            'stock' => 38,
            'active' => true,
            'star' => 3,
        ]);

        // Tatlılar ve Pastalar
        Product::create([
            'cafe_id' => 1,
            'category_id' => 4,
            'image' => null,
            'name' => 'Chocolate Muffin',
            'description' => 'Taze çikolatalı muffin.',
            'price' => 55.00,
            'cost' => 18.00,
            'stock' => 20,
            'active' => true,
            'star' => 5,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 4,
            'image' => null,
            'name' => 'Cheesecake',
            'description' => 'Kremsi cheesecake dilimi.',
            'price' => 85.00,
            'cost' => 32.00,
            'stock' => 15,
            'active' => true,
            'star' => 5,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 4,
            'image' => null,
            'name' => 'Tiramisu',
            'description' => 'İtalyan klasiği tiramisu.',
            'price' => 90.00,
            'cost' => 35.00,
            'stock' => 12,
            'active' => true,
            'star' => 5,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 4,
            'image' => null,
            'name' => 'Brownie',
            'description' => 'Yoğun çikolatalı brownie.',
            'price' => 50.00,
            'cost' => 16.00,
            'stock' => 25,
            'active' => true,
            'star' => 4,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 4,
            'image' => null,
            'name' => 'Croissant',
            'description' => 'Tereyağlı taze croissant.',
            'price' => 45.00,
            'cost' => 14.00,
            'stock' => 30,
            'active' => true,
            'star' => 4,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 4,
            'image' => null,
            'name' => 'San Sebastian',
            'description' => 'Meşhur San Sebastian cheesecake.',
            'price' => 95.00,
            'cost' => 38.00,
            'stock' => 10,
            'active' => true,
            'star' => 5,
        ]);

        // Soğuk İçecekler
        Product::create([
            'cafe_id' => 1,
            'category_id' => 1,
            'image' => null,
            'name' => 'Iced Latte',
            'description' => 'Buzlu latte.',
            'price' => 65.00,
            'cost' => 22.00,
            'stock' => 40,
            'active' => true,
            'star' => 5,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 1,
            'image' => null,
            'name' => 'Cold Brew',
            'description' => 'Soğuk demleme kahve.',
            'price' => 70.00,
            'cost' => 24.00,
            'stock' => 35,
            'active' => true,
            'star' => 5,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 2,
            'image' => null,
            'name' => 'Frappe',
            'description' => 'Köpüklü buzlu kahve.',
            'price' => 65.00,
            'cost' => 20.00,
            'stock' => 32,
            'active' => true,
            'star' => 4,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 3,
            'image' => null,
            'name' => 'Ice Tea Şeftali',
            'description' => 'Soğuk şeftali çayı.',
            'price' => 40.00,
            'cost' => 10.00,
            'stock' => 50,
            'active' => true,
            'star' => 4,
        ]);

        Product::create([
            'cafe_id' => 1,
            'category_id' => 3,
            'image' => null,
            'name' => 'Limonata',
            'description' => 'Ev yapımı taze limonata.',
            'price' => 35.00,
            'cost' => 8.50,
            'stock' => 45,
            'active' => true,
            'star' => 4,
        ]);
    }
}
