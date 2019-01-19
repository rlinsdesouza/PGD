<?php

namespace PGD;

use Illuminate\Database\Eloquent\Model;

/*
https://www.easylaravelbook.com/blog/overriding-a-laravel-models-default-table-name/
*/

class Produzido extends Model
{
    protected $table = 'prato_producao';
    public function avaliacaos()
    {
        return $this->hasMany('PGD\Avaliacao');
    }
}
