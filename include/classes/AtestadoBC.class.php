<?php

require_once('Loader.class.php');

class AtestadoBC extends BC {
    private $DAO;

    public function __construct() {
        $this->DAO = new AtestadoDAOPersistivel();
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

    public function consultarDiasAfastadoPorMes(DAOBanco $banco, $dataInicial, $dataFinal ) {
        return $this->DAO->consultarDiasAfastadoPorMes($banco, $dataInicial, $dataFinal);
    }

    public function consultarDiasAfastadoPorPeriodo(DAOBanco $banco, $dataInicial, $dataFinal, $patologia, $especialidade ) {
        return $this->DAO->consultarDiasAfastadoPorPeriodo($banco, $dataInicial, $dataFinal, $patologia, $especialidade);
    }

    public function consultarAtestadoPorDataDeRecebimento(DAOBanco $banco, $dataRecebimento) {
        return $this->DAO->consultarAtestadoPorDataDeRecebimento($banco, $dataRecebimento);
    }

    public function consultarAtestadosHomologadosPorPeriodo(DAOBanco $banco, $dataInicial, $dataFinal) {
        return $this->DAO->consultarAtestadosHomologadosPorPeriodo($banco, $dataInicial, $dataFinal);
    }

    public function consultarAtestadosINSS(DAOBanco $banco, $dataInicial, $dataFinal) {
        return $this->DAO->consultarAtestadosINSS($banco, $dataInicial, $dataFinal);
    }
}