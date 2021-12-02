<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaTag extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'berita_tag';
    }       

    protected $fillable = [
        'uuid',
        'berita_id',
        'tag_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    

    public function tag()
    {
        return $this->belongsTo(\Tags::class);
    }
}
