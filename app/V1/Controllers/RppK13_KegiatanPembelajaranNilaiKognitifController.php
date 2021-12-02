<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RppK13_KegiatanPembelajaranNilaiKognitifController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "RPP-K13-KBM-NKG-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $rpp_k13_kegiatan_pembelajarn_nilai_kognitif = \RppK13_KegiatanPembelajaranNilaiKognitif::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_nilai_kognitif, 
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
            'rpp_id'        => request()->rpp_id,
            'guru_id'       => request()->guru_id,
            'user_id'       => request()->user_id,
            'tema_id'       => request()->tema_id,
            'subtema_id'    => request()->subtema_id,
            'latihan_ke'    => request()->latihan_ke,
            'nilai'         => request()->nilai,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'rpp_id'        => 'bail|required',
            'guru_id'       => 'bail|required',
            'user_id'       => 'bail|required',
            'tema_id'       => 'bail|required',
            'subtema_id'    => 'bail|required',
            'latihan_ke'    => 'bail|required',
            'nilai'         => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $rpp_k13_kegiatan_pembelajarn_nilai_kognitif = \RppK13_KegiatanPembelajaranNilaiKognitif::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_nilai_kognitif, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $rpp_k13_kegiatan_pembelajarn_nilai_kognitif = \RppK13_KegiatanPembelajaranNilaiKognitif::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_nilai_kognitif, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $rpp_k13_kegiatan_pembelajarn_nilai_kognitif = \RppK13_KegiatanPembelajaranNilaiKognitif::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_nilai_kognitif, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'sekolah_id'    => request()->sekolah_id,
            'rpp_id'        => request()->rpp_id,
            'guru_id'       => request()->guru_id,
            'user_id'       => request()->user_id,
            'tema_id'       => request()->tema_id,
            'subtema_id'    => request()->subtema_id,
            'latihan_ke'    => request()->latihan_ke,
            'nilai'         => request()->nilai,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'rpp_id'        => 'bail|required',
            'guru_id'       => 'bail|required',
            'user_id'       => 'bail|required',
            'tema_id'       => 'bail|required',
            'subtema_id'    => 'bail|required',
            'latihan_ke'    => 'bail|required',
            'nilai'         => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $rpp_k13_kegiatan_pembelajarn_nilai_kognitif = \RppK13_KegiatanPembelajaranNilaiKognitif::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_nilai_kognitif, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $rpp_k13_kegiatan_pembelajarn_nilai_kognitif = \RppK13_KegiatanPembelajaranNilaiKognitif::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_nilai_kognitif, 
            ],
            'meta'      => '',
        ]);        
    }
}