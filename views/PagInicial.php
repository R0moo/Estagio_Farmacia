<!DOCTYPE html>
<html lang="pt-br">

<head class="header">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Farmácia Verde</title>
    <link rel="stylesheet" href="estilo.css">

</head>

<body>
    <div class="cabecalho">
        <div class="farmaciaVerde_titulo">
            <h1 class="branco">Farmácia</h1>
            <h1 class="verde"> Verde</h1>
        </div>
        <h4 class="header_description">Políticas em saúde</h4>

        <?php if (!$logado) { ?>
            <a href="login.php">Login</a>
        <?php } else { ?>
            <a href="logout.php">Sair</a>
        <?php } ?>

        <nav id="side-menu" class="hidden">
            
            <?php if (!$logado) { ?>
                <a href="login.php">Login</a>
            <?php } else { ?>
                <a href="mostrarPerfil.php">Meu perfil</a>
                <a href="logout.php">Sair</a>
            <?php } ?>
        </nav>



        <nav>
            <div class="nav_div">

                <a href="#" class="nav_link1">Início</a>
                <a href="Receitas.php" class="nav_link2">Receitas</a>
                <a href="Projetos.php" class="nav_link3">Projetos</a>
                <a href="Cursos.php" class="nav_link4">Cursos</a>

        </nav>
    </div>
    </div>

    <h2>Projetos</h2>
    <?php if ($logado && isset($_SESSION['usuario']) && $_SESSION['usuario']->getNivel() === '1') { ?>
        <a href="Projeto.php" class="btn">Inserir novo</a>
    <?php } ?>
    <div class="projetos">
        <?php foreach ($Projetos as $projeto) { ?>
            <div class="card-container">
                <a class="card" href="Template.php?id=<?php echo $projeto->getId(); ?>">

                    <?php if ($projeto->getCapa()) { ?>
                        <img src='uploads/<?php echo $projeto->getCapa(); ?>' alt='<?php echo $projeto->getTitulo(); ?>'>
                    <?php } ?>

                    <br>
                    <h3>
                        <?php echo $projeto->getTitulo(); ?>
                    </h3>
                    <br>
                </a>
                <?php if ($logado && $_SESSION['usuario']->getNivel() !== '3') { ?>
                    <div class="acoes">
                        <a href="Projeto.php?id=<?php echo $projeto->getId(); ?>">Editar</a>
                        <br>
                        <a href="excluirProjetos.php?id=<?php echo $projeto->getId(); ?>">Deletar</a>
                    </div>
                <?php } ?>


            <?php } ?>

        </div>
        <script src="script.js"></script>
</body>

</html>