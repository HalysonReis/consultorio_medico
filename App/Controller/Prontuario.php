<?php
require_once "../Model/Database.php";

class Prontuario {
    public int $id_prontuario;
    public int $id_medico;
    public int $id_cliente;
    public $doenca_preexist;
    public $alergias;
    public $medic_recentas;
    public $diagnostico;
    public $presc_medica;
    public $tipo_exemes;
    public $proc_realizado;
    public $resul_proc;
    public $data_internacao;
    public $data_alta;

    public function cadastrar(){
        $db = new Database('prontuario');
        $res = $db->insert(
            [
                'id_medico'         => $this->id_medico,
                'id_cliente'        => $this->id_cliente
            ]
            );

        return $res;
    }

    public function buscar($where = null, $order = null, $limit = null){
        $db = new Database('prontuario');
        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function burcar_por_id($id){
        $db = new Database('prontuario');
        $res = $db->select('id_prontuario = '. $id)->fetchObject(self::class);
        return $res;
    }

    public function atualizar(){
        $db = new Database('prontuario');
        $res = $db->update(
            'id_prontuario = '. $this->id_prontuario,
            [
                'doenca_preexist'   => $this->doenca_preexist,
                'alergias'          => $this->alergias,
                'medic_recentas'    => $this->medic_recentas,
                'diagnostico'       => $this->diagnostico,
                'presc_medica'      => $this->presc_medica,
                'tipo_exemes'       => $this->tipo_exemes,
                'proc_realizado'    => $this->proc_realizado,
                'resul_proc'        => $this->resul_proc,
                'data_internacao'   => $this->data_internacao,
                'data_alta'         => $this->data_alta
            ]
            );
        return $res;
    }

    public function excluir(){
        $db = new Database('prontuario');
        $res = $db->delete('id_prontuario = '. $this->id_prontuario);
        return $res;
    }
}

?>