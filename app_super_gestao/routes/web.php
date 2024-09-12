<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\PrincipalControler@principal')->name('site.index');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosControler@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'App\Http\Controllers\ContatoControler@contato')->name('site.contato');
Route::post('/contato', 'App\Http\Controllers\ContatoControler@contato')->name('site.contato');

Route::get('/login', function() {
    return 'Login';
})->name('site.login');

Route::prefix('/app')->group(function() {
    Route::get('/clientes', function() {
        return 'Clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', 'App\http\Controllers\FornecedorController@index')->name('app.fornecedores');

    Route::get('/produtos', function() {
        return 'Produtos';
    })->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', 'App\http\Controllers\TesteControler@teste')->name('teste');


Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para a página inicial';
});


// Route::get('/rota1', function() {
//     echo 'Rota 1';
// })->name('site.rota1');

// Route::get('/rota2', function() {
//     return redirect()->route('site.rota1');
// })->name('site.rota2');
//Route::redirect('/rota2', '/rota1');


// Route::get('/contato/{nome}/{categoria_Id}',
// function(string $nome, int $categoria = 1) {
//     echo "Estamos aqui: $nome - $categoria";
// })->where('categoria', '[0-9]+')
// ->where('nome', '[A-Za-z]+');


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

