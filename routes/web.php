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
        
    // Rotas do resource que NÃO precisam da verificação de dono
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    // A rota show é pública, mas vamos mantê-la aqui por enquanto para consistência
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show'); 

    // Rotas do resource que PRECISAM da verificação de dono
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('post.owner');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('post.owner');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('post.owner');    

    Route::post('/user/profile-photo', [ProfilePhotoController::class, 'update'])->name('user-profile-photo.update');
});

require __DIR__.'/auth.php';

// Adicione esta nova rota ao final do arquivo
Route::get('/perfil/{user}', [ProfileController::class, 'show'])->name('profile.show');