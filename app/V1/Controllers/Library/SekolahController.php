<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-SK-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {

        if(request()->keyword) {
            $sekolah = \Sekolah::search([
                'nama_sekolah', 'nis'
            ], request()->keyword)->paginate(25);
        } else {
            $sekolah = \Sekolah::paginate(25);
        }

        return response()->json([
            'payload'   => [ 
                'data_0' => $sekolah, 
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
            'nama_sekolah'      => request()->nama_sekolah,
            'nis'               => request()->nis,
            'alamat_sekolah'    => request()->alamat_sekolah,
            'kode_pos'          => request()->kode_pos,
            'telepon'           => request()->telepon,
            'keluharan'         => request()->keluharan,
            'kecamatan'         => request()->kecamatan,
            'kabupaten'         => request()->kabupaten,
            'provinsi'          => request()->provinsi,
            'website'           => request()->website,
            'email'             => request()->email,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'nama_sekolah'      => 'bail|required',
            'nis'               => 'bail|required',
            'alamat_sekolah'    => 'bail|required',
            'kode_pos'          => 'bail|required',
            'telepon'           => 'bail|required',
            'keluharan'         => 'bail|required',
            'kecamatan'         => 'bail|required',
            'kabupaten'         => 'bail|required',
            'provinsi'          => 'bail|required',
            'website'           => 'bail|required',
            'email'             => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $sekolah = \Sekolah::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $sekolah, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $sekolah = \Sekolah::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $sekolah, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $sekolah = \Sekolah::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $sekolah, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'              => $this->uuid,
            'nama_sekolah'      => request()->nama_sekolah,
            'nis'               => request()->nis,
            'alamat_sekolah'    => request()->alamat_sekolah,
            'kode_pos'          => request()->kode_pos,
            'telepon'           => request()->telepon,
            'keluharan'         => request()->keluharan,
            'kecamatan'         => request()->kecamatan,
            'kabupaten'         => request()->kabupaten,
            'provinsi'          => request()->provinsi,
            'website'           => request()->website,
            'email'             => request()->email,
        ];

        $validator = \Validator::make($form, [
            'uuid'              => 'bail|required',
            'nama_sekolah'      => 'bail|required',
            'nis'               => 'bail|required',
            'alamat_sekolah'    => 'bail|required',
            'kode_pos'          => 'bail|required',
            'telepon'           => 'bail|required',
            'keluharan'         => 'bail|required',
            'kecamatan'         => 'bail|required',
            'kabupaten'         => 'bail|required',
            'provinsi'          => 'bail|required',
            'website'           => 'bail|required',
            'email'             => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $sekolah = \Sekolah::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $sekolah, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $sekolah = \Sekolah::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $sekolah, 
            ],
            'meta'      => '',
        ]);        
    }
}
