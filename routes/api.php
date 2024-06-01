<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityDistrictController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cities', [CityDistrictController::class, 'index']);
Route::post('/cities', [CityDistrictController::class, 'storeCity']);
Route::post('/districts', [CityDistrictController::class, 'storeDistrict']);
Route::put('/cities/{city}', [CityDistrictController::class, 'updateCity']);
Route::put('/districts/{district}', [CityDistrictController::class, 'updateDistrict']);
Route::delete('/cities/{city}', [CityDistrictController::class, 'destroyCity']);
Route::delete('/districts/{district}', [CityDistrictController::class, 'destroyDistrict']);
