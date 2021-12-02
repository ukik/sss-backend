<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaImageController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "BRT-IMG-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $berita_image = \BeritaImage::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita_image, 
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
            'uuid'              => $this->uuid,
            'image_berita_id'   => request()->image_berita_id,
            'berita_id'         => request()->berita_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'image_berita_id'   => 'bail|required',
            'berita_id'         => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $berita_image = \BeritaImage::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita_image, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $berita_image = \BeritaImage::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita_image, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $berita_image = \BeritaImage::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita_image, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'              => $this->uuid,
            'image_berita_id'   => request()->image_berita_id,
            'berita_id'         => request()->berita_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'image_berita_id'   => 'bail|required',
            'berita_id'         => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $berita_image = \BeritaImage::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita_image, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $berita_image = \BeritaImage::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita_image, 
            ],
            'meta'      => '',
        ]);        
    }
}

