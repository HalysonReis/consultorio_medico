<?php

namespace App\Controller;

require_once "../../vendor/autoload.php";
use PDO;
use App\Model\Database;
use App\Controller\Pessoa;

class Cliente extends Pessoa{
    public int $id_cliente;
    public string $sexo;
    public int $idade;
    public string $plano_saude;

    public function buscar(){
        $db = new Database('cliente');

        $consulta = $db->select_all('pessoa', 'id_pessoa')->fetchAll(PDO::FETCH_ASSOC);

        return $consulta;
    }

    public function buscar_por_id($id){
        $db = new Database('cliente');

        $consulta = $db->select_all('pessoa', 'id_pessoa', "id_cliente = ".$id)->fetch(PDO::FETCH_ASSOC);

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
            'perfil' => 'cli',
            'img_perfil' => $this->img_perfil
        ];

        $lastID = $db->insert_lastID($values1);

        $db = new Database('cliente');

        $values2 = [
            'sexo' => $this->sexo,
            'idade' => $this->idade,
            'plano_saude' => $this->plano_saude,
            'id_pessoa' => $lastID,
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
        $db = new Database('cliente');

        $values1 = [
            'sexo' => $this->sexo,
            'idade' => $this->idade,
            'plano_saude' => $this->plano_saude,
        ];

        $values2 = [
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'senha' => $this->senha,
            'perfil' => 'cli',
            'img_perfil' => $this->img_perfil,
        ];

        $res = $db->update_all($values1, $values2, 'pessoa', 'id_pessoa', 'id_cliente = '. $id);

        return $res ? TRUE : FALSE;
    }

    public function excluir($id){
        $db = new Database('pessoa');

        $res = $db->delete('id_pessoa = '. $id);
        return $res;
    }
}

$cli = new Cliente();

$cli->excluir(5);

?>