<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-TM-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $tema = \Tema::all();

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
            'mapel_id'      => request()->mapel_id,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'mapel_id'      => 'bail|required',
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

        $tema = \Tema::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $tema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $tema = \Tema::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $tema = \Tema::where('id', $id)->first();

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
            'mapel_id'      => request()->mapel_id,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'mapel_id'      => 'bail|required',
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

        $tema = \Tema::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $tema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $tema = \Tema::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tema, 
            ],
            'meta'      => '',
        ]);        
    }
}
