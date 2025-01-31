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

    public function burcar_por_id($id){
        $db = new Database('medico');
        $res = $db->select('id_medico = '.$id)->fetchObject(self::class);
        return $res;
    }

    public function atualizar(){
        $db = new Database('medico');
        $res = $db->update(
            'id_medico = '. $this->id_medico,
            [
                'nome' => $this->name,
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


$med = new Medico();
// $med->name = 'cleidinelda';
// $med->cpf = 11223344556;
// $med->crm = 11223344557;
// $med->especialidade = "Cancer";
// $med->telefone = '992346775';
// $med->email = 'cancer@gmail.com';
// $med->senha = '123';

// $result = $med->buscar();

// foreach($result as $medico){
//     echo "<pre>";
//     print_r($medico);
//     echo "</pre>";
// }

$result = $med->burcar_por_id(3);

print_r($result);

$med->telefone = '6666666';

$res_atu = $med->excluir();


?>