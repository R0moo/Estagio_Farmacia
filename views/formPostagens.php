<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo de Postagens</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body class="FormPostagens">
    <div class="container">
    <h1>Cadastro de Postagens</h1>
    <form action="salvarPostagem.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $Postagem->getId(); ?>">
        <input type="hidden" name="foto_atual" value="<?= $Postagem->getFoto() ?>">
        <input type="hidden" name="projeto_id" value="<?= $_SESSION['projeto']['id'] ?>">
        
        
        <label for="foto">Título: </label>
        <input type="text" name="titulo" value="<?php echo $Postagem->getTitulo(); ?>" placeholder="Título:">
        <br>
        <label for="foto">Descrição: </label>
        <input type="textarea" name="descricao" value="<?php echo $Postagem->getDescricao(); ?>" placeholder="Descrição:">
        <br>
        <label for="foto">Foto: </label>
        <input type="file" name="foto" id="foto">
        <br>
        <label for="foto">Data de Criação: </label>
        <input type="date" name="data_criacao" value="<?php echo $Postagem->getDataCriacao(); ?>" placeholder="Data de Criação:">
        <br>
        <div class="btns">
        <a href="Postagens.php">Voltar</a> <button type="submit">Salvar</button>
        </div>
    </form>
</div>
</body>
</html>