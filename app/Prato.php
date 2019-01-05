<?php

namespace PGD;

use Illuminate\Database\Eloquent\Model;

class Prato extends Model
{
    public function insumos()
    {
        return $this->belongsToMany('PGD\Insumo');
    }
    public function producaos()
    {
        return $this->hasMany('PGD\Producao');
    }
}
