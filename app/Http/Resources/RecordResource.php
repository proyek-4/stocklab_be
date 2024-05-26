<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
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
        ];
    }
}
