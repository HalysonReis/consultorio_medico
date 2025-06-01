<?php

namespace App\Model;

require_once "../../vendor/autoload.php";

use app\Models\Env;

class Database {
    private $conn;
    private string $local;
    private string $db;
    private string $user;
    private string $pass;
    private string $table;

    function __construct($table = NULL){
        $this->table = $table;
        // $this->conect();
        $this->setEnv();
    }

    function setEnv(){
        $this->local = getenv('DBLocal');
        $this->db = getenv('DBName');
        $this->user = getenv('DBUser');
        $this->pass = getenv('DBPass');
    }

}
