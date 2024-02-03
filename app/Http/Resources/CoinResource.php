<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CoinResource extends ResourceCollection
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
            "name" => $this->resource['name'],
            "image" => $this->resource['image'],
            "current_price" => $this->resource['current_price'],
            "market_cap" => $this->resource['market_cap'],
            "market_cap_rank" => $this->resource['market_cap_rank'],
            "fully_diluted_valuation" => $this->resource['fully_diluted_valuation'],
            "total_volume" => $this->resource['total_volume'],
            "high_24h" => $this->resource['high_24h'],
            "low_24h" => $this->resource['low_24h'],
            "price_change_24h" => $this->resource['price_change_24h'],
            "price_change_percentage_24h" => $this->resource['price_change_percentage_24h'],
            "market_cap_change_24h" => $this->resource['market_cap_change_24h'],
            "market_cap_change_percentage_24h" => $this->resource['market_cap_change_percentage_24h'],
        ];
    }
}
