<?php

require_once '../Controller/Medico.php';
require_once '../Controller/Cliente.php';


if (isset($_POST['login'])){
    $cli = new Cliente;
    $med = new Medico;
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // echo $email;
    // echo "<br>";
    // echo $senha;
    
    $clien = $cli->buscar();
    $medicu = $med->buscar();
    function logar($email, $senha, array &$query){
        foreach ($query as $pessoa) {
            if ($pessoa->email == $email && $pessoa->senha == $senha){
                return TRUE;
            }
            else if ($pessoa->email != $email || $pessoa->senha != $senha){
                return FALSE;
                break;
                }
            }
    }
    
    try{
        if (logar($email, $senha, $clien)){
            header('location: ./agendas.html');
        }
        else if (logar($email, $senha, $medicu)){
            header('location: ./area-medico.html');
        }
        else{
            echo "<script>alert('Os dados inseridos estao incorretos')</script>";
        }
    }
    catch (Execption $err) {
        echo "<script>alert('Os dados estao incorretos')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Login</title>
    <link rel="stylesheet" href="css/css-login.css">
</head>
<body>
    <header class="header-home">
        <a href="home.html"><img src="img/estetoscopio.png" alt="" class="home-volt"></a>
    </header>
    <div class="box">
        <form action="" method="post" class="form">
            <div class="div-input">
                <label class="label">E-mail</label>
                <input type="email" name="email" id="email" class="input">
            </div>
            <div class="div-input">
                <label class="label">Senha</label>
                <input type="password" name="senha" id="senha" class="input">
            </div>
            <button type="submit" name="login" class="btn-login">Login</button>
            <a href="cadastro.php" class="link-cadastro">Cadastrar-se Aqui</a>
        </form>
        <div class="imgs">
            <h1 class="title-login" >Realizar Login</h1>
            <img src="img/login.png" alt="" class="img">
        </div>
    </div>
</body>
</html>