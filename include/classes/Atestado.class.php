<?php
require_once('Loader.class.php');

class Atestado extends Persistivel {

    public $codigo;
    public $dataRecebimento;
    public $empregado;
    public $diasAfastado;
    public $dataInicialAfastamento;
    public $isAcompanhamentoFamiliar;
    public $grauParentesco;
    public $isConcedidos;
    public $isHomologados;
    public $cid;
    public $isLicencaMaternidade;
    public $isHomologadoMedico;
    public $dataFinalAfastamento;
    public $inss;

    public function getChavePrimaria() {
        return $this->codigo;
    }


}