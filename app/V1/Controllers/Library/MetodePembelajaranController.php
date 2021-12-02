<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MetodePembelajaranController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-MT-PBJR-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $metode_pembelajaran = \MetodePembelajaran::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $metode_pembelajaran, 
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
            'slug'          => request()->slug,
            'judul'         => request()->judul,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'slug'          => 'bail|required',
            'judul'         => 'bail|required',
            'deskripsi'         => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $metode_pembelajaran = \MetodePembelajaran::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $metode_pembelajaran, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $metode_pembelajaran = \MetodePembelajaran::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $metode_pembelajaran, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $metode_pembelajaran = \MetodePembelajaran::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $metode_pembelajaran, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'slug'          => request()->slug,
            'judul'         => request()->judul,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'slug'          => 'bail|required',
            'judul'         => 'bail|required',
            'deskripsi'         => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $metode_pembelajaran = \MetodePembelajaran::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $metode_pembelajaran, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $metode_pembelajaran = \MetodePembelajaran::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $metode_pembelajaran, 
            ],
            'meta'      => '',
        ]);        
    }
}