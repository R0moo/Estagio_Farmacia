<x-app-layout>
    <div class="py-12">
        <div class=" w-fit mx-auto sm:px-6 lg:px-8 items-center flex">
            <div class="overflow-hidden shadow-sm sm:rounded-lg w-max flex items-center justify-center">
              <div class="p-6 text-gray-900 m-2 flex flex-col">
    <h1 class="mb-4">Avaliações por Curso</h1>
    
    <div class="row">
        @foreach($cursosComAvaliacoes as $curso)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $curso->titulo }}</h5>
                    <p class="text-muted">
                        {{ $curso->avaliacoes_count }} avaliação(ões)
                    </p>
                </div>
                <div class="card-footer bg-transparent">
                    <a href="{{ route('avaliacoes.show', $curso->id) }}" 
                       class="btn btn-primary btn-sm">
                        Ver Estatísticas
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div></div></div>
</x-app-layout>