<x-app-layout>

<ul>
@foreach ($errors->all() as $erro)
<li>{{ $erro }}</li>
@endforeach
</ul>

<div class="py-12">
        <div class="max-w-7xl w-fit mx-auto sm:px-6 lg:px-8 items-center flex">
            <div class="overflow-hidden shadow-sm sm:rounded-lg w-min flex items-center justify-center">
              <div class="p-6 text-gray-900 m-2 flex flex-row">
<form action="{{ route('receitas.update', $receita->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <x-input-label for="titulo">Título: </x-input-label>
    <x-text-input type="text" name="titulo" value="{{ old('titulo', $receita->titulo) }}" required/>
    <br>

    <x-input-label for="descricao">Descrição: </x-input-label>
    <x-textarea name="descricao" required>{{ old('descricao', $receita->descricao) }}</x-textarea>
    <br>

    <x-input-label for="ingredientes">Ingredientes: </x-input-label>
    <x-textarea name="ingredientes" required>{{ old('ingredientes', $receita->ingredientes) }}</x-textarea> <br>
    <small>Separe os ingredientes com vírgulas</small>
    <br>

    <x-input-label for="modo_preparo">Modo de Preparo: </x-input-label>
    <x-textarea name="modo_preparo">{{ old('modo_preparo', $receita->modo_preparo) }}</x-textarea>
    <br>

    <x-input-label for="tempo_preparo">Tempo de Preparo (em minutos): </x-input-label>
    <x-text-input type="number" name="tempo_preparo" value="{{ old('tempo_preparo', $receita->tempo_preparo) }}"/>
    <br>

    <x-input-label for="rendimento">Rendimento: </x-input-label>
    <x-text-input name="rendimento" value="{{ old('rendimento', $receita->rendimento) }}"/>
    <br>

    <x-input-label for="categoria">Categoria: </x-input-label>
    <x-text-input  name="categoria" value="{{ old('categoria', $receita->categoria) }}"/>
    <br>

    <x-input-label for="imagem">Alterar Imagem: </x-input-label>
    <x-file-input type="file" name="imagem" id="imagem"/>

    <div class="mt-2">
    <x-back-link href="{{ route('receitas.index') }}">Voltar</x-back-link>
    <x-primary-button>Atualizar</x-primary-button>
    </div>
</form>
</div></div></div></div>

</x-app-layout>
