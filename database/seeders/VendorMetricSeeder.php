<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VendorMetric;

class VendorMetricSeeder extends Seeder
{
    public function run(): void
    {
        VendorMetric::factory(10)->create();
    }
}
