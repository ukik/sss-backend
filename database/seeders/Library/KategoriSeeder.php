<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=KategoriSeeder

class KategoriSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('__kategori')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        $schools = \Sekolah::all();

        $pengumuman = [
            'larangan','himbauan','perintah','saran','ajakan','informasi'
        ];

        $berita = [
            'umum','pelajaran','parenting','kesehatan','keagamanaan','keuangan'
        ];

        foreach ($pengumuman as $key1 => $value1) {

            $uuid = 'LB-KTG-'.uuid();

            $form =  [
                'uuid'              => $uuid,
                'tipe'              => 'pengumuman',
                'deskripsi'         => $value1,    
            ];

            \Kategori::updateOrCreate([ 'uuid' => $uuid ], $form);

        }

        foreach ($berita as $key2 => $value2) {

            $uuid = 'LB-KTG-'.uuid();

            $form =  [
                'uuid'              => $uuid,
                'tipe'              => 'berita',
                'deskripsi'         => $value2,    
            ];

            \Kategori::updateOrCreate([ 'uuid' => $uuid ], $form);

        }

    }
}
