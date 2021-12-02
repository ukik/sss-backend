<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=RuanganSeeder

class RuanganSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('__ruangan')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        $schools = \Sekolah::all();

        foreach ($schools as $key_school => $school) {

            for ($i=0; $i < 20; $i++) { 
                // code...

                $uuid = 'LB-RNG-'.uuid();

                $form =  [
                    'sekolah_id'        => $school->id,
                    'uuid'              => $uuid,
                    'ruangan'           => $faker->foodName().' - '.($i + 1),
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

                \Ruangan::updateOrCreate([ 'uuid' => $uuid ], $form);

            }
        }
    }
}
