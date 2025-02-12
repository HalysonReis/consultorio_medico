<?php
require_once "../Model/Database.php";

class Agenda {
    public int $id_medico;
    public int $id_consulta;
    public string $nome;
    public string $crm;
    public string $especialidade;
    public string $telefone;
    public string $data_time;
    public string $rua;
    public string $numero_rua;
    public string $num_sala;


    public function buscar($where = null, $order = null, $limit = null){
        $db = new Database('vw_agenda');
        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }
    public function burcar_por_id($id){
        $db = new Database('agenda');
        // $res = $db->select('id_cliente = '. $id)->fetchObject(self::class);
        return $res;
    }

}

?>