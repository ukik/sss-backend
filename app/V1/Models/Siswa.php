<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'siswa';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'nama_lengkap',
        'nis',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'status_keluarga',
        'anak_ke',
        'alamat',
        'telepon_rumah',
        'sekolah_asal',
        'diterima_kelas',
        'diterima_tanggal',
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
        // $this->belongsToMany(Orangtua::class, 'orangtua_siswa', 'orangtua_id', 'siswa_id')
        return $this->belongsToMany(\Orangtua::class, 'orangtua_siswa'); 
    }         
}
