<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=GuruMapelSeeder

use Carbon\Carbon;

class GuruMapelSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('guru_mapel')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $gurus = \GuruJabatan::with('guru')->whereNotIn('jabatan_id', [1, 2, 7])->get();

        // $gurus = \Guru::where('sekolah_id', $school->id)
        //     ->with('jabatans')
        //     ->whereHas('jabatans', function($query) {
        //         return $query->whereNotIn('jabatan_id', [1,7]);
        //     })
        //     ->count();

        // dd($gurus);

        foreach ($gurus as $key2 => $guru) {        

            $mapel = \Mapel::where('satuan', 'smp')->inRandomOrder()
                ->limit(mt_rand(1,2))->get();

            foreach ($mapel as $key => $mapel) {

                $uuid = 'MPL-'.uuid();

                $form =  [
                    'sekolah_id'    => $guru->sekolah_id,
                    'uuid'          => $uuid,
                    'user_id'       => $guru->user_id,
                    'guru_id'       => $guru->id,
                    'mapel_id' => $mapel->id,
                    'tahun_ajar'    => '2020/2021',
                ];

                \Mapel::updateOrCreate([ 'uuid' => $uuid ], $form);   
            }

        }

    }
}