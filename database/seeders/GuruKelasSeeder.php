<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=GuruKelasSeeder

use Carbon\Carbon;

class GuruKelasSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('guru_kelas')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $gurus = \GuruJabatan::with('guru')->whereNotIn('jabatan_id', [1, 2, 7])->get();

        $rombel = ['A','B','C','D'];

        foreach ($gurus as $key2 => $guru) {        

            for ($i=1; $i <= 3; $i++) { 

                foreach ($rombel as $key5 => $value) {
                    
                    $uuid = 'GR-KLS-'.uuid();

                    $form =  [
                        'sekolah_id'    => $guru->sekolah_id,
                        'uuid'          => $uuid,
                        'user_id'       => $guru->user_id,
                        'guru_id'       => $guru->id,
                        'kelas'         => $i,
                        'rombel'        => $value,
                        'tahun_ajar'    => '2020/2021',
                    ];

                    \GuruKelas::updateOrCreate([ 'uuid' => $uuid ], $form);   
                }

            }

        }

    }
}