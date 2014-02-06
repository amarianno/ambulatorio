<?php


class Encaminhamento extends Persistivel {

    public $codigo;
    public $descricao;

    public function getChavePrimaria() {
        return $this->codigo;
    }


}
