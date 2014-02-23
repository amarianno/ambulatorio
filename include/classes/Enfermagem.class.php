<?php

require_once('Loader.class.php');

class Enfermagem extends Persistivel {

    public $codigo;
    public $empregado;
    public $data;
    public $tipoFuncionario;
    public $procedimento;
    public $obs;
    public $usuario;

    public $total;

    public function getChavePrimaria() {
        return $this->codigo;
    }

}
