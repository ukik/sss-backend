<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RppK13_MateriPembelajaran extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'rpp_k13_materi_pembelajaran';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'rpp_k13_mapel_id',
        'rpp_id',
        'guru_id',
        'user_id',
        'tema_id',
        'subtema_id',
        'deskripsi',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
