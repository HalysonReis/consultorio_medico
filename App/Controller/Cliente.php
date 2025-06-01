<?php

namespace App\Controller;

require_once "../../vendor/autoload.php";
use PDO;
use App\Controller\Pessoa;

class Cliente extends Pessoa{
    public int $id_cliente;
    public string $sexo;
    public int $idade;
    public string $plano_saude;
}

?>