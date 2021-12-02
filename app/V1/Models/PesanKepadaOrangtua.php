<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanKepadaOrangtua extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'pesan_kepada_orangtua';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'orangtua_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    

}
