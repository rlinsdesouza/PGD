<?php

use Illuminate\Database\Seeder;
use PGD\User;
use PGD\Insumo;
use PGD\Prato;
use PGD\Producao;
use PGD\Pessoa;
use PGD\Avaliacao;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,3)->create();
        factory(Pessoa::class,15)->create();
        factory(Insumo::class,100)->create();
        factory(Prato::class,50)->create()->each(function($prato) {
            $ids = range(1,50);
            shuffle($ids);
            $sliced = array_slice($ids,1,100);
            $prato->insumos()->attach($sliced);
        });
        factory(Producao::class,200)->create();
        factory(Avaliacao::class,50)->create();
    }
}
