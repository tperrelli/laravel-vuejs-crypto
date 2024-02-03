<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoinDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->resource['id'],
            "symbol" => $this->resource['symbol'],
            "description" => $this->resource['description'],
            "images" => $this->resource['image'],
            "market_data" => $this->resource['market_data'],
            "last_updated" => $this->resource['last_updated'],
        ];
    }
}
