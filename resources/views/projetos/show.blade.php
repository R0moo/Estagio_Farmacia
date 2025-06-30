        <x-app-layout>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-[#5A8457]">
            <div class="p-6">
                <p class="break-all">{{ $projeto->descricao }}</p>
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
                    <a href="{{ route('projetos.postagens.index', [$projeto, 'show_modal' => 1, 'postagem_id' => $postagem->id]) }}">
                        <x-card titulo="{{ $postagem->titulo }}" imagem="{{ $postagem->foto ? asset('storage/' . $postagem->foto) : null }}" width="280px">
                    </a>
                    @auth
                    @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                        <x-slot name="acoes">
                            <x-edit-link href="{{ route('projetos.postagens.edit', [$projeto, $postagem]) }}">Editar</x-edit-link>
                            <form action="{{ route('projetos.postagens.destroy', [$projeto, $postagem]) }}" method="POST" style="display:inline;">
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
                @auth
        @if (Auth::user()->isAdmin() || Auth::user()->isModerator() || Auth::user()->isStudent() && Auth::user()->curso_id == $curso->id)
            <a href="{{ route('projetos.cursos.show', [$projeto, $curso]) }}">
                
        @else
            <a href="{{route('cursos.index', ['show_modal' => 1, 'curso_id' => $curso->id])}}">
        @endif
            @endauth
            <x-card titulo="{{ $curso->titulo }}" imagem="{{ $curso->imagem ? asset('storage/' . $curso->imagem) : null }}" width="280px">
                </a>
                 @auth
                @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                <x-slot name="acoes">
                    <x-edit-link href="{{ route('projetos.cursos.edit', [$projeto, $curso]) }}">Editar</x-edit-link>
                    <form action="{{ route('projetos.cursos.destroy', [$projeto, $curso]) }}" method="POST" style="display:inline;">
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
    <div class="fixed inset-0 bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-min mx-4">

            <div class="flex justify-center items-center border-b p-2">
                <div class="flex flex-col items-center">
                    @if ($postagem->foto)
                <img src="{{ asset('storage/' . $modalData->foto) }}" alt="postagem" style="max-width:20rem"> <br>
                @endif
                <h3 class="text-xl font-bold text-[#3e693e]">{{ $modalData->titulo }}</h3>
                </div>
            </div>

            <div class="p-4 text-[#3e693e]">
                <p><strong>Descrição:</strong> {{ $modalData->descricao }}</p>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end border-t p-2">
                <x-back-link href="{{ route('projetos.show', $projeto) }}" class="mr-2">
                    Fechar
                </x-back-link>
            </div>
        </div>
    </div>
@endisset
</x-app-layout>
