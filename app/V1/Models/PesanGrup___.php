<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanGrup extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'pesan_grup';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'label',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    

}
