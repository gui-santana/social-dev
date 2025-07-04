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