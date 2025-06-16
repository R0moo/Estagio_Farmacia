    <x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-[#5A8457]">

                @auth
                @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                <div class="p-6">
                    <x-primary-link href="{{ route('projetos.create') }}">Criar novo projeto</x-primary-link>
                </div>
                @endif
                @endauth
                <div class="p-6 flex flex-row w-fit">
     @foreach ($projetos as $projeto)
     <a href="{{ route('projetos.show', $projeto) }}">
    <x-card 
    titulo="{{ $projeto->titulo }}"
    imagem="{{ $projeto->capa ? asset('storage/' . $projeto->capa) : null }}"
    width="280px"
    ></a>

    @auth
    @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
    <x-slot name="acoes">
        <x-edit-link href="{{ route('projetos.edit', $projeto) }}">Editar</x-edit-link>
        <form action="{{ route('projetos.destroy', $projeto->id) }}" method="POST" style="display:inline;">
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