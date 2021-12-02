<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=RppK13_KegiatanPembelajaranFotoKegiatanSeeder

use Carbon\Carbon;

class RppK13_KegiatanPembelajaranFotoKegiatanSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('rpp_k13_kegiatan_pembelajaran_foto_kegiatan')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $rpps = \RppK13::all();

        foreach ($rpps as $key => $rpp) {

            for ($i=0; $i < mt_rand(1,6); $i++) { 
                // code...

                $uuid = 'RPP-K13-KBM-FKG-'.uuid();

                $form =  [
                    'sekolah_id'    => $rpp->sekolah_id,
                    'uuid'          => $uuid,
                    'rpp_id'        => $rpp->id,
                    'guru_id'       => $rpp->guru_id,
                    'user_id'       => $rpp->user_id,
                    'tema_id'       => $rpp->tema_id,
                    'subtema_id'    => $rpp->subtema_id,
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

                \RppK13_KegiatanPembelajaranFotoKegiatan::updateOrCreate([ 'uuid' => $uuid ], $form);

            }

            if($key == 1000) {
                return;
            }                     
        }

    }
}
