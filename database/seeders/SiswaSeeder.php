<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=SiswaSeeder

use Carbon\Carbon;

class SiswaSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // \DB::table('siswa')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $pass = 12345;

        $schools = \Sekolah::all();

        $agama = [
            'islam','kriten','katolik','hindu','budha','konghucu','lainnya'
        ];

        foreach ($schools as $key_school => $school) {

            // siswa
            for ($i=0; $i < 500; $i++) { 
                $uuid = uuid();

                $form =  [
                    'uuid'          => $uuid,
                    'email'         => $i.$key_school.'siswa@gmail.com',
                    'password'      => password_hash($pass, PASSWORD_DEFAULT, [
                        12345678
                    ]),
                ];

                \User::create($form);

                $user_id = \User::where('uuid', $uuid)->value('id');

                $uuid = 'SW-'.uuid();

                $form =  [
                    'sekolah_id'        => $school->id,
                    'uuid'              => $uuid,
                    'user_id'           => $user_id,
                    'nama_lengkap'      => $faker->name,
                    'nis'               => mt_rand(1000,100000),
                    'tempat_lahir'      => $faker->city,
                    'tanggal_lahir'     => Carbon::createFromFormat('Y:m:d','2005:01:01')->addYears(mt_rand(0,4))->addMonths(mt_rand(1,12))->format('Y/m/d'),
                    'jenis_kelamin'     => ['L','P'][mt_rand(0,1)],
                    'agama'             => $agama[mt_rand(0,6)],
                    'status_keluarga'   => ['kandung','angkat'][mt_rand(0,1)],
                    'anak_ke'           => mt_rand(1,5),
                    'alamat'            => $faker->address,
                    'telepon_rumah'     => $faker->e164PhoneNumber,
                    'sekolah_asal'      => NULL,
                    'diterima_kelas'    => NULL,
                    'diterima_tanggal'  => NULL,
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

                \Siswa::updateOrCreate([ 'user_id' => $user_id ], $form);
            }
        }
    }
}
