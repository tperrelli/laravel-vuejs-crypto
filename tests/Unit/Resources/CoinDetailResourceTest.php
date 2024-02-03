<?php

namespace Tests\Unit\Resources;

use Tests\TestCase;
use App\Http\Resources\CoinDetailResource;

class CoinDetailResourceTest extends TestCase
{
    public function test_resource()
    {
        $data = [
            "id" => 1,
            "symbol" => 'btc',
            "description" => 'bitcoin',
            "images" => [],
            "market_data" => [],
            "last_updated" => '2020-01-01 00:00:00'
        ];

        $resource = new CoinDetailResource($data);

        $this->assertIsArray($resource->resource);
        $this->assertEquals($data, $resource->resource);
    }
}