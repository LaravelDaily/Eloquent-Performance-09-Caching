<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book::pluck('id');
        Order::factory(100000)->create()->each(function($order) use ($books) {
            $order->books()->attach($books->random(), ['quantity' => rand(1,3)]);
        });
    }
}
