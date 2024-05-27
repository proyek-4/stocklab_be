<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class StockResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->price,
            'cost' => $this->cost,  // Menambahkan cost
            'quantity' => $this->quantity,
            'date' => $this->date,
            'image' => Storage::url('public/stock/' . $this->image),
            'description' => $this->description,
            'warehouse_id' => $this->warehouse_id,
        ];
    }
}
