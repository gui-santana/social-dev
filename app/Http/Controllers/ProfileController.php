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
        // O segundo argumento da função view() é um array de dados
        // A chave do array ('username') se torna o nome da variável na View.
        return view('perfil', [
            'username' => $username
        ]);
    }
}
