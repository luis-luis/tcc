<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotacao extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'cotacoes';

    protected $primaryKey = 'idcotacoes';


    /*Função itens retorna nessa classe uma cotacaoitem, 
    associando o cod_cotacao dela ao idcotacoes existente na tabela Cotacoes*/
    public function itens(){
        return $this->hasMany(CotacaoItem::class, 'cod_cotacao', 'idcotacoes');
    }

    public function status(){
        return $this->hasOne(Status::class, 'id_status', 'cod_status');
    
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'cod_user');
    }
}
