<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=SiswaKelasSeeder

use Carbon\Carbon;

class SiswaKelasSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('siswa_kelas')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $rombel = ['A','B','C','D'];

        $siswas = \Siswa::all();

        $gurus = \GuruKelas::all();

        foreach ($gurus as $key1 => $guru) {

            foreach ($siswas as $key => $siswa) {

                $terdaftar = \SiswaKelas::where('tahun_ajar', '2020/2021')
                    ->where('siswa_id', $siswa->id)->first();

                if(!$terdaftar) {

                    $uuid = 'SW-KLS-'.uuid();

                    $form =  [
                        'sekolah_id'    => $siswa->sekolah_id,
                        'uuid'          => $uuid,
                        'user_id'       => $siswa->user_id,
                        'siswa_id'      => $siswa->id,
                        'kelas'         => mt_rand(1,3),
                        'rombel'        => $rombel[mt_rand(0,3)],
                        'tahun_ajar'    => '2020/2021',
                    ];

                    \SiswaKelas::updateOrCreate([ 'uuid' => $uuid ], $form);   
                }
            }
        }
    }
}