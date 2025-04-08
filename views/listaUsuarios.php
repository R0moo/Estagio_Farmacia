<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia Verde</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php $isNivel1 = $_SESSION['usuario']->getNivel() === '1'; ?>
<nav>
        <h1>Farmácia Verde</h1>
        <div class="links">
            <a href="index.php">Home</a>
            <a href="Receitas.php">Receitas</a>
            <a href="#">Usuarios</a>
            <a href="logout.php">Sair</a> 
        </div>
    </nav>

    <h2>Usuários</h2>
    
    <?php if ($isNivel1){ ?>
    <a href="usuario.php" class="btn">Inserir novo</a>
    

    <?php foreach ($usuarios as $usuario) : ?>
    
    
    <div class="usuarios">
    <div class="card">
            <h4>Id: <?php echo $usuario->getId(); ?>
            <h4>Login: <?php echo $usuario->getLogin(); ?></h4>
            <h4>Email: <?php echo $usuario->getEmail(); ?></h4>
            <h4>CPF: <?php echo $usuario->getCpf(); ?></h4>
            <h4>Ocupação: <?php echo $usuario->getOcupacao(); ?></h4>
            <h4>Nível: <?php echo $usuario->getNivel(); ?></h4>

                <div class="acoes">
                <a href="usuario.php?id=<?php echo $usuario->getId(); ?>">Editar</a>
                    <br>
                    <a href="excluirUsuario.php?id=<?php echo $usuario->getId(); ?>">Exluir</a>
                </div>
    </div>
    </div>
    <?php endforeach ?>

    <?php }else{ ?>
    <div class="usuarios">
    <div class="card">
            <h4>Id: <?php echo $_SESSION['usuario']->getId(); ?>
            <h4>Login: <?php echo $_SESSION['usuario']->getLogin(); ?></h4>
            <h4>Email: <?php echo $_SESSION['usuario']->getEmail(); ?></h4>
            <h4>CPF: <?php echo $_SESSION['usuario']->getCpf(); ?></h4>
            <h4>Ocupação: <?php echo $_SESSION['usuario']->getOcupacao(); ?></h4>

                <div class="acoes">
                <a href="usuario.php?id=<?php echo $_SESSION['usuario']->getId(); ?>">Editar</a>
                </div>
    </div>
    </div>
        <?php } ?>
</body>
</html>