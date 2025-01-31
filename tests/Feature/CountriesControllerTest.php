<?php

use App\Services\APIService;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Client;

it('returns successful response for endpoint', function () {
    $response = $this->get('/api/v1/countries');

    $response->assertStatus(200);
});

it('returns 404 response for invalid endpoint', function () {
    $response = $this->get('/api/v1/countrie');

    $response->assertStatus(404);
});

it('makes a successful API request and returns the correct country data', function () {

    $mockResponse = json_encode([
        "name" => "Afghanistan",
        "capital" => "Kabul",
        "iso2" => "AF",
        "iso3" => "AFG"
    ]);


    $mockClient = Mockery::mock(Client::class);
    $mockClient->shouldReceive('get')
        ->with(config('services.countries_now.url'), ['timeout' => 30])
        ->andReturn(new Response(200, [], $mockResponse));


    $apiService = new APIService($mockClient);
    $response = $apiService->makeApiRequest();

    expect($response)->toEqual($mockResponse);
});
