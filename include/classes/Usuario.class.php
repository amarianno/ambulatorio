<?php


class Usuario extends Persistivel {

    public $codigo;
    public $nome;
    public $email;
    public $cpf;
    public $senha;
    public $perfil;
    public $empresa;

    public function getChavePrimaria() {
        return $this->codigo;
    }
}

?>