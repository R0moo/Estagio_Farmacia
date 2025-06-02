<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
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
            <a href="mostrarPerfil.php">Meu perfil</a>
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
                <a href="#" class="nav_link4">Cursos</a>

        </nav>
    </div>
    </div>
    
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
            <h3><?php  echo $Curso->getTitulo(); ?></h3>
            <p><?php echo $Curso->getResumo(); ?></p>
            <br>
            <p>Vagas: <?php echo $Curso->getVagas(); ?></p>
            <p>Carga Horária:<?php echo $Curso->getCargaHoraria(); ?> </p>
            <p>Período: <?php echo $Curso->getDataInicio() . ' até ' . $Curso->getDataFim(); ?></p>
            <p>Data atual: <?php echo $hoje ?></p>
            <?php if(!isset($_SESSION['usuario']) || $_SESSION['usuario']->getNivel() !== '1'){ ?>
                    <a href="inscrever.php">Solicitar inscrição</a>
                <?php }elseif($logado && isset($_SESSION['usuario']) && $_SESSION['usuario']->getNivel() === '1'){ ?>
                    <a href="Estudantes.php?id=<?php echo $Curso->getId(); ?>">Inscritos</a>
                    <?php }elseif($logado && isset($_SESSION['usuario']) && $_SESSION['usuario']->getNivel() !== '1') ?>
                <br>
    
            <?php if($Curso->getDataFim() == $hoje){ ?>
           <a href="Avaliacao.php?id=<?php echo $Curso->getId(); ?> ">Avaliar</a>
            <?php }?>
            
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
