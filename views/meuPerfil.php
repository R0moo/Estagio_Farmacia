<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<script src="script.js"></script>
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
            <a href="#">Meu perfil</a>
            <?php if (!$logado) { ?>
                <a href="login.php">Login</a>
            <?php } else { ?>
                <a href="logout.php">Sair</a>
            <?php } ?>
        </nav>



        <nav>
            <div class="nav_div">

                <a href="index.php" class="nav_link1">Início</a>
                <a href="Receitas.php" class="nav_link2">Receitas</a>
                <a href="Projetos.php" class="nav_link3">Projetos</a>
                <a href="Cursos.php" class="nav_link4">Cursos</a>

        </nav>
    </div>
    </div>
    <div class="perfil">
        <h2>Perfil</h2>
        <div class="foto_de_perfil">

        </div>
        <div class="Meus_Cursos">
            <h3>Meus Cursos</h3>
            <ul>
        <?php foreach ($cursos as $curso): ?>
            <li><?= $curso->getTitulo() ?> - <?= $curso->getCargaHoraria() ?>h</li>
        <?php endforeach; ?>
        </ul>

        <p><strong>Carga horária total:</strong> <?= $cargaHorariaTotal ?> horas</p>
        </div>
    </div>
</body>
</html>