<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'uf',
        'nome_fantasia',
        'cnpj'
    ];
}
