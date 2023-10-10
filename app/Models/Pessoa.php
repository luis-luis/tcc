<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use HasFactory;

    use SoftDeletes;
    
    public $timestamps = true;

    protected $primaryKey = 'idpessoa';

    public function receita()
{
    return $this->belongsTo(Receita::class);
}

public function receitas()
{
    return $this->hasMany(Receita::class, 'codpessoa', 'idpessoa');
}

public function endereco(){
    return $this->hasOne(Endereco::class, 'id_enderecos', 'id_endereco');
}


}
