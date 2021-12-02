<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaImage extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'berita_image';
    }       

    protected $fillable = [
        'uuid',
        'image_berita_id',
        'berita_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    

    public function images()
    {
        return $this->belongsTo(\ImagesBerita::class);
    }

}
