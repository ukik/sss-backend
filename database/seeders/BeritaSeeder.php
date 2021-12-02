<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=BeritaSeeder

use Carbon\Carbon;

class BeritaSeeder extends Seeder
{

    public function run()
    {

        return;

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('berita')->truncate();
        \DB::table('images')->truncate();
        \DB::table('tags')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        $schools = \Sekolah::all();

        $kategories = \Kategori::where('tipe','berita')->get();

        $publishs = ['0','1'];

        foreach ($schools as $key1 => $school) {

            foreach ($kategories as $key2 => $kategori) {

                $gurus = \GuruJabatan::where('sekolah_id', $school->id)->with('guru')->whereNotIn('jabatan_id', [1, 2, 7])->get();

                foreach ($gurus as $key3 => $guru) {

                    foreach ($publishs as $key4 => $publish) {

                        for ($i=0; $i < 10; $i++) { 

                            $visibility = $publish == '1' ? mt_rand('0','1') : '0';

                            $uuid = 'BRT-'.uuid();

                            $waktu_mulai = Carbon::now()->subMonths(mt_rand(0,5))->addDays(30);

                            $form =  [

                                'sekolah_id'        => $school->id,
                                'uuid'              => $uuid,
                                'user_id'           => $guru->guru_id,
                                'kategori_id'       => $kategori->id,
                                'judul'             => $faker->text($maxNbChars = 300),
                                'deskripsi'         => $faker->text($maxNbChars = 1000),
                                'publish'           => $publish,
                                'visibility'        => $visibility,
             
                            ];

                            $berita = \Berita::updateOrCreate([ 'uuid' => $uuid ], $form);

                            $tag_id = [];
                            $image_id = [];

                            for ($j=0; $j < mt_rand(1,5); $j++) { 

                                $tag = $faker->word;
                                
                                $tag = \Tags::updateOrCreate(
                                    [ 'tag' => $tag ],
                                    [ 'tag' => $tag ],
                                );

                                $tag_id[] = [ 'berita_id' => $berita->id, 'tag_id' => $tag->id ];

                                $image = \Images::create([
                                    'sekolah_id'        => $school->id,
                                    'uuid'              => 'IMG-BRT-'.uuid(),
                                    // 'galeri_id'         => 
                                    'user_id'           => $guru->user_id,        
                                    'original_image'    => $faker->imageUrl(600, 400, 'cats'),
                                    'og_image'          => $faker->imageUrl(600, 400, 'cats'),
                                    'thumbnail'         => $faker->imageUrl(100, 100, 'cats'),
                                    'big_image'         => $faker->imageUrl(1080, 1000, 'cats'),
                                    'big_image_two'     => $faker->imageUrl(730, 400, 'cats'),
                                    'medium_image'      => $faker->imageUrl(358, 215, 'cats'),
                                    'medium_image_two'  => $faker->imageUrl(350, 190, 'cats'),
                                    'medium_image_three'    => $faker->imageUrl(255, 175, 'cats'),
                                    'small_image'       => $faker->imageUrl(123, 83, 'cats'),  
                                ]);

                                $image_id[] = [ 'berita_id' => $berita->id, 'image_berita_id' => $image->id ];

                            }

                            \BeritaTag::where('berita_id', $berita->id)->delete();
                            $berita->berita_tag()->sync($tag_id);

                            \BeritaImage::where('berita_id', $berita->id)->delete();
                            $berita->berita_image()->sync($image_id);


                            // $berita->berita_tag()->syncWithoutDetaching($image_id);
                            // $berita->berita_image()->syncWithoutDetaching($image_id);

                        }
                    }
                }
            }
        }
    }
}
