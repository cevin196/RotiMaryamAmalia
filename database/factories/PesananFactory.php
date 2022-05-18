<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PesananFactory extends Factory
{
    public function definition()
    {
        $user = User::all()->random();
        return [
            'user_id' => $user,
            'tanggal' => Carbon::now(),
            'total' => rand(15000, 150000),
            'nomor_pesanan' => $this->faker->numberBetween($min = 1000000, $max = 9000000),

            'nama' => $user->name,
            'telepon' => $user->telepon,
            'alamat' => $this->faker->address(),
            'email' => $user->email,

        ];
    }
}