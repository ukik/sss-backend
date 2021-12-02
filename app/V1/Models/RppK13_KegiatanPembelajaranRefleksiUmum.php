<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RppK13_KegiatanPembelajaranRefleksiUmum extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'rpp_k13_kegiatan_pembelajaran_refleksi_umum';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
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
