<?php

require "../Model/Database.php";

class Medico {
    public int $id_medico;
    public string $nome;
    public int $cpf;
    public int $crm;
    public string $especialidade;
    public string $telefone;
    public string $email;
    public string $senha;

    public function cadastrar(){
        $db = new Database('medico');
        $res = $db->insert(
            [
                'nome'          => $this->name,
                'cpf'           => $this->cpf,
                'crm'           => $this->crm,
                'especialidade' => $this->especialidade,
                'telefone'      => $this->telefone,
                'email'         => $this->email,
                'senha'         => $this->senha
            ]
            );

        return $res;
    }

    public function buscar($where = null, $order = null, $limit = null){
        $db = new Database('medico');
        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function burcar_por_id($busca){
        $db = new Database('medico');
        $res = $db->select($busca)->fetchObject(self::class);
        return $res;
    }

    public function atualizar(){
        $db = new Database('medico');
        $res = $db->update(
            'id_medico = '. $this->id_medico,
            [
                'nome' => $this->nome,
                'cpf' => $this->cpf,
                'crm' => $this->crm,
                'especialidade' => $this->especialidade,
                'telefone' => $this->telefone,
                'email' => $this->email,
                'senha' => $this->senha
            ]
            );
        return $res;
    }

    public function excluir(){
        $db = new Database('medico');
        $res = $db->delete('id_medico = '. $this->id_medico);
        return $res;
    }
}

?>