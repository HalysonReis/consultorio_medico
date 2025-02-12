<?php

require_once '../Controller/Prontuario.php';

$pron = new Prontuario();

$res = $pron->buscar();


if (isset($_POST['vai'])){
    $id_pron  = $_POST['id_prontuario'];
    $doenca_preexist  = $_POST['doenca_preexist'];
    $alergias = $_POST['alergias'];
    $medic_recentas = $_POST['medic_recentas'];
    $diagnostico = $_POST['diagnostico'];
    $presc_medica = $_POST['presc_medica'];
    $tipo_exemes = $_POST['tipo_exemes'];
    $proc_realizado = $_POST['proc_realizado'];
    $resul_proc = $_POST['resul_proc'];
    $data_internacao = $_POST['data_internacao'];
    $data_alta = $_POST['data_alta'];

    $prontua = $pron->burcar_por_id($id_pron);

    $prontua->id_prontuario = $id_pron;
    $prontua->doenca_preexist = $doenca_preexist;
    $prontua->alergias = $alergias;
    $prontua->medic_recentas = $medic_recentas;
    $prontua->diagnostico = $diagnostico;
    $prontua->presc_medica = $presc_medica;
    $prontua->tipo_exemes = $tipo_exemes;
    $prontua->proc_realizado = $proc_realizado;
    $prontua->resul_proc = $resul_proc;
    $prontua->data_alta = $data_alta;

    header('location: ./prontuario.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prontuario</title>
</head>
<body>
<header class="header-area">
        <ul class="list-area">
            <li class="item-list"><a href="./consultas.php" class="link-pages">Consultas</a></li>
            <li class="item-list"><a href="agendas.php" class="link-marque">Agendas</a>'</li>
            <li class="item-list"><a href="./prontuario.php" class="link-pages">Prontuario</a></li>
        </ul>
    </header>

    <h1 class="title">seus prontuarios</h1>
    <?php foreach($res as $prontu) {?>
    <form action="" method="post" style="border: 1px solid black;">
        <label for="">id_prontuario</label>
        <input type="number" name="id_prontuario" id="id_prontuario" <?php echo "value='". $prontu->id_prontuario. "'" ?> readonly>
        <label for="">id_medico</label>
        <input type="number" name="id_medico" id="id_medico" <?php echo "value='". $prontu->id_medico. "'" ?> disabled="">
        <label for="">id_cliente</label>
        <input type="number" name="id_cliente" id="id_cliente" <?php echo "value='". $prontu->id_cliente. "'" ?> disabled=""> 
        <br>
        <label for="">doenca_preexist</label>
        <textarea name="doenca_preexist" id="doenca_preexist"><?php echo $prontu->doenca_preexist ?></textarea>
        <label for="">alergias</label>
        <textarea name="alergias" id="alergias"><?php echo $prontu->alergias ?></textarea>
        <label for="">medic_recentas</label>
        <textarea name="medic_recentas" id="medic_recentas"><?php echo $prontu->medic_recentas ?></textarea>
        <label for="">diagnostico</label>
        <textarea name="diagnostico" id="diagnostico"><?php echo $prontu->diagnostico ?></textarea>
        <label for="">presc_medica</label>
        <textarea name="presc_medica" id="presc_medica"><?php echo $prontu->presc_medica ?></textarea>
        <br>
        <label for="">tipo_exemes</label>
        <textarea name="tipo_exemes" id="tipo_exemes"><?php echo $prontu->tipo_exemes ?></textarea>
        <label for="">proc_realizado</label>
        <textarea name="proc_realizado" id="proc_realizado"><?php echo $prontu->proc_realizado ?></textarea>
        <label for="">resul_proc</label>
        <textarea name="resul_proc" id="resul_proc"><?php echo $prontu->resul_proc ?></textarea>
        <label for="">data_internacao</label>
        <textarea name="data_internacao" id="data_internacao"><?php echo $prontu->data_internacao ?></textarea>
        <label for="">data_alta</label>
        <textarea name="data_alta" id="data_alta"><?php echo $prontu->data_alta ?></textarea>
        <button type="reset">cancelar</button>
        <button type="submit" name="vai">atualizar</button>
    </form>
    <?php }?>
</body>
</html>