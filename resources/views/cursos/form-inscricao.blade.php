<x-app-layout>

<div class="py-12">
        <div class="max-w-7xl w-max mx-auto sm:px-6 lg:px-8 items-center flex">
            <div class="overflow-hidden shadow-sm sm:rounded-lg w-max flex items-center justify-center">
              <div class="p-6 text-gray-900 m-2 flex flex-row">
    <form action="{{ route('cursos.inscrever.store', $curso->id) }}" method="POST">
        @csrf
        <span class="text-2xl font-bold mb-4 text-[#3e693e]">Inscrição no Curso: {{ $curso->titulo }}</span>

        <div class="mb-4">
            <x-input-label for="nome">Nome Completo</x-input-label>
            <x-text-input type="text" name="nome" id="nome" required/>
        </div>

        <div class="mb-4">
            <x-input-label for="email">E-mail</x-input-label>
            <x-text-input type="email" name="email" id="email" required/>
        </div>

        <div class="mb-4">
            <x-input-label for="cpf">CPF</x-input-label>
            <x-text-input type="number" name="cpf" id="cpf" required/>
        </div>

        <div class="mb-4">
            <x-input-label for="ocupacao">Ocupação</x-input-label>
            <x-text-input name="ocupacao" id="ocupacao" required/>
        </div>

        <div class="mr-2">
        <x-back-link href="{{ route('cursos.index') }}">Voltar</x-back-link>
        <x-primary-button>
            Enviar Solicitação
        </x-primary-button>
        </div>

    </form>
</div></div></div></div>
</x-app-layout>