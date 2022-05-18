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

        // Menu::factory(10)->create();
        $menus = [
            [
                'nama' => 'Roti Maryam Coklat',
                'harga' => rand(10000, 20000),
                'gambar' => 'roti1.jpg',
            ],
            [
                'nama' => 'Roti Maryam Madu',
                'harga' => rand(10000, 20000),
                'gambar' => 'roti2.jpg',
            ],
            [
                'nama' => 'Roti Maryam Keju',
                'harga' => rand(10000, 20000),
                'gambar' => 'roti3.jpg',
            ],
            [
                'nama' => 'Roti Maryam Greentea',
                'harga' => rand(10000, 20000),
                'gambar' => 'roti4.jpg',
            ],
            [
                'nama' => 'Roti Maryam Stroberi',
                'harga' => rand(10000, 20000),
                'gambar' => 'roti5.jpg',
            ],
            [
                'nama' => 'Roti Maryam Kurma',
                'harga' => rand(10000, 20000),
                'gambar' => 'roti6.jpg',
            ],
        ];

        foreach ($menus as $key => $menu) {
            Menu::create($menu);
        }

        Pesanan::factory(5)->create();

        foreach (Pesanan::all() as $pesanan) {
            $menus = Menu::inRandomOrder()->take(rand(3, 5))->pluck('id');
            foreach ($menus as $menu) {
                $pesanan->menus()->attach($menu, ['qty' => rand(1, 15)]);
            }
        }
    }
}