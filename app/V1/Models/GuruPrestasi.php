<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPrestasi extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'guru_prestasi';
    }   

    protected $fillable = [
        'sekolah_id',
        'user_id',
        'uuid',
        'guru_id',
        'deskripsi',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
