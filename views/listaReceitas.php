<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <nav>
        <h1>Farmácia Verde</h1>
        <div class="links">

            <a href="index.php">Home</a>
            <a href="#">Receitas</a>
            <a href="Cursos.php">Cursos</a>
            <?php if(!$logado){ ?>
                <a href="login.php">Login</a>
            <?php }else{ ?>
                <a href="Usuarios.php">Usuarios</a>
            <a href="logout.php">Sair</a> 
            <?php } ?>
        </div>
    </nav>
    
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
