<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RppK13_Mapel extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'rpp_k13_mapel';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'rpp_id',
        'guru_id',
        'user_id',
        'tema_id',
        'subtema_id',
        'mapel_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
