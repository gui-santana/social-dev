<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

class FeedController extends Controller
{
public function index()
{
    $user = auth()->user();

    // 1. Pega a coleção de usuários que o usuário logado segue.
    $following = $user->following;

    // 2. Extrai apenas os IDs dessa coleção.
    $followingIds = $following->pluck('id');

    // 3. (Bônus) Adiciona o ID do próprio usuário à lista para ver seus próprios posts.
    $followingIds->push($user->id);

    // 4. Busca os posts onde o user_id está na lista de IDs.
    $posts = Post::whereIn('user_id', $followingIds)->with('user')->latest()->get();

    return response()->json($posts);
}
}