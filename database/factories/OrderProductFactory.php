<?php

namespace Database\Factories;

use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductFactory extends Factory
{
    protected $model = OrderProduct::class;

    public function definition()
    {
        return [
            'Order_ID' => Order::factory(),
            'Product_ID' => Product::factory(),
            'Quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
