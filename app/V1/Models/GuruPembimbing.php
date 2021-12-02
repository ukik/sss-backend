<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPembimbing extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'guru_pembimbing';
    }       

    protected $fillable = [
        'sekolah_id',
        'user_id',
        'uuid',
        'eskul_id',
        'guru_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}

