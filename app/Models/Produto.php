<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $timestamps = true;

    protected $primaryKey = 'id';

    // public function produto(){
    //     return $this->hasMany(Produto::)
    // }

    public function produto(){
        return $this->hasOne(Produto::class, 'id', 'cod_produto');
    }

    public function itens(){
        return $this->hasMany(CotacaoItem::class, 'cod_cotacao', 'idcotacoes');
    }

    public function status(){
        return $this->hasOne(Status::class, 'cod_status', 'id_status');
    }
}
