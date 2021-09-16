<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('pharmacies')->group(function () {
    Route::get('/', 'App\Http\Controllers\Apis\PharmacyController@index');
    Route::get('/{id}', 'App\Http\Controllers\Apis\PharmacyController@show');
    Route::post('create/', 'App\Http\Controllers\Apis\PharmacyController@create');
    Route::post('edit/', 'App\Http\Controllers\Apis\PharmacyController@edit');
    Route::post('delete/', 'App\Http\Controllers\Apis\PharmacyController@delete');
});

Route::prefix('products')->group(function () {
    Route::get('/', 'App\Http\Controllers\Apis\ProductController@index');
    Route::get('/{id}', 'App\Http\Controllers\Apis\ProductController@show');
    // Route::post('create/', 'App\Http\Controllers\Apis\ProductController@create');
    // Route::post('edit/', 'App\Http\Controllers\Apis\ProductController@edit');
    Route::post('delete/', 'App\Http\Controllers\Apis\ProductController@delete');
});
