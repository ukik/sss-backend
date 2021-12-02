<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkalaKognitifController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-SK-KOG-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $skala_kognitif = \SkalaKognitif::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $skala_kognitif, 
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
            'interval_high_A'   => request()->interval_high_A,
            'interval_low_A'    => request()->interval_low_A,
            'interval_high_B'   => request()->interval_high_B,
            'interval_low_B'    => request()->interval_low_B,
            'interval_high_C'   => request()->interval_high_C,
            'interval_low_C'    => request()->interval_low_C,
            'interval_high_D'   => request()->interval_high_D,
            'interval_low_D'    => request()->interval_low_D,
            'kmm'               => request()->kmm,
            'keterangan'        => request()->keterangan,            
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'interval_high_A'   => 'bail|required',
            'interval_low_A'    => 'bail|required',
            'interval_high_B'   => 'bail|required',
            'interval_low_B'    => 'bail|required',
            'interval_high_C'   => 'bail|required',
            'interval_low_C'    => 'bail|required',
            'interval_high_D'   => 'bail|required',
            'interval_low_D'    => 'bail|required',
            'kmm'               => 'bail|required',
            'keterangan'        => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $skala_kognitif = \SkalaKognitif::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $skala_kognitif, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $skala_kognitif = \SkalaKognitif::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $skala_kognitif, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $skala_kognitif = \SkalaKognitif::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $skala_kognitif, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'              => $this->uuid,
            'interval_high_A'   => request()->interval_high_A,
            'interval_low_A'    => request()->interval_low_A,
            'interval_high_B'   => request()->interval_high_B,
            'interval_low_B'    => request()->interval_low_B,
            'interval_high_C'   => request()->interval_high_C,
            'interval_low_C'    => request()->interval_low_C,
            'interval_high_D'   => request()->interval_high_D,
            'interval_low_D'    => request()->interval_low_D,
            'kmm'               => request()->kmm,
            'keterangan'        => request()->keterangan,            
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'interval_high_A'   => 'bail|required',
            'interval_low_A'    => 'bail|required',
            'interval_high_B'   => 'bail|required',
            'interval_low_B'    => 'bail|required',
            'interval_high_C'   => 'bail|required',
            'interval_low_C'    => 'bail|required',
            'interval_high_D'   => 'bail|required',
            'interval_low_D'    => 'bail|required',
            'kmm'               => 'bail|required',
            'keterangan'        => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $skala_kognitif = \SkalaKognitif::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $skala_kognitif, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $skala_kognitif = \SkalaKognitif::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $skala_kognitif, 
            ],
            'meta'      => '',
        ]);        
    }
}
