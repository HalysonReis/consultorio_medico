<?php

require '../Controller/Medico.php';

$Medico = new Medico();

if (isset($_POST['cadastrar'])){
    $Medico->nome = $_POST['nome'];
    $Medico->cpf = $_POST['cpf'];
    $Medico->crm = $_POST['crm'];
    $Medico->especialidade = $_POST['especialidade'];
    $Medico->telefone = $_POST['telefone'];
    $Medico->email = $_POST['email'];
    $Medico->senha = $_POST['senha'];

    $Medico->cadastrar();

    header("Refresh: 0");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar-se</title>
    <link rel="stylesheet" href="css/css-cadastro-medico.css">
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
                <label class="label">CRM</label>
                <input type="text" name="crm" id="crm" class="input">
            </div>

            <div class="div-input">
                <label class="label">Especialidade</label>
                <input type="text" name="especialidade" id="especialidade" class="input">
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

            <button type="submit" name="cadastrar" class="btn-login">Cadastrar</button>
        </form>
        <div class="imgs">
            <h1 class="title-login">Cadastro de Medico</h1>
            <img src="img/cadastro.png" alt="" class="img">
        </div>
    </div>
</body>
</html>