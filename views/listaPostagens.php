<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia Verde</title>
</head>
<body>
    
<?php $isNivel3 = $_SESSION['usuario']->getNivel() == '3'; ?>
    <h1>Postagens</h1>
    <?php if ($isNivel3){ ?> 
    <a href="postagem.php">Nova Postagem</a>
    <?php } ?>
    <table>
        <tr>
            <th>ID</th>
            <th>foto</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        <?php foreach($postagens as $postagem) { ?>
            <tr>
                <td><?php echo $postagem->getId(); ?></td>
                <td>
                    <?php if ($postagem->getFoto()) { ?>
                        <img src='uploads/<?php echo $postagem->getFoto(); ?>' 
                            alt='<?php echo $postagem->getTitulo(); ?>'
                            style='width: 200px'>
                    <?php } ?>
                </td>

                <td><?php echo $postagem->getTitulo(); ?></td>
                <td><?php echo $postagem->getDescricao(); ?></td>
                <td>
                    <a href="postagem.php?id=<?php echo $postagem->getId(); ?>">Editar</a>
                    <br>
                    <a href="excluirpostagens.php?id=<?php echo $postagem->getId(); ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>