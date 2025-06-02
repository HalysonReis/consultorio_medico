<?php

namespace App\Controller;

require_once "../../vendor/autoload.php";
use PDO;
use App\Model\Database;
use App\Controller\Pessoa;

class Medico extends Pessoa{
    public int $id_medico;
    public string $crm;
    public string $especialidade;

    public function buscar(){
        $db = new Database('medico');

        $consulta = $db->select_all('pessoa', 'id_pessoa')->fetchAll(PDO::FETCH_ASSOC);

        return $consulta;
    }

    public function buscar_por_id($id){
        $db = new Database('medico');

        $consulta = $db->select_all('pessoa', 'id_pessoa', "id_medico = ".$id)->fetch(PDO::FETCH_ASSOC);

        return $consulta;
    }

    public function cadastar(){
        $db = new Database('pessoa');

        $values1 = [
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'senha' => $this->senha,
            'perfil' => 'med',
            'img_perfil' => $this->img_perfil
        ];

        $lastID = $db->insert_lastID($values1);

        $db = new Database('medico');

        $values2 = [
            'crm' => $this->crm,
            'especialidade' => $this->especialidade,
            'id_pessoa' => $lastID
        ];

        $res = $db->insert($values2);

        if ($res){
            echo "foi";
        }
        else {
            echo "nao foi";
        }

    }

    public function atualizar($id){
        $db = new Database('medico');

        $values1 = [
            'crm' => $this->crm,
            'especialidade' => $this->especialidade,
        ];

        $values2 = [
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'senha' => $this->senha,
            'perfil' => 'med',
            'img_perfil' => $this->img_perfil,
        ];

        $res = $db->update_all($values1, $values2, 'pessoa', 'id_pessoa', 'id_medico = '. $id);

        return $res ? TRUE : FALSE;
    }

    public function excluir($id){
        $db = new Database('pessoa');

        $res = $db->delete('id_pessoa = '. $id);
        return $res;
    }
}

$med = new Medico();

echo $med->excluir(1);



?>