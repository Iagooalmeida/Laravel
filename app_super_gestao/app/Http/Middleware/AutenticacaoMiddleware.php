<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {
        echo "Método de autenticação e Perfil: ( $metodo_autenticacao - $perfil ) <br>";
        // Verificar se o usuário está autenticado
        if ($metodo_autenticacao === 'Padrao'){
            echo "Verificar o usuário e senha no banco de dados $perfil <br>";
        }

        if ($metodo_autenticacao === 'ldap'){
            echo "Verificar usuário e senha no AD $perfil <br>";
        }

        if($perfil === 'Visitante'){
            echo "Verificar se o usuário é visitante <br>";
        }else{
            echo "Verificar se o usuário é $perfil <br>";
        }

        if (false) {
            return $next($request);
        } else {
            return response('Acesso negado! Rota exige autenticação.', 401);
        }
    }
}
