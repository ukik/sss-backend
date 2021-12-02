<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoinAfektifPsikomotorController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "LB-AF-PS-".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $poin_afektif_psikomotor = \PoinAfektifPsikomotor::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $poin_afektif_psikomotor, 
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
            'tipe'          => request()->tipe,
            'label'         => request()->label,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'tipe'          => 'bail|required|in:k1,k2,k3',
            'label'          => 'bail|required|in:beriman,akhlak,disiplin,jujur,peduli,percaya_diri,santun,tanggung_jawab,keterampilan',
            'deskripsi'     => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $poin_afektif_psikomotor = \PoinAfektifPsikomotor::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $poin_afektif_psikomotor, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $poin_afektif_psikomotor = \PoinAfektifPsikomotor::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $poin_afektif_psikomotor, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $poin_afektif_psikomotor = \PoinAfektifPsikomotor::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $poin_afektif_psikomotor, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'          => $this->uuid,
            'tipe'          => request()->tipe,
            'label'         => request()->label,
            'deskripsi'     => request()->deskripsi,
        ];

        $validator = \Validator::make($form, [
            'uuid'          => 'bail|required',
            'tipe'          => 'bail|required|in:k1,k2,k3',
            'label'          => 'bail|required|in:beriman,akhlak,disiplin,jujur,peduli,percaya_diri,santun,tanggung_jawab,keterampilan',
            'deskripsi'     => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $poin_afektif_psikomotor = \PoinAfektifPsikomotor::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $poin_afektif_psikomotor, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $poin_afektif_psikomotor = \PoinAfektifPsikomotor::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $poin_afektif_psikomotor, 
            ],
            'meta'      => '',
        ]);        
    }
}
