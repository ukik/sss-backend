<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=RppK13_SumberBelajarSeeder

use Carbon\Carbon;

class RppK13_SumberBelajarSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('rpp_k13_sumber_belajar')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $rpps = \RppK13_Mapel::all();

        foreach ($rpps as $key => $rpp) {

            $metodes = \SumberBelajar::inRandomOrder()->limit(mt_rand(5,10))->get();

            foreach ($metodes as $key1 => $value) {

                $uuid = 'RPP-K13-MEP-'.uuid();

                $form =  [
                    'sekolah_id'    => $rpp->sekolah_id,
                    'uuid'          => $uuid,
                    'rpp_k13_mapel_id'  => $rpp->id,     
                    'rpp_id'        => $rpp->id,
                    'guru_id'       => $rpp->guru_id,
                    'user_id'       => $rpp->user_id,
                    'tema_id'       => $rpp->tema_id,
                    'subtema_id'    => $rpp->subtema_id,
                    'sumber_belajar_id'     => $value->id,
                ];

                \RppK13_SumberBelajar::updateOrCreate([ 'uuid' => $uuid ], $form);
            }

            if($key == 100) {
                return;
            }               
        }
    }
}
