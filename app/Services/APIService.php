<?php


namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class APIService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function makeApiRequest()
    {
        try {

            $response = $this->client->get(config('services.countries_now.url'), [
                'timeout' => 10
            ]);
            return $response->getBody()->getContents();
        } catch (RequestException $e) {

            return 'API request failed: ' . $e->getMessage();
        }
    }
}
