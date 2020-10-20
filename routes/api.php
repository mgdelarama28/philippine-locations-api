<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/regions', 'API\\RegionController@index')->name('api.regions.index');
Route::get('/v1/regions/{code}', 'API\\RegionController@show')->name('api.regions.show');
Route::get('/v1/regions/{code}/locations', 'API\\RegionController@locations')->name('api.regions.locations');

Route::get('/v1/locations', 'API\\LocationController@index')->name('api.locations.index');
Route::get('/v1/locations/q', 'API\\LocationController@fetch')->name('api.locations.fetch');