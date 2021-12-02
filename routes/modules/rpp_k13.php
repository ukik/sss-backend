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

Route::group(['prefix' => 'v1/rpp_k13', 'middleware' => ['auth:sanctum']], function () {
    
    Route::resource('/', \RppK13_Controller::class);
    Route::resource('/indikator', \RppK13_IndikatorController::class);


    Route::group(['prefix' => 'kegiatan_pembelajaran'], function () {

        Route::resource('/foto_kegiatan', \RppK13_KegiatanPembelajaranFotoKegiatanController::class);

        Route::resource('/inti', \RppK13_KegiatanPembelajaranIntiController::class);

        Route::resource('/jadwal_kelas', \RppK13_KegiatanPembelajaranJadwalKelasController::class);

        // Route::resource('/nilai_afektif', \RppK13_KegiatanPembelajaranNilaiAfektifController::class);

        Route::resource('/nilai_akhlak', \RppK13_KegiatanPembelajaranNilaiAfektif_AkhlakController::class);
        Route::resource('/nilai_beriman', \RppK13_KegiatanPembelajaranNilaiAfektif_BerimanController::class);
        Route::resource('/nilai_disiplin', \RppK13_KegiatanPembelajaranNilaiAfektif_DisiplinController::class);
        Route::resource('/nilai_jujur', \RppK13_KegiatanPembelajaranNilaiAfektif_JujurController::class);
        Route::resource('/nilai_peduli', \RppK13_KegiatanPembelajaranNilaiAfektif_PeduliController::class);
        Route::resource('/nilai_percaya_diri', \RppK13_KegiatanPembelajaranNilaiAfektif_PercayaDiriController::class);
        Route::resource('/nilai_santun', \RppK13_KegiatanPembelajaranNilaiAfektif_SantunController::class);
        Route::resource('/nilai_tanggung_jawab', \RppK13_KegiatanPembelajaranNilaiAfektif_TanggungJawabController::class);
        Route::resource('/nilai_kognitif', \RppK13_KegiatanPembelajaranNilaiKognitifController::class);
        Route::resource('/nilai_remedial', \RppK13_KegiatanPembelajaranNilaiRemedialController::class);

        Route::resource('/pembukaan', \RppK13_KegiatanPembelajaranPembukaanController::class);
        Route::resource('/penutup', \RppK13_KegiatanPembelajaranPenutupController::class);
        Route::resource('/presensi', \RppK13_KegiatanPembelajaranPresensiController::class);
        Route::resource('/refleksi', \RppK13_KegiatanPembelajaranRefleksiController::class);

        Route::resource('/kompetensi_dasar', \RppK13_KompetensiDasar::class);
        Route::resource('/kompetensi_inti', \RppK13_KompetensiIntiController::class);
        Route::resource('/mapel', \RppK13_MapelController::class);
        Route::resource('/materi_pembelajaran', \RppK13_MateriPembelajaranController::class);
        Route::resource('/metode_pembelajaran', \RppK13_MetodePembelajaranController::class);
        Route::resource('/penilaian', \RppK13_PenilaianController::class);
        Route::resource('/standar_kompetensi', \RppK13_StandarKompetensiController::class);
        Route::resource('/sumber_belajar', \RppK13_SumberBelajarController::class);
        Route::resource('/tujuan_pembelajaran', \RppK13_TujuanPembelajaranController::class);

    });

});