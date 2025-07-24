<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Store;
use App\Models\StoreCustomer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        $productIds = [1, 2, 3]; // Placeholder, to be replaced in seeder for real relations
        return [
            'store_id' => Store::factory(),
            'customer_id' => StoreCustomer::factory(),
            'product_ids' => json_encode($productIds),
            'total_price' => $this->faker->randomFloat(2, 20, 2000),
            'payment_method' => $this->faker->randomElement(['mpesa', 'card', 'cash']),
            'status' => $this->faker->randomElement(['pending', 'complete', 'delivered', 'cancelled']),
        ];
    }
}
