<?php

namespace App\Repositories\Contracts;

interface CoinRepositoryContract
{
    /**
     * Fetches coins
     * 
     * @param array $paras
     */
    public function getAll(array $params = []);

    /**
     * Retrieves a coin by id
     * 
     * @param string $id
     */
    public function find(string $id);
}