<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesanKepadaGuruController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "PSN-GR-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $pesan_kepada_guru = \PesanKepadaGuru::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan_kepada_guru, 
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
            'guru_id'       => request()->guru_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'guru_id'       => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $pesan_kepada_guru = \PesanKepadaGuru::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan_kepada_guru, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $pesan_kepada_guru = \PesanKepadaGuru::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan_kepada_guru, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $pesan_kepada_guru = \PesanKepadaGuru::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan_kepada_guru, 
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
            'guru_id'       => request()->guru_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'guru_id'       => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $pesan_kepada_guru = \PesanKepadaGuru::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan_kepada_guru, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $pesan_kepada_guru = \PesanKepadaGuru::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan_kepada_guru, 
            ],
            'meta'      => '',
        ]);        
    }
}
