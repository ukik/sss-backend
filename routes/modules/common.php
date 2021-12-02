<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'middleware' => ['auth:sanctum']], function () {

    Route::resource('/berita', \BeritaController::class);
    Route::resource('/eskul', \EskulController::class);
    Route::resource('/galeri', \GaleriController::class);
    Route::resource('/images_berita', \ImagesBeritaController::class);
    Route::resource('/images_galeri', \ImagesGaleriController::class);
    Route::resource('/misi', \MisiController::class);
    Route::resource('/orangtua', \OrangtuaController::class);
    Route::resource('/orangtua_siswa', \OrangtuaSiswaController::class);
    Route::resource('/pengumuman', \PengumumanController::class);
    Route::resource('/siswa_kelas', \SiswaKelasController::class);
    Route::resource('/siswa_mapel', \SiswaMapelController::class);
    Route::resource('/siswa', \SiswaController::class);
    Route::resource('/tata_usaha', \TataUsahaController::class);
    Route::resource('/user', \UserController::class);
    Route::resource('/visi', \VisiController::class);

});

