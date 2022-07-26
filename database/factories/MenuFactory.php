<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomNumber(5, true),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];
    }
}