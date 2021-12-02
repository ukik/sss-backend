<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruMapelController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "GR-MPL-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $guru_mapel = \GuruMapel::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_mapel, 
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
            'mapel_id'      => request()->mapel_id,
            'tahun_ajar'    => request()->tahun_ajar,            
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'guru_id'       => 'bail|required',
            'mapel_id'      => 'bail|required',
            'tahun_ajar'    => 'bail|required',            
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $guru_mapel = \GuruMapel::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_mapel, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $guru_mapel = \GuruMapel::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_mapel, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $guru_mapel = \GuruMapel::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_mapel, 
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
            'mapel_id'      => request()->mapel_id,
            'tahun_ajar'    => request()->tahun_ajar,            
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'guru_id'       => 'bail|required',
            'mapel_id'      => 'bail|required',
            'tahun_ajar'    => 'bail|required',            
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $guru_mapel = \GuruMapel::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_mapel, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $guru_mapel = \GuruMapel::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_mapel, 
            ],
            'meta'      => '',
        ]);        
    }
}