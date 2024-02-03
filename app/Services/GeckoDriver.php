<?php

namespace App\Services;

class GeckoDriver extends HttpService
{
    /** @var string $url */
    protected $url;

    /** @var string $key */
    protected $key;

    /**
     * Class constructor
     * 
     * @param string $url
     * @param string $key
     */
    public function __construct($url, $key)
    {
        $this->url = $url;
        $this->key = $key;    
    }

    /**
     * Fetches all coins in the market
     * 
     * @param array $params
     */
    public function markets(array $params = [])
    {
        return $this->get('coins/markets', $params);
    }

    /**
     * Fetches a single coin by id
     * 
     * @param string $id
     */
    public function coin(string $id)
    {
        return $this->get('coins/' . $id);
    }

    /**
     * Provides and mounts the endpoint
     * 
     * @param string $url
     * @param array $params
     */
    protected function endpoint(string $url, array $params = [])
    {
        return $this->url . '/' . $url . $this->query($params);
    }

    /**
     * Mounts and merges the parameters with api key
     * 
     * @param array $params
     */
    protected function query(array $params = [])
    {
        return '?' . http_build_query(array_merge(
            $params, [
                'x_cg_demo_api_key' => $this->key
            ]
        ));
    }
}