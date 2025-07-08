<x-app-layout>
    {{-- A DIV PAI PRECISA TER O id="app" --}}
    <div id="app">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}

                        <hr class="my-6">
                        <h3 class="font-semibold text-lg">Atualizar Foto de Perfil</h3>
                        <form action="{{ route('user-profile-photo.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                            @csrf
                            <div>
                                <label for="photo">Escolha uma nova foto:</label>
                                <input type="file" name="photo" id="photo" class="mt-1">
                            </div>
                            <button type="submit" class="mt-4 bg-gray-800 text-white font-bold py-2 px-4 rounded hover:bg-gray-700">
                                Salvar Foto
                            </button>
                        </form>

                        {{-- Usando nosso componente Vue! --}}
                        <hello-world></hello-world>
                        <counter-component></counter-component>
                        <post-list></post-list>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>