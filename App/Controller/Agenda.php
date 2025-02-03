<?php
require "../Model/Database.php";

class Consulta {
    public int $id_agenda;
    public int $id_medico;
    public int $id_consulta;
    public int $id_cliente;
    public string $status;

    public function cadastrar(){
        $db = new Database('agenda');
        $res = $db->insert(
            [
                'id_agenda'     => $this->id_agenda,
                'id_consulta'   => $this->id_consulta,
                'id_medico'     => $this->id_medico,
                'id_cliente'    => $this->id_cliente,
                'status'        => $this->status
            ]
            );

        return $res;
    }

    public function buscar($where = null, $order = null, $limit = null){
        $db = new Database('agenda');
        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function burcar_por_id($id){
        $db = new Database('agenda');
        $res = $db->select('id_agenda = '. $id)->fetchObject(self::class);
        return $res;
    }

    public function atualizar(){
        $db = new Database('agenda');
        $res = $db->update(
            'id_agenda = '. $this->id_agenda,
            [
                'id_consulta'   => $this->id_consulta,
                'id_medico'     => $this->id_medico,
                'id_cliente'    => $this->id_cliente,
                'status'        => $this->status,
            ]
            );
        return $res;
    }

    public function excluir(){
        $db = new Database('agenda');
        $res = $db->delete('id_agenda = '. $this->id_agenda);
        return $res;
    }
}

?>