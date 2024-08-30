<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\PrincipalControler@principal');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosControler@sobreNos');

Route::get('/contato', 'App\Http\Controllers\ContatoControler@contato');


Route::get('/contato/{nome}/{categoria_Id}',
function(string $nome, int $categoria = 1) {
    echo "Estamos aqui: $nome - $categoria";
})->where('categoria', '[0-9]+')
->where('nome', '[A-Za-z]+');


/*

Route::get('/contato/{nome}/{categoria?}/{assunto?}/{mensagem?}',
function(string $nome, string $categoria = 'Informação', string $assunto = 'Contato', string $mensagem = 'Mensagem não enviada') {
    echo "Estamos aqui: $nome - $categoria - $assunto - $mensagem";
});

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

