<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('site.login', ['titulo' => 'Login']);
    }

    public function login(Request $request){
        // Regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // Mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário deve ser um e-mail válido',
            'senha.required' => 'O campo senha é obrigatório'
        ];
        // Validação dos dados
        $request->validate($regras, $feedback);
    }
}
