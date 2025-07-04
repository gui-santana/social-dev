<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobre', function () {
    return '<h1>Página Sobre a SocialDev</h1><p>Esta é uma rede social para desenvolvedores!</p>';
});

Route::get('/perfil/{username}', function ($username) {
    return "Você está vendo o perfil de: " . htmlspecialchars($username);
});