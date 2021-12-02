<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=PesanKepadaTataUsahaSeeder

use Carbon\Carbon;

class PesanKepadaTataUsahaSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('pesan_kepada_tata_usaha')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $pesans = \Pesan::where('label', 'tata_usaha')->where('terkirim', 1)->get();

        foreach ($pesans as $key => $value) {

            $guru = \TataUsaha::all();

            foreach ($guru as $key1 => $value1) {

                $uuid = 'PSN-KPD-TU-'.uuid();

                $form =  [
                    'sekolah_id'    => $value1->sekolah_id,
                    'uuid'          => $uuid,
                    'user_id'       => $value1->user_id,
                    'tata_usaha_id'   => $value1->tata_usaha_id,
                    'dibaca'        => mt_rand(0,1),
                ];

                \PesanKepadaTataUsaha::updateOrCreate([ 'uuid' => $uuid ], $form);

            }
        }
    }
}
