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

//ajax Play
Route::get('/students','App\Http\Controllers\StudentController@index');
Route::post('/add-student', 'App\Http\Controllers\StudentController@addStudent')->name('student.add');

Route::post('/add-practice','App\Http\Controllers\ChartController@addPractice')->name('practice.add');
Route::get('/store-ajax','App\Http\Controllers\ChartController@storedAjax');




//New way of routing ( laravel 8+?). 
Route::get('/charts', 'App\Http\Controllers\ChartController@index')->name('chart.home');

Route::get('/charts/create', 'App\Http\Controllers\ChartController@create')->name('chart.create')->middleware('auth');

Route::post('charts/create','App\Http\Controllers\ChartController@store')->middleware('auth');

Route::delete('charts/{id}', 'App\Http\Controllers\ChartController@destroy')->middleware('auth');

Route::get('charts/edit/{id}','App\Http\Controllers\ChartController@showSpecific')->middleware('auth');

Route::post('edit', 'App\Http\Controllers\ChartController@update')->middleware('auth');

Route::get('/charts/{id}','App\Http\Controllers\ChartController@show')->name('chart.details');

Route::get('/activeusers', 'App\Http\Controllers\ActiveUsersController@index');

// Route::post('/create','App\Http\Controllers\ChartController@create');
Auth::routes([
    // 'register' =>false                can take away the ability to register
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



