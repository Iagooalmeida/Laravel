<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoControler extends Controller
{
    public function contato(Request $request) {
        //var_dump($_POST);
        // dd($request->all());

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        $contato->save();
        */

        //$contato = new SiteContato();
        //$contato->create($request->all()); // Atribui os valores do request para o objeto contato
        //print_r($contato->getAttributes());
        //$contato->save();

        $motivo_contatos = MotivoContato::all();


        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:sitecontatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.min' => 'O nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',

            'email.email' => 'O email informado não é válido',

            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',

            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
