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
        <a href="{{ route('receitas.show', $receita) }}">
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
</x-app-layout>

