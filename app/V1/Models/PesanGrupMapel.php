<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanGrupMapel extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'pesan_grup_mapel';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'mapel_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    

}
