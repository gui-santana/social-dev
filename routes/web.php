<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController; // Adicione este import
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilePhotoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Vamos agrupar nossas rotas protegidas aqui
Route::middleware('auth')->group(function () {
    Route::get('/perfil/{user}', [ProfileController::class, 'show'])->name('profile.show');
    
    // Esta única linha cria 7 rotas para o CRUD de posts!
    Route::resource('posts', PostController::class);

    Route::post('/user/profile-photo', [ProfilePhotoController::class, 'update'])->name('user-profile-photo.update');
});

require __DIR__.'/auth.php';

// Adicione esta nova rota ao final do arquivo
Route::get('/perfil/{user}', [ProfileController::class, 'show'])->name('profile.show');