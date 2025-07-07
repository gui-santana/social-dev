<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobre', function () {
    return '<h1>Página Sobre a SocialDev</h1><p>Esta é uma rede social para desenvolvedores!</p>';
});

Route::get('/perfil/{username}', [ProfileController::class, 'show']);

Route::resource('posts', PostController::class);

use App\Models\Post;
use App\Models\User;

Route::get('/eloquent-test', function () {
    // Criar um novo post
    $post = new Post();
    $post->title = 'Post de Teste Eloquent';
    $post->content = 'Conteúdo de teste...';
    $post->user_id = User::first()->id; // Pega o ID do primeiro usuário do banco
    $post->save();

    // Buscar todos os posts e exibir
    $posts = Post::all();
    return $posts;
});