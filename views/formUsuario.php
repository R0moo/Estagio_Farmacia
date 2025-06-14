<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia Verde - Usuários</title>
    <link rel="stylesheet" href="estil.css">
</head>

<script src="script.js"></script>
<body class="FormUsuarios">
    <div class="container">
    <h1> Cadastro de Usuários</h1>

    <form action="salvarUsuario.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
        <br>

        <input type="text" name="login" value="<?php echo $usuario->getLogin(); ?>" placeholder="Login:">
        <br>
        
        <input type="password" name="senha" placeholder="<?php echo empty($usuario->getId()) ? 'Informe a senha' : 'Deixe em branco para manter a senha atual'; ?>">
        <br>

        <input type="text" name="email" value="<?php echo $usuario->getEmail(); ?>" placeholder="email:">
        <br>
        <input type="text" name="cpf" value="<?php echo $usuario->getCpf(); ?>" placeholder="CPF:">
        <br>
        <input type="text" name="ocupacao" value="<?php echo $usuario->getOcupacao(); ?>" placeholder="Ocupação:">
        <br>

        <?php if ($_SESSION['usuario']->getNivel() == 1): ?>
            <label for="nivel">Nível de acesso: </label>
            <select name="nivel">
            <option value="1" <?php echo $usuario->getNivel() === '1' ? 'selected' : ''; ?>>Administrador</option>
            <option value="2" <?php echo $usuario->getNivel() === '2' ? 'selected' : ''; ?>>Alimentador</option>
            <option value="3" <?php echo $usuario->getNivel() === '3' ? 'selected' : ''; ?>>Estudante</option>
            </select>
            <?php else: ?>
                <input type="hidden" name="nivel" value="<?php echo $usuario->getNivel(); ?>">
            <?php endif; ?>   

        <br>
        <div class="btns">
        <a href="usuarios.php">Voltar</a>  <button type="submit">Salvar</button>
        </div>
    </form>
    </div>
</body>
</html>