<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaMapel extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'siswa_mapel';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'guru_mapel_id',
        'siswa_id',
        'tahun_ajar',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    

}
