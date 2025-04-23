<!DOCTYPE html>
<html lang="pt-br">
<head class="header">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Farmácia Verde</title>
    <link rel="stylesheet" href="estilo.css">

</head>
<body>
    <div class="farmaciaVerde_titulo">
            <h1 class="branco">Farmácia</h1>
            <h1 class="verde"> Verde</h1>
            </div>
            <h4 class="header_description">Políticas em saúde</h4>
                <a href="Usuarios.php">Usuarios</a>
                <?php if(!$logado){ ?>
                <a href="login.php">Login</a> 
                <?php }else{ ?>
                <a href="logout.php">Sair</a> 
                <?php } ?>

        

    <nav>
            <div class="nav_div">
            <button type="button" class="nav_button1" href="PagInicial.php">Início</button>
            <button type="button" class="nav_button2" href="Receitas.php">Receitas</button>
            <button type="button" class="nav_button3" href="Projetos.php">Projetos</button>
            <button type="button" class="nav_button4" href="listaCursos.php">Cursos</button>
            </div>
            
    </nav>
            </div>
    
    <h2>Projetos</h2>
    <?php if($logado && isset($_SESSION['usuario']) && $_SESSION['usuario']->getNivel() === '1'){ ?>
               <a href="Projeto.php" class="btn">Inserir novo</a>  
            <?php }?>
    <div class="projetos">    
    <?php foreach($Projetos as $projeto) { ?>
        <div class="card-container">
        <a class="card" href="Template.php?id=<?php echo $projeto->getId(); ?>">

        <?php if ($projeto->getCapa()) { ?>
            <img src='uploads/<?php echo $projeto->getCapa(); ?>' alt='<?php echo $projeto->getTitulo(); ?>'>
        <?php } ?>

        <br>
        <h3>
            <?php if($logado){ ?>
                <?php echo $projeto->getId(); ?> -
            <?php } ?>
            <?php echo $projeto->getTitulo(); ?>
        </h3>
        <br>
        </a>
        <?php if($logado && $_SESSION['usuario']->getNivel() !== '3'){ ?>
            <div class="acoes">
                <a href="Projeto.php?id=<?php echo $projeto->getId(); ?>">Editar</a>
                <br>
                <a href="excluirProjetos.php?id=<?php echo $projeto->getId(); ?>">Deletar</a>
            </div>
        <?php } ?>

    
<?php } ?>

</div>
</body>
</html>
</body>
</html>
