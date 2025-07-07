<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Criar Novo Post</h1>
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div>
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" required>
                </div>
                <div>
                    <label for="content">Conteúdo</label>
                    <textarea name="content" id="content" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn">Salvar</button>
            </form>
        </div>
    </div>
</x-app-layout>