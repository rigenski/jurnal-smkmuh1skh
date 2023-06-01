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

Route::group(['middleware' => ['auth', 'checkRole:admin,guru,karyawan,siswa']], function () {
    // auth
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::group(['middleware' => ['auth', 'checkRole:guru,karyawan,siswa']], function () {
    // front
    Route::get('/', 'FrontController@index')->name('home');
    Route::get('/jurnal', 'FrontController@jurnalIndex')->name('jurnal');
    Route::get('/izin', 'FrontController@izinIndex')->name('izin');
    Route::get('/refleksi', 'FrontController@refleksiIndex')->name('refleksi');
    Route::get('/rekap', 'FrontController@rekapIndex')->name('rekap');
    Route::post('/jurnal/store', 'FrontController@jurnalStore')->name('jurnal.store');
    Route::post('/izin/store', 'FrontController@izinStore')->name('izin.store');
    Route::post('/refleksi/store', 'FrontController@refleksiStore')->name('refleksi.store');
    Route::get('/rekap/export', 'FrontController@rekapExport')->name('rekap.export');
    Route::get('/result', 'FrontController@result')->name('result');
    Route::get('/sertifikat', 'FrontController@sertifikatIndex')->name('sertifikat');
    Route::get('/sertifikat/{siswa_sertifikat_id}/print', 'FrontController@sertifikatPrint')->name('sertifikat.print');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    // dashboard
    Route::get('/admin', 'DashboardController@index')->name('admin');

    // jurnal guru
    Route::get('/admin/jurnal-guru', 'JurnalGuruController@index')->name('admin.jurnal_guru');
    Route::get('/admin/jurnal-guru/export', 'JurnalGuruController@export')->name('admin.jurnal_guru.export');

    // izin guru
    Route::get('/admin/izin-guru', 'IzinGuruController@index')->name('admin.izin_guru');
    Route::post('/admin/izin-guru/setting', 'IzinGuruController@setting')->name('admin.izin_guru.setting');
    Route::get('/admin/izin-guru/export', 'IzinGuruController@export')->name('admin.izin_guru.export');

    // refleksi guru
    Route::get('/admin/refleksi-guru', 'RefleksiGuruController@index')->name('admin.refleksi_guru');
    Route::get('/admin/refleksi-guru/export', 'RefleksiGuruController@export')->name('admin.refleksi_guru.export');

    // refleksi siswa
    Route::get('/admin/refleksi-siswa', 'RefleksiSiswaController@index')->name('admin.refleksi_siswa');
    Route::get('/admin/refleksi-siswa/export', 'RefleksiSiswaController@export')->name('admin.refleksi_siswa.export');

    // jurnal karyawan
    Route::get('/admin/jurnal-karyawan', 'JurnalKaryawanController@index')->name('admin.jurnal_karyawan');
    Route::get('/admin/jurnal-karyawan/export', 'JurnalKaryawanController@export')->name('admin.jurnal_karyawan.export');

    // guru
    Route::get('/admin/guru', 'GuruController@index')->name('admin.guru');
    Route::post('/admin/guru/import', 'GuruController@import')->name('admin.guru.import');
    Route::post('/admin/guru/store', 'GuruController@store')->name('admin.guru.store');
    Route::post('/admin/guru/{id}/update', 'GuruController@update')->name('admin.guru.update');
    Route::get('/admin/guru/{id}/destroy', 'GuruController@destroy')->name('admin.guru.destroy');
    Route::get('/admin/guru/format-export', 'GuruController@format_export')->name('admin.guru.format_export');

    // karyawan
    Route::get('/admin/karyawan', 'KaryawanController@index')->name('admin.karyawan');
    Route::post('/admin/karyawan/import', 'KaryawanController@import')->name('admin.karyawan.import');
    Route::post('/admin/karyawan/store', 'KaryawanController@store')->name('admin.karyawan.store');
    Route::post('/admin/karyawan/{id}/update', 'KaryawanController@update')->name('admin.karyawan.update');
    Route::get('/admin/karyawan/{id}/destroy', 'KaryawanController@destroy')->name('admin.karyawan.destroy');
    Route::get('/admin/karyawan/format-export', 'KaryawanController@format_export')->name('admin.karyawan.format_export');

    // siswa
    Route::get('/admin/siswa', 'SiswaController@index')->name('admin.siswa');
    Route::post('/admin/siswa/import', 'SiswaController@import')->name('admin.siswa.import');
    Route::post('/admin/siswa/store', 'SiswaController@store')->name('admin.siswa.store');
    Route::post('/admin/siswa/{id}/update', 'SiswaController@update')->name('admin.siswa.update');
    Route::get('/admin/siswa/{id}/destroy', 'SiswaController@destroy')->name('admin.siswa.destroy');
    Route::get('/admin/siswa/format-export', 'SiswaController@format_export')->name('admin.siswa.format_export');
    Route::get('/admin/siswa/reset', 'SiswaController@reset')->name('admin.siswa.reset');

    // mata pelajaran
    Route::get('/admin/mata-pelajaran', 'MataPelajaranController@index')->name('admin.mata_pelajaran');
    Route::post('/admin/mata-pelajaran/import', 'MataPelajaranController@import')->name('admin.mata_pelajaran.import');
    Route::post('/admin/mata-pelajaran/store', 'MataPelajaranController@store')->name('admin.mata_pelajaran.store');
    Route::post('/admin/mata-pelajaran/{id}/update', 'MataPelajaranController@update')->name('admin.mata_pelajaran.update');
    Route::get('/admin/mata-pelajaran/{id}/destroy', 'MataPelajaranController@destroy')->name('admin.mata_pelajaran.destroy');
    Route::get('/admin/mata-pelajaran/format-export', 'MataPelajaranController@format_export')->name('admin.mata_pelajaran.format_export');

    // unit kerja
    Route::get('/admin/unit-kerja', 'UnitKerjaController@index')->name('admin.unit_kerja');
    Route::post('/admin/unit-kerja/store', 'UnitKerjaController@store')->name('admin.unit_kerja.store');
    Route::post('/admin/unit-kerja/import', 'UnitKerjaController@import')->name('admin.unit_kerja.import');
    Route::post('/admin/unit-kerja/{id}/update', 'UnitKerjaController@update')->name('admin.unit_kerja.update');
    Route::get('/admin/unit-kerja/{id}/destroy', 'UnitKerjaController@destroy')->name('admin.unit_kerja.destroy');
    Route::get('/admin/unit-kerja/format-export', 'UnitKerjaController@format_export')->name('admin.unit_kerja.format_export');

    // guru mata pelajaran
    Route::get('/admin/guru-mata-pelajaran', 'GuruMataPelajaranController@index')->name('admin.guru_mata_pelajaran');
    Route::post('/admin/guru-mata-pelajaran/import', 'GuruMataPelajaranController@import')->name('admin.guru_mata_pelajaran.import');
    Route::post('/admin/guru-mata-pelajaran/store', 'GuruMataPelajaranController@store')->name('admin.guru_mata_pelajaran.store');
    Route::post('/admin/guru-mata-pelajaran/{id}/update', 'GuruMataPelajaranController@update')->name('admin.guru_mata_pelajaran.update');
    Route::get('/admin/guru-mata-pelajaran/{id}/destroy', 'GuruMataPelajaranController@destroy')->name('admin.guru_mata_pelajaran.destroy');
    Route::get('/admin/guru-mata-pelajaran/format-export', 'GuruMataPelajaranController@format_export')->name('admin.guru_mata_pelajaran.format_export');
    Route::get('/admin/guru-mata-pelajaran/reset', 'GuruMataPelajaranController@reset')->name('admin.guru_mata_pelajaran.reset');

    // sertifikat
    Route::get('/admin/sertifikat', 'SertifikatController@index')->name('admin.sertifikat');
    Route::post('/admin/sertifikat/import', 'SertifikatController@import')->name('admin.sertifikat.import');
    Route::post('/admin/sertifikat/store', 'SertifikatController@store')->name('admin.sertifikat.store');
    Route::post('/admin/sertifikat/{id}/update', 'SertifikatController@update')->name('admin.sertifikat.update');
    Route::get('/admin/sertifikat/{id}/destroy', 'SertifikatController@destroy')->name('admin.sertifikat.destroy');
    Route::get('/admin/sertifikat/format-export', 'SertifikatController@format_export')->name('admin.sertifikat.format_export');
    Route::get('/admin/sertifikat/{id}', 'SertifikatController@detail')->name('admin.sertifikat.detail');
    Route::post('/admin/sertifikat/{id}/{siswa_sertifikat_id}/update', 'SertifikatController@detailUpdate')->name('admin.sertifikat.update');
    Route::get('/admin/sertifikat/{id}/{siswa_sertifikat_id}/print', 'SertifikatController@print')->name('admin.sertifikat.print');
});
