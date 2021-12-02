<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanGrupKelas extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'pesan_grup_kelas';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'kelas_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    

}
