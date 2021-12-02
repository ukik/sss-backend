<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=PengumumanSeeder

use Carbon\Carbon;

class PengumumanSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('pengumuman')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $schools = \Sekolah::all();

        $kategories = \Kategori::where('tipe','pengumuman')->get();

        $publishs = ['0','1'];

        foreach ($schools as $key1 => $school) {

            foreach ($kategories as $key2 => $kategori) {

                $gurus = \GuruJabatan::where('sekolah_id', $school->id)->with('guru')->whereNotIn('jabatan_id', [1, 2, 7])->get();

                foreach ($gurus as $key3 => $guru) {

                    foreach ($publishs as $key4 => $publish) {

                        for ($i=0; $i < 10; $i++) { 

                            $visibility = $publish == '1' ? mt_rand('0','1') : '0';

                            // dd($publish);

                            $uuid = 'PGMM-'.uuid();

                            $waktu_mulai = Carbon::now()->subMonths(mt_rand(0,5))->addDays(30);

                            $form =  [

                                'sekolah_id'        => $school->id,
                                'uuid'              => $uuid,
                                'user_id'           => $guru->guru_id,
                                'kategori_id'       => $kategori->id,
                                'judul'             => $faker->text($maxNbChars = 300),
                                'deskripsi'         => $faker->text($maxNbChars = 1000),
                                'publish'           => $publish,
                                'waktu_mulai'       => $waktu_mulai->format('Y-m-d H:i:s'),
                                'waktu_selesai'     => $waktu_mulai->addMonths(mt_rand(0,3))->format('Y-m-d H:i:s'),
                                'visibility'        => $visibility,
             
                            ];

                            \Pengumuman::updateOrCreate([ 'uuid' => $uuid ], $form);
                        }
                    }
                }
            }
        }
    }
}
