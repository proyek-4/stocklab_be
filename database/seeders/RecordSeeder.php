<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('records')->truncate();
        DB::table('records')->insert([
            [
                'stock_id' => 1,
                'name' => 'Accu',
                'quantity' => 2,
                'date' => '2024-03-30',
                'debit' => 40000,
                'kredit' => 0,
                'saldo' => 40000,
            ],
            [
                'stock_id' => 1,
                'name' => 'Accu',
                'quantity' => 1,
                'date' => '2024-03-30',
                'debit' => 0,
                'kredit' => 20000,
                'saldo' => 20000,
            ],
        ]);
    }
}
