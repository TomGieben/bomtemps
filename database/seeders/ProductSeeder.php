<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

        $products = [
            [
                'name' => 'Tomatensoep',
                'price' => rand(1, 99),
            ],
            [
                'name' => 'Brood',
                'price' => rand(1, 99),
            ],
            [
                'name' => 'Hamburger',
                'price' => rand(1, 99),
            ],
            [
                'name' => 'Sla',
                'price' => rand(1, 99),
            ],
            [
                'name' => 'Gehaktbal',
                'price' => rand(1, 99),
            ],
            [
                'name' => 'Schnitzel',
                'price' => rand(1, 99),
            ],
            [
                'name' => 'Aardappel',
                'price' => rand(1, 99),
            ],
            [
                'name' => 'Spaghetti',
                'price' => rand(1, 99),
            ],
            [
                'name' => 'Pizza',
                'price' => rand(1, 99),
            ],
        ];

        foreach($products as $product) {
            Product::create([
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' =>  $description,
                'price' => $product['price'],
            ]);
        }
    }
}
