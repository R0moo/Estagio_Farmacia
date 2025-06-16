@props([
    'titulo' => '',
    'imagem' => null,
    'href' => null,
    'acoes' => null,
    'width' => '280px',
    'maxWidth' => '350px'
])

<div {{ $attributes->merge([
    'class' => 'card mb-2.5'
]) }} style="width: {{ $width }}; max-width: {{ $maxWidth }};">
    @if($imagem)
        <img src="{{ $imagem }}" alt="{{ $titulo }}">
    @endif
    
    @if($titulo)
        <h3 class="card-verde">{{ $titulo }}</h3>
    @endif
    
    {{ $slot }}
    
    @if($acoes)
        <div class="acoes">
            {{ $acoes }}
        </div>
    @endif
</div>

<style>
.card {
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 15px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    padding: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: default;
    margin-right: 10px;
}

.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
}

.card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 15px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.card > h3 {
    font-family: "Poetsen One", cursive;
    font-size: 26px;
    color: #5A8457;
    margin-bottom: 10px;
    text-align: center;
}

.card p {
    font-family: "Josefin Sans", sans-serif;
    font-size: 14px;
    color: #3e693e;
    text-align: justify;
    margin-bottom: 12px;
}

.card .acoes {
    margin-top: auto;
    display: flex;
    gap: 12px;
    justify-content: center;
}
</style>