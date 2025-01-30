<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\APIService;
use Illuminate\Http\JsonResponse;

class CountriesController extends Controller
{

    protected APIService $apiService;

    public function __construct(APIService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(): JsonResponse
    {
        $response = $this->apiService->makeApiRequest();

        return response()->json(json_decode($response));
    }
}
