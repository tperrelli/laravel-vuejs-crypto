<?php

namespace Tests\Traits;

trait BitcoinMock
{
    public function generateBitcoinData(): array
    {
        return [
            "id" => "bitcoin",
            "symbol" => "btc",
            "name" => "Bitcoin",
            "image" => "https://assets.coingecko.com/coins/images/1/large/bitcoin.png?1696501400",
            "current_price" => 43290,
            "market_cap" => 852279003973,
            "market_cap_rank" => 1,
            "fully_diluted_valuation" => 912493261065,
            "total_volume" => 24995364662,
            "high_24h" => 43717,
            "low_24h" => 42410,
            "price_change_24h" => -123.14225190248,
            "price_change_percentage_24h" => -0.28365,
            "market_cap_change_24h" => 1439431130,
            "market_cap_change_percentage_24h" => 0.16918,
            "circulating_supply" => 19614237.0,
            "total_supply" => 21000000.0,
            "max_supply" => 21000000.0,
            "ath" => 69045,
            "ath_change_percentage" => -37.02517,
            "ath_date" => "2021-11-10T14:24:11.849Z",
            "atl" => 67.81,
            "atl_change_percentage" => 64022.49778,
            "atl_date" => "2013-07-06T00:00:00.000Z",
            "roi" => null,
            "last_updated" => "2024-01-31T19:19:34.774Z",
        ];
    }
}