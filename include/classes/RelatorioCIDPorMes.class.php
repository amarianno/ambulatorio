<?php
require_once('Loader.class.php');

class RelatorioCIDPorMes extends Persistivel {

    public $quantidade;
    public $cid;

    public function getChavePrimaria() {
        return $this->quantidade;
    }


}