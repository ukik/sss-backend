<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=PesanKepadaStakeholderSeeder

use Carbon\Carbon;

class PesanKepadaStakeholderSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('pesan_kepada_stakeholder')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $pesans = \Pesan::where('label', 'kelas')->where('terkirim', 1)->get();

        foreach ($pesans as $key => $value) {

            $siswas = \Stakeholder::all();

            foreach ($siswas as $key1 => $value1) {

                $uuid = 'PSN-KPD-STK-'.uuid();

                $form =  [
                    'sekolah_id'    => $value1->sekolah_id,
                    'uuid'          => $uuid,
                    'user_id'       => $value1->user_id,
                    'stakeholder_id'      => $value1->stakeholder_id,
                    'dibaca'        => mt_rand(0,1),
                ];

                \PesanKepadaStakeholder::updateOrCreate([ 'uuid' => $uuid ], $form);

            }
        }
    }
}
