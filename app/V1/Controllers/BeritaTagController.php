<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaTagController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "BRT-TAG-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $berita_tag = \BeritaTag::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita_tag, 
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
            'berita_id'     => request()->berita_id,
            'tag_id'        => request()->tag_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'berita_id'     => 'bail|required',
            'tag_id'        => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $berita_tag = \BeritaTag::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita_tag, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $berita_tag = \BeritaTag::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita_tag, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $berita_tag = \BeritaTag::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita_tag, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'berita_id'     => request()->berita_id,
            'tag_id'        => request()->tag_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'berita_id'     => 'bail|required',
            'tag_id'        => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $berita_tag = \BeritaTag::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita_tag, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $berita_tag = \BeritaTag::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita_tag, 
            ],
            'meta'      => '',
        ]);        
    }
}

