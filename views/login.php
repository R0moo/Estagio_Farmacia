<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Farmácia Verde</title>
    <link rel="stylesheet" href="estilo.css">
    
</head>
<body class="login">
    <div class="container">
    <h1>Login</h1>
    <form action="fazerLogin.php" method="post">
        <input type="text" name="login" placeholder="Login:">
        <br>
        <input type="password" name="senha" placeholder="Senha:">
        <br>
        <button type="submit">Enviar</button>
    </form>
    <div class="acordeao">
                <h3>Informações:</h3>
                <ul>
                    <li>Por padrão, seu login é seu email e sua senha é seu CPF </li>
                    <li><strong>! Você pode alterar esses dados posteriormente !</strong></li>
                </ul>
            </div>
</div>

</body>
</html>