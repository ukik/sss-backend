<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=PesanKepadaOrangtuaSeeder

use Carbon\Carbon;

class PesanKepadaOrangtuaSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('pesan_kepada_orangtua')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $pesans = \Pesan::where('label', 'orangtua')->where('terkirim', 1)->get();

        foreach ($pesans as $key => $value) {

            $guru = \Orangtua::all();

            foreach ($guru as $key1 => $value1) {

                $uuid = 'PSN-KPD-ORG-'.uuid();

                $form =  [
                    'sekolah_id'    => $value1->sekolah_id,
                    'uuid'          => $uuid,
                    'user_id'       => $value1->user_id,
                    'orangtua_id'   => $value1->orangtua_id,
                    'dibaca'        => mt_rand(0,1),
                ];

                \PesanKepadaOrangtua::updateOrCreate([ 'uuid' => $uuid ], $form);

            }
        }
    }
}
