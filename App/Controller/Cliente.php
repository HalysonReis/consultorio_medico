<?php
require_once "../Model/Database.php";

class Cliente {
    public int $id_cliente;
    public string $nome;
    public int $cpf;
    public string $telefone;
    public string $email;
    public string $senha;
    public string $data_nasc;

    public function cadastrar(){
        $db = new Database('cliente');
        $res = $db->insert(
            [
                'nome'      => $this->nome,
                'cpf'       => $this->cpf,
                'telefone'  => $this->telefone,
                'email'     => $this->email,
                'senha'     => $this->senha,
                'data_nasc' => $this->data_nasc
            ]
            );

        return $res;
    }

    public function buscar($where = null, $order = null, $limit = null){
        $db = new Database('cliente');
        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function buscar_por_id($where){
        $db = new Database('cliente');
        $res = $db->select($where)->fetchObject(self::class);
        return $res;
    }

    public function atualizar(){
        $db = new Database('cliente');
        $res = $db->update(
            'id_cliente = '. $this->id_cliente,
            [
                'nome'      => $this->nome,
                'cpf'       => $this->cpf,
                'telefone'  => $this->telefone,
                'email'     => $this->email,
                'senha'     => $this->senha,
                'data_nasc' => $this->data_nasc
            ]
            );
        return $res;
    }

    public function excluir(){
        $db = new Database('cliente');
        $res = $db->delete('id_cliente = '. $this->id_cliente);
        return $res;
    }
}

?>