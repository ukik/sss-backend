<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesGaleri extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'images_galeri';
    }   

    protected $fillable = [
        'sekolah_id',
        'galeri_id',
        'uuid',
        'user_id',
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
