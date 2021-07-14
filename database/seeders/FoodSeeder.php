<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Table;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            [
                'name' => 'Nasi Goreng',
                'type' => 'makanan',
                'price' => 20000
            ],
            [
                'name' => 'Es Jeruk',
                'type' => 'minuman-dingin',
                'price' => 5000
            ],
            [
                'name' => 'Kentang Goreng',
                'type' => 'cemilan',
                'price' => 10000
            ],

        ];

        foreach ($foods as $food) {
            $food['status'] = 'ready';
            Food::updateOrCreate(['name' => $food['name']], $food);
        }

        for ($x=1; $x<=10; $x++) {
            Table::updateOrCreate(['name' => 'Meja '. $x], [
                'name' => 'Meja '. $x,
                'seat' => 4
            ]);
        }
    }
}
