<?php

use App\Services\APIService;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

test('returns successful response for endpoint', function() {
    $response = $this->get('/api/v1/countries');

    $response->assertStatus(200);
});

test('returns 404 response for invalid endpoint', function () {
    $response = $this->get('/api/v1/countrie');

    $response->assertStatus(404);
});

it('successful api request', function () {
    $mockClient = Mockery::mock(Client::class);
    $mockClient->shouldReceive('get')
        ->with(config('services.countries_now.url'), ['timeout' => 30])
        ->andReturn(new Response(200, [], json_encode(['country' => 'USA', 'capital' => 'Washington D.C.'])));

    $apiService = new APIService($mockClient);
    $response = $apiService->makeApiRequest();

    expect($response)->toBe(json_encode(['country' => 'USA', 'capital' => 'Washington D.C.']));


});
