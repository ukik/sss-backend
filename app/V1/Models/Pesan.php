<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'pesan';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'judul',
        'deskripsi',
        'terkirim',
        'label',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    

    public function berita_image()
    {
        // orangtua_siswa nama table pivot
        return $this->belongsToMany(\ImagesBerita::class, 'berita_image', 'image_berita_id', 'berita_id'); 
    }    

    public function berita_tag()
    {
        // orangtua_siswa nama table pivot
        // $this->belongsToMany(Image::class, 'berita_image', 'tag_id', 'berita_id')
        return $this->belongsToMany(\Tags::class, 'berita_tag', 'tag_id', 'berita_id'); 
    }    

}
