@extends('layouts.app')

@section('title', 'Perfil de ' . $username)

@section('content')
    <div class="bg-white rounded shadow-lg p-5">
        <h1 class="text-3xl font-bold text-gray-800">Perfil de Usuário</h1>
        <p class="text-xl text-gray-600 mt-2">
            Bem-vindo à página de perfil de <span class="font-semibold text-blue-600">{{ $username }}</span>!
        </p>
        <div class="mt-5">
            <a href="/" class="text-blue-500 hover:underline">&larr; Voltar para a Home</a>
        </div>
    </div>
@endsection