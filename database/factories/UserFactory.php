<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
      // Nombre del modelo relacionado
      protected $model = User::class;

      /**
       * Define the model's default state.
       *
       * @return array
       */
      public function definition()
      {
          return [
              'role_id' => Role::inRandomOrder()->first()->id, // Obtiene un role aleatorio
              'Name' => $this->faker->name,
              'Email' => $this->faker->unique()->safeEmail,
              'Password' => bcrypt('password'), // Encriptación de la contraseña
          ];
      }
}
