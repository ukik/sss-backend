<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=RppK13Seeder

use Carbon\Carbon;

class RppK13Seeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('rpp_k13')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        // $schools = \Sekolah::all();

        $rombel = [
            'A','B','C','D','E'
        ];

        $mapels = \Mapel::where('satuan','smp')->get();

        // foreach ($schools as $key1 => $school) {

        $gurus = \GuruJabatan::whereNotIn('jabatan_id', [1, 2, 7])->get();

        foreach ($gurus as $key => $guru) {

            for ($i=0; $i < 10; $i++) { 
                // code...

                // $today = Carbon::today();

                // $now = Carbon::createFromFormat('H:i:s','13:00:00');  //now();

                $uuid = 'RPP-K13-'.uuid();

                $form =  [
                    'sekolah_id'        => $guru->sekolah_id,
                    'uuid'              => $uuid,
                    'user_id'           => $guru->user_id,
                    'guru_id'           => $guru->guru_id,
                    'tema_id'           => mt_rand(1,1125),
                    'subtema_id'        => mt_rand(1,28125),
                    // 'mapel'             => $mapels[mt_rand(0, count($mapels)-1)]['id'],
                    'semester'          => ['ganjil','genap'][mt_rand(0,1)],
                    'tahun_ajar'        => '2020/2021',
                    'kelas'             => mt_rand(1,3),
                    'rombel'            => $rombel[mt_rand(0,4)],
                    'jumlah_pertemuan'  => 5,
                    'durasi_mengajar'   => 45,

                ];

                \RppK13::updateOrCreate([ 'uuid' => $uuid ], $form);
            }
        }
        // }
    }
}
