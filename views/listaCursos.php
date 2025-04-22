<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <nav>
        <h1>Farmácia Verde</h1>
        <div class="links">

            <a href="index.php">Home</a>
            <a href="Cursos.php">Cursos</a>
            <a href="#">Cursos</a>
            <?php if(!$logado){ ?>
                <a href="login.php">Login</a>
            <?php }else{ ?>
                <a href="Usuarios.php">Usuarios</a>
            <a href="logout.php">Sair</a> 
            <?php } ?>
        </div>
    </nav>
    
    <h2>Cursos</h2>
    <?php if($logado && isset($_SESSION['usuario']) && $_SESSION['usuario']->getNivel() !== '3'){ ?>
               <a href="Curso.php" class="btn">Inserir novo</a>  
            <?php }?>
    <div class="cursos">    
<?php foreach($Cursos as $Curso) { ?>
    <div class="card">
        <?php if ($Curso->getImagem()) { ?>
            <img src='uploads/<?php echo $Curso->getImagem(); ?>' alt='<?php echo $Curso->getTitulo(); ?>'>
            <?php } ?>
            <br>
            <h3><?php if($logado && $_SESSION['usuario']->getNivel() !== '3'){ ?>
                <?php echo $Curso->getId(); ?>
            <?php }  echo $Curso->getTitulo(); ?></h3>
            <p><?php echo $Curso->getResumo(); ?></p>
            <br>
            <p>Vagas: <?php $Curso->getVagas(); ?></p>
            <p>Carga Horária:<?php $Curso->getCargaHoraria(); ?> </p>
            <p>Período: <?php echo $Curso->getDataInicio() . 'até' . $Curso->getDataFim(); ?></p>
            <br>
            <?php if($logado){ ?>
                <div class="acoes">
                    <a href="Curso.php?id= <?php echo $Curso->getId();?>" >Editar</a>
                    <br>
                    <a href="excluirCursos.php?id=<?php echo $Curso->getId();?>&ft=<?php echo $Curso->getImagem();?>">Deletar</a>
                </div>
            <?php } ?>
    </div>

    <?php } ?>
</div>
</body>
</html>
</body>
</html>
