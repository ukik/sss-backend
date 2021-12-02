<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=ImagesBeritaSeeder

use Carbon\Carbon;

class ImagesBeritaSeeder extends Seeder
{

    public function run()
    {
        return;

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('images')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $galeris = \Galeri::all();

        foreach ($galeris as $key2 => $value2) {

            for ($i=0; $i < mt_rand(5,15); $i++) { 

                $uuid = 'IMG-'.uuid();

                $form =  [
                    'sekolah_id'        => $school->id,
                    'uuid'              => $uuid,
                    'galeri_id'         => $value2->id,
                    'user_id'           => $value2->user_id,

                    'original_image'    => $faker->imageUrl(600, 400, 'cats'),
                    'og_image'          => $faker->imageUrl(600, 400, 'cats'),
                    'thumbnail'         => $faker->imageUrl(100, 100, 'cats'),
                    'big_image'         => $faker->imageUrl(1080, 1000, 'cats'),
                    'big_image_two'     => $faker->imageUrl(730, 400, 'cats'),
                    'medium_image'      => $faker->imageUrl(358, 215, 'cats'),
                    'medium_image_two'  => $faker->imageUrl(350, 190, 'cats'),
                    'medium_image_three'    => $faker->imageUrl(255, 175, 'cats'),
                    'small_image'       => $faker->imageUrl(123, 83, 'cats'),   
                ];

                \Images::updateOrCreate([ 'uuid' => $uuid ], $form);
            }
        }
    }
}
