<?php

use Modules\Setting\Entities\Setting;
use Modules\Project\Entities\ProjectParamPendanaan;

use App\VisitorTracker;

if (! function_exists('currency_singkat')) {
    function currency_singkat($n, $presisi=1) {
        if ($n < 900) {
            $format_angka = number_format($n, $presisi);
            $simbol = '';
        } else if ($n < 900000) {
            $format_angka = number_format($n / 1000, $presisi);
            $simbol = ' Ribu';
        } else if ($n < 900000000) {
            $format_angka = number_format($n / 1000000, $presisi);
            $simbol = ' Juta';
        } else if ($n < 900000000000) {
            $format_angka = number_format($n / 1000000000, $presisi);
            $simbol = ' Miliar';
        } else {
            $format_angka = number_format($n / 1000000000000, $presisi);
            $simbol = ' Triliun';
        }

        if ( $presisi > 0 ) {
            $pisah = '.' . str_repeat( '0', $presisi );
            $format_angka = str_replace( $pisah, '', $format_angka );
        }
        
        return 'Rp. '.$format_angka . $simbol;
    }
}

//penggunaan fungsi singkat angka
// echo singkat_angka(8800);


if (! function_exists('goto_route')) {
    function goto_route($name, $parameters = [], $absolute = true)
    {
        // dd(request()->token);
        // try {
            $parameters['token'] = request()->token;
            return app('url')->route($name, $parameters, $absolute);
        // } catch (Exception $e) {
            
        // }
    }
};


if (!function_exists('Pendanaan_Status')) {
    function Pendanaan_Status() {
        $pendanaan_limit_atas = pendanaan_limit_atas();
        $pendanaan_limit_bawah = pendanaan_limit_bawah();
        $persentase = getter('persentase');

        if($persentase >= $pendanaan_limit_atas) {
          return '(Pendanaan Tinggi)';
        } else if($persentase < $pendanaan_limit_atas && $persentase >= $pendanaan_limit_bawah) {
          return '(Pendanaan Sedang)';
        } else {
          return '(Pendanaan Rendah)';
        }
    }
};



if (!function_exists('Pendanaan_Limit_Atas')) {
    function Pendanaan_Limit_Atas() {
        return ProjectParamPendanaan::where('label', 'pendanaan_limit_atas')->value('value');
    }
};

if (!function_exists('Pendanaan_Limit_Bawah')) {
    function Pendanaan_Limit_Bawah() {
        return ProjectParamPendanaan::where('label', 'pendanaan_limit_bawah')->value('value');
    }
};

if (!function_exists('TrackerProspektus')) {
    function TrackerProspektus() {

        $tracker = new VisitorTracker();
        $tracker->page_type = \App\Enums\VisitorPageType::ProjectProspektus;
        $tracker->url = \Request::url();
        $tracker->source_url = \url()->previous();
        $tracker->ip = \Request()->ip();
        $tracker->agent_browser = UserAgentBrowser(\Request()->header('User-Agent'));
        $tracker->keterangan = Sentinel::getUser();
        $tracker->save();
    }
};


if (!function_exists('prospektus_check')) {
    function prospektus_check($item, $field) {
        if(!$item) {
            return 'btn-danger';
        }

        return $item[$field];
    }
};

if (!function_exists('user_profile_check')) {
    function user_profile_check($post) {
        if(!$post) {
            return 'btn-secondary';
        }
        return 'btn-success';
    }
};

if (!function_exists('user_profile_check_icon')) {
    function user_profile_check_icon($post) {
        if(!$post) {
            return '';
        }
        return 'm-r-10 fas fa-check';
    }
};

if (!function_exists('prospektus_check_2')) {
    function prospektus_check_2($item, $field) {

        if($field == 'rab') {
            $json = $item['rab']; 

            if(!$json) {
                return 'btn-danger';
            }

            $total = 0;
            $total1 = 0;

            foreach ($json as $key => $val) {
                $total += $val['value'];
                $total1 += $val['value1'];
            }

            $project = \DB::table('projects')->where('id', request()->id)->first();

            $jumlah_unit = $project->jumlah_unit;
            $nilai_unit = $project->nilai_unit;
            $project_total = $jumlah_unit * $nilai_unit;

            $rab_total = $total + $total1;

            if($rab_total == $project_total) {
                return 'btn-success';    
            }
            return 'btn-danger';
        }

        if(!$item) {
            return 'btn-danger';
        }

        if($item[$field]) {
            return 'btn-success';
        }

        return 'btn-danger';
    }
};


if (!function_exists('readonly')) {
    function readonly($is_diajukan, $value = false) {
        if(as_superadmin() || as_admin() || as_mitra()) {
        } else {
            return 'readonly';
        }

        if($is_diajukan) {
            return 'readonly';
        }
        return $value ? 'readonly' : '';        
    }
};


if (!function_exists('not_mitra')) {
    function not_mitra() {
        if(as_superadmin() || as_admin() || as_mitra()) {
            return true;
        }
        return false;
    }
};


if (!function_exists('settingHelper')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function settingHelper($title= "")
    {
        if($title == "about_us_description" || $title == "copyright_text" || $title == "address" || $title == "phone" || $title == "zip_code" || $title == "city" || $title == "state" || $title == "country" || $title == "website" || $title == "company_registration" || $title == "tax_number" || $title == "signature" || $title == "onesignal_action_message" || $title == "onesignal_accept_button" || $title == "onesignal_cancel_button" || $title == "seo_title" || $title == "seo_keywords" || $title == "seo_meta_description" || $title == "author_name" || $title == "og_title" || $title == "og_description" || $title == "version"){

            if(LaravelLocalization::setLocale() == ""){
                $default = Setting::where('title', 'default_language')->first();
                $lang = $default->value;
            }else{
                $lang = LaravelLocalization::setLocale();
            }
            
            $data = Setting::where('title', $title)->where('lang', $lang)->first();
            if(!blank($data)){
                return $data->value;
            }
        }
        if(isset(Config::get('site.settings')[$title])):

            $value = Config::get('site.settings')[$title];

            if(!empty($value)) :
                return $value;
            endif;
        endif;
    }
}
