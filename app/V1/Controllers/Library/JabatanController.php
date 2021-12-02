<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-JBTN-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $table_jabatan = \Jabatan::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $table_jabatan, 
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
            'label'         => request()->label,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'label'         => 'bail|required',
            'deskripsi'     => 'bail|required|in:kepsek,bendahara,wakepsek_kurikulum,wakepsek_kesiswaan,wakepsek_humas,wakepsek_sapra,operator,tata_usaha',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $table_jabatan = \Jabatan::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $table_jabatan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $table_jabatan = \Jabatan::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $table_jabatan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $table_jabatan = \Jabatan::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $table_jabatan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'label'         => request()->label,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'label'         => 'bail|required',
            'deskripsi'     => 'bail|required|in:kepsek,bendahara,wakepsek_kurikulum,wakepsek_kesiswaan,wakepsek_humas,wakepsek_sapra,operator,tata_usaha',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $table_jabatan = \Jabatan::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $table_jabatan, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $table_jabatan = \Jabatan::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $table_jabatan, 
            ],
            'meta'      => '',
        ]);        
    }
}

