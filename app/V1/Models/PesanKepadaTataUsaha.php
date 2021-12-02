<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanKepadaTataUsaha extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'pesan_kepada_tata_usaha';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'tata_usaha_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    

}
