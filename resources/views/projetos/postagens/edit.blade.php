<x-app-layout>
<div class="py-12">
    <div class="max-w-7xl w-fit mx-auto sm:px-6 lg:px-8 items-center flex">
        <div class="overflow-hidden shadow-sm sm:rounded-lg w-min flex items-center justify-center">
            <div class="p-6 text-gray-900 m-2 flex flex-row">
                <form action="{{ route('projetos.postagens.update', ['projeto' => $projeto->id, 'postagem' => $postagem->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <x-input-label for="titulo">Título:</x-input-label>
                    <x-text-input type="text" name="titulo" id="titulo" value="{{ old('titulo', $postagem->titulo) }}" required/>

                    <x-input-label for="descricao">Descrição:</x-input-label>
                    <x-textarea name="descricao" id="descricao" required>{{ old('descricao', $postagem->descricao) }}</x-textarea>

                    <x-input-label for="imagens">Adicionar novas imagens (máx. 10):</x-input-label>
                    <x-file-input type="file" name="imagens[]" multiple accept="image/*"/>

                    <x-back-link href="{{ route('projetos.show', $projeto) }}">Voltar</x-back-link>
                    <x-primary-button type="submit">Atualizar Postagem</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
