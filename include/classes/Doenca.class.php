<?php


class Doenca extends Persistivel {

    public $codigo;
    public $descricao;

    public function getChavePrimaria() {
        return $this->codigo;
    }


}
