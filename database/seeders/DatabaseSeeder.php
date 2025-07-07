<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Apaga os dados das tabelas para começar do zero (opcional, mas bom para testes)
        // \App\Models\User::query()->delete();
        // \App\Models\Post::query()->delete();

        // Cria 10 usuários falsos
        \App\Models\User::factory(10)->create()->each(function ($user) {
            // Para cada usuário criado, cria 5 posts falsos associados a ele
            \App\Models\Post::factory(5)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
