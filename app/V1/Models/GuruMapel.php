<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruMapel extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'guru_mapel';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'guru_id',
        'mapel_id',
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
