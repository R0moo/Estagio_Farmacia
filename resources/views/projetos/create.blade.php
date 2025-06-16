<x-app-layout>



<div class="py-12">
<ul>
@foreach ($errors->all() as $erro)
<li>{{ $erro }}</li>
@endforeach
</ul>
        <div class="max-w-7xl w-fit mx-auto sm:px-6 lg:px-8 items-center flex">
            <div class="overflow-hidden shadow-sm sm:rounded-lg w-min flex items-center justify-center">
              <div class="p-6 text-gray-900 max-w-sm m-2 flex flex-row">
<form action="{{ route('projetos.store') }}" method="POST" enctype="multipart/form-data">
       @csrf
       <x-input-label for="titulo">Título:</x-input-label>
       <x-text-input name="titulo" id="titulo" required /><br>

       <x-input-label for="descricao">Descrição:</x-input-label>
      <x-textarea name="descricao" id="descricao" required></x-textarea><br>

      <x-input-label for="capa">Capa:</x-input-label>
       <x-file-input type="file" name="capa" id="capa" required/><br>

       <x-input-label for="cor1">Cor 1:</x-input-label>
       <x-text-input type="color" name="cor1" id="cor1" required/><br>

       <x-input-label for="cor2">Cor 2:</x-input-label>
       <x-text-input type="color" name="cor2" id="cor2" required/><br>

       <div class="div">
              <x-back-link href="{{ route('projetos.index') }}">Voltar</x-back-link>
              <x-primary-button type="submit">Criar Projeto</x-primary-button>
       </div>
       
</form>
</div></div></div></div>
</x-app-layout>