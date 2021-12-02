<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=MetaSumberBelajarSeeder

class MetaSumberBelajarSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('__meta_sumber_belajar')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $items = [
            [
                'icon'  => 'rocket_launch',
                'label' => 'buku',
                'color' => 'red-5',
            ],
            [
                'icon'  => 'rocket_launch',
                'label' => 'website',
                'color' => 'blue-5',
            ],
            [
                'icon'  => 'rocket_launch',
                'label' => 'video',
                'color' => 'pink-5',
            ],
            [
                'icon'  => 'rocket_launch',
                'label' => 'media',
                'color' => 'orange-5',
            ],
            [
                'icon'  => 'rocket_launch',
                'label' => 'peraga',
                'color' => 'teal-5',
            ],
            [
                'icon'  => 'rocket_launch',
                'label' => 'gambar',
                'color' => 'cyan-5',
            ],
        ];


        foreach ($items as $key1 => $item) {

            $uuid = 'LB-MT-SBJR-'.uuid();

            $form =  [
                'uuid'          => $uuid,
                'icon'          => $item['icon'],
                'color'         => $item['color'],    
                'label'         => $item['label'],    
            ];

            \MetaSumberBelajar::updateOrCreate([ 'uuid' => $uuid ], $form);

        }

    }
}
