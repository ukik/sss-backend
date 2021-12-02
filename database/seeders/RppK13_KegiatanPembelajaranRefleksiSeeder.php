<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=RppK13_KegiatanPembelajaranRefleksiSeeder

use Carbon\Carbon;

class RppK13_KegiatanPembelajaranRefleksiSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('rpp_k13_kegiatan_pembelajaran_refleksi')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $rpps = \RppK13::all();

        function refleksi($rpp, $faker) {

            $siswas = \SiswaKelas::where('sekolah_id', $rpp->sekolah_id)->where('kelas', $rpp->kelas)->where('rombel', $rpp->rombel)->get();

            $refleksi = [];

            foreach ($siswas as $key => $siswa) {

                $refleksi [] = [
                    'index'         => $key,
                    'user_id'       => $siswa->user_id,
                    'siswa_id'      => $siswa->id,
                    'keterangan'    => $faker->text($maxNbChars = 300),
                ];
            }        

            return $refleksi;            
        }

        foreach ($rpps as $key => $rpp) {

            $uuid = 'RPP-K13-KBM-RF-'.uuid();

            $form =  [
                'sekolah_id'    => $rpp->sekolah_id,
                'uuid'          => $uuid,
                'rpp_id'        => $rpp->id,
                'guru_id'       => $rpp->guru_id,
                'user_id'       => $rpp->user_id,
                'tema_id'       => $rpp->tema_id,
                'subtema_id'    => $rpp->subtema_id,
                'refleksi'      => json_encode(refleksi($rpp, $faker)),
                'catatan'       => $faker->text($maxNbChars = 300),
            ];

            \RppK13_KegiatanPembelajaranRefleksi::updateOrCreate([ 'uuid' => $uuid ], $form);

            if($key == 1000) {
                return;
            }            
            
        }
    }
}
