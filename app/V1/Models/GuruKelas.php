<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruKelas extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'guru_kelas';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'guru_id',
        'kelas',
        'rombel',
        'tahun_ajar',
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
