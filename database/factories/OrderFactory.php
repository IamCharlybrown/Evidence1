<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use App\Models\OrderStatus;
use App\Models\DeliveryPhoto;
use App\Models\Order;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
   // Nombre del modelo relacionado
   protected $model = Order::class;

   /**
    * Define the model's default state.
    *
    * @return array
    */
   public function definition()
   {
       return [
           'Client_ID' => Client::inRandomOrder()->first()->id, // Obtiene un Cliente aleatorio
           'Status_ID' => OrderStatus::inRandomOrder()->first()->id, // Obtiene un Status aleatorio
           'InvoiceNumber' => $this->faker->uuid, // Genera un número de factura aleatorio
           'DateTime' => $this->faker->dateTimeThisYear->format('Y-m-d H:i:s'), // Genera una fecha y hora aleatoria
           'DeliveryAddress' => $this->faker->address, // Genera una dirección aleatoria
           'Notes' => $this->faker->sentence, // Genera una nota aleatoria
           'Delivery_Photo_ID' => DeliveryPhoto::inRandomOrder()->first()->id, // Obtiene una foto de entrega aleatoria
       ];
   }
}
