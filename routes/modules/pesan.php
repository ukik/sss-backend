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

Route::group(['prefix' => 'v1', 
    // 'middleware' => ['auth:sanctum']
], function () {
    
    Route::resource('/pesan', \PesanController::class);

    Route::resource('/pesan_grup_kelas', \PesanGrupKelasController::class);
    Route::resource('/pesan_grup_mapel', \PesanGrupMapelController::class);

    Route::resource('/pesan_kepada_guru', \PesanKepadaGuruController::class);
    Route::resource('/pesan_kepada_orangtua', \PesanKepadaOrangtuaController::class);
    Route::resource('/pesan_kepada_siswa', \PesanKepadaSiswaController::class);
    Route::resource('/pesan_kepada_stakeholder', \PesanKepadaStakeholderController::class);
    Route::resource('/pesan_kepada_tata_usaha', \PesanKepadaTataUsahaController::class);

});

