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

Route::get('/', 'JournalsController@index');
Route::post('/create', 'JournalsController@create');
Route::get('/congrats', 'JournalsController@congrats');

Route::get('/admin/login', 'AuthController@index')->name('login');
Route::post('/admin/postLogin', 'AuthController@postLogin');
Route::get('/admin/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', 'DashboardController@index');
    Route::get('/admin/data', 'DashboardController@data');
    Route::get('/admin/data/export/', 'DashboardController@export');
    Route::get('/admin/data/export/table', 'DashboardController@export');
});
