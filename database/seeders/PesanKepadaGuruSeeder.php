<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=PesanKepadaGuruSeeder

use Carbon\Carbon;

class PesanKepadaGuruSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('pesan_kepada_guru')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $pesans = \Pesan::where('label', 'guru')->where('terkirim', 1)->get();

        foreach ($pesans as $key => $value) {

            $guru = \Guru::all();

            foreach ($guru as $key1 => $value1) {

                $uuid = 'PSN-KPD-GR-'.uuid();

                $form =  [
                    'sekolah_id'    => $value1->sekolah_id,
                    'uuid'          => $uuid,
                    'user_id'       => $value1->user_id,
                    'guru_id'       => $value1->guru_id, 
                    'dibaca'        => mt_rand(0,1),
                ];

                \PesanKepadaGuru::updateOrCreate([ 'uuid' => $uuid ], $form);

            }
        }
    }
}
