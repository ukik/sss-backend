<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=MapelSeeder

class MapelSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('__mapel')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $containers = [
            'sd'    => [
                'PPKn',
                'Bahasa Indonesia',
                'Matematika',
                'Penjasorkes',
                'IPA',
                'IPS',
                'Seni Budaya dan Prakarya',
                'Pendidikan Agama Islam',
                'Pendidikan Agama Katolik',
                'Pendidikan Agama Kristen',
                'Pendidikan Agama Hindu',
                'Pendidikan Agama Budha',
                'Pendidikan Agama Konghuchu',
            ],
            'smp'   => [
                'PPKn',
                'Bahasa Indonesia',
                'Matematika',
                'IPA',
                'IPS',
                'Bahasa Inggris',
                'Seni Budaya (Muatan Lokal)',
                'Penjasorkes',
                'Prakarya (Muatan Lokal)',
                'Pendidikan Agama dan Budi Pekerti',
                'Pendidikan Agama Katolik',
                'Pendidikan Agama Kristen',
                'Pendidikan Agama Hindu',
                'Pendidikan Agama Budha',
                'Pendidikan Agama Konghuchu',
            ],
            'sma'   => [
                'PPKn',
                'Bahasa Indonesia',
                'Matematika',
                'Fisika',
                'Kimia',
                'Ekonomi',
                'Manajemen',
                'Bahasa Inggris',
                'Seni Budaya (Muatan Lokal)',
                'Penjasorkes',
                'Prakarya (Muatan Lokal)',
                'Pendidikan Agama dan Budi Pekerti',
                'Pendidikan Agama Katolik',
                'Pendidikan Agama Kristen',
                'Pendidikan Agama Hindu',
                'Pendidikan Agama Budha',
                'Pendidikan Agama Konghuchu',
            ],
        ];


        foreach ($containers as $key1 => $mapels) {

            foreach ($mapels as $key2 => $mapel) {
                // code...
                $uuid = 'LB-MP-'.uuid();

                $form =  [
                    'uuid'              => $uuid,
                    'satuan'            => $key1,
                    'label'             => make_slug($mapel),
                    'deskripsi'         => $mapel,
                ];
                
                \Mapel::updateOrCreate([ 'uuid' => $uuid ], $form);

            }
        }

    }
}
