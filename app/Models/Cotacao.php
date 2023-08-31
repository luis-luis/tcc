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

    public function itens(){
        return $this->hasMany(CotacaoItem::class, 'cod_cotacao', 'idcotacoes');
    }

}
