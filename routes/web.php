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

Route::get('/reporteIncidencias', function () {
    return view('reporteIncidencias');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/registerCanton', 'Auth\RegisterController@loadCanton')->name('registerCanton');
Route::post('/registerDistrict', 'Auth\RegisterController@loadDistrict')->name('registerDistrict');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registerUser', 'Auth\RegisterController@register')->name('registerUser');


