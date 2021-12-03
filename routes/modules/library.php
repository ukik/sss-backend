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

Route::group(['prefix' => 'v1/library/',
    // 'middleware' => ['auth:sanctum']
], function () {

    Route::resource('/jabatan', \JabatanController::class);
    Route::resource('/jam', \JamController::class);
    Route::resource('/kategori', \KategoriController::class);
    Route::resource('/mapel', \MapelController::class);
    Route::resource('/meta_sumber_belajar', \MetaSumberBelajarController::class);
    Route::resource('/metode_pembelajaran', \MetodePembelajaranController::class);
    Route::resource('/poin_afektif_psikomotor', \PoinAfektifPsikomotor::class);
    Route::resource('/ruangan', \RuanganController::class);
    Route::resource('/sekolah', \SekolahController::class);
    Route::resource('/skala_kognitif', \SkalaKognitifController::class);
    Route::resource('/subtema', \SubtemaController::class);
    Route::resource('/sumber_belajar', \SumberBelajarController::class);
    Route::resource('/tema', \TemaController::class);

});

