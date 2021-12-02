<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'jadwal_pelajaran';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'ruangan_id',
        'tahun_ajar',
        'jam_ke',
        'durasi_mengajar',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
