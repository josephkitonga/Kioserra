<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    protected $model = Subscription::class;

    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-1 year', 'now');
        $end = (clone $start)->modify('+1 month');
        return [
            'store_id' => Store::factory(),
            'start_date' => $start,
            'end_date' => $end,
            'amount_paid' => $this->faker->randomFloat(2, 100, 1000),
            'payment_method' => $this->faker->randomElement(['mpesa', 'card', 'cash']),
        ];
    }
}
