<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=MetodePembelajaranSeeder

class MetodePembelajaranSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('__metode_pembelajaran')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $metodes = [
            [ 
                'title' => 'metode ceramah', 
                'deskripsi' =>  'Metode pengajaran dengan cara berceramah atau menyampaikan informasi secara lisan kepada siswa. Metode ini merupakan metode yang paling praktis dan ekonomis, tidak membutuhkan banyak alat bantu. Metode ini mampu digunakan untuk mengatasi kelangkaan literatur atau sumber rujukan informasi karena daya beli siswa yang diluar jangkauan. Namun metode ini juga memiliki beberapa kelemahan dan kelebihan.' 
            ],
            [ 
                'title' => 'metode diskusi', 
                'deskripsi' =>  'Metode diskusi merupakan metode pengajaran yang erat hubungannya dengan belajar pemecahan masalah. Metode ini juga biasa dilakukan secara berkelompok atau diskusi kelompok.' 
            ],
            [ 
                'title' => 'metode demonstrasi', 
                'deskripsi' =>  'Metode demonstrasi digunakan pada pengajaran dengan proses yaitu menggunakan benda atau bahan ajar pada saat pengajaran. Bahan ajar akan memberikan pandangan secara nyata terhadap apa yang akan dipelajari, bisa juga melalui bentuk praktikum. Metode demonstrasi ini memiliki manfaat antara lain siswa jadi lebih tertarik dengan apa yang diajarkan, siswa lebih fokus dan terarah pada materi, pengalaman terhadap pengajaran lebih diingat dengan baik oleh siswa.' 
            ],
            [ 
                'title' => 'metode ceramah plus', 
                'deskripsi' =>  'Metode ceramah plus yaitu sistem pengajaran dengan menggunakan ceramah lisan dan disertai metode lainnya. Metode mengajar ini menggunakan lebih dari satu metode. Misalnya:' 
            ],
            [ 
                'title' => 'metode resitasi', 
                'deskripsi' =>  'Metode resitasi merupakan metode mengajar dengan siswa diharuskan membuat resume tentang materi yang sudah disampaiakan guru, dengan menuliskannya pada kertas dan menggunakan bahasa sendiri.' ],
            [ 
                'title' => 'metode percobaan', 
                'deskripsi' =>  'Metode percobaan merupakan metode pengajaran dengan menggunakan action berupa praktikum atau percobaan lab. Masing masing siswa dengan ini mampu melihat proses dengan nyata dan belajar secara langsung.' 
            ],
            [ 
                'title' => 'metode karya wisata', 
                'deskripsi' =>  'Metode karya wisata adalah suatu metode mengajar dengan memanfaatkan lingkungan, lokasi, atau tempat- tempat yang memiliki sumber pengetahuan bagi siswa. Metode mengajar ini dilakukan dengan pendampingan oleh guru ataupun orang tua jika usianya masih terlalu muda. Pendampingan dilakukan untuk menunjukkan sumber pengetahuan yang perlu dipahami oleh siswa. Metode karya wisata ini bisa dilakukan di tempat tempat sejarah, di alam, atau lainnya.' 
            ],
            [ 
                'title' => 'metode latihan keterampilan', 
                'deskripsi' =>  'Metode latihan keterampilan ini merupakan metode mengajar dengan melatih keterampilan siswa atau soft skill dengan cara membuat, merancang, atau memanfaatkan sesuatu. Metode ini membutuhkan kreativitas siswa yang tinggi denganmemanfaatkan suatu bahan menjadi barang yang lebih berguna dan bermanfaat.' 
            ],
            [ 
                'title' => 'metode pemecahan masalah (PBL)', 
                'deskripsi' =>  'Metode PBL ini dilakukan dalam kelas kecil, siswa diberikan kasus untuk menstimulasi diskusi kelompok. Kemudian siswa mengutarakan hasil pencarian materi terkait kasus dan didiskusikan dalam kelompok.' ],
            [ 
                'title' => 'metode perancangan', 
                'deskripsi' =>  'Metode perancangan merupakan metode mengajar dengan merangsang siswa untuk mampu menciptakan atau membuat suatu proyek ayang akan dipraktekkan atau akan diteliti.' 
            ],
            [ 
                'title' => 'metode discovery', 
                'deskripsi' =>  'Metode discovery merupakan metode pengajaran modern yang dilakukan dengan cara mengembangkan cara belajar siswa menjadi lebih aktif, mandiri, dan pemahaman yang lebih baik. Siswa mencari jawaban atas pertanyaannya sendiri, sehingga dapat diingat lebih baik. Strategi ini dinamakan strategi penemuan. Siswa menjadi lebih aktif mencari, memahami, dan menemukan jawaban atau materi terkait. Siswa juga mampu menganalisa pengetahuan yang diperolehnya kemudian ditransfer kepada masyarakat.' 
            ],
        ];       


        foreach ($metodes as $key1 => $metode) {

            $uuid = 'LB-MT-PBJR-'.uuid();

            $form =  [
                'uuid'              => $uuid,
                'slug'              => make_slug($metode['title']),
                'judul'             => ucfirst($metode['title']),
                'deskripsi'         => $metode['deskripsi'],    
            ];

            \MetodePembelajaran::updateOrCreate([ 'uuid' => $uuid ], $form);

        }

    }
}
