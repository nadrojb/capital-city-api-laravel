<?php

use App\Http\Controllers\Api\V1\CountriesController;
use Illuminate\Support\Facades\Route;

Route::get('/countries', [CountriesController::class, 'index']);
