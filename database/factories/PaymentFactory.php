<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'store_id' => Store::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 2000),
            'status' => $this->faker->randomElement(['pending', 'success', 'failed']),
            'mpesa_ref' => $this->faker->optional()->bothify('MPESA#######'),
        ];
    }
}
