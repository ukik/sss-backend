<?php

use Illuminate\Database\Seeder;

# php artisan db:seed --class=UserSeeder

class __UserSeeder extends Seeder {

    public
    function run() 
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::table('user_profile_pekerjaan')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker\Factory::create();

        for ($i=0; $i < 20; $i++) { 
            // code...

            $pass = 12345678;
            $email = $faker->email;
            $form =  [
                'first_name'    => $faker->name,
                'last_name'     => $faker->name,
                'plain'         => $pass,
                'email'         => $email,
                'password'      => password_hash($pass, PASSWORD_DEFAULT, [
                    $pass
                ]), 
                'about_us'      => $faker->text($maxNbChars = 500),
                'phone'         => $faker->e164PhoneNumber,
                'saya_mengerti' => 'true',
            ];

            $form;

            $user = User::where('email', $email)->first();

            if(!$user){

                $user                       = new User;
                $user->email                = $email; 
                $user->password             = $form['password']; 
                $user->plain                = $form['plain'];               
                $user->first_name           = $form['first_name'];
                $user->last_name            = $form['last_name'];
                $user->about_us             = $form['about_us'];
                $user->phone                = $form['phone'];
                $user->saya_mengerti        = $form['saya_mengerti'];
                $user->is_active            = 1;
                $user->newsletter_enable    = 1; // idealnya user verifikasi dulu, tapi nantilah

                $user->save();

                UserRole::updateOrCreate([
                    'user_id'            => $user->id
                ],[
                    'user_id'            => $user->id,
                    'role_id'            => 11,
                ]);

                $activation                 = Activation::create($user);

                $activation                 = ActivationModel::whereUserId($user->id)->first();

                UserProfileAhliWaris::updateOrCreate([
                    'user_id'            => $user->id
                ],[
                    'user_id'            => $user->id
                ]);

                UserProfileKeuangan::updateOrCreate([
                    'user_id'            => $user->id
                ],[
                    'user_id'            => $user->id
                ]);

                UserProfilePekerjaan::updateOrCreate([
                    'user_id'            => $user->id
                ],[
                    'user_id'            => $user->id
                ]);

                UserProfilePribadi::updateOrCreate([
                    'user_id'            => $user->id
                ],[
                    'user_id'            => $user->id,
                    'nama_depan'         => $user->first_name,
                    'nama_belakang'      => $user->last_name,
                    'telepon'            => $user->phone,
                ]);

                UserProfileUsaha::updateOrCreate([
                    'user_id'            => $user->id
                ],[
                    'user_id'            => $user->id
                ]);

                Activation::updateOrCreate([
                    'user_id'            => $user->id
                ],[
                    'completed'          => 1
                ]);


            }
        }

    }
}
