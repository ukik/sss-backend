<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "SW-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $siswa = \Siswa::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa, 
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
            'nis'           => request()->nis,
            'tempat_lahir'  => request()->tempat_lahir,
            'tanggal_lahir' => request()->tanggal_lahir,
            'jenis_kelamin' => request()->jenis_kelamin,
            'agama'         => request()->agama,
            'status_keluarga'   => request()->status_keluarga,
            'anak_ke'           => request()->anak_ke,
            'alamat'            => request()->alamat,
            'telepon_rumah'     => request()->telepon_rumah,
            'sekolah_asal'      => request()->sekolah_asal,
            'diterima_kelas'    => request()->diterima_kelas,
            'diterima_tanggal'  => request()->diterima_tanggal,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'sekolah_id'        => 'bail|required',
            'user_id'           => 'bail|required',
            'nama_lengkap'      => 'bail|required',
            'nis'               => 'bail|required',
            'tempat_lahir'      => 'bail|required',
            'tanggal_lahir'     => 'bail|required',
            'jenis_kelamin'     => 'bail|required',
            'agama'             => 'bail|required',
            'status_keluarga'   => 'bail|required',
            'anak_ke'           => 'bail|required',    
            'alamat'            => 'bail|required',
            'telepon_rumah'     => 'bail|required',
            'sekolah_asal'      => 'bail|required',
            'diterima_kelas'    => 'bail|required',
            'diterima_tanggal'  => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $siswa = \Siswa::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $siswa = \Siswa::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $siswa = \Siswa::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa, 
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
            'nis'           => request()->nis,
            'tempat_lahir'  => request()->tempat_lahir,
            'tanggal_lahir' => request()->tanggal_lahir,
            'jenis_kelamin' => request()->jenis_kelamin,
            'agama'         => request()->agama,
            'status_keluarga'   => request()->status_keluarga,
            'anak_ke'           => request()->anak_ke,
            'alamat'            => request()->alamat,
            'telepon_rumah'     => request()->telepon_rumah,
            'sekolah_asal'      => request()->sekolah_asal,
            'diterima_kelas'    => request()->diterima_kelas,
            'diterima_tanggal'  => request()->diterima_tanggal,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'sekolah_id'        => 'bail|required',
            'user_id'           => 'bail|required',
            'nama_lengkap'      => 'bail|required',
            'nis'               => 'bail|required',
            'tempat_lahir'      => 'bail|required',
            'tanggal_lahir'     => 'bail|required',
            'jenis_kelamin'     => 'bail|required',
            'agama'             => 'bail|required',
            'status_keluarga'   => 'bail|required',
            'anak_ke'           => 'bail|required',    
            'alamat'            => 'bail|required',
            'telepon_rumah'     => 'bail|required',
            'sekolah_asal'      => 'bail|required',
            'diterima_kelas'    => 'bail|required',
            'diterima_tanggal'  => 'bail|required',
        ], $this->messages);


        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $siswa = \Siswa::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $siswa = \Siswa::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa, 
            ],
            'meta'      => '',
        ]);        
    }
}