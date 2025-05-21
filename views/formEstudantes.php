<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo de Estudantes</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body class="FormEstudantes">
    <div class="container">
    <h1>Cadastro de Estudantes</h1>
    <form action="salvarEstudante.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $Estudante->getId(); ?>">
        <input type="hidden" name="curso_id" value="<?php echo $cursoId; ?>">
        
        
        <label for="nome">Nome: </label>
        <input type="text" name="nome" value="<?php echo $Estudante->getNome(); ?>" placeholder="Nome:">
        <br>
        <label for="cpf">CPF: </label>
        <input type="number" name="cpf" value="<?php echo $Estudante->getCpf(); ?>" placeholder="CPF:">
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Email:">
        <br>
        <label for="ocupacao">Ocupação: </label>
        <input type="text" name="ocupacao" value="<?php echo $Estudante->getOcupacao(); ?>" placeholder="Ocupação:">
        <br>
        <div class="btns">
        <a href="Estudantes.php?id=<?php if($cursoId){echo $cursoId;}else{echo $Estudante->getCursoId();}; ?>">Voltar</a> <button type="submit">Salvar</button>
        </div>
    </form>
</div>
</body>
</html>