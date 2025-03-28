<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'role_id' => 1,
            'Name' => $this->faker->name(),
            'Email' => $this->faker->unique()->safeEmail(),
            'Password' => bcrypt('password'),
        ];
    }
}
