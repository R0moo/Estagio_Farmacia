<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<script src="script.js"></script>
<body>
    <div class="cabecalho">
        <div class="farmaciaVerde_titulo">
            <h1 class="branco">Farmácia</h1>
            <h1 class="verde"> Verde</h1>
        </div>
        <h4 class="header_description">Políticas em saúde</h4>



        <nav>
            <div class="nav_div">

                <a href="index.php" class="nav_link1">Início</a>
                <a href="Receitas.php" class="nav_link2">Receitas</a>
                <a href="Projetos.php" class="nav_link3">Projetos</a>
                <a href="Cursos.php" class="nav_link4">Cursos</a>

        </nav>
    </div>
    </div>
    <h2>Formulário de Inscrição</h2>
    <form class="inscricao" action="inscricao.php" method="POST">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" placeholder="Nome:"> <br>
        <label for="email">Email: </label>
        <input type="email" name="email" placeholder="Email:">
        <label for="cpf">CPF: </label>
        <input type="number" name="cpf" placeholder="CPF:"><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>