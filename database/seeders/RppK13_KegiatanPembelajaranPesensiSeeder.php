<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=RppK13_KegiatanPembelajaranPesensiSeeder

use Carbon\Carbon;

class RppK13_KegiatanPembelajaranPesensiSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('rpp_k13_kegiatan_pembelajaran_presensi')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $rpps = \RppK13::all();


        function absensi($rpp, $faker) {
            $list = [
                'hadir','terlambat','izin_meninggalkan_kelas',
                'izin_sakit','izin_tidak_masuk','alfa'
            ];

            $siswas = \SiswaKelas::where('sekolah_id', $rpp->sekolah_id)->where('kelas', $rpp->kelas)->where('rombel', $rpp->rombel)->get();

            $presensi = [];

            foreach ($siswas as $key => $siswa) {

                $presensi [] = [
                    'index'         => $key,
                    'user_id'       => $siswa->user_id,
                    'siswa_id'      => $siswa->id,
                    'keterangan'    => $faker->text($maxNbChars = 300),
                    'status'        => $list[mt_rand(0,5)],
                    'check_in_kelas'    => Carbon::now()->format('H:i:s'),
                ];
            }        

            return $presensi;
        }

        foreach ($rpps as $key => $rpp) {

            $uuid = 'RPP-K13-KBM-PR-'.uuid();


            $form =  [
                'sekolah_id'    => $rpp->sekolah_id,
                'uuid'          => $uuid,
                'rpp_id'        => $rpp->id,
                'guru_id'       => $rpp->guru_id,
                'user_id'       => $rpp->user_id,
                'tema_id'       => $rpp->tema_id,
                'subtema_id'    => $rpp->subtema_id,
                'tanggal'       => Carbon::now()->subDays(mt_rand(1,100))->format('Y/m/d'),
                'presensi'     => json_encode(absensi($rpp, $faker)),
            ];

            \RppK13_KegiatanPembelajaranPresensi::updateOrCreate([ 'uuid' => $uuid ], $form);

            if($key == 1000) {
                return;
            }            
            
        }
    }
}
