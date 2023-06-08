<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id';

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'id_cidade');
    }


}
