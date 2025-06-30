<x-app-layout>
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Erro!</strong>
            <span class="block sm:inline">Por favor, corrija os campos abaixo:</span>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class=" w-max mx-auto sm:px-6 lg:px-8 items-center flex">
            <div class="overflow-hidden shadow-sm sm:rounded-lg w-max flex flex-col items-center justify-center">
                <div class="p-6 text-gray-900 m-2 flex flex-col">
                    <form action="{{ route('projetos.cursos.store', $projeto->id) }}" method="POST" enctype="multipart/form-data" class="w-full">
                        @csrf
                        <input type="hidden" name="projeto_id" value="{{ $projeto->id }}">

                                <div>
                                    <x-input-label for="titulo">Título</x-input-label>
                                    <x-text-input type="text" name="titulo" value="{{ old('titulo') }}" class="w-full" required/>
                                </div>

                                <div>
                                    <x-input-label for="resumo">Resumo</x-input-label>
                                    <x-textarea name="resumo" class="w-full" required>{{ old('resumo') }}</x-textarea>
                                </div>

                                <div>
                                    <x-input-label for="vagas">Vagas</x-input-label>
                                    <x-text-input type="number" name="vagas" value="{{ old('vagas') }}" class="w-full" required/>
                                </div>

                                <div>
                                    <x-input-label for="carga_horaria">Carga Horária (em horas)</x-input-label>
                                    <x-text-input type="number" name="carga_horaria" value="{{ old('carga_horaria') }}" class="w-full" required/>
                                </div>


                                <div>
                                    <x-input-label for="data_inicio">Data de Início</x-input-label>
                                    <x-text-input type="date" name="data_inicio" value="{{ old('data_inicio') }}" class="w-full" required/>
                                </div>

                                <div>
                                    <x-input-label for="data_fim">Data de Fim</x-input-label>
                                    <x-text-input type="date" name="data_fim" value="{{ old('data_fim') }}" class="w-full" required/>
                                </div>

                                <div>
                                    <x-input-label for="imagem">Imagem do Curso</x-input-label>
                                    <x-file-input type="file" name="imagem" class="w-full" />
                                    <p class="mt-1 text-sm text-gray-500">Formatos: JPEG, PNG, JPG, GIF (Max: 2MB)</p>
                                </div>

                                <div>
                                    <x-input-label for="materiais">Materiais do Curso</x-input-label>
                                    <x-file-input type="file" name="materiais[]" class="w-full" multiple />
                                    <p class="mt-1 text-sm text-gray-500">Formatos: PDF, DOC, DOCX (Max: 10MB cada)</p>
                                    <div id="material-preview" class="mt-2 space-y-1 hidden">
                                        
                                    </div>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-between items-center">
                            <x-back-link href="{{ route('projetos.show', $projeto->id) }}">Voltar</x-back-link>
                            <x-primary-button type="submit" class="ml-4">Cadastrar Curso</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.querySelector('input[name="materiais[]"]').addEventListener('change', function(e) {
            const previewContainer = document.getElementById('material-preview');
            previewContainer.innerHTML = '';
            
            if (this.files.length > 0) {
                previewContainer.classList.remove('hidden');
                const title = document.createElement('p');
                title.textContent = `Arquivos selecionados (${this.files.length}):`;
                title.className = 'text-sm font-medium text-gray-700';
                previewContainer.appendChild(title);
                
                for (let i = 0; i < this.files.length; i++) {
                    const fileItem = document.createElement('p');
                    fileItem.textContent = `• ${this.files[i].name}`;
                    fileItem.className = 'text-sm text-gray-600 ml-2';
                    previewContainer.appendChild(fileItem);
                }
            } else {
                previewContainer.classList.add('hidden');
            }
        });
    </script>
    @endpush
</x-app-layout>