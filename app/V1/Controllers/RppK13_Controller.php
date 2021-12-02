<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RppK13_Controller extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "RPP-K13-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $rpp_k13 = \RppK13::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13, 
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
            'guru_id'       => request()->guru_id,
            'tema_id'       => request()->tema_id,
            'subtema_id'    => request()->subtema_id,
            'mapel'         => request()->mapel,
            'semester'      => request()->semester,
            'tahun_ajar'    => request()->tahun_ajar,
            'kelas'         => request()->kelas,
            'rombel'        => request()->rombel,
            'jumlah_pertemuan'  => request()->jumlah_pertemuan,
            'durasi_mengajar'   => request()->durasi_mengajar,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'guru_id'       => 'bail|required',
            'tema_id'       => 'bail|required',
            'subtema_id'    => 'bail|required',
            'mapel'         => 'bail|required',
            'semester'      => 'bail|required',
            'tahun_ajar'    => 'bail|required',
            'kelas'         => 'bail|required',
            'rombel'        => 'bail|required',
            'jumlah_pertemuan'  => 'bail|required',
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

        $rpp_k13 = \RppK13::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $rpp_k13 = \RppK13::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $rpp_k13 = \RppK13::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13, 
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
            'guru_id'       => request()->guru_id,
            'tema_id'       => request()->tema_id,
            'subtema_id'    => request()->subtema_id,
            'mapel'         => request()->mapel,
            'semester'      => request()->semester,
            'tahun_ajar'    => request()->tahun_ajar,
            'kelas'         => request()->kelas,
            'rombel'        => request()->rombel,
            'jumlah_pertemuan'  => request()->jumlah_pertemuan,
            'durasi_mengajar'   => request()->durasi_mengajar,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'sekolah_id'    => 'bail|required',
            'user_id'       => 'bail|required',
            'guru_id'       => 'bail|required',
            'tema_id'       => 'bail|required',
            'subtema_id'    => 'bail|required',
            'mapel'         => 'bail|required',
            'semester'      => 'bail|required',
            'tahun_ajar'    => 'bail|required',
            'kelas'         => 'bail|required',
            'rombel'        => 'bail|required',
            'jumlah_pertemuan'  => 'bail|required',
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

        $rpp_k13 = \RppK13::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $rpp_k13 = \RppK13::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $rpp_k13, 
            ],
            'meta'      => '',
        ]);        
    }
}
