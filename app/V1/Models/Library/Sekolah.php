<?php

// namespace App\Models\Library;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = '__sekolah';

        $this->appends = [
            'value', 'label'
        ];
    }       

    protected $fillable = [
        'uuid',
        'nama_sekolah',
        'nis',
        'alamat_sekolah',
        'kode_pos',
        'telepon',
        'keluharan',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'website',
        'email',
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

    public function getValueAttribute() {
        return $this->id;
    }

    public function getLabelAttribute() {
        return $this->nama_sekolah;
    }


    protected $hidden = [
        // 'id',
        // 'nama_sekolah',
    ];

    protected $casts = [
    ];    
}
