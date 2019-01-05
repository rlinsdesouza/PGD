<?php

namespace PGD;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    public function avaliacaos()
    {
        return $this->hasMany('PGD\Avaliacao');
    }
    public function producaos()
    {
        return $this->hasMany('PGD\Producao');
    }
    public function user()
    {
        return $this->belongsTo('PGD\User');
    }
}
