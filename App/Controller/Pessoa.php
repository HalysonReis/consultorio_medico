<?php

namespace App\Controller;
require_once "../../vendor/autoload.php";

class Pessoa{
    private int $id_pessoa;
    private string $nome;
    private string $telefone;
    private string $email;
    private string $cpf;
    private string $senha;
    private string $perfil = 'med';
    private string $img_perfil;
}

?>