{{-- Usamos o layout principal que o Breeze nos deu --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil de') }} {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium">{{ $user->name }}</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Email: {{ $user->email }}
                    </p>
                    <p class="mt-1 text-sm text-gray-600">
                        {{-- O campo created_at é um objeto Carbon, que tem métodos úteis --}}
                        Na SocialDev desde: {{ $user->created_at->format('d/m/Y') }} ({{ $user->created_at->diffForHumans() }})
                    </p>                    
                    {{-- No arquivo show.blade.php, substitua a seção de posts por esta --}}
                    <hr class="my-6 border-gray-300">

                    {{-- Container principal para a lista de posts --}}
                    <div class="mt-6">
                        <h4 class="text-2xl font-bold text-gray-800">Posts de {{ $user->name }}</h4>
                        
                        <div class="mt-4 space-y-6">
                            @forelse ($user->posts()->latest()->get() as $post)
                                {{-- Card individual para cada post --}}
                                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                                    
                                    {{-- Cabeçalho do card com Flexbox para alinhar o título e a data --}}
                                    <div class="flex justify-between items-center">
                                        <h5 class="text-xl font-bold text-blue-600">{{ $post->title }}</h5>
                                        <span class="text-sm font-light text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                                    </div>

                                    {{-- Conteúdo do post (resumo) --}}
                                    <p class="mt-2 text-gray-700">
                                        {{ Str::limit($post->content, 200) }}
                                    </p>
                                </div>
                            @empty
                                {{-- Mensagem caso não haja posts --}}
                                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                                    <p>Este usuário ainda não publicou nada.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>