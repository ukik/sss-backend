<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruSubtema extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'guru_subtema';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'mapel_id',
        'guru_id',
        'tema_id',
        'user_id',
        'deskripsi',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}

