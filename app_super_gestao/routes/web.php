<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\PrincipalControler@principal');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosControler@sobreNos');

Route::get('/contato', 'App\Http\Controllers\ContatoControler@contato');

/*
// Route::get('/', function () {
//     //return view('welcome');
//     return 'Olá, seja bem-vindo ao curso!';
// });

Route::get('/sobre-nos', function () {
    return 'Sobre nós';
});

Route::get('/contato', function () {
    return 'Contato';
});

//Route::get($uri, $callback);
verbo http

get
post
put
patch
delete
options
*/

