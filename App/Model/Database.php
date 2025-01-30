<?php

class Database {
    private $conn;
    private string $local = "localhost";
    private string $db = "clinicmedica";
    private string $user = "root";
    private string $password = "";
    private string $table;
    
    function __construct($table = null){
        $this->table = $table;
        $this->conecta();
    }

    private function conecta(){
        try {
            $this->conn = new PDO("mysql:host=".$this->local.";dbname=".$this->db,$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            echo "foi";
        }
        catch(PDOExption $err){
            die("Connection failed ".$err->getMessage());
        }
    }

    public function execute($query, $binds = []){
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        }
        catch (PDOException $err){
            die("Connection failed ".$err->getMessage());
        }
    }

    public function insert($values){
        $fields = array_keys($values);

        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        // echo '<pre>';
        // print_r($query);
        // echo '</pre>';
        // exit;

        $res = $this->execute($query, array_values($values));

        if ($res){
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
}


$db = new Database("medico");

$medi = array(
    'nome'=> 'carlos',
    'cpf' => '22222222222',
    'crm' => '2222222222',
    'especialidade' => 'pediatra',
    'telefone' => '11111111111',
    'email' => 'pedimais@gmail.com',
    'senha' => '123'
);

$res = $db->insert($medi);

if ($res){
    echo "cadastrado";
}
else {
    echo 'nao foi cadastrado';
}

?>