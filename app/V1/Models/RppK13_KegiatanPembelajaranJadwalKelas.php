<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RppK13_KegiatanPembelajaranJadwalKelas extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'rpp_k13_kegiatan_pembelajaran_jadwal_kelas';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'rpp_id',
        'guru_id',
        'user_id',
        'tema_id',
        'subtema_id',
        'tanggal',
        'kelas_mulai',
        'toleransi_terlambat',
        'kelas_tutup',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
