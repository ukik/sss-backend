<?php

// namespace App\Models\Library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaKognitif extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = '__skala_kognitif';
    }       

    protected $fillable = [
        'uuid',
        'interval_high_A',
        'interval_low_A',
        'interval_high_B',
        'interval_low_B',
        'interval_high_C',
        'interval_low_C',
        'interval_high_D',
        'interval_low_D',
        'kmm',
        'keterangan',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
