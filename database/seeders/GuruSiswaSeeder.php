<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=GuruSiswaSeeder

use Carbon\Carbon;

class GuruSiswaSeeder extends Seeder
{

    public function run()
    {
        
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('guru_siswa')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        // $user = \Orangtua::find(1);
        // $user->orangtua_siswa()->sync([
        //     1 => [
        //         'sekolah_id'        => $school->id,
        //         'uuid'              => $uuid,
        //         'orangtua_id'       => $ortu->id,
        //         'siswa_id'          => $siswa->id,                        
        //     ]
        // ]);        
        // $user->orangtua_siswa()->attach([1,2,3]);        

        $ortus = \Orangtua::all();

        foreach ($ortus as $key => $ortu) {

            $ortu->orangtua_siswa()->sync([
                1 => [
                    'sekolah_id'        => $ortu->sekolah_id,
                    'uuid'              => 'OR-SW-'.uuid(),
                    'orangtua_id'       => $ortu->id,
                    'siswa_id'          => $key,                        
                ]
            ]);        
        }
    }
}
