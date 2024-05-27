<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'stock_id' => $this->stock_id,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'date' => $this->date,
            'debit' => $this->debit,
            'kredit' => $this->kredit,
            'saldo' => $this->saldo,
            'record_type' => $this->record_type,
        ];
    }
}
