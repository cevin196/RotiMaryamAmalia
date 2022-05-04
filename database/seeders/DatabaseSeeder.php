<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@mail.com',
                'tipe' => 1,
                'telepon' => "08112233",
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'tipe' => 0,
                'telepon' => "08112233",
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
        User::factory(15)->create();

        Menu::factory(10)->create();
        Pesanan::factory(5)->create();

        foreach (Pesanan::all() as $pesanan) {
            $menus = Menu::inRandomOrder()->take(rand(1, 3))->pluck('id');
            foreach ($menus as $menu) {
                $pesanan->menus()->attach($menu, ['qty' => rand(1, 15)]);
            }
        }
    }
}