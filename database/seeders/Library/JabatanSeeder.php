<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=JabatanSeeder

class JabatanSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('__jabatan')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $jabatans = [
            'kepsek'                => 'Kepala Sekolah',
            // 'tata_usaha'            => 'Tata Usaha',
            'bendahara'             => 'Bendahara',
            'wakepsek_kurikulum'    => 'Wakil Kepala Sekolah Kurikulum',
            'wakepsek_kesiswaan'    => 'Wakil Kepala Sekolah Kesiswaan',
            'wakepsek_humas'        => 'Wakil Kepala Sekolah Hubungan Masyarakat',
            'wakepsek_sapra'        => 'Wakil Kepala Sekolah Sarana Prasarana',
            'operator'              => 'Operator',
        ];


        foreach ($jabatans as $key1 => $value1) {

            $uuid = 'LB-JBTN-'.uuid();

            $form =  [
                'uuid'              => $uuid,
                'label'             => $key1,
                'deskripsi'         => $value1,    
            ];

            \Jabatan::updateOrCreate([ 'uuid' => $uuid ], $form);

        }

    }
}
