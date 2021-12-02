<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=GaleriSeeder

use Carbon\Carbon;

class GaleriSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('galeri')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();


        $siswas = \Siswa::all();

        foreach ($siswas as $key2 => $value2) {

            // $today = Carbon::today();
            // $now = Carbon::createFromFormat('H:i:s','13:00:00');  //now();

            $uuid = 'GLR-'.uuid();

            $form =  [
                'sekolah_id'        => $value2->sekolah_id,
                'uuid'              => $uuid,
                'user_id'           => $value2->user_id,
                'judul'             => $value2->nama_lengkap, //$faker->text($maxNbChars = 250),
                'deskripsi'         => $faker->text($maxNbChars = 400),

                'original_image'    => $faker->imageUrl(600, 400),
                'og_image'          => $faker->imageUrl(600, 400),
                'thumbnail'         => $faker->imageUrl(100, 100),
                'big_image'         => $faker->imageUrl(1080, 1000),
                'big_image_two'     => $faker->imageUrl(730, 400),
                'medium_image'      => $faker->imageUrl(358, 215),
                'medium_image_two'  => $faker->imageUrl(350, 190),
                'medium_image_three'    => $faker->imageUrl(255, 175),
                'small_image'       => $faker->imageUrl(123, 83),   
            ];

            \Galeri::updateOrCreate([ 'uuid' => $uuid ], $form);
        }

    }
}
