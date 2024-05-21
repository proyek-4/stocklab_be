<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_id',
        'name',
        'quantity',
        'date',
        'debit',
        'kredit',
        'saldo'
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
