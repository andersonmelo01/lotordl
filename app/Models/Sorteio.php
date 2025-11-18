<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sorteio extends Model
{
    protected $table = 'sorteio';
    protected $fillable = [
        'descricao',
        'premio',
        'valor',
        'dia',
        'status',
        'porcentagem',
        'qt_bilhete',
        'datahora',
    ];
}
