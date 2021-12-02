<?php

use App\Http\Controllers\Controller;

use App\Models\Berita;
use Illuminate\Http\Request;

class OrangtuaSiswaController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "OR-SW-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $orangtua_siswa = \OrangtuaSiswa::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $orangtua_siswa, 
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
            'orangtua_id'   => request()->orangtua_id,
            'siswa_id'      => request()->siswa_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'orangtua_id'   => 'bail|required',
            'siswa_id'      => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $orangtua_siswa = \OrangtuaSiswa::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $orangtua_siswa, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $orangtua_siswa = \OrangtuaSiswa::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $orangtua_siswa, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $orangtua_siswa = \OrangtuaSiswa::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $orangtua_siswa, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'sekolah_id'    => request()->sekolah_id,
            'orangtua_id'   => request()->orangtua_id,
            'siswa_id'      => request()->siswa_id,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'orangtua_id'   => 'bail|required',
            'siswa_id'      => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $orangtua_siswa = \OrangtuaSiswa::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $orangtua_siswa, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $orangtua_siswa = \OrangtuaSiswa::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $orangtua_siswa, 
            ],
            'meta'      => '',
        ]);        
    }
}