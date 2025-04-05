<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {

        return view('app.fornecedor.index');

    }

    public function listar() {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.request('nome').'%')
            ->where('site', 'like', '%'.request('site').'%')
            ->where('uf', 'like', '%'.request('uf').'%')
            ->where('email', 'like', '%'.request('email').'%')
            ->get();

        return view('app.fornecedor.listar' , ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request) {

        $msg = '';

        if ($request->input('_token') != '' && $request->input('id') == '') {
            // validação
            $regra = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|size:2',
                'email' => 'email'
            ];
            $mensagem = [
                'required' => 'O campo :attribute é obrigatório',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.size' => 'O campo uf deve ter 2 caracteres',
                'email.email' => 'O campo email deve ser um email válido'
            ];

            $request->validate($regra, $mensagem);

            // Salvar no banco de dados
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Fornecedor cadastrado com sucesso!';
        }

        // Edição
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $updare = $fornecedor->update($request->all());
            if ($updare) {
                $msg = 'Fornecedor editado com sucesso!';
            } else {
                $msg = 'Fornecedor não editado!';
            }

            return redirect()->route('app.fornecedor.adicionar', ['id' => $request->input('id'), 'msg' => $msg]);
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '') {
        $fornecedor = Fornecedor::find($id);
        if (isset($fornecedor->id)) {
            return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
        } else {
            return redirect()->route('app.fornecedor');
        }
    }
}
