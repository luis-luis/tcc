<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PulvVeneno extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $primaryKey = 'id';

    public function receita()
{
    return $this->belongsTo(Receita::class, 'cod_receita', 'idreceitas');

}

public function agrotoxico()
{
    return $this->belongsTo(Agrotoxico::class, 'cod_agrotoxico', 'idagrotoxico');
}




}
