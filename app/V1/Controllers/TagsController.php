<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "TAG-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $tags = \Tags::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tags, 
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
            'tag'           => request()->tag,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'tag'           => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $tags = \Tags::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $tags, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $tags = \Tags::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tags, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $tags = \Tags::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tags, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'tag'           => request()->tag,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'tag'           => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $tags = \Tags::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $tags, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $tags = \Tags::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tags, 
            ],
            'meta'      => '',
        ]);        
    }
}