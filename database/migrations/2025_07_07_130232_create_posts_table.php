<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Cria uma coluna 'id' auto-incrementável e chave primária.
            
            // Cria a chave estrangeira para o usuário
            $table->foreignId('user_id')
                ->constrained('users') // Diz que se refere à tabela 'users'
                ->onDelete('cascade'); // Se um usuário for deletado, seus posts também serão.
                
            $table->string('title'); // Cria uma coluna VARCHAR para o título.
            $table->text('content'); // Cria uma coluna TEXT para o conteúdo longo.
            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at' automaticamente.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
