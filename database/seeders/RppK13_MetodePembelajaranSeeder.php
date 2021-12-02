<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=RppK13_MetodePembelajaranSeeder

use Carbon\Carbon;

class RppK13_MetodePembelajaranSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('rpp_k13_metode_pembelajaran')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $rpps = \RppK13::all();

        foreach ($rpps as $key => $rpp) {

            $metodes = \MetodePembelajaran::inRandomOrder()->limit(mt_rand(1,10))->get();

            foreach ($metodes as $key1 => $value) {

                $uuid = 'RPP-K13-MEP-'.uuid();

                $form =  [
                    'sekolah_id'    => $rpp->sekolah_id,
                    'uuid'          => $uuid,
                    'rpp_id'        => $rpp->id,
                    'guru_id'       => $rpp->guru_id,
                    'user_id'       => $rpp->user_id,
                    'tema_id'       => $rpp->tema_id,
                    'subtema_id'    => $rpp->subtema_id,
                    'metode_pembelajaran_id'     => $value->id,
                ];

                \RppK13_MetodePembelajaran::updateOrCreate([ 'uuid' => $uuid ], $form);
            }

            if($key == 100) {
                return;
            }            
        }
    }
}
