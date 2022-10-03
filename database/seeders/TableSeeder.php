<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Table;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 6;

        for ($i=1; $i < $limit+1; $i++) {
            Table::create([
                'unique_target' => 'tafel-' . $i,
                'location' => json_encode([
                    'y' => 0,
                    'x' => 0,
                ]),
            ]);
        }
    }
}
