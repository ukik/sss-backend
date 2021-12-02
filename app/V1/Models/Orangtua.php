<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'orangtua';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'nama_ayah',
        'nama_ibu',
        'agama_ayah',
        'agama_ibu',
        'telepon_ayah',
        'telepon_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'alamat_orangtua',
        'nama_wali',
        'agama_wali',
        'alamat_wali',
        'telepon_wali',
        'pekerjaan_wali',
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

    public function orangtua_siswa()
    {
        // orangtua_siswa nama table pivot
        // $this->belongsToMany(Siswa::class, 'orangtua_siswa', 'siswa_id', 'orangtua_id')
        return $this->belongsToMany(\Siswa::class, 'orangtua_siswa'); 
    }        
}
