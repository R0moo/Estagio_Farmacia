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
                    <x-delete-button type="submit" onclick="return confirm('Deseja excluir mesmo?')">
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
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 overflow-y-auto">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-3xl mx-4 max-h-[90vh] flex flex-col">
            <!-- Modal Header -->
            <div class="flex justify-center items-center border-b p-4">
                <div class="flex flex-col items-center">
                    @if ($receita->imagem)
                        <img src="{{ asset('storage/' . $modalData->imagem) }}" alt="Receita" class="max-w-[10rem] max-h-[10rem] object-contain mb-2">
                    @endif
                    <h3 class="text-xl font-bold text-[#3e693e]">{{ $modalData->titulo }}</h3>
                </div>
            </div>

            <!-- Modal Content - Área rolável -->
            <div class="p-4 text-[#3e693e] overflow-y-auto">
                <p class="mb-3"><strong>Descrição:</strong> {{ $modalData->descricao }}</p>
                
                <p class="mb-1"><strong>Ingredientes:</strong></p>
                <ul class="list-disc mb-3 pl-5">
                    @foreach ($ingredientes as $ingrediente)
                        <li>{{ $ingrediente }}</li>
                    @endforeach
                </ul>
                
                <p class="mb-3"><strong>Modo de Preparo:</strong> {{ $modalData->modo_preparo }}</p>
                
                <div class="grid grid-cols-2 gap-4 mb-3">
                    <p><strong>Tempo de Preparo:</strong> {{ $modalData->tempo_preparo }} minutos</p>
                    <p><strong>Rendimento:</strong> {{ $modalData->rendimento }}</p>
                </div>
                
                <p><strong>Categoria:</strong> {{ $modalData->categoria }}</p>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end border-t p-4 mt-auto">
                <x-back-link href="{{ route('receitas.index') }}" class="mr-2">
                    Fechar
                </x-back-link>
            </div>
        </div>
    </div>
@endisset
</x-app-layout>

