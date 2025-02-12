<?php

require_once "../Controller/Agenda.php";

$agenda = new Agenda();

$agenda_cli = $agenda->buscar();
// echo "<pre>";
// print_r($agenda_cli);
// echo "</pre>";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <header class="header-area">
        <ul class="list-area">
            <li class="item-list"><a href="./consultas.php" class="link-pages">Consultas</a></li>
            <li class="item-list"><a href="./agendas.html" class="link-pages">Agenda</a></li>
            <li class="item-list"><a href="./prontuario.html" class="link-pages">Prontuario</a></li>
        </ul>
    </header>
    <section class="marque-con">
        <h1 class="title">suas agendas</h1>
        <table class="table-med">
            <thead class="t-cabeca">
                <tr class="t-cols">
                    <th class="t-col">id_medico</th>
                    <th class="t-col">Nome</th>
                    <th class="t-col">CRM</th>
                    <th class="t-col">Especialidade</th>
                    <th class="t-col">telefone</th>
                    <th class="t-col">dia e hora</th>
                    <th class="t-col">rua</th>
                    <th class="t-col">numero da rua</th>
                    <th class="t-col">numero da sala</th>
                </tr>
            </thead>
            <tbody class="t-corpo">
            <?php 
                foreach($agenda_cli as $agen) {
                    ?>
                    <tr class="t-lins">
                        <th class="t_lin"><?php echo $agen->id_medico; ?></th>
                        <th class="t_lin"><?php echo $agen->nome; ?></th>
                        <th class="t_lin"><?php echo $agen->crm; ?></th>
                        <th class="t_lin"><?php echo $agen->especialidade; ?></th>
                        <th class="t_lin"><?php echo $agen->telefone; ?></th>
                        <th class="t_lin"><?php echo $agen->data_time; ?></th>
                        <th class="t_lin"><?php echo $agen->rua; ?></th>
                        <th class="t_lin"><?php echo $agen->numero_rua; ?></th>
                        <th class="t_lin"><?php echo $agen->num_sala; ?></th>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>