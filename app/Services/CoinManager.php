<?php

namespace App\Services;

use Illuminate\Support\Manager;

class CoinManager extends Manager
{
    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {        
        return $this->config->get('coin.default');
    }

    public function createGeckoDriver()
    {
        $url = $this->config->get('coin.gecko.url');
        $key = $this->config->get('coin.gecko.key');
        
        return new GeckoDriver($url, $key);
    }
}