<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'harga' => $this->faker->randomNumber(5, true),
            'deskripsi' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ];
    }
}