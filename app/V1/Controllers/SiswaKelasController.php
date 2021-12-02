<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaKelasController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "SW-KLS-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $siswa_kelas = \SiswaKelas::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa_kelas, 
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
            'siswa_id'      => request()->siswa_id,
            'kelas'         => request()->kelas,
            'rombel'        => request()->rombel,
            'tahun_ajar'    => request()->tahun_ajar,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'sekolah_id'        => 'bail|required',
            'user_id'           => 'bail|required',
            'siswa_id'          => 'bail|required',
            'kelas'             => 'bail|required',
            'rombel'            => 'bail|required',
            'tahun_ajar'        => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $siswa_kelas = \SiswaKelas::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa_kelas, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $siswa_kelas = \SiswaKelas::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa_kelas, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $siswa_kelas = \SiswaKelas::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa_kelas, 
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
            'siswa_id'      => request()->siswa_id,
            'kelas'         => request()->kelas,
            'rombel'        => request()->rombel,
            'tahun_ajar'    => request()->tahun_ajar,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'sekolah_id'        => 'bail|required',
            'user_id'           => 'bail|required',
            'siswa_id'          => 'bail|required',
            'kelas'             => 'bail|required',
            'rombel'            => 'bail|required',
            'tahun_ajar'        => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $siswa_kelas = \SiswaKelas::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa_kelas, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $siswa_kelas = \SiswaKelas::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa_kelas, 
            ],
            'meta'      => '',
        ]);        
    }
}