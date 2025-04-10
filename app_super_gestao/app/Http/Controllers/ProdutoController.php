<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Exibe a view com os produtos
        $produtos = Produto::paginate(10);

        return view('app.produto.index', ['produtos' => $produtos , 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Exibe o formulário para criar um novo produto
        $unidades = Unidade::all();
        // Retorna a view de criação de produto com as unidades disponíveis
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|numeric',
            'unidade_id' => 'exists:unidades,id',
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'unidade_id.exists' => 'A unidade informada não existe',
            'peso.numeric' => 'O peso deve ser um número',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'A descrição deve ter no mínimo 3 caracteres',
            'descricao.max' => 'A descrição deve ter no máximo 2000 caracteres',
        ];

        // Valida os dados do formulário
        $request->validate($regras, $feedback);

        // Armazena um novo produto
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        // Exibe um produto específico
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        // Exibe o formulário para editar um produto existente
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        // Atualiza um produto existente
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        // Remove um produto existente
        $produto->delete(); // Exclui o produto
        return redirect()->route('produto.index'); // Redireciona para a lista de produtos
        // Exclui o produto do banco de dados
    }
}
