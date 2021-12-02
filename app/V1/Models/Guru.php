<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'guru';
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

    public function jabatans()
    {
        return $this->hasMany(\GuruJabatan::class);
    }

    public function kelas()
    {
        return $this->hasMany(\GuruKelas::class);
    }

    public function guru_siswa()
    {
        // guru_siswa nama table pivot
        return $this->belongsToMany(\Siswa::class, 'guru_siswa', 'siswa_id', 'guru_id');
    }     
}
