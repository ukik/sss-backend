<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruJabatan extends Model
{
    use HasFactory;

    public $foreignKey = 'guru_id';

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'guru_jabatan';

        $this->appends = [
            'value', 'label'
        ];        
    }   

    protected $fillable = [
        'sekolah_id',
        'user_id',
        'uuid',
        'guru_id',
        'jadwal_id',
    ];

    public function getValueAttribute() {
        return $this->id;
    }

    public function getLabelAttribute() {
        return $this->guru->nama_lengkap;
    }

    protected $hidden = [
    ];

    protected $casts = [
    ];    

    public function guru()
    {
        return $this->belongsTo(\Guru::class, 'guru_id');
    }
}
