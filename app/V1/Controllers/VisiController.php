<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "VS-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $visi = \Visi::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $visi, 
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
            'tahun_ajar'    => request()->tahun_ajar,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'tahun_ajar'    => 'bail|required',
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

        $visi = \Visi::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $visi, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $visi = \Visi::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $visi, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $visi = \Visi::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $visi, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'sekolah_id'    => request()->sekolah_id,
            'tahun_ajar'    => request()->tahun_ajar,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'tahun_ajar'    => 'bail|required',
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

        $visi = \Visi::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $visi, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $visi = \Visi::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $visi, 
            ],
            'meta'      => '',
        ]);        
    }
}