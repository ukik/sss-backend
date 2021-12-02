<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "GLR-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $galeri = \Galeri::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $galeri, 
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
            'judul'         => request()->judul,
            'deskripsi'     => request()->deskripsi,            
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'judul'         => 'bail|required',
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

        $galeri = \Galeri::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $galeri, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $galeri = \Galeri::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $galeri, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $galeri = \Galeri::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $galeri, 
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
            'judul'         => request()->judul,
            'deskripsi'     => request()->deskripsi,            
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'judul'         => 'bail|required',
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

        $galeri = \Galeri::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $galeri, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $galeri = \Galeri::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $galeri, 
            ],
            'meta'      => '',
        ]);        
    }
}

