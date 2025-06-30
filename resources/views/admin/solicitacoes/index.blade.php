<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6">Solicitações Pendentes</h1>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border border-gray-200">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Nome</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center border-t">
                            @foreach($solicitacoes as $solicitacao)
                            <tr class="text-center">
                                <td>{{ $solicitacao->curso->titulo }}</td>
                                <td>{{ $solicitacao->nome }}</td>
                                <td>{{ $solicitacao->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.solicitacoes.show', $solicitacao) }}" 
                                       class="text-blue-600 hover:text-blue-800 text-center">
                                        Ver Detalhes
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>