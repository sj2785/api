<?php
namespace App\Services\Crypto;


use App\Models\Crypto;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class CryptoHandler
{
    public function livePrice()
    {
        //For Store Data A Job Named "StoringData" Is Scheduled For Every Two Minutes
        $client = new CoinGeckoClient();
        $data =$client->coins()->getMarkets('usd',['per_page' => 10]);
        return $data;
    }

    
}
