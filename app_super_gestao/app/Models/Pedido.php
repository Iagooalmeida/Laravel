<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos()
    {
        //return $this->belongsToMany('App\Models\Produto', 'pedido_produto');
        return $this->belongsToMany('App\Models\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at', 'updated_at');
        /*
        1 - Modelo do relacionamento NxN em relação o modelo atual
        2 - É a tabela auxiliar que faz a ligação entre os dois modelos
        3 - Representa o nome da fk da tabela mapeada pelo modelo de relacionamento que faz a ligação com o modelo atual
        4 - Representa o nome da fk da tabela mapeada pelo modelo de relacionamento que faz a ligação com o outro modelo
         */
    }
}
