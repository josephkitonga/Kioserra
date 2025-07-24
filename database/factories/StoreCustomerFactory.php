<?php

namespace Database\Factories;

use App\Models\StoreCustomer;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreCustomerFactory extends Factory
{
    protected $model = StoreCustomer::class;

    public function definition(): array
    {
        return [
            'store_id' => Store::factory(),
            'customer_email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->name(),
            'credit_limit' => $this->faker->randomFloat(2, 0, 1000),
            'credit_used' => $this->faker->randomFloat(2, 0, 500),
            'repayment_date' => $this->faker->optional()->dateTimeBetween('now', '+1 month'),
        ];
    }
}
