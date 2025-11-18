<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bilhete extends Model
{
    protected $table = 'bilhete';
    protected $fillable = [
        'numero',
        'id_sorteio',
        'id_user',
        'descricao',
        'status',
        'valor',
    ];
}
