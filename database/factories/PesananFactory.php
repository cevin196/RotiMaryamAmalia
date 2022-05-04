<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PesananFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::all()->random(),
            'tanggal' => Carbon::now(),
        ];
    }
}