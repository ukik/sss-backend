<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $uuid;
    private $messages;

    public function __construct()
    {

        $this->uuid = "".uuid();
        $this->messages = array(
            // 'nama.unique' => 'Nama & telepon yang sama sudah ada !!',
            // 'telepon.unique' => 'Nama & telepon yang sama sudah ada !!',
        );        

    }

    public function index()
    {
        $user = \User::all();

        return response()->json([
            'payload'   => [ 
                'data_0' => $user, 
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
            'uuid'      => $this->uuid,
            'name'      => request()->name,
            'email'     => request()->email,
            'password'  => request()->password,
        ];

        $validator = \Validator::make($form, [
            'uuid'      => 'bail|required',
            'name'      => 'bail|required',
            'email'     => 'bail|required',
            'password'  => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $user = \User::insert($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $user, 
            ],
            'meta'      => '',
        ]);        
    }

    public function show($id)
    {
        $user = \User::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $user, 
            ],
            'meta'      => '',
        ]);        
    }

    public function edit($id)
    {
        $user = \User::where('id', $id)->first();

        return response()->json([
            'payload'   => [ 
                'data_0' => $user, 
            ],
            'meta'      => '',
        ]);        
    }

    public function update(Request $request, $id)
    {
        $form = [
            'uuid'      => $this->uuid,
            'name'      => request()->name,
            'email'     => request()->email,
            'password'  => request()->password,
        ];

        $validator = \Validator::make($form, [
            'uuid'      => 'bail|required',
            'name'      => 'bail|required',
            'email'     => 'bail|required',
            'password'  => 'bail|required',
        ], $this->messages);

        if ($validator->fails()) {
            return response()->json([
                'payload'   => $validator->errors(),
                'meta'      => [
                    'status'    => 'error'
                ],
            ]);        
        }

        $user = \User::where('id', $id)->update($form);

        return response()->json([
            'payload'   => [ 
                'data_0' => $user, 
            ],
            'meta'      => '',
        ]);        
    }

    public function destroy($id)
    {
        $user = \User::where('id', $id)->delete();

        return response()->json([
            'payload'   => [ 
                'data_0' => $user, 
            ],
            'meta'      => '',
        ]);        
    }
}