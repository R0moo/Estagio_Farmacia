<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projetos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Adicionar Projetos</h1>
    <form action="salvarProjeto.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $Projeto->getId(); ?>">
        <input type="hidden" name="foto_atual" value="<?= $Projeto->getCapa() ?>">
        
        
        <label for="foto">Título: </label>
        <input type="text" name="titulo" value="<?php echo $Projeto->getTitulo(); ?>" placeholder="Título:">
        <br>
        <label for="foto">Descrição: </label>
        <input type="textarea" name="descricao" value="<?php echo $Projeto->getDescricao(); ?>" placeholder="Descrição:">
        <br>
        <label for="foto">Capa: </label>
        <input type="file" name="capa" id="foto">
        <br>
        <label for="cor1">Cor Primária: </label>
        <input type="color" name="cor1" value="<?php echo $Projeto->getCor1(); ?>" placeholder="Cor Primária:">
        <br>
        <label for="cor2">Cor Secundária: </label>
        <input type="color" name="cor2" value="<?php echo $Projeto->getCor2(); ?>" placeholder="Cor Primária:">

        <div class="btns">
        <a href="Postagens.php">Voltar</a> <button type="submit">Salvar</button>
        </div>


    </form>
    
</body>
</html>