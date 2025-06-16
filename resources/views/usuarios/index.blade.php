    <x-app-layout>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-primary-link href="{{ route('usuarios.create') }}">Cadastrar Novo Usuário</x-primary-link>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-row flex-wrap">

                @foreach ($users as $user)
                <a href="{{ route('usuarios.show', $user) }}">
                <x-card 
                titulo="{{ $user->name }}"
                imagem="{{ $user->capa ? asset('storage/' . $user->capa) : null }}"
                width="280px"
                ></a>
                <p>{{ $user->email }}</p>
                <p>{{ $user->nivel }}</p>
                <x-slot name="acoes">

                    <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <x-delete-button type="submit" onclick="confirm('Deseja excluir mesmo?')">
                            Excluir
                        </x-delete-button>
                    </form>
                </x-slot>
            </x-card>

            @endforeach
                    
                </div>
            </div>
        </div>

</x-app-layout>




                
      