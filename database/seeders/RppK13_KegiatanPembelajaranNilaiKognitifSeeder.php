<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=RppK13_KegiatanPembelajaranNilaiKognitifSeeder

use Carbon\Carbon;

class RppK13_KegiatanPembelajaranNilaiKognitifSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('rpp_k13_kegiatan_pembelajaran_nilai_kognitif')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $rpps = \RppK13::all();

        function getNilai($rpp) {

            $siswas = \SiswaKelas::where('sekolah_id', $rpp->sekolah_id)->where('kelas', $rpp->kelas)->where('rombel', $rpp->rombel)->get();

            $nilai = [];

            foreach ($siswas as $key => $siswa) {

                $score = mt_rand(65,100);

                $nilai [] = [
                    'index'         => $key,
                    'user_id'       => $siswa->user_id,
                    'siswa_id'      => $siswa->id,
                    'nilai'         => $score,
                ];

            }        

            return $nilai;
        }

        foreach ($rpps as $key => $rpp) {

            for ($i=1; $i <= mt_rand(1,3); $i++) { 

                $uuid = 'RPP-K13-KBM-NKG-'.uuid();

                $form =  [
                    'sekolah_id'    => $rpp->sekolah_id,
                    'uuid'          => $uuid,
                    'rpp_id'        => $rpp->id,
                    'guru_id'       => $rpp->guru_id,
                    'user_id'       => $rpp->user_id,
                    'tema_id'       => $rpp->tema_id,
                    'subtema_id'    => $rpp->subtema_id,
                    'latihan_ke'    => $i,
                    'nilai'         => json_encode(getNilai($rpp)),
                ];

                \RppK13_KegiatanPembelajaranNilaiKognitif::updateOrCreate([ 'uuid' => $uuid ], $form);

            }


            if($key == 1000) {
                return;
            }            
            
        }
    }
}
