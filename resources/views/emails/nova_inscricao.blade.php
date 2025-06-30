<h1>Nova Solicitação de Inscrição Recebida</h1>
<p>Você recebeu uma nova solicitação para o curso: {{ $curso->titulo }}</p>
<p>Acesse o painel administrativo para revisar:</p>
<a href="{{ route('admin.solicitacoes') }}">Painel de Solicitações</a>