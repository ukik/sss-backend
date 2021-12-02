<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SumberBelajarController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-SB-BJR-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $sumber_belajar = \SumberBelajar::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $sumber_belajar, 
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
            'uuid'                      => $this->uuid,
            'mapel_id'                  => request()->mapel_id,
            'meta_sumber_belajar_id'    => request()->meta_sumber_belajar_id,
            'deskripsi'                 => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'                      => 'bail|required',
            'mapel_id'                  => 'bail|required',
            'meta_sumber_belajar_id'    => 'bail|required',
            'deskripsi'                 => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $sumber_belajar = \SumberBelajar::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $sumber_belajar, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $sumber_belajar = \SumberBelajar::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $sumber_belajar, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $sumber_belajar = \SumberBelajar::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $sumber_belajar, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'                      => $this->uuid,
            'mapel_id'                  => request()->mapel_id,
            'meta_sumber_belajar_id'    => request()->meta_sumber_belajar_id,
            'deskripsi'                 => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'                      => 'bail|required',
            'mapel_id'                  => 'bail|required',
            'meta_sumber_belajar_id'    => 'bail|required',
            'deskripsi'                 => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $sumber_belajar = \SumberBelajar::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $sumber_belajar, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $sumber_belajar = \SumberBelajar::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $sumber_belajar, 
            ],
            'meta'      => '',
        ]);        
    }
}
