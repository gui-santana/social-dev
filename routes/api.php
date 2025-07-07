<?php

use App\Models\Post; // Importe o model Post
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rota que retorna todos os posts
Route::get('/posts', function () {
    // Usamos 'with('user')' para Eager Loading.
    // Isso busca todos os posts E seus usuários associados de forma eficiente,
    // evitando o problema de N+1 queries.
    $posts = Post::with('user')->latest()->get();

    // O Laravel converte automaticamente para JSON ao retornar de uma rota de API
    return $posts;
});