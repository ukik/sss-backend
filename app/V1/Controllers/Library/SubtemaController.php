<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubtemaController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-STM-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $subtema = \Subtema::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $subtema, 
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
            'tema_id'       => request()->tema_id,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'mapel_id'      => 'bail|required',
            'tema_id'       => 'bail|required',
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

        $subtema = \Subtema::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $subtema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $subtema = \Subtema::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $subtema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $subtema = \Subtema::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $subtema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'mapel_id'      => request()->mapel_id,
            'tema_id'       => request()->tema_id,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'mapel_id'      => 'bail|required',
            'tema_id'       => 'bail|required',
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

        $subtema = \Subtema::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $subtema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $subtema = \Subtema::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $subtema, 
            ],
            'meta'      => '',
        ]);        
    }
}
