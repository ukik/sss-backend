<?php

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /*
    !!!!ini digunakan agar tidak terjadi error seperti ini

    Spatie\Permission\Exceptions\RoleDoesNotExist
    There is no role named `....`.

    dikarenakan table roles pada kolom guard_name tidak terdaftar di variable $guard_name di class User ini
    jadi perlu ada solusi seperti di bawah ini:
    */

    // OPSI 1
    // protected $guard_name = 'api'; 

    // OPSI 2
    // my custom
    public function guardName()
    {
        // dd(\Route::currentRouteName());
        // dd(request());
        if(request()->method() == 'PATCH') { // karena pakain resource, update = PATCH
            switch (\Route::currentRouteName()) {
                case 'users.update':
                    $incoming_roles = (request()['roles'][0]);
                    $my_guard = Role::whereName($incoming_roles)->groupBy('guard_name')->value('guard_name');
                    return $my_guard;
                    break;
                case 'roles.update':
                    $incoming_roles = (request()['nmae']);
                    $my_guard = Role::whereName($incoming_roles)->groupBy('guard_name')->value('guard_name');
                    return $my_guard;
                    break;
            }
        }
        // return 'web';
    }

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        // $this->table = 'view_data_petugas';
    }


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
