<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->city(),
            'shipping_cost' => rand(10000, 50000)
        ];
    }
}