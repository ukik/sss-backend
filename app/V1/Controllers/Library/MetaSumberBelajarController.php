<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MetaSumberBelajarController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-MT-SBJR-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $meta_sumber_belajar = \MetaSumberBelajar::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $meta_sumber_belajar, 
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
            'icon'          => request()->icon,
            'color'         => request()->color,
            'label'         => request()->label,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'icon'          => 'bail|required',
            'color'         => 'bail|required',
            'label'         => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $meta_sumber_belajar = \MetaSumberBelajar::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $meta_sumber_belajar, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $meta_sumber_belajar = \MetaSumberBelajar::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $meta_sumber_belajar, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $meta_sumber_belajar = \MetaSumberBelajar::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $meta_sumber_belajar, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'icon'          => request()->icon,
            'color'         => request()->color,
            'label'         => request()->label,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'icon'          => 'bail|required',
            'color'         => 'bail|required',
            'label'         => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $meta_sumber_belajar = \MetaSumberBelajar::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $meta_sumber_belajar, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $meta_sumber_belajar = \MetaSumberBelajar::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $meta_sumber_belajar, 
            ],
            'meta'      => '',
        ]);        
    }
}