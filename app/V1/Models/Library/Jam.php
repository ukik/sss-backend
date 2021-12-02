<?php

// namespace App\Models\Library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = '__jam';
    }       

    protected $fillable = [
        'uuid',
        'waktu_mulai',
        'jam_ke',
        'waktu_selesai',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
