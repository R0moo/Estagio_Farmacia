<!DOCTYPE html>
<html lang="pt-br">
<head class="header">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login - Farmácia Verde</title>
    <link rel="stylesheet" href="estil.css">

    <div class="farmaciaVerde_titulo">
        <h1 class="branco">Farmácia</h1>
        <h1 class="verde"> Verde</h1>
    </div>

    <h4 class="header_description">Políticas em saúde</h4>

</head>

<script src="script.js"></script>
<body class="login_body">
    <div class="container_login">
    <h1 class="Logar">Logar</h1>
    <form action="fazerLogin.php" method="post">
        <label class="label_usuario" for="login">Usuário</label>
        <input type="text" name="login" placeholder="Insira seu usuário aqui">
        <br>
        <label class="label_senha" for="senha">Senha</label>
        <input type="password" name="senha" placeholder="Insira sua senha aqui">
        <a class="recupera_Senha" href="recuperaSenha.php">Esqueceu sua senha? Clique aqui.</a>
        <br>
        <button class="btn_Login" type="submit">Entrar</button>
        <br>
        <br>
        <a class="solicita_Acesso" href="solicitarAcesso.php">Não possui acesso? <br> Solicitar cadastro.</a>
    </form>
    <div class="acordeao">
                
            </div>
</div>

</body>
</html>