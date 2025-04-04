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
    <form action="Template.php" method="post">
    <input type="hidden" name="id" value="<?php echo $projeto->getId(); ?>">
    <input type="hidden" name="titulo" value="<?php echo $projeto->getTitulo(); ?>">
    <input type="hidden" name="descricao" value="<?php echo $projeto->getDescricao(); ?>">
    <input type="hidden" name="cor1" value="<?php echo $projeto->getCor1(); ?>">
    <input type="hidden" name="cor2" value="<?php echo $projeto->getCor2(); ?>">
    <button type="submit" class="card">
        <?php if ($projeto->getCapa()) { ?>
            <img src='uploads/<?php echo $projeto->getCapa(); ?>' alt='<?php echo $projeto->getTitulo(); ?>'>
            <?php } ?>
            <br>
            <h3><?php if($logado){ ?>
                <?php echo $projeto->getId(); ?>
            <?php }  echo $projeto->getTitulo(); ?></h3>
            <br>
            <?php if($logado && $_SESSION['usuario']->getNivel() !== '3'){ ?>
                <div class="acoes">
                    <a href="Projeto.php?id= <?php echo $projeto->getId();?>" >Editar</a>
                    <br>
                    <a href="excluirProjetos.php?id=<?php echo $projeto->getId();?>">Deletar</a>
                </div>
            <?php } ?>
    </button>
    </form>
    <?php } ?>
</div>
</body>
</html>
</body>
</html>
