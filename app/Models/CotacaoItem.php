<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotacaoItem extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'cotacoes_itens';

    protected $primaryKey = 'idcotacoesitens';

    /*Função produto retorna nessa classe um produto, 
    associando o id dele ao cod_produto existente na tabela Cotacoesitens*/
    public function produto(){
        return $this->hasOne(Produto::class, 'id', 'cod_produto');
    }

}
