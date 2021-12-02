<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RppK13_KegiatanPembelajaranIntiController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "RPP-K13-KBM-IN-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $rpp_k13_kegiatan_pembelajarn_inti = \RppK13_KegiatanPembelajaranInti::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_inti, 
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
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'rpp_id'        => 'bail|required',
            'guru_id'       => 'bail|required',
            'user_id'       => 'bail|required',
            'tema_id'       => 'bail|required',
            'subtema_id'    => 'bail|required',
            'deskripsi'     => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $rpp_k13_kegiatan_pembelajarn_inti = \RppK13_KegiatanPembelajaranInti::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_inti, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $rpp_k13_kegiatan_pembelajarn_inti = \RppK13_KegiatanPembelajaranInti::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_inti, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $rpp_k13_kegiatan_pembelajarn_inti = \RppK13_KegiatanPembelajaranInti::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_inti, 
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
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'rpp_id'        => 'bail|required',
            'guru_id'       => 'bail|required',
            'user_id'       => 'bail|required',
            'tema_id'       => 'bail|required',
            'subtema_id'    => 'bail|required',
            'deskripsi'     => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $rpp_k13_kegiatan_pembelajarn_inti = \RppK13_KegiatanPembelajaranInti::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_inti, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $rpp_k13_kegiatan_pembelajarn_inti = \RppK13_KegiatanPembelajaranInti::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13_kegiatan_pembelajarn_inti, 
            ],
            'meta'      => '',
        ]);        
    }
}
