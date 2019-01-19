<?php

namespace PGD;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    public function produzido()
    {
        return $this->belongsTo('PGD\Produzido');
    }
    public function pessoa()
    {
        return $this->belongsTo('PGD\Pessoa');
    }
}
