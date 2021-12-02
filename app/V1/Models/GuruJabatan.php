<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruJabatan extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'guru_jabatan';
    }   

    protected $fillable = [
        'sekolah_id',
        'user_id',
        'uuid',
        'guru_id',
        'jadwal_id',
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
