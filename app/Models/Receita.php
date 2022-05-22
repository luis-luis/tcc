<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $primaryKey = 'idreceitas';

    //protected $fillable = ['nome_cliente, tel_cliente, nome_veneno, nome_veneno2, nome_veneno3, nome_veneno4, nome_veneno5,qtd_veneno, qtd_veneno2, qtd_veneno3, qtd_veneno4, qtd_veneno5, tanque_veneno, cult, area_app'];'
}
