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

/**
 * Auth
 */
Route::get('/login', 'AuthController@index')->name('login');
Route::post('/postLogin', 'AuthController@login')->name('postLogin');

/**
 * Teacher
 */

Route::group(['middleware' => ['auth', 'checkRole:admin,teacher']], function () {
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::group(['middleware' => ['auth', 'checkRole:teacher']], function () {
    Route::get('/', 'FrontController@index')->name('home');
    Route::post('/create', 'FrontController@create')->name('create');
    Route::get('/congrats', 'FrontController@congrats')->name('congrats');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/admin', 'DashboardController@index')->name('admin');
    Route::get('/admin/jurnal', 'JournalController@index')->name('jurnal');
    Route::get('/admin/jurnal/export/table', 'JournalController@export')->name('export');
    Route::get('/admin/guru', 'TeacherController@index')->name('guru');
    Route::post('/admin/guru/import', 'TeacherController@import');
    Route::post('/admin/guru/store', 'TeacherController@store');
    Route::post('/admin/guru/{id}/update', 'TeacherController@update');
    Route::get('/admin/guru/{id}/destroy', 'TeacherController@destroy');
});
