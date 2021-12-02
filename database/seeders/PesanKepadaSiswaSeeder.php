<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=PesanKepadaSiswaSeeder

use Carbon\Carbon;

class PesanKepadaSiswaSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('pesan_kepada_siswa')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $pesans = \Pesan::where('label', 'siswa')->where('terkirim', 1)->get();

        foreach ($pesans as $key => $value) {

            $siswas = \Siswa::all();

            foreach ($siswas as $key1 => $value1) {

                $uuid = 'PSN-KPD-SW-'.uuid();

                $form =  [
                    'sekolah_id'    => $value1->sekolah_id,
                    'uuid'          => $uuid,
                    'user_id'       => $value1->user_id,
                    'siswa_id'      => $value1->siswa_id,
                    'dibaca'        => mt_rand(0,1),
                ];

                \PesanKepadaSiswa::updateOrCreate([ 'uuid' => $uuid ], $form);

            }
        }
    }
}
