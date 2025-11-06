<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'cafe_id' => 1,
            'category_id' => 1,
            'image' => null,
            'name' => $this->faker->word() . ' ' . $this->faker->randomElement(['Coffee','Latte','Espresso','Tea']),
            'description' => $this->faker->sentence(6),
            'price' => $this->faker->numberBetween(50, 500),
            'stock' => $this->faker->numberBetween(0, 100),
            'active' => $this->faker->boolean(90),
            'star' => $this->faker->numberBetween(0,5),
        ];
    }
}
