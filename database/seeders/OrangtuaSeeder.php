<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=OrangtuaSeeder

use Carbon\Carbon;

class OrangtuaSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('orangtua')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('users')->where('email','like','%orangtua%')->delete();
        // $count_users = \DB::table('users')->count();
        // \DB::statement('SET FOREIGN_KEY_CHECKS='.$count_users.';');

        $faker = \Faker\Factory::create();

        $pass = 12345;

        $siswas = \Siswa::all();

        $schools = \Sekolah::all();

        $agama = [
            'islam','kriten','katolik','hindu','budha','konghucu','lainnya'
        ];

        // foreach ($schools as $key_school => $school) {

            // orangtua
            foreach ($siswas as $i => $siswa) {
                // code...

                $uuid = uuid();

                $form =  [
                    'uuid'          => $uuid,
                    'email'         => $i.$siswa->sekolah_id.'orangtua@gmail.com',
                    'password'      => password_hash($pass, PASSWORD_DEFAULT, [
                        12345678
                    ]),
                ];

                \User::create($form);

                $user_id = \User::where('uuid', $uuid)->value('id');

                $uuid = 'OR-'.uuid();

                $form =  [
                    'sekolah_id'        => $siswa->sekolah_id,
                    'uuid'              => $uuid,
                    'user_id'           => $user_id,
                    'nama_ayah'         => $faker->name,
                    'nama_ibu'          => $faker->name,
                    'agama_ayah'        => $agama[mt_rand(0,6)],
                    'agama_ibu'         => $agama[mt_rand(0,6)],
                    'telepon_ayah'      => $faker->e164PhoneNumber,
                    'telepon_ibu'       => $faker->e164PhoneNumber,
                    'pekerjaan_ayah'    => $faker->jobTitle,
                    'pekerjaan_ibu'     => $faker->jobTitle,
                    'alamat_orangtua'   => $faker->address,
                    'nama_wali'         => $faker->name,
                    'agama_wali'        => $agama[mt_rand(0,6)],
                    'alamat_wali'       => $faker->address,
                    'telepon_wali'      => $faker->e164PhoneNumber,
                    'pekerjaan_wali'    => $faker->jobTitle,
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

                \Orangtua::updateOrCreate([ 'user_id' => $user_id ], $form);
            }
        // }
    }
}
