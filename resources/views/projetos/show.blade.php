        <x-app-layout>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-[#5A8457]">
            <div class="p-6">
                <p>{{ $projeto->descricao }}</p>
            </div>
            <hr class="w-3/4 justify-self-center text-[#5A8457]">
            <div class="p-6 text-gray-900 dark:text-gray-100">      
                <h2 class="font-semibold text-xl text-[#5A8457] leading-tight">Postagens</h2> <br>
                @auth
                @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                <x-primary-link href="{{route('projetos.postagens.create', ['projeto' => $projeto->id])}}">Criar Postagem</x-primary-link>
                @endif
                @endauth
            </div> 
            <div class="p-6 max-w-max flex flex-row text-center items-center ">
                @foreach($projeto->postagens as $postagem)
                    <a href="{{ route('projetos.postagens.show', [$projeto, $postagem]) }}">
                        <x-card titulo="{{ $postagem->titulo }}" imagem="{{ $postagem->foto ? asset('storage/' . $postagem->foto) : null }}" width="280px">
                    </a>
                    @auth
                    @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                        <x-slot name="acoes">
                            <x-edit-link href="{{ route('projetos.postagens.edit', [$projeto, $postagem]) }}">Editar</x-edit-link>
                            <form action="{{ route('projetos.postagens.destroy', [$projeto, $postagem]) }}" method="POST" style="display:inline;">
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
        <hr class="w-3/4 justify-self-center"> <br>
            <div class="p-6">
            <h2 class="font-semibold text-xl text-[#5A8457] leading-tight">Cursos</h2> <br>
                    @auth
                    @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                    <x-primary-link href="{{route('projetos.cursos.create', ['projeto' => $projeto->id])}}">Criar Curso</x-primary-link>
                    @endif
                    @endauth
            </div>
            <div class="p-6 max-w-max flex flex-row text-center items-center ">
                @foreach ($projeto->cursos as $curso)
                <a href="{{ route('projetos.cursos.show', [$projeto, $curso]) }}">
            <x-card titulo="{{ $curso->titulo }}" imagem="{{ $curso->imagem ? asset('storage/' . $curso->imagem) : null }}" width="280px">
                </a>
                 @auth
                @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                <x-slot name="acoes">
                    <x-edit-link href="{{ route('projetos.cursos.edit', [$projeto, $curso]) }}">Editar</x-edit-link>
                    <form action="{{ route('projetos.cursos.destroy', [$projeto, $curso]) }}" method="POST" style="display:inline;">
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
