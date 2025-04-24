<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    // Nome da tabela no banco de dados
    protected $table = 'produto_detalhes';

    protected $fillable = [
        'produto_id',
        'comprimento',
        'largura',
        'altura',
        'unidade_id'
    ];

    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'produto_id', 'id');
        // ProdutoDetalhe tem 1 produto
        // 1 registro relacionado em produtos (pk) -> id
        // 1 registro relacionado em produto_detalhes (fk) -> produto_id
    }
}
