<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas</title>
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
                <a href="#" class="nav_link2">Receitas</a>
                <a href="Projetos.php" class="nav_link3">Projetos</a>
                <a href="Cursos.php" class="nav_link4">Cursos</a>

        </nav>
    </div>
    </div>
    
    <h2>Receitas</h2>
    <?php if($logado && isset($_SESSION['usuario']) && $_SESSION['usuario']->getNivel() !== '3'){ ?>
               <a href="Receita.php" class="btn">Inserir novo</a>  
            <?php }?>
    <div class="receitas">    
<?php foreach($Receitas as $receita) { ?>
    <div class="card">
        <?php if ($receita->getImagem()) { ?>
            <img src='uploads/<?php echo $receita->getImagem(); ?>' alt='<?php echo $receita->getTitulo(); ?>'>
            <?php } ?>
            <br>
            <h3><?php if($logado && $_SESSION['usuario']->getNivel() !== '3'){ ?>
                <?php echo $receita->getId(); ?>
            <?php }  echo $receita->getTitulo(); ?></h3>
            <p><?php echo $receita->getDescricao(); ?></p>
            <br>
            <?php $ingredientes = explode(',', $receita->getIngredientes()); ?>
            <p>Ingredientes:</p>
            <ul>
                <?php foreach($ingredientes as $ingrediente){ ?>
                    <li> <?php echo $ingrediente; ?> </li>
                <?php } ?>
            </ul> <br>
            <p>Modo de preparo: <?php echo $receita->getModoPreparo(); ?></p>
            <br>
            <?php if($logado){ ?>
                <div class="acoes">
                    <a href="Receita.php?id= <?php echo $receita->getId();?>" >Editar</a>
                    <br>
                    <a href="excluirReceitas.php?id=<?php echo $receita->getId();?>&ft=<?php echo $receita->getImagem();?>">Deletar</a>
                </div>
            <?php } ?>
    </div>

    <?php } ?>
</div>
</body>
</html>
</body>
</html>
