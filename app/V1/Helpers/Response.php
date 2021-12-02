<?php
// require_once "libs/Mobile_Detect.php";
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Modules\User\Entities\User;
use Jenssegers\Agent\Agent;


if (!function_exists('Resolver')) {
    function Resolver(array $parameters = [], $status = 200)
    {
        // $detect = new Mobile_Detect;
        // $chrome = $detect->is('Chrome');
        // $iOS = $detect->isDesktop();
        // $UC = $detect->isMobile();

        // dump($detect);
        // dump($chrome);
        // dump($iOS);
        // dump($UC);



        // dd($detect);

		// $notifications = [
		// 	//'user'			=> $user,
		// 	'notifications' => notifications()
		// ];

        return response()
            ->json(array_merge(
                $parameters,
                // $notifications
            ))
            // cukup header ini saja agar API yang di akses dari browser tanpa aplikasi auto download
            ->header('Content-Type', 'application/json')
            // ->header('Content-Disposition',' attachment; filename="file.json"')
            ->setStatusCode($status);
            
            // tidak diperlukan sepertinya
            // ->header('Content-Description',' File Transfer')
            // ->header('Content-Type',' application/octet-stream')
            // ->header('Expires',' 0')
            // ->header('Cache-Control',' must-revalidate')
            // ->header('Pragma',' public')                    

    }
}

if (!function_exists('Fallback')) {
    function Fallback(array $parameters = [], $status = 400)
    {
        return response()
            ->json(array_merge(
                $parameters
                // $notifications
            ))
            ->header('Content-Type', 'application/json')
            // ->header('Content-Type', 'application/x-www-form-urlencoded')
            ->setStatusCode($status);
    }
}

// Include and instantiate the class.
// require_once 'Mobile_Detect.php';

if (!function_exists('Signature')) {
    function Signature()
    {

        $check      = \Auth::user(); //auth('api')->user(); //Sentinel::check(); // \Auth::check();
        
        $csrf = getter('csrf');
        $token = getter('tera_token');

        if($check) {

            // untuk upgrade user dari subscriber ke mitra/investor
            // if(RouteName() == "site.author") {}
            // $is_pengaturan_lengkap = 0;
            if($check['first_name'] && $check['phone'] && $check['about_us']) {
                $is_pengaturan_lengkap = 1;
            } else {
                $is_pengaturan_lengkap = 0;
            }

            $activation   = $check->withActivation()->first();
            if($activation) {
                $completed = $activation['completed'];
            } else {
                $completed = 0;
            }

            $role    = $check->withRoles()->get();  // \Auth::user()->id

            return [
                'logged'        => \Auth::check(),
                'csrf'          => empty($csrf) ? request()->header('csrf') : $csrf,
                'role'          => $role[0],
                'activation'    => $completed,
                'token'         => empty($token) ? JWTToken() : $token,
                'user'          => $check,
                'is_pengaturan_lengkap' => $is_pengaturan_lengkap,

                // 'role_slug' => $role[0]->slug,
                // 'platform'  => $detect, //json_decode(request()->header('platform'), true),
                // 'lokasi'    => // jika ingin
            ]; 
        }

        return [
            'logged'    => false,
            'csrf'      => null,
            'role'      => null,
            // 'role_slug' => null,
            'token'     => null,
            // 'platform'  => $detect, //json_decode(request()->header('platform'), true),
            'user'      => null,
            'is_pengaturan_lengkap' => null,
        ]; 
    }
}

if (!function_exists('Informasi')) {
    function Informasi($function, $class, $method, $id, $code, $text = null)
    {
        // lebih akurat daripada Mobile_Detect
        $agent = new Agent();
        $is_mobile = $agent->isMobile();
        $is_tablet = $agent->isDesktop();
        $is_desktop = $agent->isTablet();

        if($is_mobile) {
            $screen = 'mobile';
        } else if ($is_tablet) {
            $screen = 'tablet';
        } else {
            $screen = 'desktop';
        }

        return [
            'label'     => Informasi_Label($code),
            'function'  => $function,
            'class'     => $class,
            'method'    => $method,
            'id'        => $id,
            'code'      => $code,
            'color'     => Informasi_Color($id),
            'text'      => $text,
            'screen'    => $screen,            
        ];
    }
}

if (!function_exists('Informasi_Label')) {
    function Informasi_Label($code)
    {
        switch ($code) {
            case 200:
                return "Proses berhasil";         
            case 401:
                return "Akses tidak sah";
            case 404:
                return "Halaman tidak ditemukan";
            case 403:
                return "Tidak diizinkan";
            case 500:
                return "Terjadi kesalahan";                
        }
    }
}

if (!function_exists('Informasi_Color')) {
    function Informasi_Color($id)
    {
        switch ($id) {
            case 1:
                return "positive";
            case 0:
                return "orange";
            case -1:
                return "negative";
        }
    }
}