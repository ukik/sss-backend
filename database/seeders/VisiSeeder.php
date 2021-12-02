<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=VisiSeeder

use Carbon\Carbon;

class VisiSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('visi')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $schools = \Sekolah::all();

        foreach ($schools as $key => $school) {

            $uuid = 'VS-'.uuid();

            $form =  [
                'sekolah_id'    => $school->id,
                'tahun_ajar'    => '2020/2021',
                'uuid'          => $uuid,
                'deskripsi'     => $faker->text($maxNbChars = 250),
            ];

            \Visi::updateOrCreate([ 'uuid' => $uuid ], $form);

        }

    }
}
