<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-RNG-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $ruangan = \Ruangan::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $ruangan, 
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
            'ruangan'       => request()->ruangan,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'ruangan'       => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $ruangan = \Ruangan::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $ruangan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $ruangan = \Ruangan::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $ruangan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $ruangan = \Ruangan::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $ruangan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'ruangan'       => request()->ruangan,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'ruangan'       => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $ruangan = \Ruangan::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $ruangan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $ruangan = \Ruangan::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $ruangan, 
            ],
            'meta'      => '',
        ]);        
    }
}
