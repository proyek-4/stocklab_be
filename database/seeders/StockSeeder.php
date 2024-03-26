<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stocks')->truncate();
        DB::table('stocks')->insert([
            [
                'name' => 'Accu',
                'price' => 20000,
                'quantity' => 10,
                'image' => 'default.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In elit velit, vestibulum quis euismod vitae, bibendum at nisi. Cras vitae suscipit ligula.'
            ],
            [
                'name' => 'Oli',
                'price' => 30000,
                'quantity' => 20,
                'image' => 'default.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In elit velit, vestibulum quis euismod vitae, bibendum at nisi. Cras vitae suscipit ligula.'
            ],
            [
                'name' => 'Radiator',
                'price' => 499999,
                'quantity' => 30,
                'image' => 'default.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In elit velit, vestibulum quis euismod vitae, bibendum at nisi. Cras vitae suscipit ligula.'
            ],
            [
                'name' => 'Ban',
                'price' => 200000,
                'quantity' => 40,
                'image' => 'default.png',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In elit velit, vestibulum quis euismod vitae, bibendum at nisi. Cras vitae suscipit ligula.'
            ],
        ]);
    }
}
