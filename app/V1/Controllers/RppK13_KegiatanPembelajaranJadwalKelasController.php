<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RppK13_KegiatanPembelajaranJadwalKelasController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "RPP-K13-KBM-JK-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $rpp_k13_kegiatan_pembelajarn_jadwal_kelas = \RppK13_KegiatanPembelajaranJadwalKelas::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_jadwal_kelas, 
            ],
            'meta'      => '',
        ]);        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $form = [
            'uuid'          => $this->uuid,
            'sekolah_id'    => request()->sekolah_id,
            'rpp_id'        => request()->sekolah_id,
            'guru_id'       => request()->sekolah_id,
            'user_id'       => request()->sekolah_id,
            'tema_id'       => request()->sekolah_id,
            'subtema_id'    => request()->sekolah_id,
            'tanggal'       => request()->sekolah_id,
            'kelas_mulai'   => request()->sekolah_id,
            'toleransi_terlambat'   => request()->sekolah_id,
            'kelas_tutup'   => request()->sekolah_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'rpp_id'        => 'bail|required',
            'guru_id'       => 'bail|required',
            'user_id'       => 'bail|required',
            'tema_id'       => 'bail|required',
            'subtema_id'    => 'bail|required',
            'tanggal'       => 'bail|required',
            'kelas_mulai'   => 'bail|required',
            'toleransi_terlambat'   => 'bail|required',
            'kelas_tutup'   => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $rpp_k13_kegiatan_pembelajarn_jadwal_kelas = \RppK13_KegiatanPembelajaranJadwalKelas::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_jadwal_kelas, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $rpp_k13_kegiatan_pembelajarn_jadwal_kelas = \RppK13_KegiatanPembelajaranJadwalKelas::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_jadwal_kelas, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $rpp_k13_kegiatan_pembelajarn_jadwal_kelas = \RppK13_KegiatanPembelajaranJadwalKelas::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_jadwal_kelas, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'sekolah_id'    => request()->sekolah_id,
            'rpp_id'        => request()->sekolah_id,
            'guru_id'       => request()->sekolah_id,
            'user_id'       => request()->sekolah_id,
            'tema_id'       => request()->sekolah_id,
            'subtema_id'    => request()->sekolah_id,
            'tanggal'       => request()->sekolah_id,
            'kelas_mulai'   => request()->sekolah_id,
            'toleransi_terlambat'   => request()->sekolah_id,
            'kelas_tutup'   => request()->sekolah_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'rpp_id'        => 'bail|required',
            'guru_id'       => 'bail|required',
            'user_id'       => 'bail|required',
            'tema_id'       => 'bail|required',
            'subtema_id'    => 'bail|required',
            'tanggal'       => 'bail|required',
            'kelas_mulai'   => 'bail|required',
            'toleransi_terlambat'   => 'bail|required',
            'kelas_tutup'   => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $rpp_k13_kegiatan_pembelajarn_jadwal_kelas = \RppK13_KegiatanPembelajaranJadwalKelas::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_jadwal_kelas, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $rpp_k13_kegiatan_pembelajarn_jadwal_kelas = \RppK13_KegiatanPembelajaranJadwalKelas::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_jadwal_kelas, 
            ],
            'meta'      => '',
        ]);        
    }
}