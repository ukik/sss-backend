<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=SiswaMapelSeeder

use Carbon\Carbon;

class SiswaMapelSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('siswa_mapel')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $gurus = \GuruMapel::all();

        foreach ($gurus as $key2 => $guru) {        

            $siswas = \Siswa::where('sekolah_id', $guru->sekolah_id)->get();

            foreach ($siswas as $key => $siswa) {

                $uuid = 'SW-MPL-'.uuid();

                $form =  [
                    'sekolah_id'    => $guru->sekolah_id,
                    'uuid'          => $uuid,
                    'guru_mapel_id' => $guru->id,
                    'siswa_id'      => $siswa->id,
                    'tahun_ajar'    => '2020/2021',
                ];

                \SiswaMapel::updateOrCreate([ 'uuid' => $uuid ], $form);   
            }

        }

    }
}