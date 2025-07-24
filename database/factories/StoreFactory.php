<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StoreFactory extends Factory
{
    protected $model = Store::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'slug' => Str::slug($this->faker->unique()->company()),
            'logo_url' => $this->faker->imageUrl(200, 200, 'business'),
            'owner_id' => User::factory(),
            'trial_expiry' => $this->faker->optional()->dateTimeBetween('+1 week', '+1 month'),
            'status' => $this->faker->randomElement(['active', 'suspended']),
            'whatsapp' => $this->faker->optional()->phoneNumber(),
        ];
    }
}
