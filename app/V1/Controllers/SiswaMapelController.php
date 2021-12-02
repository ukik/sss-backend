<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaMapelController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "SW-MPL-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $siswa_mapel = \SiswaMapel::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa_mapel, 
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
            'guru_mapel_id' => request()->guru_mapel_id,
            'siswa_id'      => request()->siswa_id,
            'tahun_ajar'    => request()->tahun_ajar,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'sekolah_id'        => 'bail|required',
            'guru_mapel_id'     => 'bail|required',
            'siswa_id'          => 'bail|required',
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

        $siswa_mapel = \SiswaMapel::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa_mapel, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $siswa_mapel = \SiswaMapel::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa_mapel, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $siswa_mapel = \SiswaMapel::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa_mapel, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'sekolah_id'    => request()->sekolah_id,
            'guru_mapel_id' => request()->guru_mapel_id,
            'siswa_id'      => request()->siswa_id,
            'tahun_ajar'    => request()->tahun_ajar,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'sekolah_id'        => 'bail|required',
            'guru_mapel_id'     => 'bail|required',
            'siswa_id'          => 'bail|required',
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

        $siswa_mapel = \SiswaMapel::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa_mapel, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $siswa_mapel = \SiswaMapel::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $siswa_mapel, 
            ],
            'meta'      => '',
        ]);        
    }
}
