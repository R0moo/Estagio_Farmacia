<x-app-layout>
<div class="py-12">
        <div class=" w-fit mx-auto sm:px-6 lg:px-8 items-center flex">
            <div class="overflow-hidden shadow-sm sm:rounded-lg w-max flex items-center justify-center">
              <div class="p-6 text-gray-900 m-2 flex flex-col">
    <h1 class="mb-6 text-xl">Avaliação do Curso: {{ $curso->titulo }}</h1>
    
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('cursos.avaliacoes.store', $curso) }}" method="POST">
        @csrf

    <input type="hidden" name="curso_id" value="{{ $curso->id }}">

        <div class="card mb-4">
            <div class="card-body">
                @php $ccQuestions = [
                    'Eu sinto confiança no(a) instrutor(a) que ministrou o curso',
                    'Eu acredito no conhecimento e na expertise do(a) instrutor(a)',
                    'Eu recomendaria este(a) instrutor(a) para colegas e amigos',
                    'Eu seguirei as orientações e recomendações passadas pelo(a) instrutor(a)',
                    'O(A) instrutor(a) forneceu informações úteis e relevantes para minha formação',
                    'O(A) instrutor(a) demonstrou estar atualizado(a) com as práticas e conhecimentos da área',
                    'Eu gostaria que este(a) instrutor(a) ministrasse outros cursos que eu venha a fazer',
                    'Caso alguém me pedisse uma opinião sobre este(a) instrutor(a), minha avaliação seria positiva',
                    'O(A) instrutor(a) foi cuidadoso(a) e detalhista em suas explicações',
                    'O(A) instrutor(a) e a equipe do curso trabalharam de forma colaborativa e eficiente',
                    'O(A) instrutor(a) dedicou tempo suficiente para tirar dúvidas e auxiliar os alunos',
                    'O(A) instrutor(a) demonstrou confiança na minha capacidade de aplicar os conhecimentos adquiridos',
                    'O(A) instrutor(a) foi atencioso(a) e demonstrou preocupação com o aprendizado dos alunos'
                ]; 
                $opcoesAvaliacao = [
                    1 => 'Discordo Completamente',
                    2 => 'Discordo',
                    3 => 'Neutro',
                    4 => 'Concordo',
                    5 => 'Concordo Completamente'
                ];
                @endphp

                <h2 class="mb-4 font-bold text-[#5A8457]">Confiança e Credibilidade no Curso e Instrutores</h2>
                @foreach($ccQuestions as $i => $question)
                <div class="mb-6 text-sm">
                    <label class="form-label font-bold">{{ $i+1 }}. {{ $question }}</label>
                    <div class="btn-group btn-group-toggle w-100 mt-2 flex" data-toggle="buttons">
                        @foreach($opcoesAvaliacao as $value => $text)
                        <x-radius-label class="btn btn-outline-primary mr-4" title="{{ $text }}">
                            <x-radio-input type="radio" name="cc_{{ $i+1 }}" value="{{ $value }}" required/> 
                            <span class="sm:hidden">{{ $value }}</span>
                            <span class="hidden sm:inline">{{ $text }}</span>
                        </x-radius-label>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                @php $rcQuestions = [
                    'O(A) instrutor(a) foi amigável e acolhedor(a) durante o curso',
                    'O(A) instrutor(a) demonstrou respeito pelos alunos e suas opiniões',
                    'O(A) instrutor(a) foi paciente ao responder minhas perguntas e esclarecer minhas dúvidas',
                    'O(A) instrutor(a) prestou atenção nas minhas contribuições e questionamentos',
                    'O(A) instrutor(a) incentivou a participação e a interação durante as aulas',
                    'O(A) instrutor(a) explicou os conceitos de forma clara e compreensível',
                    'O(A) instrutor(a) me ajudou a entender os tópicos mais complexos do curso'
                ]; @endphp

                <h2 class="mb-4 font-bold text-[#5A8457]">Relacionamento Interpessoal e Comunicação com os Instrutores</h2>
                @foreach($rcQuestions as $i => $question)
                <div class="mb-6 text-sm">
                    <label class="form-label font-bold">{{ $i+1 }}. {{ $question }}</label>
                    <div class="btn-group btn-group-toggle w-100 mt-2 flex" data-toggle="buttons">
                        @foreach($opcoesAvaliacao as $value => $text)
                        <x-radius-label class="btn btn-outline-success mr-4" title="{{ $text }}">
                            <x-radio-input type="radio" name="rc_{{ $i+1 }}" value="{{ $value }}" required/> 
                            <span class="sm:hidden">{{ $value }}</span>
                            <span class="hidden sm:inline">{{ $text }}</span>
                        </x-radius-label>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Seção 3: Avaliação Geral -->
        <div class="card mb-4">
            <div class="card-body">
                @php $agQuestions = [
                    'Eu recomendaria este curso para colegas e amigos',
                    'Eu certamente participaria de outros cursos oferecidos por esta instituição',
                    'Mesmo que houvesse outras opções de cursos na área, eu escolheria este novamente',
                    'Considero este curso melhor do que outros que já fiz na mesma área',
                    'Sinto-me leal a esta instituição de ensino após a experiência neste curso',
                    'Quando me perguntam sobre cursos na área, sempre indico este',
                    'Confio na qualidade do ensino e dos recursos oferecidos por esta instituição'
                ]; @endphp

                <h2 class="mb-4 font-bold text-[#5A8457]">Avaliação Geral do Curso</h2>
                @foreach($agQuestions as $i => $question)
                <div class="text-sm mb-6">
                    <label class="form-label font-bold">{{ $i+1 }}. {{ $question }}</label>
                    <div class="btn-group btn-group-toggle w-100 mt-2 flex" data-toggle="buttons">
                        @foreach($opcoesAvaliacao as $value => $text)
                        <x-radius-label title="{{ $text }}">
                            <x-radio-input name="ag_{{ $i+1 }}" value="{{ $value }}" required/> 
                            <span class="sm:hidden align-middle text-center">{{ $value }}</span>
                            <span class="hidden sm:inline text-sm align-middle mt-1">{{ $text }}</span>
                        </x-radius-label>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Comentários Adicionais -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="form-group text-sm">
                    <h2 class="mb-4 font-bold text-[#5A8457]">Comentários Gerais</h2>
                    <label for="comentario">Deixe seu comentário ou sugestão de melhoria:</label> <br>
                    <textarea name="comentario" id="comentario" class="form-control" rows="4"></textarea>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <x-primary-button type="submit" class="btn btn-primary btn-lg">Enviar Avaliação</x-primary-button>
            <x-back-link href="{{ route('cursos.index') }}" class="btn btn-outline-secondary">Cancelar</x-back-link>
        </div>
    </form>
</div>

<script>
    document.querySelectorAll('.btn-group-toggle .btn').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.btn-group').querySelectorAll('.btn').forEach(b => {
                b.classList.remove('active');
            });
            this.classList.add('active');
        });
    });
</script>
</x-app-layout>