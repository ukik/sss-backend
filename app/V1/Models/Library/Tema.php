<?php

// namespace App\Models\Library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = '__tema';
    }       

    protected $fillable = [
        'uuid',
        'mapel_id',
        'deskripsi',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
