<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImagesBeritaController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "IMG-BRT-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $images_berita = \ImagesBerita::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $images_berita, 
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
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',

        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $images_berita = \ImagesBerita::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $images_berita, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $images_berita = \ImagesBerita::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $images_berita, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $images_berita = \ImagesBerita::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $images_berita, 
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
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',

        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $images_berita = \ImagesBerita::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $images_berita, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $images_berita = \ImagesBerita::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $images_berita, 
            ],
            'meta'      => '',
        ]);        
    }
}