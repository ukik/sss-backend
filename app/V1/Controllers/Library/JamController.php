<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JamController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-JAM-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        
    }

    public function index()
    {
        $jam = \Jam::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $jam, 
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
            'waktu_mulai'   => request()->waktu_mulai,
            'jam_ke'        => request()->jam_ke,
            'waktu_selesai' => request()->waktu_selesai,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'waktu_mulai'   => 'bail|required',
            'jam_ke'        => 'bail|required',
            'waktu_selesai' => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $jam = \Jam::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $jam, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $jam = \Jam::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $jam, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $jam = \Jam::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $jam, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'waktu_mulai'   => request()->waktu_mulai,
            'jam_ke'        => request()->jam_ke,
            'waktu_selesai' => request()->waktu_selesai,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'waktu_mulai'   => 'bail|required',
            'jam_ke'        => 'bail|required',
            'waktu_selesai' => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $jam = \Jam::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $jam, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $jam = \Jam::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $jam, 
            ],
            'meta'      => '',
        ]);        
    }
}
