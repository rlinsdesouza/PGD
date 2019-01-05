<?php

namespace PGD;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    public function pratos()
    {
        return $this->belongsToMany('PGD\Prato');
    }
}
