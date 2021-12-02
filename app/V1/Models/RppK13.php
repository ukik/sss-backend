<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RppK13 extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'rpp_k13';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'guru_id',
        'tema_id',
        'subtema_id',
        'mapel',
        'semester',
        'tahun_ajar',
        'kelas',
        'rombel',
        'jumlah_pertemuan',
        'durasi_mengajar',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    

    public function guru()
    {
        return $this->belongsTo(\Guru::class);
    }
}
