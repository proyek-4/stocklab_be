<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('warehouses')->truncate();
        DB::table('warehouses')->insert([
            [
                'name' => 'Gudang 1',
                'user_id' => 1,
            ],
        ]);
    }
}
