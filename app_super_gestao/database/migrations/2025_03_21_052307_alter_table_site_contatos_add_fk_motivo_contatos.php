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
        // Adiciona a coluna motivo_contato_id
        Schema::table('sitecontatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato_id');
        });

        DB::statement('update sitecontatos set motivo_contato_id = motivo_contato');

        // Criando a FK e removendo a coluna motivo_contato
        Schema::table('sitecontatos', function (Blueprint $table) {
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Criando a coluna motivo_contato e removendo a FK
        Schema::table('sitecontatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('sitecontatos_motivo_contato_id_foreign');
        });

        // Atribuindo os valores da coluna motivo_contato_id para a coluna motivo_contato
        DB::statement('update sitecontatos set motivo_contato = motivo_contato_id');

        // Removendo a coluna motivo_contato_id
        Schema::table('sitecontatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contato_id');
        });
    }
};
