<?php

namespace PGD;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    public function producao()
    {
        return $this->belongsTo('PGD\Producao');
    }
    public function pessoa()
    {
        return $this->belongsTo('PGD\Pessoa');
    }
}
