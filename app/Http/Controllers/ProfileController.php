<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Exibe o perfil de um usuário com base no seu nome de usuário.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        // Por enquanto, a lógica é a mesma que tínhamos na rota
        return "Você está vendo o perfil de: " . htmlspecialchars($username);
    }
}
