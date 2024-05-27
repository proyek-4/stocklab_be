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
        DB::table('records')->delete();

        DB::table('records')->insert([
            [
                'stock_id' => 1,
                'name' => 'Accu',
                'quantity' => 2,
                'date' => '2024-03-30',
                'debit' => 40000,
                'kredit' => 0,
                'saldo' => 40000,
                'record_type' => 'out', // Barang keluar
            ],
            [
                'stock_id' => 1,
                'name' => 'Accu',
                'quantity' => 1,
                'date' => '2024-03-30',
                'debit' => 0,
                'kredit' => 20000,
                'saldo' => -20000,
                'record_type' => 'in', // Barang masuk
            ],
            [
                'stock_id' => 2,
                'name' => 'Oli',
                'quantity' => 5,
                'date' => '2024-03-30',
                'debit' => 0,
                'kredit' => 150000, // 5 * 30000
                'saldo' => -150000,
                'record_type' => 'in', // Barang masuk
            ],
        ]);
    }
}
