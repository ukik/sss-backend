<?php

use App\Http\Controllers\Controller;

use App\Models\GuruJabatan;
use Illuminate\Http\Request;

class GuruJabatanController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "GR-JBT-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $guru_jabatan = \GuruJabatan::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_jabatan, 
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
            'guru_id'       => request()->guru_id,
            'jadwal_id'     => request()->jadwal_id,

        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'guru_id'       => 'bail|required',
            'jadwal_id'     => 'bail|required',

        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $guru_jabatan = \GuruJabatan::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_jabatan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $guru_jabatan = \GuruJabatan::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_jabatan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $guru_jabatan = \GuruJabatan::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_jabatan, 
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
            'guru_id'       => request()->guru_id,
            'jadwal_id'     => request()->jadwal_id,

        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'guru_id'       => 'bail|required',
            'jadwal_id'     => 'bail|required',

        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $guru_jabatan = \GuruJabatan::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_jabatan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $guru_jabatan = \GuruJabatan::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_jabatan, 
            ],
            'meta'      => '',
        ]);        
    }
}
