<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $cities = [
            [
                'name' => 'Yogyakarta',
                'shipping_cost' => 10000
            ],
            [
                'name' => 'Balikpapan',
                'shipping_cost' => 50000
            ],
            [
                'name' => 'Jakarta',
                'shipping_cost' => 35000
            ],
            [
                'name' => 'Surabaya',
                'shipping_cost' => 25000
            ],
            [
                'name' => 'Malang',
                'shipping_cost' => 20000
            ],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }

        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@mail.com',
                'role' => 1,
                'phone_number' => "08112233",
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'role' => 0,
                'phone_number' => "08112233",
                'password' => bcrypt('password'),
                'city_id' => City::all()->random()->id
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
        User::factory(15)->create();

        // Menu::factory(10)->create();
        $menus = [
            [
                'name' => 'Roti Maryam Coklat',
                'price' => rand(10000, 20000),
                'picture' => 'roti1.jpg',
            ],
            [
                'name' => 'Roti Maryam Madu',
                'price' => rand(10000, 20000),
                'picture' => 'roti2.jpg',
            ],
            [
                'name' => 'Roti Maryam Keju',
                'price' => rand(10000, 20000),
                'picture' => 'roti3.jpg',
            ],
            [
                'name' => 'Roti Maryam Greentea',
                'price' => rand(10000, 20000),
                'picture' => 'roti4.jpg',
            ],
            [
                'name' => 'Roti Maryam Stroberi',
                'price' => rand(10000, 20000),
                'picture' => 'roti5.jpg',
            ],
            [
                'name' => 'Roti Maryam Kurma',
                'price' => rand(10000, 20000),
                'picture' => 'roti6.jpg',
            ],
        ];

        foreach ($menus as $key => $menu) {
            Menu::create($menu);
        }

        Order::factory(5)->create();

        foreach (Order::all() as $order) {
            $menus = Menu::inRandomOrder()->take(rand(3, 5))->pluck('id');
            foreach ($menus as $menu) {
                $order->menus()->attach($menu, ['qty' => rand(1, 15)]);
            }
        }
    }
}