<?php
require_once('Loader.class.php');

class Empregado extends Persistivel {

    public $matricula;
    public $nome;
    public $lotacao;
    public $localidade;
    public $numCarteira;

    public function getChavePrimaria() {
        return $this->codigo;
    }


}