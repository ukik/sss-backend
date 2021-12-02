<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=PesanSeeder

use Carbon\Carbon;

class PesanSeeder extends Seeder
{

    public function run()
    {   
        return;

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // \DB::table('pesan')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        // $schools = \Sekolah::all();

        // foreach ($schools as $key1 => $school) {
        function getGuru($faker, $html) {
            $gurus = \Guru::all();

            foreach ($gurus as $key => $value) {

                for ($i=0; $i < 10; $i++) { 

                    $uuid = 'PSN-'.uuid();

                    $form =  [
                        'sekolah_id'        => $value->sekolah_id,
                        'uuid'              => $uuid,
                        'user_id'           => $value->user_id,
                        'judul'             => $faker->text($maxNbChars = 300),
                        'deskripsi'         => $html,
                        'terkirim'         => mt_rand('0','1'),       
                        'label' => 'guru',      
                    ];

                    \Pesan::updateOrCreate([ 'uuid' => $uuid ], $form);
                }
            }
        }

        function getSiswa($faker, $html) {

            $siswas = \Siswa::all();

            foreach ($siswas as $key => $value) {

                for ($i=0; $i < 10; $i++) { 

                    $uuid = 'PSN-'.uuid();

                    $form =  [
                        'sekolah_id'        => $value->sekolah_id,
                        'uuid'              => $uuid,
                        'user_id'           => $value->user_id,
                        'judul'             => $faker->text($maxNbChars = 300),
                        'deskripsi'         => $html,
                        'terkirim'         => mt_rand('0','1'),             
                        'label' => 'siswa',      
                    ];

                    \Pesan::updateOrCreate([ 'uuid' => $uuid ], $form);
                }
            }
        }

        function getTataUsaha($faker, $html) {
            $tata_usaha = \TataUsaha::all();

            foreach ($tata_usaha as $key => $value) {

                for ($i=0; $i < 10; $i++) { 

                    $uuid = 'PSN-'.uuid();

                    $form =  [
                        'sekolah_id'        => $value->sekolah_id,
                        'uuid'              => $uuid,
                        'user_id'           => $value->user_id,
                        'judul'             => $faker->text($maxNbChars = 300),
                        'deskripsi'         => $html,
                        'terkirim'         => mt_rand('0','1'),             
                        'label' => 'tata_usaha',      
                    ];

                    \Pesan::updateOrCreate([ 'uuid' => $uuid ], $form);
                }
            }
        }

        function getOrangtua($faker, $html) {

            $orangtua = \Orangtua::all();

            foreach ($orangtua as $key => $value) {

                for ($i=0; $i < 10; $i++) { 

                    $uuid = 'PSN-'.uuid();

                    $form =  [
                        'sekolah_id'        => $value->sekolah_id,
                        'uuid'              => $uuid,
                        'user_id'           => $value->user_id,
                        'judul'             => $faker->text($maxNbChars = 300),
                        'deskripsi'         => $html,
                        'terkirim'         => mt_rand('0','1'),             
                        'label' => 'orangtua',      
                    ];

                    \Pesan::updateOrCreate([ 'uuid' => $uuid ], $form);
                }
            }            
        }

        // getGuru($faker, $this->generateHTML());
        // getSiswa($faker, $this->generateHTML());
        getOrangtua($faker, $this->generateHTML());
        getTataUsaha($faker, $this->generateHTML());
    }

    public function generateHTML()
    {
        $faker = \Faker\Factory::create();

        $paragraphs = $faker->paragraphs(rand(2, 6));
        $title = $faker->realText(50);
        $post = "<h1>{$title}</h1>";
        foreach ($paragraphs as $para) {
            $post .= "<p>{$para}</p>";
        }

        $category = $faker->randomElement(['Cat1','Cat2','Cat3']);

        return $post;
        // return [
        //     'title' => $title,
        //     'post' => $post,
        //     'category' => $category,
        //     'published' => true,
        // ];
    }    
}
