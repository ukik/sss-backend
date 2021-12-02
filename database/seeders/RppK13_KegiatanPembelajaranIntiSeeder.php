<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=RppK13_KegiatanPembelajaranIntiSeeder

use Carbon\Carbon;

class RppK13_KegiatanPembelajaranIntiSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('rpp_k13_kegiatan_pembelajaran_inti')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $rpps = \RppK13::all();

        foreach ($rpps as $key => $rpp) {

            for ($i=0; $i < 10; $i++) { 

                $uuid = 'RPP-K13-KBM-IN-'.uuid();

                $form =  [
                    'sekolah_id'    => $rpp->sekolah_id,
                    'uuid'          => $uuid,
                    'rpp_id'        => $rpp->id,
                    'guru_id'       => $rpp->guru_id,
                    'user_id'       => $rpp->user_id,
                    'tema_id'       => $rpp->tema_id,
                    'subtema_id'    => $rpp->subtema_id,
                    'deskripsi'     => $faker->text($maxNbChars = 300),
                ];

                \RppK13_KegiatanPembelajaranInti::updateOrCreate([ 'uuid' => $uuid ], $form);
            }

            if($key == 100) {
                return;
            }            
            
        }
    }
}
