<?php
require_once "../Model/Database.php";

class Consulta {
    public int $id_consulta;
    public int $id_medico;
    public int $id_cliente;
    public string $data_time;
    public string $rua;
    public string $numero_rua;
    public string $num_sala;

    public function cadastrar(){
        $db = new Database('consulta');
        $res = $db->insert(
            [
                'id_medico'     => $this->id_medico,
                'id_cliente'    => $this->id_cliente,
                'data_time'     => $this->data_time,
                'rua'           => $this->rua,
                'numero_rua'    => $this->numero_rua,
                'num_sala'      => $this->num_sala
            ]
            );

        return $res;
    }

    public function buscar($where = null, $order = null, $limit = null){
        $db = new Database('consulta');
        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function burcar_por_id($id){
        $db = new Database('consulta');
        $res = $db->select('id_consulta = '. $id)->fetchObject(self::class);
        return $res;
    }

    public function atualizar(){
        $db = new Database('consulta');
        $res = $db->update(
            'id_consulta = '. $this->id_consulta,
            [
                'id_consulta'     => $this->id_consulta,
                'id_medico'     => $this->id_medico,
                'id_cliente'    => $this->id_cliente,
                'data_time'     => $this->data_time,
                'rua'           => $this->rua,
                'numero_rua'    => $this->numero_rua,
                'num_sala'      => $this->num_sala
            ]
            );
        return $res;
    }

    public function excluir(){
        $db = new Database('consulta');
        $res = $db->delete('id_consulta = '. $this->id_consulta);
        return $res;
    }
}

?>