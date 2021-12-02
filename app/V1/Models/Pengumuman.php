<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'pengumuman';
    }   

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'kategori_id',
        'judul',
        'deskripsi',
        'publish',
        'waktu_mulai',
        'waktu_selesai',
        'visibility',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
