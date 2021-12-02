<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=RppK13_KegiatanPembelajaranJadwalKelasSeeder

use Carbon\Carbon;

class RppK13_KegiatanPembelajaranJadwalKelasSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('rpp_k13_kegiatan_pembelajaran_jadwal_kelas')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $rpps = \RppK13::all();

        foreach ($rpps as $key => $rpp) {

            for ($i=0; $i < 10; $i++) { 

                $uuid = 'RPP-K13-KBM-JK-'.uuid();

                $tanggal = Carbon::today()->format('Y/m/d');

                $kelas_mulai = Carbon::now()->format('H:i:s');
                $toleransi_terlambat = Carbon::now()->addMinutes(15)->format('H:i:s');
                $kelas_tutup = Carbon::now()->addMinutes(45)->format('H:i:s');

                $form =  [
                    'sekolah_id'    => $rpp->sekolah_id,
                    'uuid'          => $uuid,
                    'rpp_id'        => $rpp->id,
                    'guru_id'       => $rpp->guru_id,
                    'user_id'       => $rpp->user_id,
                    'tema_id'       => $rpp->tema_id,
                    'subtema_id'    => $rpp->subtema_id,
                    'tanggal'               => $tanggal,
                    'kelas_mulai'           => $kelas_mulai,
                    'toleransi_terlambat'   => $toleransi_terlambat,
                    'kelas_tutup'           => $kelas_tutup,
                ];

                \RppK13_KegiatanPembelajaranJadwalKelas::updateOrCreate([ 'uuid' => $uuid ], $form);
            }

            if($key == 100) {
                return;
            }              
        }
    }
}
