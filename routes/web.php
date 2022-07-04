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

Route::group(['middleware' => ['auth', 'checkRole:admin,guru,karyawan']], function () {
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::group(['middleware' => ['auth', 'checkRole:guru,karyawan']], function () {
    Route::get('/', 'FrontController@index')->name('home');
    Route::post('/create', 'FrontController@create')->name('create');
    Route::get('/congrats', 'FrontController@congrats')->name('congrats');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {

    Route::get('/admin', 'DashboardController@index')->name('admin');

    Route::get('/admin/jurnal_guru', 'JurnalGuruController@index')->name('admin.jurnal_guru');
    Route::get('/admin/jurnal_guru/export', 'JurnalGuruController@export')->name('admin.jurnal_guru.export');

    Route::get('/admin/jurnal_karyawan', 'JurnalKaryawanController@index')->name('admin.jurnal_karyawan');
    Route::get('/admin/jurnal_karyawan/export', 'JurnalKaryawanController@export')->name('admin.jurnal_karyawan.export');

    Route::get('/admin/guru', 'GuruController@index')->name('admin.guru');
    Route::post('/admin/guru/import', 'GuruController@import')->name('admin.guru.import');
    Route::post('/admin/guru/store', 'GuruController@store')->name('admin.guru.store');
    Route::post('/admin/guru/{id}/update', 'GuruController@update');
    Route::get('/admin/guru/{id}/destroy', 'GuruController@destroy');

    Route::get('/admin/karyawan', 'karyawanController@index')->name('admin.karyawan');
    Route::post('/admin/karyawan/import', 'karyawanController@import')->name('admin.karyawan.import');
    Route::post('/admin/karyawan/store', 'karyawanController@store')->name('admin.karyawan.store');
    Route::post('/admin/karyawan/{id}/update', 'karyawanController@update');
    Route::get('/admin/karyawan/{id}/destroy', 'karyawanController@destroy');

    Route::get('/admin/siswa', 'SiswaController@index')->name('admin.siswa');
    Route::post('/admin/siswa/import', 'SiswaController@import')->name('admin.siswa.import');
    Route::post('/admin/siswa/store', 'SiswaController@store')->name('admin.siswa.store');
    Route::post('/admin/siswa/{id}/update', 'SiswaController@update');
    Route::get('/admin/siswa/{id}/destroy', 'SiswaController@destroy');

    Route::get('/admin/unit_kerja', 'UnitKerjaController@index')->name('admin.unit_kerja');
    Route::post('/admin/unit_kerja/store', 'UnitKerjaController@store')->name('admin.unit_kerja.store');
    Route::post('/admin/unit_kerja/{id}/update', 'UnitKerjaController@update');
    Route::get('/admin/unit_kerja/{id}/destroy', 'UnitKerjaController@destroy');
});
