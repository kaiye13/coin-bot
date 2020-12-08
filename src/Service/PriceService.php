<?php
declare(strict_types=1);

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class PriceService{

    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client){
        $this->client = $client;
    }

    public function getPrice(): float{

        $response = $this->client->request('GET','https://api.coingecko.com/api/v3/coins/bitcoin');

        $content = $response->toArray();

        return $content['market_data']['current_price']['eur'];

    }

}