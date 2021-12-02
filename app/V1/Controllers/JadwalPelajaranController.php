<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JadwalPelajaranController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "JDW-PLJ-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $jadwal_pelajaran = \JadwalPelajaran::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $jadwal_pelajaran, 
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
            'ruangan_id'    => request()->ruangan_id,
            'tahun_ajar'    => request()->tahun_ajar,
            'jam_ke'        => request()->jam_ke,
            'durasi_mengajar'   => request()->durasi_mengajar,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'ruangan_id'    => 'bail|required',
            'tahun_ajar'    => 'bail|required',
            'jam_ke'        => 'bail|required',
            'durasi_mengajar'   => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $jadwal_pelajaran = \JadwalPelajaran::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $jadwal_pelajaran, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $jadwal_pelajaran = \JadwalPelajaran::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $jadwal_pelajaran, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $jadwal_pelajaran = \JadwalPelajaran::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $jadwal_pelajaran, 
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
            'ruangan_id'    => request()->ruangan_id,
            'tahun_ajar'    => request()->tahun_ajar,
            'jam_ke'        => request()->jam_ke,
            'durasi_mengajar'   => request()->durasi_mengajar,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'ruangan_id'    => 'bail|required',
            'tahun_ajar'    => 'bail|required',
            'jam_ke'        => 'bail|required',
            'durasi_mengajar'   => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $jadwal_pelajaran = \JadwalPelajaran::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $jadwal_pelajaran, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $jadwal_pelajaran = \JadwalPelajaran::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $jadwal_pelajaran, 
            ],
            'meta'      => '',
        ]);        
    }
}