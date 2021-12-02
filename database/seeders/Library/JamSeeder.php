<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=JamSeeder

use Carbon\Carbon;

class JamSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('__jam')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        for ($i=0; $i < 24; $i++) { 

            $uuid = 'LB-JAM-'.uuid();

            $time1 = Carbon::createFromFormat('H:i:s','08:15:00', 'Asia/Makassar');
            $time2 = $time1->addHours($i); 

            $form =  [
                'uuid'              => $uuid,
                'waktu_mulai'       => $time1->format('H:i:s'),
                'jam_ke'            => $i+1,
                'waktu_selesai'     => $time2->format('H:i:s'),  
            ];

            $time1 = $time2->format('H:i:s');

            \Jam::updateOrCreate([ 'uuid' => $uuid ], $form);

        }

    }
}
