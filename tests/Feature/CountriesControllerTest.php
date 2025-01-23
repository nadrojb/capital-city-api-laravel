<?php

use Illuminate\Support\Facades\Http;

test('returns successful response for endpoint', function() {
    $response = $this->get('/api/v1/countries');

    $response->assertStatus(200);
});

