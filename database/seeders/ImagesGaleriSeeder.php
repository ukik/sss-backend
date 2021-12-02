<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=ImagesGaleriSeeder

use Carbon\Carbon;

class ImagesGaleriSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('images_galeri')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $galeris = \Galeri::all();

        foreach ($galeris as $key2 => $galeri) {

            // $today = Carbon::today();
            // $now = Carbon::createFromFormat('H:i:s','13:00:00');  //now();

            for ($i=0; $i < mt_rand(1,5); $i++) { 

                $uuid = 'IMG-GLR-'.uuid();

                $form =  [
                    'sekolah_id'        => $galeri->sekolah_id,
                    'galeri_id'         => $galeri->id,
                    'uuid'              => $uuid,
                    'user_id'           => $galeri->user_id,
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

                \ImagesGaleri::updateOrCreate([ 'uuid' => $uuid ], $form);
            }
        }

    }
}
