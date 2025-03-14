<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;

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


        return view('site.contato', ['titulo' => 'Contato (teste)']);
    }

    public function salvar(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:sitecontatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:200'
        ];

        $feedback = [
            'nome.required' => 'O nome é obrigatório',
            'nome.min' => 'O nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'telefone.required' => 'O telefone é obrigatório',
            'email.email' => 'O email informado não é válido',
            'motivo_contato.required' => 'O motivo de contato é obrigatório',
            'mensagem.required' => 'A mensagem é obrigatória',
            'mensagem.max' => 'A mensagem deve ter no máximo 200 caracteres'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.contato');
    }
}
