<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;
use App\Services\CoinManager;
use App\Services\GeckoDriver;
use Tests\Traits\BitcoinMock;
use App\Repositories\CoinRepository;
use Illuminate\Support\Facades\Config;

class CoinRepositoryTest extends TestCase
{
    use BitcoinMock;

    protected $bitcoin;
    
    public function setUp(): void
    {
        parent::setUp();

        $this->bitcoin = $this->generateBitcoinData();
    }

    public function test_get_all()
    {
        $params = [
            'vs_currency' => 'usd'
        ];

        Config::shouldReceive('get')
            ->with('coin.gecko.url')
            ->andReturn('url');

        Config::shouldReceive('get')
            ->with('coin.gecko.key')
            ->andReturn('url');

        $geckoMock = $this->mock(GeckoDriver::class, function($mock) use($params) {
            $mock->shouldReceive('markets')
                ->with($params)
                ->once()
                ->andReturn([$this->bitcoin]);
        });

        $this->mock('coinProvider', function ($mock) use ($geckoMock) {
            $mock->shouldReceive('driver')
                ->andReturn($geckoMock);
        });

        $repository = app(CoinRepository::class);
    
        $repository->getAll($params);
    }

    public function test_find()
    {
        $id = 'bitcoin';

        Config::shouldReceive('get')
            ->with('coin.gecko.url')
            ->andReturn('url');

        Config::shouldReceive('get')
            ->with('coin.gecko.key')
            ->andReturn('url');

        $geckoMock = $this->mock(GeckoDriver::class, function($mock) use($id) {
            $mock->shouldReceive('coin')
                ->with($id)
                ->once()
                ->andReturn($this->bitcoin);
        });

        $this->mock('coinProvider', function ($mock) use ($geckoMock) {
            $mock->shouldReceive('driver')
                ->andReturn($geckoMock);
        });

        $repository = app(CoinRepository::class);

        $repository->find($id);
    }
}