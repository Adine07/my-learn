<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 30000; $i++) { 
            $order = [
                'product_code' => 'PRD-' . rand(1,4),
                'qty' => rand(1, 100),
                'price' => rand(1000, 100000)
            ];
            Order::create($order);
        }
    }
}
