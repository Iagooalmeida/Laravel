<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(Request $request){
        // Recuperar a mensagem de erro
        $erro = "";
        if($request->get('erro') == 1){
            $erro = "Usuário e senha não conferem!";
        }
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
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

        // Recuperar os dados do formulário'
        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuário: $email <br>";
        echo "Senha: $password <br>";

        // iniciar o model user
        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        // Verifica se o usuário existe
        if(isset($usuario->id)){
            echo "Usuário existe! <br>";
            // Criar a sessão do usuário
            session_start();
            $_SESSION['usuario'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['id'] = $usuario->id;
            $_SESSION['perfil'] = $usuario->perfil;

            return redirect()->route('app.home');
        }else{
            echo "Usuário não existe! <br>";
            // Redirecionar para a página de login com erro
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
}
