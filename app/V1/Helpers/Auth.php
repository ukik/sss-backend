<?php
use Tymon\JWTAuth\Exceptions\JWTException;

// SENTINEL Helper
// $role = Sentinel::findRoleById(1);
// $role = Sentinel::findRoleByName('Admin');
// $role = Sentinel::findRoleBySlug('admin');

// Auth non JWT
if (!function_exists('as_superadmin')) {
    function as_superadmin()
    {
        // return Sentinel::findRoleById(1) ? true : false;
        return Sentinel::inRole('superadmin');
    }
}

if (!function_exists('as_admin')) {
    function as_admin()
    {
        // return Sentinel::findRoleById(2) ? true : false;
        return Sentinel::inRole('admin');
    }
}

if (!function_exists('as_analis')) {
    function as_analis()
    {
        // return Sentinel::findRoleById(8) ? true : false;
        return Sentinel::inRole('analis');
    }
}

if (!function_exists('as_user')) {
    function as_user()
    {
        // return Sentinel::findRoleById(4) ? true : false;
        return Sentinel::inRole('user');
    }
}

if (!function_exists('as_subscriber')) {
    function as_subscriber()
    {
        // return Sentinel::findRoleById(5) ? true : false;
        return Sentinel::inRole('subscriber');
    }
}

if (!function_exists('as_fasilitator')) {
    function as_fasilitator()
    {
        // return Sentinel::findRoleById(9) ? true : false;
        return Sentinel::inRole('fasilitator');
    }
}

if (!function_exists('as_finance')) {
    function as_finance()
    {
        // return Sentinel::findRoleById(10) ? true : false;
        return Sentinel::inRole('finance');
    }
}

if (!function_exists('as_mitra')) {
    function as_mitra()
    {
        // return Sentinel::findRoleById(7) ? true : false;
        return Sentinel::inRole('mitra');
    }
}

if (!function_exists('as_investor')) {
    function as_investor()
    {
        // return Sentinel::findRoleById(11) ? true : false;
        return Sentinel::inRole('investor');
    }
}

if (!function_exists('as_editor')) {
    function as_editor()
    {   
        // return Sentinel::findRoleById(1) ? true : false;
        return Sentinel::inRole('investor');
    }
}



if (!function_exists('Role_Slug')) {
    function Role_Slug()
    {
        // $admin = Sentinel::inRole('analis');
        return \Sentinel::getUser()->roles[0]->slug;
    }
}

if (!function_exists('Role_Id')) {
    function Role_Id()
    {
        return \Sentinel::getUser()->roles[0]->id;
    }
}

// Auth by JWT
if (!function_exists('Auth_Role')) {
    function Auth_Role()
    {
        if (\Auth::check()) {
            return \Auth::user()->withRoles()->get()[0];
            // return \Auth::user()->role;
        }

        return null;
    }
}

if (!function_exists('Auth_Check')) {
    function Auth_Check()
    {
        return \Auth::check();
    }
}

if (!function_exists('Auth_Id')) {
    function Auth_Id()
    {

        if (\Auth::check()) {
            return \Auth::user()->id;
        }

        return null;

        // // return 5;
        // if(Getter('id_user_helper')) return Getter('id_user_helper');
        // if(Logged()) {
        //     Setter('id_user_helper', \Auth::user()->id);
        //     return \Auth::user()->id;
        // } else {
        //     $token = request()->bearerToken();
        //     if($token) {
        //         try {
        //             return JWTAuth::toUser(JWTAuth::getToken($token))->id;
        //         } catch (JWTException $e) {
                    
        //         }
        //     }
        //     return;
        // }

    }
}

if (!function_exists('Auth_User')) {
    function Auth_User()
    {
        if (\Auth::check()) {
            return \Auth::user();
        }

        return null;
    }
}

if (!function_exists('reCaptcha')) {
    function reCaptcha($request)
    {
        $captcha = $request['recaptcha'];

        $secretKey = env('NOCAPTCHA_SECRET'); //"Your-Secret-Key";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);

        if(!$responseKeys->success) {
            return Resolver([
                'signiture' => Signature(),
                'informasi' => Informasi('login', 'User_ApiController', 'post', -1, 500, 'Formulir bermasalah'),
                'payload'   => 'recaptch gagal',
            ], 500); 
        };

        if(intval($responseKeys["success"]) !== 1) {    
            // validation false message set here...
        } else {
            // validation success message set here...
        }          
    }
}

