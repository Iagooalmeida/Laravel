<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '00.000.000/0000-00',
                'ddd' => '11', // São Paulo - SP
                'telefone' => '0000-0000',
                'email' => 'teste@gmail.com'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '85', // Fortaleza - CE
                'telefone' => '0000-0000',
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => '00.000.000/0000-00',
                'ddd' => '32', // Juiz de Fora - MG
                'telefone' => '0000-0000',
            ]
        ];

       // echo isset($fornecedores[0]['cnpj']) ? 'CNPJ informado' : $cnpj = 'CNPJ não informado';

        return view('app.fornecedor.index' , compact('fornecedores'));
    }
}
