<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stocks')->insert([
            [
                'name' => 'Accu',
                'price' => 20000,
                'cost' => 15000, // Harga beli
                'quantity' => 10,
                'date' => '2024-03-30',
                'image' => 'default.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In elit velit, vestibulum quis euismod vitae, bibendum at nisi. Cras vitae suscipit ligula.',
                'warehouse_id' => 1,
            ],
            [
                'name' => 'Oli',
                'price' => 30000,
                'cost' => 25000, // Harga beli
                'quantity' => 20,
                'date' => '2024-03-30',
                'image' => 'default.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In elit velit, vestibulum quis euismod vitae, bibendum at nisi. Cras vitae suscipit ligula.',
                'warehouse_id' => 1,
            ],
            [
                'name' => 'Radiator',
                'price' => 499999,
                'cost' => 400000, // Harga beli
                'quantity' => 30,
                'date' => '2024-03-30',
                'image' => 'default.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In elit velit, vestibulum quis euismod vitae, bibendum at nisi. Cras vitae suscipit ligula.',
                'warehouse_id' => 1,
            ],
            [
                'name' => 'Ban',
                'price' => 200000,
                'cost' => 150000, // Harga beli
                'quantity' => 40,
                'date' => '2024-03-30',
                'image' => 'default.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In elit velit, vestibulum quis euismod vitae, bibendum at nisi. Cras vitae suscipit ligula.',
                'warehouse_id' => 1,
            ],
            [
                'name' => 'Accu',
                'price' => 20000,
                'cost' => 15000, // Harga beli
                'quantity' => 10,
                'date' => '2024-03-30',
                'image' => 'default.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In elit velit, vestibulum quis euismod vitae, bibendum at nisi. Cras vitae suscipit ligula.',
                'warehouse_id' => 2,
            ],
            [
                'name' => 'Oli',
                'price' => 30000,
                'cost' => 25000, // Harga beli
                'quantity' => 20,
                'date' => '2024-03-30',
                'image' => 'default.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In elit velit, vestibulum quis euismod vitae, bibendum at nisi. Cras vitae suscipit ligula.',
                'warehouse_id' => 2,
            ],
        ]);
    }
}
