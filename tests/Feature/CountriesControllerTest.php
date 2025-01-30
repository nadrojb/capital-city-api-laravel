<?php

use Illuminate\Support\Facades\Http;

test('returns successful response for endpoint', function() {
    $response = $this->get('/api/v1/countries');

    $response->assertStatus(200);
});

test('returns 404 response for invalid endpoint', function () {
    $response = $this->get('/api/v1/countrie');

    $response->assertStatus(404);
});

