<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $productIds = Product::pluck('id')->toArray();
        Order::factory(30)->make()->each(function ($order) use ($productIds) {
            $order->product_ids = json_encode(collect($productIds)->random(rand(1, 3))->values()->all());
            $order->save();
        });
    }
}
