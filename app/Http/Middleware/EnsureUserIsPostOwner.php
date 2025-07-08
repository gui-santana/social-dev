<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Pegamos o post da rota. O Laravel é inteligente e sabe que 'post'
        // é o nome do parâmetro na nossa rota resource (ex: /posts/{post}/edit).
        $post = $request->route('post');

        // 2. Verificamos se o ID do utilizador autenticado é diferente do ID do autor do post.
        if ($request->user()->id !== $post->user_id) {
            // 3. Se não for o dono, barramos a entrada com um erro 403 (Proibido).
            abort(403, 'AÇÃO NÃO AUTORIZADA.');
        }

        // 4. Se a verificação passar, deixamos a requisição continuar.
        return $next($request);
    }
}
