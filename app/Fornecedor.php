<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = [
        'nome',
        'tipo_pessoa',
        'cpf_cnpj',
        'data_hora',
        'telefone',
        'rg',
        'data_nascimento'       
    ];
}
