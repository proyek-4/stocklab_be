<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseResource extends JsonResource
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
            'name' => $this->name,
            'location' => $this->location,
            'user_id' => $this->user_id,
            'stocks' => $this->stocks, // Assuming you want to include related stocks
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
