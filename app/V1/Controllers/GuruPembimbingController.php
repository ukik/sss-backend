<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruPembimbingController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "GR-PB-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $guru_pembimbing = \GuruPembimbing::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_pembimbing, 
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
            'user_id'       => request()->user_id,
            'eskul_id'      => request()->eskul_id,
            'guru_id'       => request()->guru_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'eskul_id'      => 'bail|required',
            'guru_id'       => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $guru_pembimbing = \GuruPembimbing::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_pembimbing, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $guru_pembimbing = \GuruPembimbing::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_pembimbing, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $guru_pembimbing = \GuruPembimbing::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_pembimbing, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'sekolah_id'    => request()->sekolah_id,
            'user_id'       => request()->user_id,
            'eskul_id'      => request()->eskul_id,
            'guru_id'       => request()->guru_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'eskul_id'      => 'bail|required',
            'guru_id'       => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $guru_pembimbing = \GuruPembimbing::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_pembimbing, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $guru_pembimbing = \GuruPembimbing::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_pembimbing, 
            ],
            'meta'      => '',
        ]);        
    }
}