<x-app-layout>

<div class="py-12">
        <div class="max-w-7xl w-fit mx-auto sm:px-6 lg:px-8 items-center flex">
            <div class="overflow-hidden shadow-sm sm:rounded-lg w-min flex items-center justify-center">
              <div class="p-6 text-gray-900 m-2 flex flex-row">
<form action="{{ route('projetos.postagens.store', $projeto) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="projeto_id" value="{{ $projeto->id }}">

    <x-input-label for="titulo">Título:</x-input-label>
    <x-text-input type="text" name="titulo" id="titulo" required/><br>

    <x-input-label for="descricao">Descrição:</x-input-label>
    <x-textarea name="descricao" id="descricao" required></x-textarea><br>

    <x-input-label for="foto">Foto:</x-input-label>
    <x-file-input type="file" name="foto" id="foto"/>
    <br><br>

    <div class="mt-2">
    <x-back-link href="{{ route('projetos.show', $projeto) }}">Voltar</x-back-link>
    <x-primary-button type="submit">Criar Postagem</x-primary-button>
    </div>
</form>

</div></div></div></div></div>
</x-app-layout>