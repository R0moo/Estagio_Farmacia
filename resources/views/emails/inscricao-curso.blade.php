<!DOCTYPE html>
<html>
<head>
    <title>Solicitação de Inscrição</title>
</head>
<body>
    <h1>Nova Solicitação de Inscrição - {{ $dados['curso_nome'] }}</h1>
    
    <p><strong>Nome:</strong> {{ $dados['nome'] }}</p>
    <p><strong>E-mail:</strong> {{ $dados['email'] }}</p>
    <p><strong>CPF:</strong> {{ $dados['cpf'] }}</p>
    <p><strong>Ocupação:</strong> {{ $dados['ocupacao'] }}</p>
</body>
</html>