<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id'
    ];

    public function itemDetalhe()
    {
        return $this->hasOne('App\Models\ItemDetalhe', 'produto_id', 'id');
        //Produto tem 1 produtDetalhe
        // 1 registro relacionado em produto_detalhes (fk) -> produto_id
        // 1 registro relacionado em produtos (pk) -> id
    }

    public function fornecedor()
    {
        return $this->belongsTo('App\Models\Fornecedor', 'fornecedor_id', 'id');

    }
}
