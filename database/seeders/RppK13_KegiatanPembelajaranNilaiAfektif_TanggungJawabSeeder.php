<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=RppK13_KegiatanPembelajaranNilaiAfektif_TanggungJawabSeeder

use Carbon\Carbon;

class RppK13_KegiatanPembelajaranNilaiAfektif_TanggungJawabSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('rpp_k13_kegiatan_pembelajaran_nilai_afektif_tanggung_jawab')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $rpps = \RppK13::all();

        function poin($siswa_id) {
            $poins = \PoinAfektifPsikomotor::where('tipe','k2')->where('label','santun')->get();

            $poin_nilai = [];

            $total_skala = 0;

            foreach ($poins as $key1 => $poin) {

                $skala = mt_rand(1,5);

                $poin_nilai[] = [
                    'index'                         => $key1,
                    'siswa_id'                      => $siswa_id,
                    'poin_afektif_psikomotor_id'    => $poin->id,
                    'nilai'                         => $skala,
                ];

                $total_skala += $skala;
            }  

            return [
                'nilai'         => $poin_nilai,
                'total_skala'   => $total_skala,
                'count_poin'    => count($poins),
            ];                
        }


        function nilai($rpp) {

            $siswas = \SiswaKelas::where('sekolah_id', $rpp->sekolah_id)->where('kelas', $rpp->kelas)->where('rombel', $rpp->rombel)->get();

            $temp_nilai = [];
            $temp_nilai_rangkuman = [];

            foreach ($siswas as $key => $siswa) {

                $temp_nilai [] = [
                    'index'     => $key,
                    'user_id'   => $siswa->user_id,
                    'siswa_id'  => $siswa->id,
                    'nilai'     => poin($siswa->id)['nilai'],
                    'total'     => poin($siswa->id)['total_skala'],
                    'count'     => poin($siswa->id)['count_poin'],
                    'avg'       => poin($siswa->id)['total_skala'] / poin($siswa->id)['count_poin']
                ];

                $temp_nilai_rangkuman [] = [
                    'index'     => $key,
                    'user_id'   => $siswa->user_id,
                    'siswa_id'  => $siswa->id,
                    'total'     => poin($siswa->id)['total_skala'],
                    'count'     => poin($siswa->id)['count_poin'],
                    'avg'       => poin($siswa->id)['total_skala'] / poin($siswa->id)['count_poin']
                ];
            }        

            return [
               'nilai' => $temp_nilai,
               'nilai_rangkuman' => $temp_nilai_rangkuman,
            ];
        }


        foreach ($rpps as $key => $rpp) {

            $uuid = 'RPP-K13-KBM-NAF-STN-'.uuid();

            $form =  [
                'sekolah_id'    => $rpp->sekolah_id,
                'uuid'          => $uuid,
                'rpp_id'        => $rpp->id,
                'guru_id'       => $rpp->guru_id,
                'user_id'       => $rpp->user_id,
                'tema_id'       => $rpp->tema_id,
                'subtema_id'    => $rpp->subtema_id,
                'nilai'         => json_encode(nilai($rpp)['nilai']),
                'nilai_rangkuman'         => json_encode(nilai($rpp)['nilai_rangkuman']),
            ];

            \RppK13_KegiatanPembelajaranNilaiAfektif_TanggungJawab::updateOrCreate([ 'uuid' => $uuid ], $form);

            if($key == 1000) {
                return;
            }            
        }
    }
}
