<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaSumberBelajar extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = '__meta_sumber_belajar';
    }       

    protected $fillable = [
        'uuid',
        'icon',
        'color',
        'label',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
