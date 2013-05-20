<?php

require_once('Loader.class.php');

class CidBC extends BC {
    private $DAO;

    public function __construct() {
        $this->DAO = new CidDAOPersistivel();
    }

    public function incluir(DAOBanco $banco, $camposValores) {
        return $this->DAO->incluir($banco, $camposValores);
    }

    public function alterar(DAOBanco $banco, $camposValores, FiltroSQL $filtro = null) {
        return $this->DAO->alterar($banco, $camposValores, $filtro);
    }

    public function excluir(DAOBanco $banco, FiltroSQL $filtro = null) {
        return $this->DAO->excluir($banco, $filtro);
    }

    public function consultar(DAOBanco $banco, $campos, FiltroSQL $filtro = null) {
        return $this->DAO->consultar($banco, $campos, $filtro);
    }

    public function consultarCidPorMes(DAOBanco $banco, $dataInicial, $dataFinal ) {
        return $this->DAO->consultarCidPorMes($banco,$dataInicial,$dataFinal);
    }
}