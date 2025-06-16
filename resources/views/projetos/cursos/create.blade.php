<x-app-layout>



    @if ($errors->any())
        <div>
            <strong>Erro!</strong> Por favor, corrija os campos abaixo:<br><br>
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="py-12">
        <div class="max-w-7xl w-fit mx-auto sm:px-6 lg:px-8 items-center flex">
            <div class="overflow-hidden shadow-sm sm:rounded-lg w-min flex items-center justify-center">
              <div class="p-6 text-gray-900 m-2 flex flex-row">
    <form action="{{ route('projetos.cursos.store', $projeto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="projeto_id" value="{{ $projeto->id }}">

        <div>
            <x-input-label for="titulo" >Título</x-input-label>
            <x-text-input type="text" name="titulo" value="{{ old('titulo') }}" required/>
        </div>

        <div>
            <x-input-label for="resumo" >Resumo</x-input-label>
             <x-textarea name="resumo" required>{{ old('resumo') }}</x-textarea>
        </div>

        <div>
            <x-input-label for="vagas" >Vagas</x-input-label>
            <x-text-input type="number" name="vagas"  value="{{ old('vagas') }}" required/>
        </div>

        <div>
            <x-input-label for="materiais" >Materiais</x-input-label>
            <x-file-input type="file" name="materiais"/>
        </div>

        <div>
            <x-input-label for="carga_horaria" >Carga Horária (em horas)</x-input-label>
            <x-text-input type="number" name="carga_horaria" value="{{ old('carga_horaria') }}" required/>
        </div>

        <div>
            <x-input-label for="data_inicio" >Data de Início</x-input-label>
            <x-text-input type="date" name="data_inicio"  value="{{ old('data_inicio') }}" required/>
        </div>

        <div>
            <x-input-label for="data_fim" >Data de Fim</x-input-label>
            <x-text-input type="date" name="data_fim"  value="{{ old('data_fim') }}" required/>
        </div>

        <div>
            <x-input-label for="imagem" >Imagem</x-input-label>
            <x-file-input type="file" name="imagem" value="{{ old('imagem') }}" />
        </div>

        <div class="mt-2">
        <x-back-link href="{{ route('projetos.show', $projeto->id) }}">Voltar</x-back-link>
        <x-primary-button type="submit">Cadastrar Curso</x-primary-button>
        </div>
    </form>
</div></div></div></div></div>
</x-app-layout>
