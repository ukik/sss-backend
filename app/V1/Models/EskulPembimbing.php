<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EskulPembimbing extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'eskul_pembimbing';
    }       

    protected $fillable = [
        'guru_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
