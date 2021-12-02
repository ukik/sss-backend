<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

# php artisan db:seed --class=PoinAfektifPsikomotorSeeder

class PoinAfektifPsikomotorSeeder extends Seeder
{

    public function run()
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('__poin_afektif_psikomotor')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $schools = \Sekolah::all();


        $k1 = $this->k1();
        $k2 = $this->k2();
        $k3 = $this->k3();

        foreach ($k1 as $key1 => $k1_values) {

            foreach ($k1_values as $key1_2 => $value1_1) {

                $uuid = 'LB-AF-PS-'.uuid();

                $form =  [
                    'uuid'          => $uuid,
                    'tipe'          => 'k1',
                    'label'         => $key1,
                    'deskripsi'     => ucfirst($value1_1), 
                ];

                // dd($form);
                \PoinAfektifPsikomotor::updateOrCreate([ 'uuid' => $uuid ], $form);
            }
        }

        foreach ($k2 as $key2 => $k2_values) {

            foreach ($k2_values as $key2_2 => $value2_2) {

                $uuid = 'LB-AF-PS-'.uuid();

                $form =  [
                    'uuid'          => $uuid,
                    'tipe'          => 'k2',
                    'label'         => $key2,
                    'deskripsi'     => ucfirst($value2_2), 
                ];

                // dd($form);
                \PoinAfektifPsikomotor::updateOrCreate([ 'uuid' => $uuid ], $form);
            }
        }

