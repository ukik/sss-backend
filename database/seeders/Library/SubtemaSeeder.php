<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=SubtemaSeeder

use Carbon\Carbon;

class SubtemaSeeder extends Seeder
{

    public function run()
    {
        return;
        
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('__subtema')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $mapels = \Mapel::all();

        $temas = \Tema::all();

        foreach ($mapels as $key1 => $mapel) {

            foreach ($temas as $key2 => $tema) {

                if($mapel->id == $tema->mapel_id) {

                    for ($i=0; $i < 25; $i++) { 

                        $uuid = 'LB-STM-'.uuid();

                        $form =  [
                            'uuid'              => $uuid,
                            'mapel_id'     => $mapel->id,
                            'tema_id'           => $tema->id,
                            'deskripsi'         => 'Subtema '.$i.': '.$mapel->deskripsi,
                        ];

                        \Subtema::updateOrCreate([ 'uuid' => $uuid ], $form);

                    }
                }
            }

        }
    }
}
