<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImagesGaleriController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "IMG-GLR-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $images_galeri = \ImagesGaleri::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $images_galeri, 
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
            'galeri_id'     => request()->galeri_id,
            'user_id'       => request()->user_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'galeri_id'     => 'bail|required',
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

        $images_galeri = \ImagesGaleri::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $images_galeri, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $images_galeri = \ImagesGaleri::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $images_galeri, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $images_galeri = \ImagesGaleri::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $images_galeri, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'sekolah_id'    => request()->sekolah_id,
            'galeri_id'     => request()->galeri_id,
            'user_id'       => request()->user_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'galeri_id'     => 'bail|required',
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

        $images_galeri = \ImagesGaleri::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $images_galeri, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $images_galeri = \ImagesGaleri::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $images_galeri, 
            ],
            'meta'      => '',
        ]);        
    }
}