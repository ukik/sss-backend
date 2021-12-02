<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-MP-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $mapel = \Mapel::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $mapel, 
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
            'satuan'        => request()->satuan,
            'label'         => request()->label, 
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'satuan'        => 'bail|required',
            'label'         => 'bail|required|in:paud,tk,sd,smp,sma,smk,stm,mi,mts,mta',
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

        $mapel = \Mapel::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $mapel, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $mapel = \Mapel::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $mapel, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $mapel = \Mapel::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $mapel, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'satuan'        => request()->satuan,
            'label'         => request()->label, 
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'satuan'        => 'bail|required',
            'label'         => 'bail|required|in:paud,tk,sd,smp,sma,smk,stm,mi,mts,mta',
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

        $mapel = \Mapel::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $mapel, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $mapel = \Mapel::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $mapel, 
            ],
            'meta'      => '',
        ]);        
    }
}
