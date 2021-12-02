<?php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanKepadaStakeholder extends Model
{
    use HasFactory;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'pesan_kepada_stakeholder';
    }       

    protected $fillable = [
        'sekolah_id',
        'uuid',
        'user_id',
        'stakeholder_id',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];    

}
