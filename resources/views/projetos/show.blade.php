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
            <div class="p-6 max-w-max flex flex-row text-center items-center flex-wrap">
                @foreach($projeto->postagens as $postagem)
                    <a href="{{ route('projetos.postagens.index', [$projeto, 'show_modal' => 1, 'postagem_id' => $postagem->id]) }}">
                        <x-card class="max-h-30" imagem="{{ $postagem->imagens->first() ? asset('storage/' . $postagem->imagens->first()->caminho) : null }}" width="250px">
                        <x-slot name="titulo">
                                {{ $postagem->titulo }}         
                        </x-slot>
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
                 @if(auth()->check()) 
                    @if(auth()->user()->canAccessCourse($curso->id))
                        <a href="{{ route('projetos.cursos.show', [$curso->projeto_id, $curso]) }}"> 
                    @else
                        <a href="{{route('cursos.index', ['show_modal' => 1, 'curso_id' => $curso->id])}}">
                    @endif
                @else
                    <a href="{{ route('cursos.index', ['show_modal' => 1, 'curso_id' => $curso->id]) }}">
                @endif
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
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 overflow-y-auto">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl mx-4 max-h-[90vh] flex flex-col" x-data="{ currentIndex: 0 }">

            <!-- Título e imagens -->
            <div class="flex justify-center items-center border-b p-2">
                <div class="flex flex-col items-center w-full">
                    @if ($modalData->imagens->count())
                        <div class="relative w-full">
                            <div class="overflow-hidden rounded-md">
                                <template x-for="(imagem, index) in {{ $modalData->imagens }}" :key="index">
                                    <div x-show="currentIndex === index" class="transition-all duration-500 ease-in-out">
                                        <img :src="'/storage/' + imagem.caminho" class="w-full max-h-96 object-contain rounded-t-md">
                                    </div>
                                </template>
                            </div>

                            <!-- Botões anteriores e próximos -->
                            <div class="absolute inset-0 flex items-center justify-between px-4">
                                <button type="button"
                                    @click="currentIndex = currentIndex === 0 ? {{ $modalData->imagens->count() - 1 }} : currentIndex - 1"
                                    class="bg-gray-700 bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
                                    ‹
                                </button>
                                <button type="button"
                                    @click="currentIndex = currentIndex === {{ $modalData->imagens->count() - 1 }} ? 0 : currentIndex + 1"
                                    class="bg-gray-700 bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
                                    ›
                                </button>
                            </div>
                        </div>

                        <!-- Indicadores -->
                        <div class="flex justify-center mt-2 space-x-2">
                            <template x-for="(imagem, index) in {{ $modalData->imagens }}" :key="index">
                                <button @click="currentIndex = index"
                                    :class="currentIndex === index ? 'bg-green-600' : 'bg-gray-400'"
                                    class="w-3 h-3 rounded-full"></button>
                            </template>
                        </div>
                    @endif

                    <h3 class="text-xl font-bold text-[#3e693e] mt-4 text-center">{{ $modalData->titulo }}</h3>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="p-4 text-[#3e693e] overflow-y-auto">
                <p class="break-words"><strong>Descrição:</strong> {{ $modalData->descricao }}</p>
            </div>

            <!-- Rodapé -->
            <div class="flex justify-end border-t p-2">
                <x-back-link href="{{ route('projetos.show', $modalData->projeto_id) }}" class="mr-2">
                    Fechar
                </x-back-link>
            </div>
        </div>
    </div>
@endisset


</x-app-layout>
