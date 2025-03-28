<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Client;
use App\Models\OrderStatus;
use App\Models\DeliveryPhoto;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'Client_ID' => Client::factory(),
            'Status_ID' => OrderStatus::factory(),
            'InvoiceNumber' => $this->faker->unique()->numerify('INV#####'),
            'DateTime' => $this->faker->dateTime(),
            'DeliveryAddress' => $this->faker->address(),
            'Notes' => $this->faker->sentence(),
            'Delivery_Photo_ID' => DeliveryPhoto::factory(),
        ];
    }
}
