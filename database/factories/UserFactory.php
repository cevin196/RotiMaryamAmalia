<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 0,
            'phone_number' => "08112233",
            'city_id' => City::all()->random()->id,
            'address' => $this->faker->address()
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                // 'email_verified_at' => null,
            ];
        });
    }
}