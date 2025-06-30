<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6">Detalhes da Solicitação</h1>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold">{{ $solicitacao->curso->titulo }}</h2>
                        <p class="text-gray-600">Solicitado em: {{ $solicitacao->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <h3 class="font-medium">Informações do Candidato</h3>
                            <p><strong>Nome:</strong> {{ $solicitacao->nome }}</p>
                            <p><strong>Email:</strong> {{ $solicitacao->email }}</p>
                            <p><strong>CPF:</strong> {{ $solicitacao->cpf }}</p>
                            <p><strong>Ocupação:</strong> {{ $solicitacao->ocupacao }}</p>
                        </div>
                    </div>
                    
                    <div class="flex space-x-4">
                        <form method="POST" action="{{ route('admin.solicitacoes.aprovar', $solicitacao) }}">
                            @csrf
                            <x-primary-button type="submit" class="bg-green-600">
                                Aprovar Inscrição
                            </x-primary-button>
                        </form>
                        
                        <form method="POST" action="{{ route('admin.solicitacoes.rejeitar', $solicitacao) }}">
                            @csrf
                            <x-primary-button type="submit" class="bg-red-600">
                                Rejeitar Inscrição
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>