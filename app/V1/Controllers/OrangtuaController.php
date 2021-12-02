<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrangtuaController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "OR-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $orangtua = \Orangtua::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $orangtua, 
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
            'sekolah_id'        => request()->sekolah_id,
            'user_id'           => request()->user_id,
            'nama_ayah'         => request()->nama_ayah,
            'nama_ibu'          => request()->nama_ibu,
            'agama_ayah'        => request()->agama_ayah,
            'agama_ibu'         => request()->agama_ibu,
            'telepon_ayah'      => request()->telepon_ayah,
            'telepon_ibu'       => request()->telepon_ibu,
            'pekerjaan_ayah'    => request()->pekerjaan_ayah,
            'pekerjaan_ibu'     => request()->pekerjaan_ibu,
            'alamat_orangtua'   => request()->alamat_orangtua,
            'nama_wali'         => request()->nama_wali,
            'agama_wali'        => request()->agama_wali,
            'alamat_wali'       => request()->alamat_wali,
            'telepon_wali'      => request()->telepon_wali,
            'pekerjaan_wali'    => request()->pekerjaan_wali,            
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'sekolah_id'        => 'bail|required',
            'user_id'           => 'bail|required',
            'nama_ayah'         => 'bail|required',
            'nama_ibu'          => 'bail|required',
            'agama_ayah'        => 'bail|required',
            'agama_ibu'         => 'bail|required',
            'telepon_ayah'      => 'bail|required',
            'telepon_ibu'       => 'bail|required',
            'pekerjaan_ayah'    => 'bail|required',
            'pekerjaan_ibu'     => 'bail|required',
            'alamat_orangtua'   => 'bail|required',
            'nama_wali'         => 'bail|required',
            'agama_wali'        => 'bail|required',
            'alamat_wali'       => 'bail|required',
            'telepon_wali'      => 'bail|required',
            'pekerjaan_wali'    => 'bail|required',            

        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $orangtua = \Orangtua::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $orangtua, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $orangtua = \Orangtua::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $orangtua, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $orangtua = \Orangtua::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $orangtua, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'              => $this->uuid,
            'sekolah_id'        => request()->sekolah_id,
            'user_id'           => request()->user_id,
            'nama_ayah'         => request()->nama_ayah,
            'nama_ibu'          => request()->nama_ibu,
            'agama_ayah'        => request()->agama_ayah,
            'agama_ibu'         => request()->agama_ibu,
            'telepon_ayah'      => request()->telepon_ayah,
            'telepon_ibu'       => request()->telepon_ibu,
            'pekerjaan_ayah'    => request()->pekerjaan_ayah,
            'pekerjaan_ibu'     => request()->pekerjaan_ibu,
            'alamat_orangtua'   => request()->alamat_orangtua,
            'nama_wali'         => request()->nama_wali,
            'agama_wali'        => request()->agama_wali,
            'alamat_wali'       => request()->alamat_wali,
            'telepon_wali'      => request()->telepon_wali,
            'pekerjaan_wali'    => request()->pekerjaan_wali,            
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'sekolah_id'        => 'bail|required',
            'user_id'           => 'bail|required',
            'nama_ayah'         => 'bail|required',
            'nama_ibu'          => 'bail|required',
            'agama_ayah'        => 'bail|required',
            'agama_ibu'         => 'bail|required',
            'telepon_ayah'      => 'bail|required',
            'telepon_ibu'       => 'bail|required',
            'pekerjaan_ayah'    => 'bail|required',
            'pekerjaan_ibu'     => 'bail|required',
            'alamat_orangtua'   => 'bail|required',
            'nama_wali'         => 'bail|required',
            'agama_wali'        => 'bail|required',
            'alamat_wali'       => 'bail|required',
            'telepon_wali'      => 'bail|required',
            'pekerjaan_wali'    => 'bail|required',            

        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $orangtua = \Orangtua::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $orangtua, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $orangtua = \Orangtua::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $orangtua, 
            ],
            'meta'      => '',
        ]);        
    }
}
