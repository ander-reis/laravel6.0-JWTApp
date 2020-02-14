<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'Codigo_Professor' => '11000',
        'Nome' => 'Teste Completo',
        'Endereco' => 'Rua Numero Um',
        'Numero' => '12',
        'Complemento' => 'Residencia',
        'Bairro' => 'Jardim Teste',
        'Cidade' => 'São Paulo',
        'Estado' => 'SP',
        'CEP' => '00001-050',
        'DDD_Telefone_Residencial' => '11',
        'Telefone_Residencial' => '1111-1111',
        'DDD_Telefone_Comercial' => '11',
        'Telefone_Comercial' => '2222-2222',
        'DDD_Telefone_Celular' => '11',
        'Telefone_Celular' => '99999-9999',
        'CPF' => '944.998.620-78',
        'Sexo' => 0,
        'Situacao' => 1,
        'Email' => 'admin@user.com',
        'Status' => '1',
        'Senha' => '123456',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
    ];
});
