<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruSubtemaController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "GR-SBT-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $guru_subtema = \GuruSubtema::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_subtema, 
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
            'mapel_id'      => request()->mapel_id,
            'guru_id'       => request()->guru_id,
            'tema_id'       => request()->tema_id,
            'user_id'       => request()->user_id,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'mapel_id'      => 'bail|required',
            'guru_id'       => 'bail|required',
            'tema_id'       => 'bail|required',
            'user_id'       => 'bail|required',
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

        $guru_subtema = \GuruSubtema::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_subtema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $guru_subtema = \GuruSubtema::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_subtema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $guru_subtema = \GuruSubtema::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_subtema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'sekolah_id'    => request()->sekolah_id,
            'mapel_id'      => request()->mapel_id,
            'guru_id'       => request()->guru_id,
            'tema_id'       => request()->tema_id,
            'user_id'       => request()->user_id,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'mapel_id'      => 'bail|required',
            'guru_id'       => 'bail|required',
            'tema_id'       => 'bail|required',
            'user_id'       => 'bail|required',
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

        $guru_subtema = \GuruSubtema::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_subtema, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $guru_subtema = \GuruSubtema::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_subtema, 
            ],
            'meta'      => '',
        ]);        
    }
}