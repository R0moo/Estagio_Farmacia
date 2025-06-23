    <x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-[#5A8457]">
                @auth
                @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-primary-link href="{{ route('receitas.create') }}">Criar nova Receita</x-primary-link>
                </div>
                @endif
                @endauth
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-row flex-wrap">
        @foreach ($receitas as $receita)
        <a href="{{route('receitas.index', ['show_modal' => 1, 'receita_id' => $receita->id])}}">
        <x-card titulo="{{ $receita->titulo }}" imagem="{{ $receita->imagem ? asset('storage/' . $receita->imagem) : null }}" width="280px">
        </a>
        @auth
        @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
            <x-slot name="acoes">
                <x-edit-link href="{{ route('receitas.edit', $receita) }}">Editar</x-edit-link>
                <form action="{{ route('receitas.destroy', $receita->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                    <x-delete-button type="submit" onclick="confirm('Deseja excluir mesmo?')">
                        Excluir
                    </x-delete-button>
                </form>
            </x-slot>
        @endif
        @endauth
        </x-card>
        @endforeach
                </div>
            </div>
        </div>

        @isset($modalData)
    <div class="fixed inset-0 bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-3xl mx-4">

            <div class="flex justify-center items-center border-b p-2">
                <div class="flex flex-col items-center">
                    @if ($receita->imagem)
                <img src="{{ asset('storage/' . $modalData->imagem) }}" alt="Receita" style="max-width:10rem"> <br>
                @endif
                <h3 class="text-xl font-bold text-[#3e693e]">{{ $modalData->titulo }}</h3>
                </div>
            </div>

            <div class="p-4 text-[#3e693e]">
                <p><strong>Descrição:</strong> {{ $modalData->descricao }}</p>
                <p><strong>Ingredientes:</strong></p>
                <ul class="list-disc">
                    @foreach ($ingredientes as $ingrediente)
                    <li class="ml-5">{{ $ingrediente }}</li>
                    @endforeach
                </ul>
                <p><strong>Modo de Preparo:</strong> {{ $modalData->modo_preparo }}</p>
                <p><strong>Tempo de Preparo:</strong> {{ $modalData->rendimento }} minutos</p>
                <p><strong>Rendimento:</strong> {{ $modalData->rendimento }}</p>
                <p><strong>Categoria:</strong> {{ $modalData->categoria }}</p>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end border-t p-2">
                <x-back-link href="{{ route('receitas.index') }}" class="mr-2">
                    Fechar
                </x-back-link>
            </div>
        </div>
    </div>
@endisset
</x-app-layout>

