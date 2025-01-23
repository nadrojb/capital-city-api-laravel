<?php


use App\Http\Controllers\Api\V1\CountriesController;
use Illuminate\Support\Facades\Route;

Route::get('/countries', [CountriesController::class, 'index']);

//If I were to randomise the countries on the back end, this route would be used
//Route::get('/country', [CountriesController::class, 'show']);
