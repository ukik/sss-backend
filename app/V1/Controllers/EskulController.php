<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EskulController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "EK-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $eskul = \Eskul::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $eskul, 
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
            'user_id'       => request()->user_id,
            'tahun_ajar'    => request()->tahun_ajar,
            'lokasi'        => request()->lokasi,
            'waktu_mulai'   => request()->waktu_mulai,
            'waktu_selesai' => request()->waktu_selesai,
            'hari'          => request()->hari,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'tahun_ajar'    => 'bail|required',
            'lokasi'        => 'bail|required',
            'waktu_mulai'   => 'bail|required',
            'waktu_selesai' => 'bail|required',
            'hari'          => 'bail|required',            
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $eskul = \Eskul::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $eskul, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $eskul = \Eskul::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $eskul, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $eskul = \Eskul::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $eskul, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'sekolah_id'    => request()->sekolah_id,
            'user_id'       => request()->user_id,
            'tahun_ajar'    => request()->tahun_ajar,
            'lokasi'        => request()->lokasi,
            'waktu_mulai'   => request()->waktu_mulai,
            'waktu_selesai' => request()->waktu_selesai,
            'hari'          => request()->hari,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'tahun_ajar'    => 'bail|required',
            'lokasi'        => 'bail|required',
            'waktu_mulai'   => 'bail|required',
            'waktu_selesai' => 'bail|required',
            'hari'          => 'bail|required',            
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $eskul = \Eskul::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $eskul, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $eskul = \Eskul::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $eskul, 
            ],
            'meta'      => '',
        ]);        
    }
}