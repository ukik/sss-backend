<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=TemaSeeder

use Carbon\Carbon;

class TemaSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('__tema')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $mapels = \Mapel::all();

        foreach ($mapels as $key => $mapel) {

            for ($i=0; $i < 25; $i++) { 

                $uuid = 'LB-TM-'.uuid();

                $form =  [
                    'uuid'              => $uuid,
                    'mapel_id'     => $mapel->id,
                    'deskripsi'         => 'Tema '.$i.': '.$mapel->deskripsi,
                ];

                \Tema::updateOrCreate([ 'uuid' => $uuid ], $form);

            }

        }
    }
}
