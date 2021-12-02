<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=SekolahSeeder

class SekolahSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('__sekolah')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) { 

            $uuid = 'LB-SK-'.uuid(); 
            // LB-SK-{UUID}

            $form =  [
                'uuid'              => $uuid,
                'nama_sekolah'      => $faker->company,
                'nis'               => mt_rand(1000,100000),
                'alamat_sekolah'    => $faker->address,
                'kode_pos'          => mt_rand(1000,100000),
                'telepon'           => $faker->e164PhoneNumber,
                'keluharan'         => $faker->city,
                'kecamatan'         => $faker->city,
                'kabupaten'         => $faker->city,
                'provinsi'          => $faker->city,
                'website'           => $faker->url,
                'email'             => $faker->email,

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

            \Sekolah::updateOrCreate([ 'uuid' => $uuid ], $form);
        }
    }
}
