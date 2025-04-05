<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;


// Route::middleware(LogAcessoMiddleware::class)
//     ->get('/', 'App\Http\Controllers\PrincipalControler@principal')
//     ->name('site.index')
//     ->middleware(LogAcessoMiddleware::class);

Route::get('/', 'App\Http\Controllers\PrincipalControler@principal')->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosControler@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'App\Http\Controllers\ContatoControler@contato')->name('site.contato');
Route::post('/contato', 'App\Http\Controllers\ContatoControler@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'App\http\Controllers\LoginController@index')->name('site.login');
Route::post('/login', 'App\http\Controllers\LoginController@login')->name('site.login');

Route::middleware('autenticacao:Padrao,Visitante')->prefix('/app')->group(function() {

    Route::get('/home', 'App\http\Controllers\HomeController@index')->name('app.home');

    Route::get('/sair', 'App\http\Controllers\LoginController@sair')->name('app.sair');

    Route::get('/cliente', 'App\http\Controllers\ClienteController@index')->name('app.cliente');

    Route::get('/fornecedor', 'App\http\Controllers\FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'App\http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'App\http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'App\http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'App\http\Controllers\FornecedorController@editar')->name('app.fornecedor.editar');

    Route::get('/produto', 'App\http\Controllers\ProdutoController@index')->name('app.produto');
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

