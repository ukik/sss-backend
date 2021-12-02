<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TataUsahaController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "TU-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $tata_usaha = \TataUsaha::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tata_usaha, 
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
            'nama_lengkap'  => request()->nama_lengkap,
            'nip'           => request()->nip,  
            'nuptk'         => request()->nuptk,
            'tempat_lahir'  => request()->tempat_lahir,
            'tanggal_lahir' => request()->tanggal_lahir,
            'jenis_kelamin' => request()->jenis_kelamin,
            'agama'         => request()->agama,
            'golongan'      => request()->golongan,
            'telepon'       => request()->telepon,
            'alamat'        => request()->alamat,
            'kelurahan'     => request()->kelurahan,
            'kecamatan'     => request()->kecamatan,
            'kabupaten'     => request()->kabupaten,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'sekolah_id'        => 'bail|required',
            'user_id'           => 'bail|required',  
            'nama_lengkap'      => 'bail|required',
            'nip'               => 'bail|required',
            'nuptk'             => 'bail|required',
            'tempat_lahir'      => 'bail|required',
            'tanggal_lahir'     => 'bail|required',
            'jenis_kelamin'     => 'bail|required',
            'agama'             => 'bail|required',
            'golongan'          => 'bail|required',
            'telepon'           => 'bail|required',
            'alamat'            => 'bail|required',
            'kelurahan'         => 'bail|required',
            'kecamatan'         => 'bail|required',
            'kabupaten'         => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $tata_usaha = \TataUsaha::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $tata_usaha, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $tata_usaha = \TataUsaha::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tata_usaha, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $tata_usaha = \TataUsaha::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tata_usaha, 
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
            'nama_lengkap'  => request()->nama_lengkap,
            'nip'           => request()->nip,  
            'nuptk'         => request()->nuptk,
            'tempat_lahir'  => request()->tempat_lahir,
            'tanggal_lahir' => request()->tanggal_lahir,
            'jenis_kelamin' => request()->jenis_kelamin,
            'agama'         => request()->agama,
            'golongan'      => request()->golongan,
            'telepon'       => request()->telepon,
            'alamat'        => request()->alamat,
            'kelurahan'     => request()->kelurahan,
            'kecamatan'     => request()->kecamatan,
            'kabupaten'     => request()->kabupaten,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'sekolah_id'        => 'bail|required',
            'user_id'           => 'bail|required',  
            'nama_lengkap'      => 'bail|required',
            'nip'               => 'bail|required',
            'nuptk'             => 'bail|required',
            'tempat_lahir'      => 'bail|required',
            'tanggal_lahir'     => 'bail|required',
            'jenis_kelamin'     => 'bail|required',
            'agama'             => 'bail|required',
            'golongan'          => 'bail|required',
            'telepon'           => 'bail|required',
            'alamat'            => 'bail|required',
            'kelurahan'         => 'bail|required',
            'kecamatan'         => 'bail|required',
            'kabupaten'         => 'bail|required',
        ], $this->messages);


        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $tata_usaha = \TataUsaha::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $tata_usaha, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $tata_usaha = \TataUsaha::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $tata_usaha, 
            ],
            'meta'      => '',
        ]);        
    }
}