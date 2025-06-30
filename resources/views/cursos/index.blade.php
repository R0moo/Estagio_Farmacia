        <x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="p-6 text-[#3e693e]  flex flex-row flex-wrap">
    
            @foreach ($cursos as $curso) 
       @if(auth()->check()) 
            @if(auth()->user()->canAccessCourse($curso->id))
                <a href="{{ route('projetos.cursos.show', [$curso->projeto_id, $curso]) }}">
            @else
                <a href="{{ route('cursos.index', ['show_modal' => 1, 'curso_id' => $curso->id]) }}">
            @endif
            @else
            <a href="{{ route('cursos.index', ['show_modal' => 1, 'curso_id' => $curso->id]) }}">
        @endif
        <x-card titulo="{{ $curso->titulo }}" imagem="{{ $curso->imagem ? asset('storage/' . $curso->imagem) : null }}" width="280px">   
    
    <p>
        <strong>Data de Início:</strong> 
        {{ \Carbon\Carbon::parse($curso->data_inicio)->format('d/m/Y') }}
    </p>
    
    <p>
        <strong>Data de Finalização:</strong> 
        {{ \Carbon\Carbon::parse($curso->data_fim)->format('d/m/Y') }}
    </p>
    
    <p><strong>Vagas:</strong> {{ $curso->vagas }}</p>

    <p><strong>Carga horária: </strong>{{ $curso->carga_horaria }} horas</p>
    


        </a>

</x-card>
    @endforeach
                </div>
            </div>
    </div>
    
@isset($modalData)
    <!-- Overlay (fundo escuro) -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 overflow-y-auto">
        <!-- Modal Container -->
        <div class="bg-white rounded-lg shadow-xl w-full max-w-3xl mx-4 max-h-[90vh] flex flex-col">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b p-4 sticky top-0 bg-white z-10">
                <h3 class="text-xl font-bold text-[#3e693e]">{{ $modalData->titulo }}</h3>
                <a href="{{ route('cursos.index') }}" class="text-[#3e693e] hover:text-[#2a4a2a] text-2xl font-bold">
                    &times;
                </a>
            </div>

            <!-- Conteúdo Rolável -->
            <div class="p-6 text-[#3e693e] overflow-y-auto">
                <div class="space-y-4">
                    <div>
                        <p class="font-semibold">Resumo:</p>
                        <p class="mt-1 break-all">{{ $modalData->resumo }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="font-semibold">Carga horária:</p>
                            <p>{{ $modalData->carga_horaria }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Vagas:</p>
                            <p>{{ $modalData->vagas }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Data de início:</p>
                            <p>{{ \Carbon\Carbon::parse($modalData->data_inicio)->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="font-semibold">Data de finalização:</p>
                            <p>{{ \Carbon\Carbon::parse($modalData->data_fim)->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-between border-t p-4 sticky bottom-0 bg-white">
                <x-back-link href="{{ route('cursos.index') }}" class="mr-2">
                    Fechar
                </x-back-link>
                <x-back-link href="{{ route('cursos.inscrever', $modalData->id) }}" 
                            class="px-4 py-2 bg-[#3e693e] text-white hover:bg-[#2a4a2a]">
                    Inscrever-se
                </x-back-link>
            </div>
        </div>
    </div>
@endisset

</x-app-layout>

