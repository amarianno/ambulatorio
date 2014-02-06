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
    public $doenca;
    public $encaminhamento;

    //Avaliacao Ocupacional
    public $atividadeDesenvolvida;
    public $volumeTrabalho;
    public $relacaoChefia;
    public $relacaoColegas;
    public $dores;
    public $fadigaVisual;
    public $tensaoEmocional;
    public $outros;

    public function getChavePrimaria() {
        return $this->codigo;
    }


}
