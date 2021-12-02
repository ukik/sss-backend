<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruTemaController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "GR-TM-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $tema = \GuruTema::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tema, 
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
            'mapel_id'      => request()->mapel_id,
            'guru_id'       => request()->guru_id,
            'user_id'       => request()->user_id,
            'deskripsi'     => request()->deskripsi,            
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'mapel_id'      => 'bail|required',
            'guru_id'       => 'bail|required',
            'user_id'       => 'bail|required',
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

        $tema = \GuruTema::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $tema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $tema = \GuruTema::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $tema = \GuruTema::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'sekolah_id'    => request()->sekolah_id,
            'mapel_id'      => request()->mapel_id,
            'guru_id'       => request()->guru_id,
            'user_id'       => request()->user_id,
            'deskripsi'     => request()->deskripsi,            
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'mapel_id'      => 'bail|required',
            'guru_id'       => 'bail|required',
            'user_id'       => 'bail|required',
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

        $tema = \GuruTema::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $tema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $tema = \GuruTema::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tema, 
            ],
            'meta'      => '',
        ]);        
    }
}