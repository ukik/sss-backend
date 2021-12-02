<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "PSN-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $pesan = \Pesan::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan, 
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
            'judul'         => request()->judul,
            'deskripsi'     => request()->deskripsi,
            'terkirim'      => request()->terkirim,
            'label'         => request()->label,
            'is_kepsek'     => request()->is_kepsek,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'judul'         => 'bail|required',
            'deskripsi'     => 'bail|required',
            'terkirim'      => 'bail|required',
            'label'         => 'bail|required|in:guru,kelas,mapel,orangtua,siswa,stakeholder,tata_usaha',
            'is_kepsek'     => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $pesan = \Pesan::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $pesan = \Pesan::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $pesan = \Pesan::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan, 
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
            'judul'         => request()->judul,
            'deskripsi'     => request()->deskripsi,
            'terkirim'      => request()->terkirim,
            'label'         => request()->label,
            'is_kepsek'     => request()->is_kepsek,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'judul'         => 'bail|required',
            'deskripsi'     => 'bail|required',
            'terkirim'      => 'bail|required',
            'label'         => 'bail|required|in:guru,kelas,mapel,orangtua,siswa,stakeholder,tata_usaha',
            'is_kepsek'     => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $pesan = \Pesan::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $pesan = \Pesan::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pesan, 
            ],
            'meta'      => '',
        ]);        
    }
}
