<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "BRT-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $berita = \Berita::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita, 
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
            'kategori_id'   => request()->kategori_id,
            'judul'         => request()->judul,
            'deskripsi'     => request()->deskripsi,
            'visibility'    => request()->visibility,
            'publish'       => request()->publish,            
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'kategori_id'   => 'bail|required',
            'judul'         => 'bail|required',
            'deskripsi'     => 'bail|required',
            'visibility'    => 'bail|required',
            'publish'       => 'bail|required',            
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $berita = \Berita::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $berita = \Berita::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $berita = \Berita::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita, 
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
            'kategori_id'   => request()->kategori_id,
            'judul'         => request()->judul,
            'deskripsi'     => request()->deskripsi,
            'visibility'    => request()->visibility,
            'publish'       => request()->publish,            
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'kategori_id'   => 'bail|required',
            'judul'         => 'bail|required',
            'deskripsi'     => 'bail|required',
            'visibility'    => 'bail|required',
            'publish'       => 'bail|required',            
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $berita = \Berita::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $berita = \Berita::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $berita, 
            ],
            'meta'      => '',
        ]);        
    }
}
