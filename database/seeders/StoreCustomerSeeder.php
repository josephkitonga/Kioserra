<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StoreCustomer;

class StoreCustomerSeeder extends Seeder
{
    public function run(): void
    {
        StoreCustomer::factory(20)->create();
    }
}
