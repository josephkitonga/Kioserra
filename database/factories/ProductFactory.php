<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'image_url' => $this->faker->imageUrl(400, 400, 'product'),
            'description' => $this->faker->sentence(10),
            'store_id' => Store::factory(),
            'category' => $this->faker->word(),
            'available' => $this->faker->boolean(90),
        ];
    }
}
