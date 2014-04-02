<?php
require_once('Loader.class.php');

class Empregado extends Persistivel {

    public $matricula;
    public $nome;
    public $lotacao;
    public $localidade;
    public $numCarteira;
    public $dataNascimento;
    public $dataAdmissao;
    public $telefone;

    public function getChavePrimaria() {
        return $this->codigo;
    }


}