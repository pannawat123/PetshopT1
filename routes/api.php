<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PetControllerApi;
use App\Http\Controllers\Api\PettypeControllerApi;

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

Route::get('/pet/{pettype_id?}', [PetControllerApi::class, 'pet_list']);
Route::get( '/pettype', [PettypeControllerApi::class, 'pettype_list']);
Route::post('/pet/search', [PetControllerApi::class, 'pet_search']);