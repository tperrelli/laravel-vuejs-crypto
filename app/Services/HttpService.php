<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

abstract class HttpService
{
    protected function get($url, $params = [])
    {
        $response = [];
        $endpoint = $this->endpoint($url, $params);
        
        try {
            $response = Http::get($endpoint)->json();

        } catch(\Exception $e) {}

        return $response;
    }

    /**
     * Provides and mounts the endpoint
     * 
     * @param string $url
     * @param array $params
     */
    protected abstract function endpoint(string $url, array $params = []);
}