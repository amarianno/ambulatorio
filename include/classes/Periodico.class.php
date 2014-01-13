<?php

require_once('Loader.class.php');

class Periodico extends Persistivel {

    public $codigo;
    public $empregado;
    public $dataPrevisao;
    public $dataInicio;
    public $dataFim;
    public $dataUltimo;
    public $isMaisQuarentaAnos;

    public function getChavePrimaria() {
        return $this->codigo;
    }


}
