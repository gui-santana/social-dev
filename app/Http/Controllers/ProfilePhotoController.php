<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilePhotoController extends Controller
{
    public function update(Request $request)
    {
        // 1. Validação do arquivo
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Obrigatório, imagem, tipos permitidos, máx 2MB
        ]);

        // 2. Pega o usuário autenticado
        $user = auth()->user();

        // 3. Armazena a nova foto e pega o caminho
        // 'profile-photos' é a subpasta dentro de 'storage/app/public'
        $path = $request->file('photo')->store('profile-photos', 'public');

        // 4. Atualiza o caminho da foto no banco de dados para o usuário
        $user->profile_photo_path = $path;
        $user->save();

        // 5. Redireciona de volta com uma mensagem de sucesso
        return back()->with('success', 'Foto do perfil atualizada com sucesso!');
    }
}