        foreach ($k3 as $key3 => $k3_values) {

            $uuid = 'LB-AF-PS-'.uuid();

            $form =  [
                'uuid'          => $uuid,
                'tipe'          => 'k3',
                'label'         => 'keterampilan',
                'deskripsi'     => ucfirst($k3_values), 
            ];

            // dd($form);
            \PoinAfektifPsikomotor::updateOrCreate([ 'uuid' => $uuid ], $form);
        }

    }


    public function k1() {
        return [
            'beribadah' => [
                'perilaku patuh dalam melaksanakan ajaran agama yang dianutnya',
                'mau mengajak teman seagamanya untuk melakukan ibadah bersama',
                'mengikuti kegiatan keagamaan yang diselenggarakan sekolah',
                'melaksanakan ibadah sesuai ajaran agama, misalnya: shalat dan puasa',
                'merayakan hari besar agama',
                'melaksanakan ibadah tepat waktu',
                'tindakan yang menghargai perbedaan dalam beribadah',
                'menghormati teman yang berbeda agama',
                'berteman tanpa membedakan agama',
                'tidak mengganggu teman yang sedang beribadah',
                'menghormati hari besar keagamaan lain',
                'tidak menjelekkan ajaran agama lain.',
            ],
            'akhlak' => [
                'mengakui kebesaran Tuhan dalam menciptakan alam semesta',
                'menjaga kelestarian alam, tidak merusak tanaman',
                'tidak mengeluh',
                'selalu merasa gembira dalam segala hal',
                'tidak berkecil hati dengan keadaannya',
                'suka memberi atau menolong sesama',
                'selalu berterima kasih bila menerima pertolongan',
                'menerima perbedaan karakteristik sebagai anugerah Tuhan',
                'selalu menerima penugasan dengan sikap terbuka',
                'berterima kasih atas pemberian orang lain',
                'berdoa sebelum dan sesudah belajar',
                'berdoa sebelum dan sesudah makan',
                'mengajak teman berdoa saat memulai kegiatan',
                'mengingatkan teman untuk selalu berdoa',
            ],
        ];

    }

    public function k2() {

        return [
            'jujur' => [
                'tidak berbohong',
                'tidak mencontek',
                'mengerjakan sendiri tugas yang diberikan pendidik, tanpa menjiplak tugas orang lain',
                'mengerjakan soal penilaian tanpa mencontek',
                'mengatakan dengan sesungguhnya apa yang terjadi atau yang dialaminya dalam kehidupan sehari-hari',
                'mau mengakui kesalahan atau kekeliruan',
                'mengembalikan barang yang dipinjam atau ditemukan',
                'mengemukakan pendapat sesuai dengan apa yang diyakininya, walaupun berbeda dengan pendapat teman',
                'mengemukakan ketidaknyamanan belajar yang dirasakannya di sekolah',
                'membuat laporan kegiatan kelas secara terbuka (transparan)',
            ],
            'disiplin' => [
                'mengikuti peraturan yang ada di sekolah',
                'tertib dalam melaksanakan tugas',
                'hadir di sekolah tepat waktu',
                'masuk kelas tepat waktu',
                'memakai pakaian seragam lengkap dan rapi',
                'tertib mentaati peraturan sekolah',
                'melaksanakan piket kebersihan kelas',
                'mengumpulkan tugas/pekerjaan rumah tepat waktu',
                'mengerjakan tugas/pekerjaan rumah dengan baik',
                'membagi waktu belajar dan bermain dengan baik',
                'mengambil dan mengembalikan peralatan belajar pada tempatnya',
                'tidak pernah terlambat masuk kelas',
            ],
            'tanggung_jawab' => [
                'menyelesaikan tugas yang diberikan',
                'mengakui kesalahan',
                'melaksanakan tugas yang menjadi kewajibannya di kelas seperti piket kebersihan',
                'melaksanakan peraturan sekolah dengan baik',
                'mengerjakan tugas/pekerjaan rumah sekolah dengan baik',
                'mengumpulkan tugas/pekerjaan rumah tepat waktu',
                'mengakui kesalahan, tidak melemparkan kesalahan kepada teman',
                'berpartisipasi dalam kegiatan sosial di sekolah',
                'menunjukkan prakarsa untuk mengatasi masalah dalam kelompok di kelas/sekolah',
                'membuat laporan setelah selesai melakukan kegiatan',
            ],
            'santun' => [
                'menghormati orang lain dan menghormati cara bicara yang tepat',
                'menghormati pendidik, pegawai sekolah, penjaga kebun, dan orang yang lebih tua',
                'berbicara atau bertutur kata halus tidak kasar',
                'berpakaian rapi dan pantas',
                'dapat mengendalikan emosi dalam menghadapi masalah, tidak marah-marah',
                'mengucapkan salam ketika bertemu pendidik, teman, dan orang-orang di sekolah',
                'menunjukkan wajah ramah, bersahabat, dan tidak cemberut',
                'mengucapkan terima kasih apabila menerima bantuan dalam bentuk jasa atau barang dari orang lain',
            ],
            'peduli' => [
                'ingin tahu dan ingin membantu teman yang kesulitan dalam pembelajaran, perhatian kepada orang lain',
                'berpartisipasi dalam kegiatan sosial di sekolah, misal: mengumpulkan sumbangan untuk membantu yang sakit atau kemalangan',
                'meminjamkan alat kepada teman yang tidak membawa/memiliki',
                'menolong teman yang mengalami kesulitan',
                'menjaga keasrian, keindahan, dan kebersihan lingkungan sekolah',
                'melerai teman yang berselisih (bertengkar)',
                'menjenguk teman atau pendidik yang sakit',
                'menunjukkan perhatian terhadap kebersihan kelas dan lingkungan sekolah',
            ],
            'percaya_diri' => [
                'berani tampil di depan kelas',
                'berani mengemukakan pendapat',
                'berani mencoba hal baru',
                'mengemukakan pendapat terhadap suatu topik atau masalah',
                'mengajukan diri menjadi ketua kelas atau pengurus kelas lainnya',
                'mengajukan diri untuk mengerjakan tugas atau soal di papan tulis',
                'mencoba hal-hal baru yang bermanfaat ',
                'mengungkapkan kritikan membangun terhadap karya orang lain',
                'memberikan argumen yang kuat untuk mempertahankan pendapat',
            ],
        ];
    }

    public function k3() {
        return [
             'Dalam diskusi kelompok terlihat aktif, tanggung jawab, mempunyai pemikiran/ide, berani berpendapat',
             'Memberikan pertanyaan dalam kelompok dengan bahasa yang jelas',
             'Memberikan jawaban dari pertanyaan dalam kelompok dengan bahasa yang jelas',
             'Memberikan gagasan/ide yang orisinil berdasarkan pemikiran sendiri',
             'Dalam diskusi kelompok terlibat aktif, tanggung jawab dalam tugas, dan membuat teman-temannya nyaman dengan keberadaannya',
             'Dalam diskusi kelompok aktif, santun, sabar mendengarkan pendapat teman-temannya',
             'Sistematika penjelasan logis dengan bahasa dan suara yang sangat jelas',
             'Menguasai materi presentasi dan dapat menjawab pertanyaan dengan baik dan kesimpulan mendukung topik yang dibahas',
             'Penampilan menarik, sopan dan rapi, dengan penuh percaya diri serta menggunakan alat bantu',
             'Mampu mendengarkan dengan baik dan berkonsentrasi dari gangguan saat guru menjelaskan di kelas',
             'Pro-aktif dan sigap merespon himbauan guru di segala situasi',
             'Terampil menggunakan alat peraga, media-media penunjang pembelajaran',
        ];

    }    
}
