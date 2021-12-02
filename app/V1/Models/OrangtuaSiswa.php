<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangtuaSiswa extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'orangtua_siswa';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'orangtua_id',
        'siswa_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
