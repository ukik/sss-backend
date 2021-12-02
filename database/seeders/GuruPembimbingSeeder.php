<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=GuruPembimbingSeeder

use Carbon\Carbon;

class GuruPembimbingSeeder extends Seeder
{

    public function run()
    {
        
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('guru_pembimbing')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $schools = \Sekolah::all();

        foreach ($schools as $key_school => $school) {

            $eskuls = \Eskul::where('sekolah_id', $school->id)->get();

            foreach ($eskuls as $key1 => $eskul) {

                $gurus = \Guru::inRandomOrder()->limit(mt_rand(1,4))->get();

                foreach ($gurus as $key2 => $guru) {

                    $uuid = 'GR-PB-'.uuid();

                    $form =  [
                        'sekolah_id'    => $school->id,
                        'user_id'       => $guru->user_id,
                        'uuid'          => $uuid,
                        'guru_id'       => $guru->id,
                        'eskul_id'      => $eskul->id,
                    ];

                    \GuruPembimbing::updateOrCreate([ 'uuid' => $uuid ], $form);
                }
            }
        }
    }
}
