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
                    <hr class="my-4">
                    <h4 class="font-semibold">Posts de {{ $user->name }}:</h4>
                    @forelse ($user->posts()->latest()->get() as $post)
                        <div class="post-card mt-2 p-4 bg-gray-50 rounded">
                            <h5 class="font-bold">{{ $post->title }}</h5>
                            <p class="text-sm text-gray-600">{{ Str::limit($post->content, 100) }}</p> {{-- Exibe um resumo --}}
                        </div>
                    @empty
                        <p class="mt-2">Este usuário ainda não publicou nada.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>