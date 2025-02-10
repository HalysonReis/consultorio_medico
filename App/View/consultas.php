<?php

require_once '../Controller/Medico.php';
require_once '../Controller/Cliente.php';
require_once '../Controller/Consulta.php';

$med = new Medico();
$cli = new Cliente();
$con = new Consulta();

$medicos = $med->buscar();

if (isset($_GET['id'])){
    $id_med = $_GET['id'];
    echo "
    <form method='post'>
    <input Type='email' name='email' class='digite seu email:'>
    <button name='cap-email' type='submit'>enviar</button>
    </form>
    ";
    if(isset($_POST['cap-email'])){
        $email = $_POST['email'];
        $clien = $cli->buscar();
        try{
        foreach ($clien as $pessoa) {
            if ($pessoa->email == $email){
                $con->id_medico = $id_med;
                $con->id_cliente = $pessoa->id_cliente;
                $con->data_time = "2025-2-9 22:52";
                $con->rua = "R.bem ali";
                $con->numero_rua = "2";
                $con->num_sala = "101";
                $mar = $con->cadastrar();
            }
            }
        }
        catch(Execption $err) {
            return FALSE;
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="./css/css-consultas.css">
</head>
<body>
    <header class="header-area">
        <ul class="list-area">
            <li class="item-list"><a href="./consultas.php" class="link-pages">Consultas</a></li>
            <li class="item-list"><a href="./agendas.html" class="link-pages">Agenda</a></li>
            <li class="item-list"><a href="./prontuario.html" class="link-pages">Prontuario</a></li>
        </ul>
    </header>
    <main class="area-principal">
        <section class="marque-con">
            <h1 class="title">voce nao tem nenhuma consulta</h1>
            <table class="table-med">
                <thead class="t-cabeca">
                    <tr class="t-cols">
                        <th class="t-col">Nome</th>
                        <th class="t-col">Especialidade</th>
                        <th class="t-col">Marcar</th>
                    </tr>
                </thead>
                <tbody class="t-corpo">
            <?php
                foreach($medicos as $meds){
                    ?>
                            <tr class="t-lins">
                                <th class="t-lin"><?php echo $meds->nome; ?></th>
                                <th class="t-lin"><?php echo $meds->especialidade;?></th>
                                <th class="t-lin"><?php echo '<a href="consultas.php?id='. $meds->id_medico. '" class="link-marque">Marcar</a>';?></th>
                            </tr>
                            <?php
                }
                ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>