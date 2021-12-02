<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=GuruSeeder

use Carbon\Carbon;

class GuruSeeder extends Seeder
{

    public function run()
    {
        // return;
        
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('guru')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $pass = 12345;

        $schools = \Sekolah::all();

        // $users = \User::where('email','like','%guru%')->get();

        $gol1 = ['A','B','C'];
        $gol2 = ['I','II','III','IV'];

        $agama = [
            'islam','kriten','katolik','hindu','budha','konghucu','lainnya'
        ];        

        foreach ($schools as $key_school => $school) {

            // guru
            for ($i=0; $i < 30; $i++) { 
                $uuid = uuid();

                $form =  [
                    'uuid'          => $uuid,
                    'email'         => $i.$key_school.'guru@gmail.com',
                    'password'      => password_hash($pass, PASSWORD_DEFAULT, [
                        12345678
                    ]),
                ];

                \User::create($form);

                $user_id = \User::where('uuid', $uuid)->value('id');

                $uuid = 'GR-'.uuid();

                $form =  [
                    'sekolah_id'        => $school->id,
                    'uuid'              => $uuid,
                    'user_id'           => $user_id,
                    'nama_lengkap'      => $faker->name,
                    'nip'               => mt_rand(1000,100000),
                    'nuptk'             => mt_rand(1000,100000),
                    'tempat_lahir'      => $faker->city,
                    'tanggal_lahir'     => Carbon::createFromFormat('Y:m:d','1970:01:01')->addYears(mt_rand(1,20))->addMonths(mt_rand(1,12))->format('Y/m/d'),
                    'jenis_kelamin'     => ['L','P'][mt_rand(0,1)],
                    'agama'             => $agama[mt_rand(0,6)],
                    'golongan'          => $gol1[mt_rand(0,2)].$gol2[mt_rand(0,3)],
                    'telepon'           => $faker->e164PhoneNumber,
                    'alamat'            => $faker->address,
                    'kelurahan'         => $faker->address,
                    'kecamatan'         => $faker->address,
                    'kabupaten'         => $faker->address,                
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

                \Guru::updateOrCreate([ 'user_id' => $user_id ], $form);
            }
        }
    }
}
