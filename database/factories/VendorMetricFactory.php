<?php

namespace Database\Factories;

use App\Models\VendorMetric;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorMetricFactory extends Factory
{
    protected $model = VendorMetric::class;

    public function definition(): array
    {
        return [
            'store_id' => Store::factory(),
            'product_count' => $this->faker->numberBetween(0, 100),
            'order_count' => $this->faker->numberBetween(0, 1000),
            'last_login' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
            'status' => $this->faker->randomElement(['active', 'suspended']),
        ];
    }
}
