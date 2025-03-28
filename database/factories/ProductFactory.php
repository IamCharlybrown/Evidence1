<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'Name' => $this->faker->word(),
            'Description' => $this->faker->sentence(),
            'Price' => $this->faker->randomFloat(2, 10, 1000),
            'Stock' => $this->faker->numberBetween(1, 100),
            'Category' => $this->faker->word(),
            'Created_By' => User::factory(),
        ];
    }
}
