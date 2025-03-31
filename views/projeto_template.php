<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postagens</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php ?>
    <nav style="background-color: <?php echo $_POST['cor1']; ?>">
        <h1><?php echo $_POST['titulo']; ?></h1>
        <div class="links">
            <?php if(!$logado){ ?>
                <a href="login.php">Login</a> 
            <?php }else{ ?>
            <a href="index.php">Home</a>
            <a href="Postagens.php">Postagens</a>
            <a href="Usuarios.php">Usuarios</a>
            <a href="logout.php">Sair</a> 
            <?php } ?>
        </div>
    </nav>

    <h2>Sobre o Projeto</h2>
    <p><?php echo $_POST['descricao'];?></p>

    <hr>

    <h2>Postagens</h2>
    <?php if($logado && isset($_SESSION['usuario']) && $_SESSION['usuario']->getNivel() !== '3'){ ?>
               <a href="Postagem.php" class="btn">Inserir novo</a>  
            <?php }?>
    <div class="postagens">    
<?php foreach($Postagens as $postagem) { ?>
    <div class="card">
        <?php if ($postagem->getFoto()) { ?>
            <img src='uploads/<?php echo $postagem->getFoto(); ?>' alt='<?php echo $postagem->getTitulo(); ?>'>
            <?php } ?>
            <br>
            <h3><?php if($logado){ ?>
                <?php echo $postagem->getId(); ?>
            <?php }  echo $postagem->getTitulo(); ?></h3>
            <p><?php echo $postagem->getDescricao(); ?></p>
            <br>
            <?php if($logado){ ?>
                <div class="acoes">
                    <a href="Postagem.php?id= <?php echo $postagem->getId();?>" >Editar</a>
                    <br>
                    <a href="excluirPostagens.php?id=<?php echo $postagem->getId();?>&ft=<?php echo $postagem->getFoto();?>">Deletar</a>
                </div>
            <?php } ?>
    </div>

    <?php } ?>
</div>
</body>
</html>
</body>
</html>