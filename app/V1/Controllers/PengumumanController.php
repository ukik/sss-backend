<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "PGMM-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $pengumuman = \Pengumuman::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pengumuman, 
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
            'kategori_id'   => request()->kategori_id,
            'judul'         => request()->judul,
            'deskripsi'     => request()->deskripsi,
            'publish'       => request()->publish,
            'waktu_mulai'   => request()->waktu_mulai,
            'waktu_selesai' => request()->waktu_selesai,
            'visibility'    => request()->visibility,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'kategori_id'   => 'bail|required',
            'judul'         => 'bail|required',
            'deskripsi'     => 'bail|required',
            'publish'       => 'bail|required',
            'waktu_mulai'   => 'bail|required',
            'waktu_selesai' => 'bail|required',
            'visibility'    => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $pengumuman = \Pengumuman::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $pengumuman, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $pengumuman = \Pengumuman::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pengumuman, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $pengumuman = \Pengumuman::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pengumuman, 
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
            'kategori_id'   => request()->kategori_id,
            'judul'         => request()->judul,
            'deskripsi'     => request()->deskripsi,
            'publish'       => request()->publish,
            'waktu_mulai'   => request()->waktu_mulai,
            'waktu_selesai' => request()->waktu_selesai,
            'visibility'    => request()->visibility,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'kategori_id'   => 'bail|required',
            'judul'         => 'bail|required',
            'deskripsi'     => 'bail|required',
            'publish'       => 'bail|required',
            'waktu_mulai'   => 'bail|required',
            'waktu_selesai' => 'bail|required',
            'visibility'    => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $pengumuman = \Pengumuman::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $pengumuman, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $pengumuman = \Pengumuman::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $pengumuman, 
            ],
            'meta'      => '',
        ]);        
    }
}
