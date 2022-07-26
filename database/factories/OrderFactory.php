<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition()
    {
        $user = User::all()->random();
        return [
            'user_id' => $user,
            'date' => Carbon::now(),
            'total' => rand(15000, 150000),
            'order_number' => $this->faker->numberBetween($min = 1000000, $max = 9000000),

            'city_id' => City::all()->random()->id,
            'name' => $user->name,
            'phone_number' => $user->phone_number,
            'address' => $this->faker->address(),
            'email' => $user->email,
            'status' => 'settlement'

        ];
    }
}