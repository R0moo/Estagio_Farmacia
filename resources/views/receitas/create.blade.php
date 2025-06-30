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
<form action="{{ route('receitas.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <x-input-label for="titulo">Título: </x-input-label>
        <x-text-input name="titulo" placeholder="Título:" required/>

        <x-input-label for="descricao">Descrição: </x-input-label>
        <x-textarea name="descricao" required placeholder="Descrição:">{{ old('descricao') }}</x-textarea>

        <x-input-label for="ingredientes">Ingredientes: </x-input-label>
        <x-textarea name="ingredientes" required placeholder="Ex: 2 ovos, SEPARE POR VIRGULAS">{{old('ingredientes')}}</x-textarea>

        <x-input-label for="modo_preparo">Modo de Preparo: </x-input-label>
        <x-textarea name="modo_preparo" placeholder="Modo de Preparo:">{{old('modo_preparo')}}</x-textarea>

        <x-input-label for="tempo_preparo">Tempo de Preparo (em minutos): </x-input-label>
        <x-text-input type="number" name="tempo_preparo" placeholder="Tempo de preparo:"/>

        <x-input-label for="rendimento">Rendimento: </x-input-label>
        <x-text-input name="rendimento" placeholder="Rendimento:"/>

        <x-input-label for="Categoria">Categoria: </x-input-label>
        <x-text-input name="categoria" placeholder="Categoria:"/>

        <x-input-label for="imagem">Imagem: </x-input-label>
        <x-file-input type="file" name="imagem" id="imagem"/>

        <div class="mt-2">
        <x-back-link href="{{ route('receitas.index') }}">Voltar</x-back-link>
        <x-primary-button>Salvar</x-primary-button>
        </div>
</form>            
                </div>
              </div>
            </div>
        </div>
</x-app-layout>
