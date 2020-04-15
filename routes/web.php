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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/registerCanton', 'Auth\RegisterController@loadCanton')->name('registerCanton');
Route::post('/registerDistrict', 'Auth\RegisterController@loadDistrict')->name('registerDistrict');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registerUser', 'Auth\RegisterController@register')->name('registerUser');

//incidentReport Routes...
Route::get('incidentReport', 'IncidentReportController@showIncidentReportForm')->name('incidentReport');
Route::post('/incidentCanton', 'IncidentReportController@loadCanton')->name('incidentCanton');
Route::post('/incidentDistrict', 'IncidentReportController@loadDistrict')->name('incidentDistrict');
Route::post('/registerIncidentReport', 'IncidentReportController@registerIncidentReport')->name('registerIncidentReport');

//incidentUpdate Routes...
Route::get('/incidentUpdate', function () {
    return view('incidentUpdate');
})->name('incidentUpdate');
Route::post('/loadIncidents', 'IncidentUpdateController@loadIncidents')->name('loadIncidents');
Route::post('/loadIncidentDetails', 'IncidentUpdateController@loadIncidentDetails')->name('loadIncidentDetails');

/* Sitemap Route*/
Route::get('/sitemap.xml', 'SitemapController@index')->name('sitemap.xml');
Route::get('/sitemap.xml/home', 'SitemapController@home');
Route::get('/sitemap.xml/incidentReport', 'SitemapController@incidentReport');
Route::get('/sitemap.xml/incidentUpdate', 'SitemapController@incidentUpdate');
