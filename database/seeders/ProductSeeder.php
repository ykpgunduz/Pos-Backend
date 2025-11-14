<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Cafe;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Her kafe için kategorilere uygun ürünler oluşturur.
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

        // KAHVE DURAĞI ÜRÜNLERİ
        $this->seedKahveDuragi($kahveDuragi);

        // MOLA KAFE ÜRÜNLERİ
        $this->seedMolaKafe($molaKafe);

        // ESPRESSO LAB ÜRÜNLERİ
        $this->seedEspressoLab($espressoLab);

        $this->command->info('✅ Tüm kafeler için ürünler oluşturuldu!');
    }

    private function seedKahveDuragi($cafe)
    {
        $categories = Category::where('cafe_id', $cafe->id)->get()->keyBy('name');

        // Sıcak İçecekler
        $sicakIcecekler = [
            ['name' => 'Espresso', 'description' => 'Yoğun ve aromatik espresso', 'price' => 45, 'stock' => 100, 'star' => 5],
            ['name' => 'Double Espresso', 'description' => 'Çift shot espresso', 'price' => 65, 'stock' => 100, 'star' => 5],
            ['name' => 'Americano', 'description' => 'Espresso ve sıcak su', 'price' => 50, 'stock' => 100, 'star' => 4],
            ['name' => 'Cappuccino', 'description' => 'Espresso, süt köpüğü ve tarçın', 'price' => 60, 'stock' => 80, 'star' => 5],
            ['name' => 'Latte', 'description' => 'Espresso ve bol sütlü kahve', 'price' => 65, 'stock' => 80, 'star' => 5],
            ['name' => 'Türk Kahvesi', 'description' => 'Geleneksel Türk kahvesi', 'price' => 40, 'stock' => 50, 'star' => 4],
            ['name' => 'Sıcak Çikolata', 'description' => 'Kremalı sıcak çikolata', 'price' => 55, 'stock' => 60, 'star' => 5],
        ];

        foreach ($sicakIcecekler as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Sıcak İçecekler']->id,
                'active' => true,
            ]));
        }

        // Soğuk İçecekler
        $sogukIcecekler = [
            ['name' => 'Ice Latte', 'description' => 'Buzlu latte', 'price' => 70, 'stock' => 70, 'star' => 5],
            ['name' => 'Ice Americano', 'description' => 'Buzlu americano', 'price' => 55, 'stock' => 70, 'star' => 4],
            ['name' => 'Frappe', 'description' => 'Köpüklü buzlu kahve', 'price' => 75, 'stock' => 60, 'star' => 5],
            ['name' => 'Limonata', 'description' => 'Ev yapımı limonata', 'price' => 45, 'stock' => 50, 'star' => 4],
            ['name' => 'Portakal Suyu', 'description' => 'Taze sıkılmış portakal suyu', 'price' => 50, 'stock' => 40, 'star' => 5],
        ];

        foreach ($sogukIcecekler as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Soğuk İçecekler']->id,
                'active' => true,
            ]));
        }

        // Tatlılar
        $tatlilar = [
            ['name' => 'Cheesecake', 'description' => 'Özel cheesecake dilimi', 'price' => 85, 'stock' => 20, 'star' => 5],
            ['name' => 'Brownie', 'description' => 'Çikolatalı brownie', 'price' => 60, 'stock' => 30, 'star' => 5],
            ['name' => 'Tiramisu', 'description' => 'İtalyan tiramisu', 'price' => 90, 'stock' => 15, 'star' => 5],
            ['name' => 'Kurabiye', 'description' => 'Ev yapımı kurabiye (3 adet)', 'price' => 40, 'stock' => 50, 'star' => 4],
        ];

        foreach ($tatlilar as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Tatlılar']->id,
                'active' => true,
            ]));
        }

        // Kahvaltı
        $kahvalti = [
            ['name' => 'Croissant', 'description' => 'Tereyağlı croissant', 'price' => 50, 'stock' => 25, 'star' => 5],
            ['name' => 'Peynirli Tost', 'description' => 'Kaşar peynirli tost', 'price' => 65, 'stock' => 30, 'star' => 4],
            ['name' => 'Menemen', 'description' => 'Geleneksel menemen', 'price' => 80, 'stock' => 20, 'star' => 5],
            ['name' => 'Omlet', 'description' => 'Sebzeli omlet', 'price' => 75, 'stock' => 20, 'star' => 4],
        ];

        foreach ($kahvalti as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Kahvaltı']->id,
                'active' => true,
            ]));
        }
    }

    private function seedMolaKafe($cafe)
    {
        $categories = Category::where('cafe_id', $cafe->id)->get()->keyBy('name');

        // Kahve Çeşitleri
        $kahveler = [
            ['name' => 'Espresso', 'description' => 'Klasik İtalyan espresso', 'price' => 50, 'stock' => 100, 'star' => 5],
            ['name' => 'Macchiato', 'description' => 'Espresso macchiato', 'price' => 55, 'stock' => 80, 'star' => 5],
            ['name' => 'Flat White', 'description' => 'Avustralya usulü kahve', 'price' => 70, 'stock' => 70, 'star' => 5],
            ['name' => 'Mocha', 'description' => 'Çikolatalı kahve', 'price' => 75, 'stock' => 60, 'star' => 5],
            ['name' => 'Affogato', 'description' => 'Dondurmalı espresso', 'price' => 80, 'stock' => 40, 'star' => 5],
        ];

        foreach ($kahveler as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Kahve Çeşitleri']->id,
                'active' => true,
            ]));
        }

        // Çaylar
        $caylar = [
            ['name' => 'Earl Grey', 'description' => 'Bergamot aromalı siyah çay', 'price' => 35, 'stock' => 100, 'star' => 4],
            ['name' => 'Yeşil Çay', 'description' => 'Organik yeşil çay', 'price' => 40, 'stock' => 100, 'star' => 4],
            ['name' => 'Papatya Çayı', 'description' => 'Rahatlatıcı papatya çayı', 'price' => 35, 'stock' => 80, 'star' => 4],
            ['name' => 'Nane-Limon', 'description' => 'Nane ve limonlu bitki çayı', 'price' => 40, 'stock' => 80, 'star' => 5],
        ];

        foreach ($caylar as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Çaylar']->id,
                'active' => true,
            ]));
        }

        // Smoothie & Milkshake
        $smoothies = [
            ['name' => 'Berry Smoothie', 'description' => 'Karışık meyve smoothie', 'price' => 65, 'stock' => 50, 'star' => 5],
            ['name' => 'Mango Smoothie', 'description' => 'Taze mango smoothie', 'price' => 70, 'stock' => 50, 'star' => 5],
            ['name' => 'Çikolatalı Milkshake', 'description' => 'Çikolatalı milkshake', 'price' => 75, 'stock' => 40, 'star' => 5],
            ['name' => 'Çilekli Milkshake', 'description' => 'Çilekli milkshake', 'price' => 75, 'stock' => 40, 'star' => 5],
        ];

        foreach ($smoothies as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Smoothie & Milkshake']->id,
                'active' => true,
            ]));
        }

        // Atıştırmalıklar
        $atistirmaliklar = [
            ['name' => 'Çıtır Patates', 'description' => 'Baharatlı patates kızartması', 'price' => 55, 'stock' => 40, 'star' => 4],
            ['name' => 'Nachos', 'description' => 'Soslu nachos', 'price' => 70, 'stock' => 30, 'star' => 5],
            ['name' => 'Mini Pizza', 'description' => 'Kişisel pizza', 'price' => 85, 'stock' => 25, 'star' => 5],
        ];

        foreach ($atistirmaliklar as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Atıştırmalıklar']->id,
                'active' => true,
            ]));
        }

        // Özel Tarifler
        $ozelTarifler = [
            ['name' => 'Mola Special', 'description' => 'Özel karışım kahve', 'price' => 90, 'stock' => 50, 'star' => 5],
            ['name' => 'Badem Latte', 'description' => 'Badem sütlü latte', 'price' => 80, 'stock' => 60, 'star' => 5],
            ['name' => 'Karamel Macchiato', 'description' => 'Karamelli macchiato', 'price' => 85, 'stock' => 50, 'star' => 5],
        ];

        foreach ($ozelTarifler as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Özel Tarifler']->id,
                'active' => true,
            ]));
        }
    }

    private function seedEspressoLab($cafe)
    {
        $categories = Category::where('cafe_id', $cafe->id)->get()->keyBy('name');

        // Signature Espresso
        $espressos = [
            ['name' => 'Single Origin Ethiopia', 'description' => 'Etiyopya özel çekirdek', 'price' => 70, 'stock' => 80, 'star' => 5],
            ['name' => 'Single Origin Colombia', 'description' => 'Kolombiya özel çekirdek', 'price' => 75, 'stock' => 80, 'star' => 5],
            ['name' => 'Lab Blend Espresso', 'description' => 'Özel harmanlama', 'price' => 65, 'stock' => 100, 'star' => 5],
            ['name' => 'Ristretto', 'description' => 'Yoğun kısa espresso', 'price' => 60, 'stock' => 100, 'star' => 5],
            ['name' => 'Lungo', 'description' => 'Uzun espresso', 'price' => 60, 'stock' => 100, 'star' => 4],
        ];

        foreach ($espressos as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Signature Espresso']->id,
                'active' => true,
            ]));
        }

        // Filter Coffee
        $filterCoffees = [
            ['name' => 'V60 Pour Over', 'description' => 'El demleme kahve', 'price' => 80, 'stock' => 60, 'star' => 5],
            ['name' => 'Chemex', 'description' => 'Chemex usulü kahve', 'price' => 85, 'stock' => 50, 'star' => 5],
            ['name' => 'Aeropress', 'description' => 'Aeropress kahve', 'price' => 75, 'stock' => 60, 'star' => 5],
            ['name' => 'French Press', 'description' => 'French press kahve', 'price' => 70, 'stock' => 70, 'star' => 4],
        ];

        foreach ($filterCoffees as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Filter Coffee']->id,
                'active' => true,
            ]));
        }

        // Soğuk Demlemeler
        $coldBrews = [
            ['name' => 'Cold Brew', 'description' => '12 saat soğuk demleme', 'price' => 75, 'stock' => 60, 'star' => 5],
            ['name' => 'Nitro Cold Brew', 'description' => 'Azotlu soğuk demleme', 'price' => 85, 'stock' => 40, 'star' => 5],
            ['name' => 'Tonic Coffee', 'description' => 'Espresso ve tonik', 'price' => 80, 'stock' => 50, 'star' => 5],
        ];

        foreach ($coldBrews as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Soğuk Demlemeler']->id,
                'active' => true,
            ]));
        }

        // Ev Yapımı Pastalar
        $pastalar = [
            ['name' => 'Wortel Cake', 'description' => 'Havuçlu kek', 'price' => 95, 'stock' => 20, 'star' => 5],
            ['name' => 'Red Velvet', 'description' => 'Red velvet kek dilimi', 'price' => 100, 'stock' => 15, 'star' => 5],
            ['name' => 'San Sebastian', 'description' => 'San Sebastian cheesecake', 'price' => 110, 'stock' => 12, 'star' => 5],
            ['name' => 'Lemon Tart', 'description' => 'Limonlu tart', 'price' => 90, 'stock' => 18, 'star' => 5],
        ];

        foreach ($pastalar as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Ev Yapımı Pastalar']->id,
                'active' => true,
            ]));
        }

        // Sandviçler
        $sandvicler = [
            ['name' => 'Club Sandwich', 'description' => 'Tavuklu club sandwich', 'price' => 95, 'stock' => 25, 'star' => 5],
            ['name' => 'Veggie Sandwich', 'description' => 'Sebzeli sandviç', 'price' => 85, 'stock' => 25, 'star' => 4],
            ['name' => 'Tuna Sandwich', 'description' => 'Ton balıklı sandviç', 'price' => 90, 'stock' => 20, 'star' => 5],
            ['name' => 'Bagel', 'description' => 'Somon ve krem peynirli bagel', 'price' => 100, 'stock' => 15, 'star' => 5],
        ];

        foreach ($sandvicler as $product) {
            Product::create(array_merge($product, [
                'cafe_id' => $cafe->id,
                'category_id' => $categories['Sandviçler']->id,
                'active' => true,
            ]));
        }
    }
}
