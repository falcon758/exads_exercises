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

Route::get('/', 'HomeController@index');

Route::get('/prime_numbers', 'ExercisesController@primeNumbers');
Route::get('/ascii_array', 'ExercisesController@asciiArray');
Route::get('/tv_series', 'ExercisesController@tvSeries');
Route::get('/ab_testing', 'ExercisesController@abTesting');
