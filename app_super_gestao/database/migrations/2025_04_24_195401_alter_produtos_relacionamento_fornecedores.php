<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insserir um registro de fornecedor na tabela fornecedores
        $fornecedor_id = DB::table('fornecedores')->insertGetId([
            'nome' => 'Fornecedor Padrão 5G',
            'site' => 'www.fornecedorpadrao5g.com.br',
            'uf' => 'SP',
            'email' => 'vontato@fornecedorpadrao5g.com.br'
        ]);

        // Criando a coluna em produtos que vai recber a fk de fornecedores
        Schema::table('produtos', function (Blueprint $table) use ($fornecedor_id) {
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        // Remover a fk de fornecedores
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign(['produtos_fornecedor_id_foreign']);
            $table->dropColumn('fornecedor_id');
        });
    }
};
