<?php

namespace Tests\Feature;

use App\Repositories\CoinRepository;
use Tests\TestCase;
use Tests\Traits\BitcoinMock;

class CoinControllerTest extends TestCase
{
    use BitcoinMock;

    protected $bitcoin;

    public function setUp(): void
    {
        parent::setUp();

        $this->bitcoin = $this->generateBitcoinData();
    }

    public function test_index_method_should_return_successfull_code(): void
    {
        $params = [
            'vs_currency' => 'usd'
        ];

        $this->mock(CoinRepository::class, function ($mock) use($params) {
            $mock->shouldReceive('getAll')
                ->once()
                ->with($params)
                ->andReturn([$this->bitcoin]);
        });

        $response = $this->get('/api/coins/markets?vs_currency=usd');
        $response->assertStatus(200);
    }

    public function test_find_coin_should_return_successfull_code(): void
    {
        $id = 'bitcoin';

        $this->mock(CoinRepository::class, function ($mock) use($id) {
            $mock->shouldReceive('find')
                ->once()
                ->with($id)
                ->andReturn($this->bitcoin);
        });
        
        $response = $this->get('/api/coins/' . $id);
        $response->assertStatus(200);
    }
}