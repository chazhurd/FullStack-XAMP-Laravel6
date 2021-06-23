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

Route::get('/', function () {
    return view('welcome');
});

//New way of routing ( laravel 8+). 
Route::get('/charts', 'App\Http\Controllers\ChartController@index')->name('chart.home');

Route::get('/charts/create', 'App\Http\Controllers\ChartController@create')->name('chart.create')->middleware('auth');

Route::post('charts/create','App\Http\Controllers\ChartController@store')->middleware('auth');
Route::delete('charts/{id}', 'App\Http\Controllers\ChartController@destroy')->middleware('auth');

Route::get('/charts/{id}','App\Http\Controllers\ChartController@show')->name('chart.details');

// Route::post('/create','App\Http\Controllers\ChartController@create');
Auth::routes([
    // 'register' =>false                can take away the ability to register
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
