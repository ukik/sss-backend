<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=GuruJabatanSeeder

use Carbon\Carbon;

class GuruJabatanSeeder extends Seeder
{

    public function run()
    {
        
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('guru_jabatan')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $schools = \Sekolah::all();

        $jabatans = \Jabatan::all();


        foreach ($schools as $key_school => $school) {

            $gurus = \Guru::where('sekolah_id', $school->id)->inRandomOrder()->limit(count($jabatans))->get();

            foreach ($gurus as $key2 => $guru) {

                foreach ($jabatans as $key3 => $jabatan) {
    
                    $uuid = 'GR-JBT-'.uuid();

                    $form =  [
                        'sekolah_id'        => $school->id,
                        'uuid'              => $uuid,
                        'user_id'           => $guru->user_id,
                        'guru_id'           => $guru->id,
                        'jabatan_id'        => $jabatan->id,
    
                    ];

                    \GuruJabatan::updateOrCreate([ 'uuid' => $uuid ], $form);
                }
            }
        }
    }
}
