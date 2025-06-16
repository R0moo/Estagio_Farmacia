        <x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="p-6 text-[#3e693e]  flex flex-row flex-wrap">
    
            @foreach ($cursos as $curso)
    <a href="{{ route('projetos.cursos.show', ['projeto' => $curso->projeto_id, 'curso' => $curso->id]) }}">
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
</x-app-layout>