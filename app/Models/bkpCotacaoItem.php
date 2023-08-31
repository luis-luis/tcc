<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BkpCotacaoItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'cotacoes_itens';

    protected $primaryKey = 'idcotacoesitens';

    // public function produto(){
    //     return $this->hasMany('App\Produto', 'id', 'cod_produto');
    // }
}
