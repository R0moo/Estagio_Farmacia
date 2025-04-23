<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pag Inicial</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <nav>
        <h1>Farmácia Verde</h1>
        <div class="links">
            
            <a href="#">Home</a>
            <a href="Receitas.php">Receitas</a>
            <a href="Cursos.php">Cursos</a>
            <?php if(!$logado){ ?>
                <a href="login.php">Login</a> 
            <?php }else{ ?>

            <a href="Usuarios.php">Usuarios</a>
            <a href="logout.php">Sair</a> 
            <?php } ?>
        </div>
    </nav>
    
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
