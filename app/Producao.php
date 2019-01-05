<?php

namespace PGD;

use Illuminate\Database\Eloquent\Model;

class Producao extends Model
{
    public function prato()
    {
        return $this->belongsTo('PGD\Prato');
    }

    public function pessoa()
    {
        return $this->belongsTo('PGD\Pessoa');
    }
    
    public function avaliacaos()
    {
        return $this->hasMany('PGD\Avaliacao');
    }
}
