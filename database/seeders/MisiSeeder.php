<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=MisiSeeder

use Carbon\Carbon;

class MisiSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('misi')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $schools = \Sekolah::all();

        foreach ($schools as $key => $school) {

            $uuid = 'MS-'.uuid();

            $form =  [
                'sekolah_id'    => $school->id,
                'tahun_ajar'    => '2020/2021',
                'uuid'          => $uuid,
                'deskripsi'     => $faker->text($maxNbChars = 250),
            ];

            \Misi::updateOrCreate([ 'uuid' => $uuid ], $form);

        }

    }
}
