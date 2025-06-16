<h1>{{ $receita->titulo }}</h1>

<p><strong>Descrição:</strong> {{ $receita->descricao }}</p>

<p><strong>Ingredientes:</strong></p>
<ul>
    @foreach ($ingredientesArray as $ingrediente)
        <li>{{ $ingrediente }}</li>
    @endforeach
</ul>

<p><strong>Modo de Preparo:</strong> {{ $receita->modo_preparo }}</p>
<p><strong>Tempo de Preparo:</strong> {{ $receita->tempo_preparo }} min</p>
<p><strong>Rendimento:</strong> {{ $receita->rendimento }}</p>
<p><strong>Categoria:</strong> {{ $receita->categoria }}</p>

@if ($receita->imagem)
    <img src="{{ asset('storage/' . $receita->imagem) }}" alt="Imagem da Receita" style="max-width: 300px;">
@endif
