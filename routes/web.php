<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//retrive data
Route::get('/','App\Http\Controllers\OrderTimeController@getall'); 
Route::get('/shipment','App\Http\Controllers\OrderTimeController@getzipcode'); 