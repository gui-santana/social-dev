<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Editar Post</h1>
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT') {{-- Informa ao Laravel que é uma requisição de UPDATE --}}
                <div>
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" value="{{ $post->title }}" required>
                </div>
                <div>
                    <label for="content">Conteúdo</label>
                    <textarea name="content" id="content" rows="5" required>{{ $post->content }}</textarea>
                </div>
                <button type="submit" class="btn">Atualizar</button>
            </form>
        </div>
    </div>
</x-app-layout>