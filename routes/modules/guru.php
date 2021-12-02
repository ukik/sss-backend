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

    Route::resource('/guru_jabatan', \GuruJabatanController::class);
    Route::resource('/guru_kelas', \GuruKelasController::class);
    Route::resource('/guru_mapel', \GuruMapelController::class);
    Route::resource('/guru_pembimbing', \GuruPembimbingController::class);
    Route::resource('/guru', \GuruController::class);
    // Route::resource('/guru_siswa', \GuruSiswaController::class);
    Route::resource('/guru_subtema', \GuruSubtemaController::class);
    Route::resource('/guru_tema', \GuruTemaController::class);

});

