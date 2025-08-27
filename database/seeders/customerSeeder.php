<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $customers = [
            ['customer_id' => 1, 'name' => 'Alice Johnson', 'email' => 'alice@example.com'],
            ['customer_id' => 2, 'name' => 'Bob Smith', 'email' => 'bob@example.com'],
            ['customer_id' => 3, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com'],
            ['customer_id' => 4, 'name' => 'David Miller', 'email' => 'david@example.com'],
            ['customer_id' => 5, 'name' => 'Eva Green', 'email' => 'eva@example.com'],
            ['customer_id' => 6, 'name' => 'Frank White', 'email' => 'frank@example.com'],
            ['customer_id' => 7, 'name' => 'Grace Lee', 'email' => 'grace@example.com'],
            ['customer_id' => 8, 'name' => 'Henry Adams', 'email' => 'henry@example.com'],
            ['customer_id' => 9, 'name' => 'Ivy Walker', 'email' => 'ivy@example.com'],
            ['customer_id' => 10, 'name' => 'Jack Turner', 'email' => 'jack@example.com'],
        ];

        DB::table('customers')->insert($customers);
        // Insert orders for each customer (1–3 orders each)
                $orders = [];
                $orderId = 1;

                foreach ($customers as $customer) {
                    $numOrders = rand(1, 3); // each customer has 1–3 orders

                    for ($i = 0; $i < $numOrders; $i++) {
                        $orders[] = [
                            'order_id'    => $orderId++,
                            'customer_id' => $customer['customer_id'],
                            'order_date'  => Carbon::now()->subDays(rand(100, 2000))->toDateString(),
                            'amount'      => rand(100, 1000),
                        ];
                    }
                }

                DB::table('orders')->insert($orders);

    }
}
