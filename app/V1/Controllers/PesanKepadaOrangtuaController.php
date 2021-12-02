<?php

use App\Http\Controllers\Controller;

use App\Models\Berita;
use Illuminate\Http\Request;

class PesanKepadaOrangtuaController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "PSN-ORT-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $pesan_kepada_orangtua = \PesanKepadaOrangtua::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan_kepada_orangtua, 
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
            'orangtua_id'   => request()->orangtua_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'orangtua_id'   => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $pesan_kepada_orangtua = \PesanKepadaOrangtua::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan_kepada_orangtua, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $pesan_kepada_orangtua = \PesanKepadaOrangtua::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan_kepada_orangtua, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $pesan_kepada_orangtua = \PesanKepadaOrangtua::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan_kepada_orangtua, 
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
            'orangtua_id'   => request()->orangtua_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'orangtua_id'   => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $pesan_kepada_orangtua = \PesanKepadaOrangtua::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan_kepada_orangtua, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $pesan_kepada_orangtua = \PesanKepadaOrangtua::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan_kepada_orangtua, 
            ],
            'meta'      => '',
        ]);        
    }
}
