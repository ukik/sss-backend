<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=RppK13_MapelSeeder

use Carbon\Carbon;

class RppK13_MapelSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('rpp_k13_mapel')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $rpps = \RppK13::all();

        foreach ($rpps as $key => $rpp) {

            $mapels = \Mapel::inRandomOrder()->limit(mt_rand(1,5))->get();

            foreach ($mapels as $key => $value) {

                $uuid = 'RPP-K13-MPL-'.uuid();

                $form =  [
                    'sekolah_id'    => $rpp->sekolah_id,
                    'uuid'          => $uuid,
                    'rpp_id'        => $rpp->id,
                    'guru_id'       => $rpp->guru_id,
                    'user_id'       => $rpp->user_id,
                    'tema_id'       => $rpp->tema_id,
                    'subtema_id'    => $rpp->subtema_id,
                    'mapel_id'      => $value->id,
                ];

                \RppK13_Mapel::updateOrCreate([ 'uuid' => $uuid ], $form);
            }
        }
    }
}
