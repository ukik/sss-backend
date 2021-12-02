<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=UserSeeder

// use DB;
// use Faker;

class UserSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('users')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();
        $pass = 12345;

        // guru/tu/kepsek
        for ($i=0; $i < 25; $i++) { 
            $uuid = uuid();

            $form =  [
                'uuid'          => $uuid,
                'name'          => NULL, //$faker->name,
                'email'         => $i.'guru@gmail.com',
                'password'      => password_hash($pass, PASSWORD_DEFAULT, [
                    12345678
                ]),
            ];

            \User::create($form);
        }

        // siswa
        for ($i=0; $i < 500; $i++) { 
            $uuid = uuid();

            $form =  [
                'uuid'          => $uuid,
                'name'          => $faker->name,
                'email'         => $i.'siswa@gmail.com',
                'password'      => password_hash($pass, PASSWORD_DEFAULT, [
                    12345678
                ]),
            ];

            \User::create($form);
        }

        // stakeholder
        for ($i=0; $i < 25; $i++) { 
            $uuid = uuid();

            $form =  [
                'uuid'          => $uuid,
                'name'          => $faker->name,
                'email'         => $i.'stakeholder@gmail.com',
                'password'      => password_hash($pass, PASSWORD_DEFAULT, [
                    12345678
                ]),
            ];

            \User::create($form);
        }

    }
}
