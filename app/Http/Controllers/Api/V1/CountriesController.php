<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class CountriesController extends Controller
{
    protected const externalApi = 'https://countriesnow.space/api/v0.1/countries/capital';

    public function index(): JsonResponse
    {
        try {
            $response = Http::timeout(10)
                ->get(self::externalApi);

            if ($response->status() == 200) {
                return response()->json($response->json());
            } else {
                return response()->json([
                    'error' => true,
                    'msg' => 'Unable to fetch data',
                    'status' => 500,
                ], 500);
            }
        } catch (RequestException $e) {
            return response()->json([
                'error' => true,
                'msg' => 'Request error: ' . $e->getMessage(),
                'status' => 500,
            ], 500);
        } catch (ConnectionException $e) {
            return response()->json([
                'error' => true,
                'msg' => 'Connection error: ' . $e->getMessage(),
                'status' => 500,
            ], 500);
        }
    }
}



// Below is not being used, if I was to randomly and pull out a single country with its capital city I would use the code below
// The code doesn't have any exception handling currently
//    public function show(): JsonResponse
//    {
//        $countries = Http::get(self::externalApi);
//        if ($countries->successful()) {
//
//            $allCountries = $countries->json()['data'];
//
//            $randomCountryIndex = array_rand($allCountries);
//
//            $randomCountry = $allCountries[$randomCountryIndex];
//
//            return response()->json([
//                'country' => $randomCountry['name'],
//                'capital' => $randomCountry['capital']
//            ]);
//        } else {
//            return response()->json([
//                'error' => true,
//                'msg' => 'Unable to fetch data from the API',
//                'status' => 500,
//            ], 500);
//        }
//    }

