<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruKelasController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "GR-KLS-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $guru_kelas = \GuruKelas::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_kelas, 
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
            'uuid'          => request()->uuid,
            'user_id'       => request()->user_id,
            'guru_id'       => request()->guru_id,
            'kelas'         => request()->kelas,
            'rombel'        => request()->rombel,
            'tahun_ajar'    => request()->tahun_ajar,
        ];

        $validator = \Validator::make($form, [
            'sekolah_id'    => 'bail|required',
            'uuid'          => 'bail|required',
            'user_id'       => 'bail|required',
            'guru_id'       => 'bail|required',
            'kelas'         => 'bail|required',
            'rombel'        => 'bail|required',
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

        $guru_kelas = \GuruKelas::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_kelas, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $guru_kelas = \GuruKelas::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_kelas, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $guru_kelas = \GuruKelas::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_kelas, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'sekolah_id'    => request()->sekolah_id,
            'uuid'          => request()->uuid,
            'user_id'       => request()->user_id,
            'guru_id'       => request()->guru_id,
            'kelas'         => request()->kelas,
            'rombel'        => request()->rombel,
            'tahun_ajar'    => request()->tahun_ajar,
        ];

        $validator = \Validator::make($form, [
            'sekolah_id'    => 'bail|required',
            'uuid'          => 'bail|required',
            'user_id'       => 'bail|required',
            'guru_id'       => 'bail|required',
            'kelas'         => 'bail|required',
            'rombel'        => 'bail|required',
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

        $guru_kelas = \GuruKelas::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_kelas, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $guru_kelas = \GuruKelas::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $guru_kelas, 
            ],
            'meta'      => '',
        ]);        
    }
}