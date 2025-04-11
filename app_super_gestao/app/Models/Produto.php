<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id'
    ];

    public function produtoDetalhe()
    {
        return $this->hasOne('App\Models\ProdutoDetalhe');

        //Produto tem 1 produtDetalhe
        // 1 registro relacionado em produto_detalhes (fk) -> produto_id
        // 1 registro relacionado em produtos (pk) -> id
    }
}
