<?php

use Faker\Generator as Faker;
use PGD\User;
use PGD\Insumo;
use PGD\Prato;
use PGD\Producao;
use PGD\Pessoa;
use PGD\Produzido;
use PGD\Avaliacao;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(PGD\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(Pessoa::class, function (Faker $faker) {
    return [
        'nome'=>$faker->name,
        'cpf'=>$faker->unique()->isbn10,
        'telefone'=>$faker->e164PhoneNumber,
        'user_id'=>null,
    ];
});

$factory->define(Insumo::class, function (Faker $faker) {
    return [
        'nome'=>$faker->unique()->word,
        'lactose'=>$faker->randomElement($array = array ('S','N')),
        'gluten'=>$faker->randomElement($array = array ('S','N'))
    ];
});

$factory->define(Prato::class, function (Faker $faker) {
    return [
        'nome'=>$faker->unique()->word,
        'receita'=>$faker->paragraph,
        'dificuldade'=>$faker->numberBetween($min = 1, $max = 3),
        'tempoProduzir'=>$faker->randomDigitNotNull,
        'lactose'=>$faker->randomElement($array = array ('S','N')),
        'gluten'=>$faker->randomElement($array = array ('S','N'))
    ];
});

$factory->define(Producao::class, function (Faker $faker) {
    return [
        'data'=>'2018'.'-'.'12'.'-'.$faker->dayOfMonth,
        'pessoa_id'=>Pessoa::all()->random()->id
    ];
});

$factory->define(Produzido::class, function (Faker $faker) {
    return [
        'prato_id'=>Prato::all()->random()->id,
        'producao_id'=>Producao::all()->random()->id
    ];
});


$factory->define(Avaliacao::class, function (Faker $faker) {
    return [
        'notaSabor'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10),
        'notaAparencia'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10),
        'justificativa'=>$faker->paragraph,
        'pessoa_id'=>Pessoa::all()->random()->id,
        'produzido_id'=>Produzido::all()->random()->id
    ];
});
