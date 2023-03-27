<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    

});
Route::get('/events','App\Http\Controllers\EventController@index');
Route::post('/events','App\Http\Controllers\EventController@store');
Route::get('/events/{event}','App\Http\Controllers\EventController@show');
Route::put('/events/{event}','App\Http\Controllers\EventController@update');
Route::delete('/events/{event}','App\Http\Controllers\EventController@destroy');
