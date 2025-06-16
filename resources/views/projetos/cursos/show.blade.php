        <x-app-layout>


<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-[#5A8457]">
            <div class="p-6 text-[#5A8457]">
                <p>{{ $curso->resumo }}</p>
                <hr class="text-[#5A8457]">
                <p>Vagas: {{ $curso->vagas }}</p>
                <p>Data de Início: {{ \Carbon\Carbon::parse($curso->data_inicio)->format('d/m/Y') }}</p>
                <p>Data de Finalização: {{ \Carbon\Carbon::parse($curso->data_fim)->format('d/m/Y') }}</p>                
            </div>
            
            <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-[#5A8457] leading-tight">Estudantes</h2> <br>
                    @auth
                    @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                    <x-primary-link href="{{route('projetos.cursos.estudantes.create', ['projeto' => $curso->projeto_id, 'curso' => $curso->id])}}">Adicionar Estudante</x-primary-link>
                    @endif
                    @endauth
            <div class="p-6 max-w-sm flex flex-row text-center items-center ">
                @foreach ($curso->estudantes as $estudante)
                    <x-card titulo="{{ $estudante->nome }}" imagem="{{ null }}" width="280px">
                    </a> 
                     @auth
                    @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                        <x-slot name="acoes">
                            <form action="{{ route('projetos.cursos.estudantes.destroy', [$curso->projeto, $curso, $estudante]) }}" method="POST" style="display:inline;">
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
        </div>
</x-app-layout>
