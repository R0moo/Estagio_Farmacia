<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas</title>
    <link rel="stylesheet" href="estil.css">
</head>

<script src="script.js"></script>
<body class="FormReceitas">
    <div class="container_formReceitas">
    <h1>Cadastro de Receitas</h1>
    <form action="salvarReceita.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $Receita->getId(); ?>">
        <input type="hidden" name="foto_atual" value="<?php echo $Receita->getImagem() ?>">
        
        
        <label for="titulo">Título: </label>
        <input type="text" name="titulo" value="<?php echo $Receita->getTitulo(); ?>" placeholder="Título:">
        <br>
        <label for="Descricao">Descrição: </label>
        <input type="textarea" name="descricao" value="<?php echo $Receita->getDescricao(); ?>" placeholder="Descrição:">
        <br>
        <label for="ingredientes">Ingredientes: </label><br>
        <textarea name="ingredientes" value="<?php echo $Receita->getIngredientes(); ?>" placeholder="Ex: 2 ovos, SEPARE POR VIRGULAS" required><?php echo $Receita->getIngredientes(); ?></textarea><br>
        <br>
        <br>
        <label for="modo_preparo">Modo de Preparo: </label>
        <textarea name="modo_preparo" value="<?php echo $Receita->getModoPreparo(); ?>" placeholder="Modo de preparo:"><?php echo $Receita->getModoPreparo(); ?></textarea>
        <br>
        <label for="tempo_preparo">Tempo de Preparo (em minutos): </label>
        <input type="number" name="tempo_preparo" value="<?php echo $Receita->getTempoPreparo(); ?>" placeholder="Tempo de preparo:">
        <br>
        <label for="rendimento">Rendimento: </label>
        <input type="text" name="rendimento" value="<?php echo $Receita->getRendimento(); ?>" placeholder="Rendimento:">
        <br>
        <label for="Categoria">Categoria: </label>
        <input type="text" name="categoria" value="<?php echo $Receita->getCategoria(); ?>" placeholder="Categoria:">
        <br>
        <label for="imagem">Imagem: </label>
        <input type="file" name="imagem" id="imagem">
        <br>
        <label for="data_criacao">Data de Criação: </label>
        <input type="date" name="data_criacao" value="<?php echo $Receita->getDataCriacao(); ?>" placeholder="Data de Criação:">
        <br>
        <div class="btns_formReceitas">
        <a class="btn-1" href='Receitas.php'>Voltar</a> <button type="submit">Salvar</button>
        </div>
    </form>
</div>


</body>
</html>