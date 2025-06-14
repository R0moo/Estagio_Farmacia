<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudantes - <?php echo $curso ? $curso->getTitulo() : 'Sem curso'; ?></title>
    <link rel="stylesheet" href="estil.css">
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

            <?php if (!$logado) { ?>
                <a href="login.php">Login</a>
            <?php } else { ?>
                <a href="mostrarPerfil.php">Meu perfil</a>
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
    
    <h2>Estudantes</h2>
    <?php if($logado && isset($_SESSION['usuario']) && $_SESSION['usuario']->getNivel() !== '3'){ ?>
              <a href="Estudante.php?curso_id=<?php echo $curso->getId(); ?>" class="btn">Inserir novo</a>
            <?php }?>
    <div class="estudantes">
        <?php if(isset($_GET['erro']) && $_GET['erro'] == 'Nf'){
            echo 'Vagas já preenchidas';
        }else if(isset($_GET['erro']) && $_GET['erro'] == 'ece'){
            echo 'Email ou CPF já existente';
        }    ?>
<?php foreach ($Estudantes as $estudante): ?>
    <?php if ($curso && $estudante->getCursoId() == $curso->getId()): ?>
    <div class="card">
            <h3><?php  echo $estudante->getNome(); ?></h3>
            <p>CPF: <?php echo $estudante->getCpf(); ?></p>
            <br>
            <p>Email: <?php echo $estudante->getEmail(); ?></p>
            <br>
            <p>Ocupacao: <?php echo $estudante->getOcupacao(); ?></p>
            <br>
            <?php if($logado){ ?>
                <div class="acoes">
                    <a href="Estudante.php?id= <?php echo $estudante->getId();?>" >Editar</a>
                    <br>
                    <a href="excluirEstudantes.php?id=<?php echo $estudante->getId()?>&curso_id=<?php echo $estudante->getCursoId()?>">Deletar</a>
                </div>
            <?php } ?>
    </div>
    <?php endif; ?>
<?php endforeach; ?>
</div>
</body>
</html>
</body>
</html>
