<?php

if (!function_exists('AddNotifications')) {
    function AddNotifications($payload, $label, $type, $id_pemilik_postingan = null, $id_postingan = null)
    {
    	// yang mengirimkan
    	// karena belum dipasang Auth
    	$user = \User::logged()->first(); // Auth::user();

        // MODEL 2
        // $payload->notify(new \Simpan_Notification([
        //     'body'  => $payload,
        //     'label' => 'suka'
        // ]));

        // MODEL 1
        // \Notification::send($payload, new \Simpan_Notification([
        //     'body'  => $payload,
        //     'label' => $label,
        // ]));		

        $data = json_encode([
            'body'  => $payload,
            'label' => $label,
        ]);

        $notif = \Notifications_Model::where('type', 'Simpan_Notification')
            ->where('notifiable_type', $type)
            ->where('notifiable_id', $payload->id)
            ->where('data', $data)
            ->where('id_user', user())
            ->where('id_pemilik_postingan', $id_pemilik_postingan)
            ->where('label', $label);

        
        switch ($label) {
            case 'konsultasi_dukungan':
            case 'konsultasi_minta':
            case 'suka':
            case 'pengikut':
            case 'penyebutan':
                // sengaja pakai tabel sendiri untuk total notifikasi
                $total = \User_Notifikasi_Total_Model::updateOrCreate([
                    'id_user'               => $id_pemilik_postingan,
                    'label'                 => $label,
                ],[
                    'id_user'               => $id_pemilik_postingan,
                    'label'                 => $label,
                ]);


                if(!$notif->first()) {

                    $notif->create([
                        'id'                => uuid(),
                        'id_user'           => user(),
                        'id_pemilik_postingan'  => $id_pemilik_postingan,
                        'type'              => 'Simpan_Notification',
                        'notifiable_type'   => $type,
                        'notifiable_id'     => $payload->id,
                        'data'              => $data,
                        'label'             => $label,            
                    ]);

                    // echo $notif->first();

                    $total->increment('total');

                } else {
                    $notif->delete();

                    $total->decrement('total');
                }

                # code...
                break;
            
            // komentar,
            // konsultasi_jawaban,
            // artikel_resmi,
            default:
                $total = \User_Notifikasi_Total_Model::create([
                    'id_user'               => $id_pemilik_postingan,
                    'label'                 => $label,
                ]);        

                $notif->create([
                    'id'                => uuid(),
                    'id_user'           => user(),
                    'id_pemilik_postingan'  => $id_pemilik_postingan,
                    'type'              => 'Simpan_Notification',
                    'notifiable_type'   => $type,
                    'notifiable_id'     => $payload->id,
                    'data'              => $data,
                    'label'             => $label,            
                ]);

                # code...
                break;
        }




    }
}


if (!function_exists('DeleteNotifications')) {
    function DeleteNotifications($payload, $label, $type = null, $id_pemilik_postingan = null, $id_postingan = null)
    {

        $data = json_encode([
            'body'  => $payload,
            'label' => $label,
        ]);

        $notif = \Notifications_Model::where('type', 'Simpan_Notification')
            ->where('notifiable_type', $type)
            ->where('id_user', user())
            ->where('id_pemilik_postingan', $id_pemilik_postingan)
            ->where('label', $label)
            ->delete();

        // sengaja pakai tabel sendiri untuk total notifikasi
        $total = \User_Notifikasi_Total_Model::updateOrCreate([
            'id_user'               => $id_pemilik_postingan,
            'label'                 => $label,
        ],[
            'id_user'               => $id_pemilik_postingan,
            'label'                 => $label,
        ])->decrement('total');

    }
}


if (!function_exists('ReadNotifications')) {
    function ReadNotifications($label = null, $id_postingan = null)
    {

        $data = \Notifications_Model::where("id", $id_postingan);

        $update = $data->update([ "read_at" => Sekarang() ]);

        if($data) {
            \User_Notifikasi_Total_Model::where('id_user', user())->whereLabel($label)->decrement('total', 1);
        }

        return $data->first();
    }
}
