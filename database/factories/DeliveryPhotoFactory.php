<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderStatus;
use App\Models\DeliveryPhoto;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryPhoto>
 */
class DeliveryPhotoFactory extends Factory
{
    
        // Nombre del modelo relacionado
        protected $model = DeliveryPhoto::class;
    
        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            return [
                'Status_ID' => OrderStatus::inRandomOrder()->first()->id, // Obtiene un Status aleatorio
                'PhotoURL' => $this->faker->imageUrl(640, 480, 'nature'), // Genera una URL de imagen aleatoria
                'Type' => $this->faker->word, // Genera un tipo aleatorio
            ];
        }
}
