<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\LogAcessoMiddleware; // Importe o middleware
use App\Http\Middleware\AutenticacaoMiddleware; // Importe o middleware

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(LogAcessoMiddleware::class); // Registra o middleware globalmente

        // Definindo múltiplos aliases
        $middleware->alias([
            'log.acesso' => LogAcessoMiddleware::class,
            'autenticacao' => AutenticacaoMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
