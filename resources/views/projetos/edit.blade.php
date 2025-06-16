
        <x-app-layout>
                <div class="p-6 text-[#5A8457]">
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
    <div class="py-12">
        <div class="max-w-7xl w-fit mx-auto sm:px-6 lg:px-8 items-center flex">
            <div class="overflow-hidden shadow-sm sm:rounded-lg w-min flex items-center justify-center">
                <div class="p-6 text-gray-900 max-w-sm m-2 flex flex-row">
        <form class="flex flex-col"action="{{ route('projetos.update', $projeto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-input-label for="titulo">Título:</x-input-label>
        <x-text-input type="text" name="titulo" value="{{ $projeto->titulo }}" required/>

        <x-input-label for="descricao">Descrição:</x-input-label>
        <x-textarea name="descricao" required>{{ $projeto->descricao }}</x-textarea>

        <x-input-label for="capa">Capa:</x-input-label>
        <x-text-input type="file" name="capa" value="{{ $projeto->capa }}" />

        <x-input-label for="cor1">Cor Primária:</x-input-label>
        <x-text-input type="color" name="cor1" value="{{ $projeto->cor1 }}" required/>

        <x-input-label for="cor2">Cor Secundária:</x-input-label>
        <x-text-input type="color" name="cor2" value="{{ $projeto->cor2 }}" required/>

        <div class="div">
        <x-back-link href="{{route('projetos.index')}}">Voltar</x-back-link>
        <x-primary-button type="submit">Atualizar</x-primary-button>
        </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>