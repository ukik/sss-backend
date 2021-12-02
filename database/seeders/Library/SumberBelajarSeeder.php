<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=SumberBelajarSeeder

use Carbon\Carbon;

class SumberBelajarSeeder extends Seeder
{

    public function run()
    {
        return;

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('__sumber_belajar')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $meta_sumber_belajars = \MetaSumberBelajar::all();
        $mapels = \Mapel::all();

        // $mapels = \Mapel::with('guru')->get();

        foreach ($mapels as $key => $mapel) {

            foreach ($meta_sumber_belajars as $key => $meta_sumber_belajar) {

                $total = 50;

                for ($i=0; $i < $total; $i++) { 

                    $uuid = 'LB-SB-BJR-'.uuid();

                    $form =  [
                        'uuid'                      => $uuid,
                        'mapel_id'             => $mapel->id,
                        'meta_sumber_belajar_id'    => $meta_sumber_belajar->id,
                        'deskripsi'                 => $faker->text($maxNbChars = 200),
                    ];

                    \SumberBelajar::updateOrCreate([ 'uuid' => $uuid ], $form);            

                }
            }
        }

    }
}