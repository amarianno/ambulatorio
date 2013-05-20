<?php
require_once('Loader.class.php');

class Cid extends Persistivel {

    public $codigo;
    public $nome;
    public $descricao;

    public function getChavePrimaria() {
        return $this->codigo;
    }


}