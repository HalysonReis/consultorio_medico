<?php

require '../Controller/Cliente.php';

$Cliente = new Cliente();

if (isset($_POST)){
    $nome = $_POST['nome'];

    echo $nome;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar-se</title>
    <link rel="stylesheet" href="css/css-cadastro.css">
</head>
<body>
    <header class="header-home">
        <a href="home.html"><img src="img/estetoscopio.png" alt="" class="home-volt"></a>
    </header>
    <div class="box">
        <form action="" method="post" class="form">
            <div class="div-input">
                <label class="label">Nome</label>
                <input type="text" name="nome" id="nome" class="input">
            </div>

            <div class="div-input">
                <label class="label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="input">
            </div>

            <div class="div-input">
                <label class="label">Telefone</label>
                <input type="tel" name="telefone" id="telefone" class="input">
            </div>

            <div class="div-input">
                <label class="label">E-mail</label>
                <input type="email" name="email" id="email" class="input">
            </div>

            <div class="div-input">
                <label class="label">Senha</label>
                <input type="password" name="senha" id="senha" class="input">
            </div>
            <div class="div-input">
                <label class="label">Data de Nascimento</label>
                <input type="date" name="data_nasc" id="data_nasc">
            </div>

            <button type="submit"v class="btn-login">Cadastrar-se</button>
        </form>
        <div class="imgs">
            <h1 class="title-login">Cadastro</h1>
            <img src="img/cadastro.png" alt="" class="img">
        </div>
    </div>
</body>
</html>