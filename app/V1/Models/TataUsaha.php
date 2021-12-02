<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TataUsaha extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'tata_usaha';
    }    

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'nama_lengkap',
        'nip',
        'nuptk',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'golongan',
        'telepon',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kabupaten',
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
