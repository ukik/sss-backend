<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'eskul';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'tahun_ajar',
        'lokasi',
        'waktu_mulai',
        'waktu_selesai',
        'hari',
        'original_image',
        'og_image',
        'thumbnail',
        'big_image',
        'big_image_two',
        'medium_image',
        'medium_image_two',
        'medium_image_three',
        'small_image',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    
}
