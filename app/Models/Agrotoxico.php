<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agrotoxico extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'agrotoxicos';

    protected $primaryKey = 'idagrotoxico';

    public function pulvVenenos()
{
    return $this->hasMany(PulvVeneno::class, 'cod_agrotoxico', 'idagrotoxico');
}

}
