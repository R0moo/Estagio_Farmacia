<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body class="FormCursos">
    <div class="container">
    <h1>Cadastro de Cursos</h1>
    <form action="salvarCursos.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $Curso->getId(); ?>">
        <input type="hidden" name="foto_atual" value="<?php echo $Curso->getImagem() ?>">
        
        <label for="titulo">Título: </label>
        <input type="text" name="titulo" value="<?php echo $Curso->getTitulo(); ?>" placeholder="Título:">
        <br>
        <label for="resumo">Resumo: </label>
        <textarea name="resumo" placeholder="Resumo:"><?php echo $Curso->getResumo(); ?></textarea>
        <br>
        <label for="vagas">Vagas: </label>
        <input type="number" name="vagas" value="<?php echo $Curso->getVagas(); ?>" placeholder="Vagas:">
        <br>
        <label for="materiais">Materiais: </label>
        <input type="file" name="materiais[]" multiple value="<?php echo $Curso->getMateriais(); ?>" placeholder="Materiais:">
        <br>
        <label for="carga_horaria">Carga Horária: </label>
        <input type="text" name="carga_horaria" value="<?php echo $Curso->getCargaHoraria(); ?>" placeholder="Carga Horária:">
        <br>
        <label for="data_inicio">Data de Início: </label>
        <input type="date" name="data_inicio" value="<?php echo $Curso->getDataInicio(); ?>" placeholder="Data de início:">
        <br>
        <label for="data_fim">Data de Finalização: </label>
        <input type="date" name="data_fim" value="<?php echo $Curso->getDataFim(); ?>" placeholder="Data de Finalização:">
        <br>
        <label for="imagem">Imagem: </label>
        <input type="file" name="imagem" id="imagem">

        <br>
        <div class="btns">
        <a href="Cursos.php">Voltar</a> <button type="submit">Salvar</button>
        </div>
    </form>
</div>


</body>
</html>