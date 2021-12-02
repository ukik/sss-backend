<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-KTG-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $kategori = \Kategori::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $kategori, 
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
            'tipe'          => request()->tipe,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'tipe'          => 'bail|required|in:pengumuman,berita',
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

        $kategori = \Kategori::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $kategori, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $kategori = \Kategori::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $kategori, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $kategori = \Kategori::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $kategori, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'tipe'          => request()->tipe,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'tipe'          => 'bail|required|in:pengumuman,berita',
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

        $kategori = \Kategori::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $kategori, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $kategori = \Kategori::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $kategori, 
            ],
            'meta'      => '',
        ]);        
    }
}
