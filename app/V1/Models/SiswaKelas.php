<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaKelas extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'siswa_kelas';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'siswa_id',
        'kelas',
        'rombel',
        'tahun_ajar',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    

}
