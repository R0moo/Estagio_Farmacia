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
<form action="{{ route('projetos.cursos.estudantes.store', [$projeto, $curso]) }}" method="POST" enctype="multipart/form-data">
       @csrf
        <input type="hidden" name="curso_id" value="{{ $curso->id }}">

       <x-input-label for="nome">Nome:</x-input-label>
       <x-text-input name="nome" id="nome" required /><br>
       
       <x-input-label for="cpf">Cpf:</x-input-label>
       <x-text-input type="number" name="cpf" id="cpf" required/><br>

       <x-input-label for="email">Email:</x-input-label>
      <x-text-input type="email" name="email" id="email" required/><br>

       <x-input-label for="ocupacao">Ocupação:</x-input-label>
       <x-text-input name="ocupacao" id="ocupacao" required/><br><br>

       <div class="mt-2 flex">
              <x-back-link class="mr-2" href="{{ route('projetos.cursos.show', ['projeto' => $projeto->id, 'curso' => $curso->id]) }}">Voltar</x-back-link>
              <x-primary-button type="submit">Salvar Estudante</x-primary-button>
       </div>
       
</form>
</div></div></div></div>
</x-app-layout>