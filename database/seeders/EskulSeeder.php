<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=EskulSeeder

use Carbon\Carbon;

class EskulSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('eskul')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $schools = \Sekolah::all();

        $eskuls = [
            'Pendidikan Pramuka',
            'Pasukan Pengibar Bendera (PASKIBRA)',
            'Palang Merah Pemuda (PMR)',
            'Pasukan Keamanan Sekolah (PKS)',
            'Gema Pecinta Alam',
            'Koperasi Sekolah',
            'Usaha Kesehatan Sekolah (UKS)',
            'Kelompok Ilmiah Pemuda (KIR)',
            'Olahraga',
            'Seni',
        ];

        foreach ($schools as $key1 => $school) {

            foreach ($eskuls as $key2 => $eskul) {

                $today = Carbon::today();

                $now = Carbon::createFromFormat('H:i:s','13:00:00');  //now();

                $uuid = 'EK-'.uuid();

                $form =  [
                    'sekolah_id'        => $school->id,
                    'uuid'              => $uuid,
                    'user_id'           => 1, // waka kurikulum
                    'tahun_ajar'        => '2020/2021',
                    'lokasi'            => $faker->address,
                    'waktu_mulai'       => $now->format('H:i:s'),
                    'waktu_selesai'     => $now->addHours(1)->format('H:i:s'),
                    'hari'              => 'senin,selasa,rabu,kamis,jumat,sabtu,minggu',
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

                \Eskul::updateOrCreate([ 'uuid' => $uuid ], $form);
            }
        }
    }
}
