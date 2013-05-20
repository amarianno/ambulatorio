<?php
require_once('Loader.class.php');

class Procedimento extends Persistivel {

    public $codigo;
    public $chave;
    public $descricao;

    public function getChavePrimaria() {
        return $this->codigo;
    }


}