<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'name' => 'Piet',
                'password' => Hash::make('test123'),
                'tel_number' => rand(1111111111, 9999999999),
                'adress' => 'Straat ' . rand(1, 100),
                'city' => 'Amsterdam',
            ],
            [
                'name' => 'Jan',
                'password' => Hash::make('test123'),
                'tel_number' => rand(1111111111, 9999999999),
                'adress' => 'Straat ' . rand(1, 100),
                'city' => 'Rotterdam',
            ],
            [
                'name' => 'Thomas',
                'password' => Hash::make('test123'),
                'tel_number' => rand(1111111111, 9999999999),
                'adress' => 'Straat ' . rand(1, 100),
                'city' => 'Den Haag',
            ],
            [
                'name' => 'Xander',
                'password' => Hash::make('test123'),
                'tel_number' => rand(1111111111, 9999999999),
                'adress' => 'Straat' . rand(1, 100),
                'city' => 'Haps',
            ],
            [
                'name' => 'Tino',
                'password' => Hash::make('test123'),
                'tel_number' => rand(1111111111, 9999999999),
                'adress' => 'Straat ' . rand(1, 100),
                'city' => 'Oploo',
            ],
            [
                'name' => 'Bram',
                'password' => Hash::make('test123'),
                'tel_number' => rand(1111111111, 9999999999),
                'adress' => 'Straat ' . rand(1, 100),
                'city' => 'Gennep',
            ],
            [
                'name' => 'Daan',
                'password' => Hash::make('test123'),
                'tel_number' => rand(1111111111, 9999999999),
                'adress' => 'Straat ' . rand(1, 100),
                'city' => 'Zeeland',
            ],
        ];

        foreach($customers as $customer) {
            Customer::create([
                'name' => $customer['name'],
                'email' => $customer['name'] . '@email.com',
                'password' => $customer['password'],
                'tel_number' => $customer['tel_number'],
                'adress' => $customer['adress'],
                'city' => $customer['city'],
            ]);
        }
    }
}
