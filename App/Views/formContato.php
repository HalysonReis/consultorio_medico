<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contate-nos</h1>

    <form action="" id="form" method="post">
        <label>Nome</label>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label>E-mail</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label>Mensagem</label>
        <br>
        <textarea name="mensagem" id="mensagem" cols="30" rows="10" required></textarea>
        <br>
        <input type="reset" value="cancelar">
        <input type="submit" name="enviar" value="enviar">
    </form>

    <script src="../../Public/js/email.js"></script>
</body>
</html>