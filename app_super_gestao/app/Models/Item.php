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
        'unidade_id',
        'fornecedor_id',
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

    public function pedidos()
    {
        return $this->belongsToMany('App\Models\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
        /*
        1 - Modelo do relacionamento NxN em relação o modelo atual
        2 - É a tabela auxiliar que faz a ligação entre os dois modelos
        3 - Representa o nome da fk da tabela mapeada pelo modelo de relacionamento que faz a ligação com o modelo atual
        4 - Representa o nome da fk da tabela mapeada pelo modelo de relacionamento que faz a ligação com o outro modelo
         */
    }
}
