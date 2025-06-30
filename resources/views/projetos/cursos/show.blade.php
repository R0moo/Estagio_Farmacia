<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-[#5A8457] text-wrap flex-wrap">
            <div class="p-6 text-[#5A8457] text-wrap flex-wrap max-w-7xl">
                <span class="break-all">{{ $curso->resumo }}</span>
                <hr class="text-[#5A8457]">
                <p>Vagas: {{ $curso->vagas }}</p>
                <p>Data de Início: {{ \Carbon\Carbon::parse($curso->data_inicio)->format('d/m/Y') }}</p>
                <p>Data de Finalização: {{ \Carbon\Carbon::parse($curso->data_fim)->format('d/m/Y') }}</p>
                <hr class="mt-4px"> <br>
            <h3 class="text-xl font-semibold mb-4">Materiais do Curso</h3>
    
    @if($materiais->isNotEmpty())
        <ul class="divide-y divide-gray-200">
            @foreach($materiais as $material)
                <li class="py-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <span class="material-icon mr-3">
                            📄
                        </span>
                        <a href="{{ Storage::url($material->caminho_arquivo) }}" 
                           download="{{ $material->nome }}"
                           class="text-blue-600 hover:text-blue-800">
                            {{ $material->nome }}
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
        @endif
            
        @if(auth()->check() && auth()->user()->isAdmin())
        <br>
            <div class="adicionar-material mb-8">
                <h3 class="text-lg font-medium mb-2">Adicionar Novo Material</h3>
                
                <form action="{{ route('cursos.materiais.store', ['projeto' => $projeto, 'curso' => $curso]) }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    
                    <div>
                        <x-input-label for="novo_material">Arquivo do Material *</x-input-label>
                        <x-file-input type="file" name="novo_material" required />
                        <x-input-error :messages="$errors->get('novo_material')" class="mt-2" />
                        <p class="mt-1 text-sm text-gray-500">Formatos: PDF, DOC, DOCX, PPT, XLS (Max: 10MB)</p>
                    </div>
                    
                    <x-primary-button type="submit">
                        Adicionar Material
                    </x-primary-button>
                </form>
            </div>
        @endif

                @if (\Carbon\Carbon::parse($curso->data_fim) <= \Carbon\Carbon::now())
                    <x-back-link href="{{ route('cursos.avaliacoes.create', $curso) }}"> Avaliar Curso </x-back-link>
                    @auth
                        @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                            <x-back-link href="{{ route('avaliacoes.index') }}">Avaliações</x-back-link>
                        @endif
                    @endauth
                @endif
            </div>
            
            <div class="p-6 text-gray-900">
                <h2 class="font-semibold text-xl text-[#5A8457] leading-tight">Estudantes</h2> <br>
                @auth
                    @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                        <x-primary-link href="{{ route('projetos.cursos.estudantes.create', ['projeto' => $curso->projeto_id, 'curso' => $curso->id]) }}">Adicionar Estudante</x-primary-link>
                    @endif
                    @if (Auth::user()->isAdmin())
                    <x-primary-link href="{{route('admin.solicitacoes')}}">Solicitações de Inscrição</x-primary-link>
                    @endif
                @endauth
                <div class="p-6 max-w-sm flex flex-row text-center items-center">
                    @foreach ($curso->estudantes as $estudante)
                        <x-card titulo="{{ $estudante->nome }}" imagem="{{ null }}" width="280px">
                            @auth
                                @if (Auth::user()->isAdmin() || Auth::user()->isModerator())
                                    <x-slot name="acoes">
                                        <form action="{{ route('projetos.cursos.estudantes.destroy', [$curso->projeto, $curso, $estudante]) }}" method="POST" style="display:inline;">
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
    </div>
</x-app-layout>
