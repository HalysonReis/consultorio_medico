<?php

namespace App\Model;

require_once "../vendor/autoload.php";
use PDO;
use App\Models\Env;

class Database {
    private $conn;
    private string $local;
    private string $db;
    private string $user;
    private string $pass;
    private string $table;

    function __construct($table = NULL){
        $this->table = $table;
        $this->conect();
    }
    
    function setEnv(){
        $this->local = getenv('DBLocal');
        $this->db = getenv('DBName');
        $this->user = getenv('DBUser');
        $this->pass = getenv('DBPass');
    }
    
    function conect(){
        try {
            $this->setEnv();
            $this->conn = new PDO('mysql:host='. $this->local. ";dbname=".$this->db, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $err) {
            die('erro na conecxão com o db'. $err);
        }
    }

    public function execute($query, $binds = []){
        try {

            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);

            return $stmt;

        }catch(PDOException $err){
            die("erro na conecxao". $err);
        }
    }

    public function insert($values){
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = "INSERT INTO ". $this->table. " (". implode(',', $fields). ") VALUES (". implode(',', $binds). ")";

        $res = $this->execute($query, array_values($values));

        return $res ? true : false;
    }

    public function insert_lastID($values){
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = "INSERT INTO ". $this->table. " (". implode(',', $fields). ") VALUES (". implode(',', $binds). ")";

        // echo $query;
        // exit;

        $res = $this->execute($query, array_values($values));

        return $res ? $this->conn->lastInsertId() : false;
    }

    public function select($where = null, $order = null, $limit = null, $fields = "*") {
        $where = strlen($where) ? " WHERE ". $where : '';
        $order = strlen($order) ? " ORDER BY ". $order : '';
        $limit = strlen($limit) ? " LIMIT ". $limit : '';

        $query = "SELECT ". $fields. " FROM ". $this->table. " ". $where. " ". $order. " ". $limit;

        $res = $this->execute($query);

        return $res;
    }

    public function select_all($tableP, $id_name, $where = null){
        $where = strlen($where) ? " WHERE ". $where : '';
        $query = "SELECT * FROM ". $this->table. " AS A INNER JOIN ". $tableP. " AS B ON ". "A.".$id_name. " = B.". $id_name. ' '. $where;
        return $this->execute($query);
    }

    public function update($where, $values){
        $fields = array_keys($values);
        $param = array_values($values);

        $query = "UPDATE ". $this->table. ' SET '. implode('=?,', $fields).'=? WHERE '. $where;
        
        $res = $this->execute($query, $param);

        return $res ? TRUE : FALSE;
    }

    public function update_all($values1, $values2, $tableP, $id_name, $where){
        $where = strlen($where) ? " WHERE ". $where : '';
        $fields = array_keys($values1);
        $fields2 = array_keys($values2);
        $masterArray = array_merge($values1, $values2);
        $param = array_values($masterArray);

        $query = "UPDATE ". $this->table. " SET ". implode('=?,', $fields). "=? ". $where. "; UPDATE ". $tableP. " SET ". implode('=?,', $fields2). "=? WHERE ". $id_name. " = ( SELECT ". $id_name. " FROM ".$this->table. $where. ")";
        
        $res = $this->execute($query, $param);
        return $res ? TRUE : FALSE;
    }

    public function delete($where){
        $query = "UPDATE ". $this->table. " SET status = 0 WHERE ". $where;
        return $this->execute($query) ? true : false;
    }
}


?>
