<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receita extends Model
{
    use HasFactory, SoftDeletes;
    
    public $timestamps = false;

    protected $primaryKey = 'idreceitas';

    public function pulvVenenos()
{
    return $this->hasMany(PulvVeneno::class);
}

public function pessoa()
{
    return $this->belongsTo(Pessoa::class, 'codpessoa', 'idpessoa');
}

public function pulvVeneno()
{
    return $this->hasMany(PulvVeneno::class, 'cod_receita', 'idreceitas');
}

public function clientes(){
    return $this->hasOne(User::class, 'id', 'cod_user_cliente');
}


}
    //protected $fillable = ['nome_cliente, tel_cliente, nome_veneno, nome_veneno2, nome_veneno3, nome_veneno4, nome_veneno5,qtd_veneno, qtd_veneno2, qtd_veneno3, qtd_veneno4, qtd_veneno5, tanque_veneno, cult, area_app'];'

