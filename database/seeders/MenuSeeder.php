<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\TableMenu;
use App\Models\ProductMenu;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $description = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

        $menus = [
            [
                'name' => 'Vis',
                'price' => rand(1, 99),
            ],
            [
                'name' => 'Vlees',
                'price' => rand(1, 99),
            ],
            [
                'name' => 'Vega',
                'price' => rand(1, 99),
            ],
        ];

        foreach($menus as $menu) {
            $item = Menu::create([
                'name' => $menu['name'],
                'slug' => Str::slug($menu['name']),
                'description' =>  $description,
                'price' => $menu['price'],
            ]);


            for ($i=0; $i < rand(1, 10); $i++) {
                ProductMenu::create([
                    'menu_id' => $item->id,
                    'product_id' => rand(1, 9),
                ]);

                TableMenu::create([
                    'menu_id' => $item->id,
                    'table_id' => rand(1, 6),
                ]);
            }
        }
    }
}
