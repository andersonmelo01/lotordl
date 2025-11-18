<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    protected $table = 'premio';
    protected $fillable = [
        'datahora',
        'totalparticipantes',
        'status',
        'id_bilhete',
        'id_user',
        'id_sorteio',
        'numerobilhete',
    ];

    public function ganhador()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
