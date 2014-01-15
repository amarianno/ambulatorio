<?php
require_once('Loader.class.php');

class RelatorioCIDPorMes extends Persistivel {

    public $quantidade;
    public $cid;
    public $dias;

    public function getChavePrimaria() {
        return $this->quantidade;
    }


}