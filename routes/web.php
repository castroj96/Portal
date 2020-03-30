<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
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

Route::get('sitemap', function (){

    SitemapGenerator::create('https://localhost')->writeToFile('sitemap.xml');
    return 'Sitemap creado';
});

Route::get('go-to-sitemap', function (){

    return 'Sitemap creado';
});

Route::get('/reporteIncidencias', function () {
    return view('reporteIncidencias');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


