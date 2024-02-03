<?php

namespace App\Repositories;

use App\Repositories\Contracts\CoinRepositoryContract;

class CoinRepository implements CoinRepositoryContract
{
    protected $provider;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $provider = app('coinProvider')->driver();
        
        $this->provider = $provider;
    }

    /**
     * Fetches coins
     * 
     * @param array $paras
     */
    public function getAll($params = [])
    {
        return $this->provider->markets($params);
    }

    /**
     * Retrieves a coin by id
     * 
     * @param string $id
     */
    public function find(string $id)
    {
        return $this->provider->coin($id);
    }
}